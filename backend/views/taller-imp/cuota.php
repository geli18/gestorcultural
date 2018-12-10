<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="col-md-12 col-xs-12 col-sm-12">

<div class="col-md-12 col-xs-12 col-sm-12">
    <div class= "panel panel-info">
    	<div class="panel-body">
    			<?php echo Html::a('Nueva','nueva',['class'=>'btn btn-succes']) ?>
    	</div>
	</div>
</div>

<?php foreach ($model->cuotaTallerImps as $cuota):?>

<div class="col-md-4 col-xs-12 col-sm-6" >

<div class="panel panel-default">

<div class ="panel-body">
    <?php $form = ActiveForm::begin(['action' => ['taller-imp/update-cuota','id'=>$cuota->id]]); ?>

    <?php echo $form->errorSummary($cuota); ?>

    <?php echo $form->field($cuota, 'id')->hiddenInput()->label(false) ?>

    <?php echo $form->field($cuota, 'id_taller_imp')->hiddenInput()->label(false) ?>

    <?php echo $form->field($cuota, 'id_cuota')->hiddenInput()->label(false) ?>

	<?php echo $form->field($cuota, 'concepto_imp')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($cuota, 'monto')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($cuota, 'fecha_max_pago')->textInput() ?>

    <?php echo $form->field($cuota, 'comentario')->textInput() ?>

    <?php echo $form->field($cuota, 'obligatoria')->textInput() ?>

    
 	<?php echo Html::submitButton($cuota->isNewRecord ? 'Create' : 'Guardar', ['class' => $cuota->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

	 <div id="message">

          		<?= Yii::$app->session->getFlash($cuota->id);?>
          		
      </div>



    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
<?php endforeach;?>


</div>
