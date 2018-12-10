<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\TallerSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="taller-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'id_instructor') ?>

    <?php echo $form->field($model, 'nombre') ?>

    <?php echo $form->field($model, 'descripcion') ?>

    <?php echo $form->field($model, 'descripcion_temario') ?>

    <?php // echo $form->field($model, 'numero_personas') ?>

    <?php // echo $form->field($model, 'imagen_url') ?>

    <?php // echo $form->field($model, 'temario_url') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <?php // echo $form->field($model, 'creado_por') ?>

    <?php // echo $form->field($model, 'disponible') ?>

    <?php // echo $form->field($model, 'duracion_mes') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
