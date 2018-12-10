<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CuotaTallerImp */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cuota-taller-imp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_taller_imp')->textInput() ?>

    <?php echo $form->field($model, 'id_cuota')->textInput() ?>

    <?php echo $form->field($model, 'obligatoria')->textInput() ?>

    <?php echo $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'fecha_max_pago')->textInput() ?>

    <?php echo $form->field($model, 'tipo_periodo')->textInput() ?>

    <?php echo $form->field($model, 'concepto_imp')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'monto')->textInput() ?>

    <?php echo $form->field($model, 'estatus')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
