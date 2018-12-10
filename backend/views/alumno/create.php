<?php



/* @var $this yii\web\View */
/* @var $model backend\models\Alumno */

$this->title = 'Agregar alumno';
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
