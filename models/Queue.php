<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "queue".
 *
 * @property int $id
 * @property string $path_file
 * @property int|null $category_id
 * @property int|null $user_id
 * @property int $created_at
 * @property int $start_at
 * @property int $finish_at
 * @property int|null $is_valid
 */
class Queue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queue';
    }

//    public function behaviors()
//    {
//        return [
//            TimestampBehavior::className(),
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path_file', 'created_at', 'start_at', 'finish_at'], 'required'],
            [['category_id', 'user_id', 'created_at', 'start_at', 'finish_at', 'is_valid'], 'default', 'value' => null],
            [['category_id', 'user_id', 'created_at', 'start_at', 'finish_at', 'is_valid'], 'integer'],
            [['path_file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path_file' => 'Path File',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'start_at' => 'Start At',
            'finish_at' => 'Finish At',
            'is_valid' => 'Is Valid',
        ];
    }

    public static function validationQueue($type)
    {
        if (empty($type)){
            return false;
        }
        $model = Queue::find()->where(['finish_at' => null])->andWhere(['category_id' => $type])->orderBy('id')->all();
        if ($model) {
            $modelOne = Queue::find()->where(['finish_at' => null])->andWhere(['category_id' => $type])->andWhere(['id' => $model[0]->id])->one();

            if ($modelOne->start_at==null) {
                $modelOne->start_at = time();
                $modelOne->save(false);
            }
            $modelQuestions = Questions::find()->where(['category_id' => $type])->all();
            $modelInput = new Questions();
            if (Yii::$app->request->post()) {
                $requests = Yii::$app->request->post('Questions');
                $modelOne->finish_at = time();
                $modelOne->user_id = Yii::$app->user->identity->getId();
                foreach ($modelQuestions as $question) {
                    if ($question->correct_variant == $requests[$question->id]) {
                        $modelOne->is_valid = 1;
                    } else {
                        $modelOne->is_valid = 0;
                        break;
                    }
                }
                $modelOne->save();
                return ['request' => true];

            } else {
                return [
                    'request' => 'view',
                    'modelQuest' => $modelQuestions,
                    'model' => $modelOne,
                    'modelInput' => $modelInput
                ];
            }
        } else {
            return ['request' => false];
        }
    }
}
