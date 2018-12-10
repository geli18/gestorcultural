<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Taller */

$this->title = 'Actualizar taller base. [' . $model->id . '] ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['dashboard',  'id'=>$model->id]];
$this->params['breadcrumbs'][] = 'Actualizar taller base';
?>
<div class="taller-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
