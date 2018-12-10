<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = 'Crear Taller Imp';
$this->params['breadcrumbs'][] = ['label' => 'Taller Imps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taller-imp-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
