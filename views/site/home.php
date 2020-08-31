<?php

/* @var $this yii\web\View */

$this->title = 'Validation App';
?>
<div class="site-index">

    <div class="body-content">
        <?php foreach ($mainCounter as $value): ?>
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-4 alert-success">
                <div class="col-lg-12">
                    <h2><?=$value['name'] ? $value['name'] : 'Other Category'?></h2>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-6" style="padding: 0">
                        <h2>Queue - <?= $value['count'] ?></h2>
                    </div>
                </div>
                <div class="col-lg-12" style="margin-bottom: 20px;">
                    <div class="col-lg-7">
                    </div>
                    <div class="col-lg-5">
                        <a href="/site/start-validation?type=<?=$value['id']?>" class="btn btn-success" style="width: 100%">Start</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
