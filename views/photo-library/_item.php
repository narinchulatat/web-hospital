<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
?>
<?php
$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');
$time = time();
?>
<!--<div class="media">
    <div class="media-body">
        <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>">
            <h5 class="media-heading"><i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?></h5>
        </a>
        <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $model->start_date; ?>
    </div>
</div>-->


  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <?=$model->getPhotcover($model->ref);?>
      <div class="caption">
        <a href="<?= Url::to(['/photo-library/view', 'id' => $model->id]); ?>">
            <i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo $model->event_name; ?>
        </a>
      </div>
    </div>
  </div>