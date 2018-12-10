<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title = 'Update Instructor: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Instructores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instructor-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
