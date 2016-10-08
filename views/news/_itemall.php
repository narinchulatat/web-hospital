<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
?>
<?php
$baseUrl = Yii::getAlias('@web');
$basePath = Yii::getAlias('@webroot');

//echo $basePath.'\uploads'.$model->id.'.pdf';

$iconUrl = '/uploaded/news/icons'.$model->id.'.png';

if(@is_file($basePath.$pdfUrl)){
  $img = $baseUrl.$iconUrl;
}else{
  $img = $baseUrl.'/uploaded/news/icons/default.png';
}
?>
<div class="media">
  <div class="media-left">
      <img class="media-object" src="<?= $img; ?>" style="width: 40px; height: 40px;" alt="...">
  </div>
  <div class="media-body">
    <a href="<?= Url::to(['/news/view', 'id'=>$model->id]); ?>">
    <h5 class="media-heading"><p class="text-info"><?php echo $model->title; ?> <span class="badge">อ่าน : <?php echo $model->view; ?></span></p></h5>
  </a>
    <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $model->post_date; ?>
  </div>
</div>
