<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="col-md-12">
		<div class="col-md-4">
				<small> Nombre de la categoría</small>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'nombre', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'NOMBRE',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
    	 </div>
     </div>

   <div class="col-md-12">
		<div class="col-md-4">
				<small> Descripción y detalles de la categoría</small>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'nombre', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa  fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textarea([
        'placeholder' => 'DESCRIPCIÓN',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
    	 </div>
     </div>


<div class="col-md-12">
		<div class="col-md-4">
				<small>Disponible</small>
			</div>
			<div class="col-md-8">
    <?php
    $var = [ 1 => 'SI',0 => 'NO'];
    echo $form->field($model, 'disponible', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-check"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->dropDownList($var,[
            'prompt' => '-- Disponible  --',
        'placeholder' => 'disponible',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
     </div>
     </div>
   

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
