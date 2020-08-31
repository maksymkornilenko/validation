<?php

/* @var $this yii\web\View */


$this->title = 'Statistic';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="body-content">
        <?php foreach ($queue as $value): ?>
            <div class="row" style="margin-top: 10px">
                <div class="col-lg-4 alert-success">
                    <div class="col-lg-12">
                        <h2><?= $value['name'] ? $value['name'] : 'Other Category' ?></h2>
                    </div>
                    <div class="col-lg-12" style="padding: 0">
                        <h2>Queue - <?= $value['count'] . ' is validation' ?></h2>
                    </div>
                </div>
                <div class="col-lg-8">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
    <?= \yii\grid\GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'username',
            'email',
            [
                'attribute' => 'is_admin',
                'content' => function ($data) {
                    if ($data->is_admin==1){
                        return 'yes';
                    }
                    return 'no';
                }
            ],
            [
                'class' => \yii\grid\ActionColumn::className(),
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', '/site/profile?id='.$model->id,
                            ['title' => Yii::t('yii', 'View')]);
                    }
                ],
                'template'=>'{view}',
            ]
        ]
    ]) ?>
</div>
