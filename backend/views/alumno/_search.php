<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AlumnoSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="alumno-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'numero_registro') ?>

    <?php echo $form->field($model, 'nombre') ?>

    <?php echo $form->field($model, 'fecha_nacimiento') ?>

    <?php echo $form->field($model, 'fecha_alta') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'nacionalidad') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'codigo_postal') ?>

    <?php // echo $form->field($model, 'fecha_baja') ?>

    <?php // echo $form->field($model, 'correo_electronico') ?>

    <?php // echo $form->field($model, 'telefono_movil') ?>

    <?php // echo $form->field($model, 'telefono_casa') ?>

    <?php // echo $form->field($model, 'nombre_padre') ?>

    <?php // echo $form->field($model, 'edad_padre') ?>

    <?php // echo $form->field($model, 'ocupacion_padre') ?>

    <?php // echo $form->field($model, 'tel_padre') ?>

    <?php // echo $form->field($model, 'nombre_madre') ?>

    <?php // echo $form->field($model, 'edad_madre') ?>

    <?php // echo $form->field($model, 'ocupacion_madre') ?>

    <?php // echo $form->field($model, 'tel_madre') ?>

    <?php // echo $form->field($model, 'fecha_ingreso') ?>

    <?php // echo $form->field($model, 'lugar_nacimiento') ?>

    <?php // echo $form->field($model, 'tel_emergencia') ?>

    <?php // echo $form->field($model, 'escuela_procedencia') ?>

    <?php // echo $form->field($model, 'alergia_enfermedad') ?>

    <?php // echo $form->field($model, 'tipo_sangineo') ?>

    <?php // echo $form->field($model, 'afiliacion_seguro') ?>

    <?php // echo $form->field($model, 'curp') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
