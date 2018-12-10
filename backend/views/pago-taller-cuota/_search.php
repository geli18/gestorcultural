<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PagoTallerCuotaSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="pago-taller-cuota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'id_taller_imp') ?>

    <?php echo $form->field($model, 'id_cuota') ?>

    <?php echo $form->field($model, 'monto') ?>

    <?php echo $form->field($model, 'id_alumno') ?>

    <?php // echo $form->field($model, 'concepto') ?>

    <?php // echo $form->field($model, 'fecha_pago') ?>

    <?php // echo $form->field($model, 'metodo_pago') ?>

    <?php // echo $form->field($model, 'comentario') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
