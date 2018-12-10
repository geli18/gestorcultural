<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CuotaTallerImp */

$this->title = 'Create Cuota Taller Imp';
$this->params['breadcrumbs'][] = ['label' => 'Cuota Taller Imps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuota-taller-imp-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
