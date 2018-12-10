<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taller-imp-view">

    <p>
        
        <?php echo Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
        <?php echo Html::a('Imprimir comprobante', ['imprimir-comprobante', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'data' => [
                
                'method' => 'get',
            ],
        ]) ?>
        
        
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_alumno',
            'id_taller_imp',
            'id_pago',
            'fecha_inscripcion',
        ],
    ]) ?>

</div>
