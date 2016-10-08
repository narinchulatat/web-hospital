<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Province;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoLibrary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-library-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>

    <div class="form-group field-upload_files">
        <label class="control-label" for="upload_files[]"> ภาพถ่าย </label>
        <div>
            <?=
            FileInput::widget([
                'name' => 'upload_ajax[]',
                'options' => ['multiple' => true, 'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                'pluginOptions' => [
                    'overwriteInitial' => false,
                    'initialPreviewShowDelete' => true,
                    'initialPreview' => $initialPreview,
                    'initialPreviewConfig' => $initialPreviewConfig,
                    'uploadUrl' => Url::to(['/slick/upload-ajax']),
                    'uploadExtraData' => [
                        'ref' => $model->ref,
                    ],
                    'maxFileCount' => 100
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
