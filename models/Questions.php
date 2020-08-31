<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $question
 * @property int|null $correct_variant
 * @property int|null $variant
 */
class Questions extends \yii\db\ActiveRecord
{
    public $variantes;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'correct_variant', 'variant'], 'default', 'value' => null],
            [['category_id', 'correct_variant', 'variant'], 'integer'],
            [['question'], 'required'],
            [['question'], 'string', 'max' => 255],
            [['variantes'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'question' => 'Question',
            'correct_variant' => 'Correct Variant',
        ];
    }
}
