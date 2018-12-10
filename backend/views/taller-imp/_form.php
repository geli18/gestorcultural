<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="taller-imp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id')->textInput() ?>

    <?php echo $form->field($model, 'id_curso_base')->textInput() ?>

    <?php echo $form->field($model, 'id_instructor')->textInput() ?>

    <?php echo $form->field($model, 'clave_unica_curso')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'fecha_inicio')->textInput() ?>

    <?php echo $form->field($model, 'fecha_fin')->textInput() ?>

    <?php echo $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'numero_max_personas')->textInput() ?>

    <?php echo $form->field($model, 'comentarios')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'url_img_publicitaria')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lunes')->textInput() ?>

    <?php echo $form->field($model, 'martes')->textInput() ?>

    <?php echo $form->field($model, 'miercoles')->textInput() ?>

    <?php echo $form->field($model, 'jueves')->textInput() ?>

    <?php echo $form->field($model, 'viernes')->textInput() ?>

    <?php echo $form->field($model, 'sabado')->textInput() ?>

    <?php echo $form->field($model, 'domingo')->textInput() ?>

    <?php echo $form->field($model, 'duracion_hora')->textInput() ?>

    <?php echo $form->field($model, 'lunes_fin')->textInput() ?>

    <?php echo $form->field($model, 'martes_fin')->textInput() ?>

    <?php echo $form->field($model, 'miercoles_fin')->textInput() ?>

    <?php echo $form->field($model, 'jueves_fin')->textInput() ?>

    <?php echo $form->field($model, 'viernes_fin')->textInput() ?>

    <?php echo $form->field($model, 'sabado_fin')->textInput() ?>

    <?php echo $form->field($model, 'domingo_fin')->textInput() ?>

    <?php echo $form->field($model, 'estatus')->textInput() ?>

    <?php echo $form->field($model, 'duracion_mes')->textInput() ?>

    <?php echo $form->field($model, 'disponible')->textInput() ?>

    <?php echo $form->field($model, 'id_aula_lunes')->textInput() ?>

    <?php echo $form->field($model, 'id_aula_martes')->textInput() ?>

    <?php echo $form->field($model, 'id_aula_miercoles')->textInput() ?>

    <?php echo $form->field($model, 'id_aula_jueves')->textInput() ?>

    <?php echo $form->field($model, 'id_aula_viernes')->textInput() ?>

    <?php echo $form->field($model, 'id_aula_sabado')->textInput() ?>

    <?php echo $form->field($model, 'id_aula_domingo')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
