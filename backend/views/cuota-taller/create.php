<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CuotaTaller */

$this->title = 'Create Cuota Taller';
$this->params['breadcrumbs'][] = ['label' => 'Cuota Tallers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuota-taller-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
