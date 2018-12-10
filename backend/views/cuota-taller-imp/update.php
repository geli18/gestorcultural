<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CuotaTallerImp */

$this->title = 'Update Cuota Taller Imp: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cuota Taller Imps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuota-taller-imp-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
