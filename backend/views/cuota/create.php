<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cuota */

$this->title = 'Create Cuota';
$this->params['breadcrumbs'][] = ['label' => 'Cuotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuota-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
