<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cuota */

$this->title = 'Update Cuota: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuota-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
