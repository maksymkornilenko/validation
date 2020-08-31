<?php

/* @var $this yii\web\View */

$this->title = 'Validation App';
?>
<div class="site-index">

    <div class="body-content">
        <?php $form=\yii\widgets\ActiveForm::begin() ?>
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-12" style="text-align: center">
                <?php if ($model->category_id==2) { ?>
                    <a style="height: 100px; width: 100%" href="<?=Yii::getAlias('@web').$model->path_file?>" target="_blank"><img width="50%" src="/icon/doc_icon.png" alt="doc_icon.png"/>
                    </a>
                <?php } elseif ($model->category_id==1) { ?>
                    <img width="50%" src="<?=$model->path_file?>" alt="<?=$model->path_file?>"/>
                <?php } ?>
            </div>
        </div>
        <?php foreach ($modelQuest as $key=>$question): ?>
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-12 alert-success">
                    <div><?=$form->field($modelInput,'variantes')->radioList(['1'=>'Yes','0'=>'No'],['name'=>'Questions['.$question->id.']'])->label($question->question)?></div>
            </div>
        </div>
        <?php endforeach; ?>
        <?= \yii\helpers\Html::submitButton('Next')?>
        <?php \yii\widgets\ActiveForm::end() ?>
    </div>
</div>
