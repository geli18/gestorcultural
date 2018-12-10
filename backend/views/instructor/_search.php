<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InstructorSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="instructor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'nombre') ?>

    <?php echo $form->field($model, 'fecha_nacimiento') ?>

    <?php echo $form->field($model, 'direccion') ?>

    <?php echo $form->field($model, 'numero_cedula') ?>

    <?php // echo $form->field($model, 'numero_registro') ?>

    <?php // echo $form->field($model, 'fecha_alta') ?>

    <?php // echo $form->field($model, 'fecha_baja') ?>

    <?php // echo $form->field($model, 'url_foto') ?>

    <?php // echo $form->field($model, 'url_fb') ?>

    <?php // echo $form->field($model, 'url_tw') ?>

    <?php // echo $form->field($model, 'url_cv') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'disponible') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
