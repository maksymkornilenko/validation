<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6 row">
            <div class="col-lg-6">
                Имя пользователя
            </div>
            <div class="col-lg-6">
            <?= $model->username ?>
            </div>
            <div class="col-lg-6">
                Email
            </div>
            <div class="col-lg-6">
                <?= $model->email ?>
            </div>
            <div class="col-lg-6">
                Дата создания
            </div>
            <div class="col-lg-6">
                <?= date('d-m-Y H:i:s',$model->created_at) ?>
            </div>
            <div class="col-lg-6">
                Дата редактирования
            </div>
            <div class="col-lg-6">
                <?= date('d-m-Y H:i:s', $model->updated_at) ?>
            </div>
            <div class="col-lg-6">
                Админ
            </div>
            <div class="col-lg-6">
                <?php if ($model->is_admin==1){
                    echo 'Yes';
                }else{
                    echo 'No';
                }?>
            </div>
            <div class="col-lg-6">
                Последнее посещение
            </div>
            <div class="col-lg-6">
                <?php if ($model->last_visit===0){
                    echo 'Online';
                }else if ($model->last_visit>0){
                    echo date('d-m-Y H:i:s', $model->last_visit);
                }else{
                    echo 'Not Sign in';
                }?>
            </div>
        </div>
        <div class="col-lg-6">
            <img width="35%" src="/icon/doc_icon.png">
        </div>
    </div>
</div>
