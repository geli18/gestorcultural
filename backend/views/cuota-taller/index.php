<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CuotaTallerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuota Tallers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuota-taller-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Cuota Taller', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_cuota',
            'id_taller',
            'nombre',
            'obligatoria',
            // 'comentario',
            // 'tipo_periodo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
