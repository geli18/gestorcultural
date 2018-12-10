<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CuotaTaller */

$this->title = 'Update Cuota Taller: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuota Tallers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuota-taller-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
