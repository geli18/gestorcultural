<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TallerImpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taller Imps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taller-imp-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Crear Taller Imp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_curso_base',
            'id_instructor',
            'clave_unica_curso',
            'nombre',
            // 'fecha_inicio',
            // 'fecha_fin',
            // 'descripcion',
            // 'numero_max_personas',
            // 'comentarios',
            // 'url_img_publicitaria:url',
            // 'lunes',
            // 'martes',
            // 'miercoles',
            // 'jueves',
            // 'viernes',
            // 'sabado',
            // 'domingo',
            // 'duracion_hora',
            // 'lunes_fin',
            // 'martes_fin',
            // 'miercoles_fin',
            // 'jueves_fin',
            // 'viernes_fin',
            // 'sabado_fin',
            // 'domingo_fin',
            // 'estatus',
            // 'duracion_mes',
            // 'disponible',
            // 'id_aula_lunes',
            // 'id_aula_martes',
            // 'id_aula_miercoles',
            // 'id_aula_jueves',
            // 'id_aula_viernes',
            // 'id_aula_sabado',
            // 'id_aula_domingo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
