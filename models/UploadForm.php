<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, docx'],
        ];
    }

    public function upload()
    {
        $newQueue = new Queue();
        foreach ($this->imageFile as $file) {
            if ($file->size) {
                $ext = pathinfo($file->name);
                $newQueue->path_file='/uploads/' . uniqid() . '_' . date_timestamp_get(date_create()) . '.' . $ext['extension'];
                if ($ext['extension'] == 'png' || $ext['extension'] == 'jpg' || $ext['extension'] == 'jpeg') {
                    $newQueue->category_id = 1;
                } elseif ($ext['extension'] == 'docx') {
                    $newQueue->category_id = 2;
                }else{
                    $newQueue->category_id = 3;
                }

            }

        }
        $newQueue->created_at = time();
        if ($newQueue->save(false)){
            $file->saveAs(\Yii::getAlias('@webroot') . $newQueue->path_file);
            return json_encode(['id'=>$newQueue->id,'date_create'=>$newQueue->created_at]);
        }else{
            return false;
        }

    }
}