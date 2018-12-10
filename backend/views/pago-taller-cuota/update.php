<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PagoTallerCuota */

$this->title = 'Update Pago Taller Cuota: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pago Taller Cuotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pago-taller-cuota-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
