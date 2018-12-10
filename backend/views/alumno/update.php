<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Alumno */

$this->title = 'Actualizar Alumno: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'actualizar';
?>
<div class="alumno-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
