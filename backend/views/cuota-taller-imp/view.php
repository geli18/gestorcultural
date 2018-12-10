<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CuotaTallerImp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuota Taller Imps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuota-taller-imp-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id_taller_imp',
            'id_cuota',
            'obligatoria',
            'comentario',
            'fecha_max_pago',
            'tipo_periodo',
            'concepto_imp',
            'monto',
            'estatus',
        ],
    ]) ?>

</div>
