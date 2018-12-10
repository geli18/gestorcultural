<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = 'Actualizar Taller Imp: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Taller Imps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="taller-imp-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
