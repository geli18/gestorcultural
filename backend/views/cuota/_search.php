<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CuotaSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="cuota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'creado_por') ?>

    <?php echo $form->field($model, 'concepto') ?>

    <?php echo $form->field($model, 'descripcion') ?>

    <?php echo $form->field($model, 'concepto_impresion') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <?php // echo $form->field($model, 'disponible') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
