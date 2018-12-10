<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CuotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuota-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Crear cuota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'creado_por',
            'concepto',
            'descripcion',
            'concepto_impresion',
            'monto',
            // 'fecha_creacion',
            // 'disponible',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
