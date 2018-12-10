<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CuotaTallerImpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuota Taller Imps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuota-taller-imp-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Cuota Taller Imp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_taller_imp',
            'id_cuota',
            'obligatoria',
            'comentario',
            // 'fecha_max_pago',
            // 'tipo_periodo',
            // 'concepto_imp',
            // 'monto',
            // 'estatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
