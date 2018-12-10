<?php



/* @var $this yii\web\View */
/* @var $model backend\models\PagoTallerCuota */

$this->title = 'Create Pago Taller Cuota';
$this->params['breadcrumbs'][] = ['label' => 'Pago Taller Cuotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pago-taller-cuota-create">

    <?php echo $this->render('_form_inscripcion', [
        'model' => $model,
        'alumnoDataProvider'=>$alumnoDataProvider,
        'alumnoSearchModel'=>$alumnoSearchModel,
        'tallerImpSearchModel'=>$tallerImpSearchModel,
        'tallerImpDataProvider'=>$tallerImpDataProvider
    ]) ?>

</div>
