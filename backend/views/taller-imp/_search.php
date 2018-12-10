<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\TallerImpSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="taller-imp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'id_curso_base') ?>

    <?php echo $form->field($model, 'id_instructor') ?>

    <?php echo $form->field($model, 'clave_unica_curso') ?>

    <?php echo $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'numero_max_personas') ?>

    <?php // echo $form->field($model, 'comentarios') ?>

    <?php // echo $form->field($model, 'url_img_publicitaria') ?>

    <?php // echo $form->field($model, 'lunes') ?>

    <?php // echo $form->field($model, 'martes') ?>

    <?php // echo $form->field($model, 'miercoles') ?>

    <?php // echo $form->field($model, 'jueves') ?>

    <?php // echo $form->field($model, 'viernes') ?>

    <?php // echo $form->field($model, 'sabado') ?>

    <?php // echo $form->field($model, 'domingo') ?>

    <?php // echo $form->field($model, 'duracion_hora') ?>

    <?php // echo $form->field($model, 'lunes_fin') ?>

    <?php // echo $form->field($model, 'martes_fin') ?>

    <?php // echo $form->field($model, 'miercoles_fin') ?>

    <?php // echo $form->field($model, 'jueves_fin') ?>

    <?php // echo $form->field($model, 'viernes_fin') ?>

    <?php // echo $form->field($model, 'sabado_fin') ?>

    <?php // echo $form->field($model, 'domingo_fin') ?>

    <?php // echo $form->field($model, 'estatus') ?>

    <?php // echo $form->field($model, 'duracion_mes') ?>

    <?php // echo $form->field($model, 'disponible') ?>

    <?php // echo $form->field($model, 'id_aula_lunes') ?>

    <?php // echo $form->field($model, 'id_aula_martes') ?>

    <?php // echo $form->field($model, 'id_aula_miercoles') ?>

    <?php // echo $form->field($model, 'id_aula_jueves') ?>

    <?php // echo $form->field($model, 'id_aula_viernes') ?>

    <?php // echo $form->field($model, 'id_aula_sabado') ?>

    <?php // echo $form->field($model, 'id_aula_domingo') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
