<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Taller Imps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taller-imp-view">

    <p>
        <?php echo Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_curso_base',
            'id_instructor',
            'clave_unica_curso',
            'nombre',
            'fecha_inicio',
            'fecha_fin',
            'descripcion',
            'numero_max_personas',
            'comentarios',
            'url_img_publicitaria:url',
            'lunes',
            'martes',
            'miercoles',
            'jueves',
            'viernes',
            'sabado',
            'domingo',
            'duracion_hora',
            'lunes_fin',
            'martes_fin',
            'miercoles_fin',
            'jueves_fin',
            'viernes_fin',
            'sabado_fin',
            'domingo_fin',
            'estatus',
            'duracion_mes',
            'disponible',
            'id_aula_lunes',
            'id_aula_martes',
            'id_aula_miercoles',
            'id_aula_jueves',
            'id_aula_viernes',
            'id_aula_sabado',
            'id_aula_domingo',
        ],
    ]) ?>

</div>
