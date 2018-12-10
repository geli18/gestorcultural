<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PagoTallerCuota */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pago Taller Cuotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-taller-cuota-view">

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
            'monto',
            'id_alumno',
            'concepto',
            'fecha_pago',
            'metodo_pago',
            'comentario',
        ],
    ]) ?>

</div>
