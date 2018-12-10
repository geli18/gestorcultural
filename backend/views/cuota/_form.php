<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cuota */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cuota-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'creado_por')->textInput() ?>

    <?php echo $form->field($model, 'concepto')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'concepto_impresion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'monto')->textInput() ?>

    <?php echo $form->field($model, 'fecha_creacion')->textInput() ?>

    <?php echo $form->field($model, 'disponible')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
