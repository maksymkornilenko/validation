<?php

namespace app\controllers;


use app\models\UploadForm;
use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class ApiController extends Controller
{
    protected function verbs()
    {
        return [
            'send-document' => ['POST'],
        ];
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors[] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionSendDocument()
    {
        $model = new UploadForm();
        $model->imageFile = UploadedFile::getInstances($model, 'imageFile');
        return $model->upload();
    }
}
