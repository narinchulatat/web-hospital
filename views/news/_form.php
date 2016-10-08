<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NewsCategory;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$upfileCat =NewsCategory::find()->all();
$listData = ArrayHelper::map($upfileCat, 'id', 'name');
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'icon')->fileInput() ?>
    <?= $form->field($model, 'cat_id')->dropDownList($listData, ['prompt'=>'กรุณาเลือกหมวดหมู่']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?> -->

<?= $form->field($model, 'detail')->widget(CKEditor::className(), [
  'options' => ['rows' => 6], 'preset' => 'basic',]) ?>
    <?php
        if(!$model->isNewRecord){
            echo $form->field($model, 'post_date')->textInput();
          }
    ?>

    <?php
        if(!$model->isNewRecord){
            echo $form->field($model, 'update_date')->textInput();
          }
    ?>

    <?php
        if(!$model->isNewRecord){
            echo $form->field($model, 'view')->textInput();
          }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
