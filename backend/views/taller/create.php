<?php



/* @var $this yii\web\View */
/* @var $model backend\models\Taller */

$this->title = 'Crear Taller';
$this->params['breadcrumbs'][] = ['label' => 'Tallers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taller-create">

    <?php echo $this->render('_form_create', [
        'model' => $model,
    ]) ?>

</div>
