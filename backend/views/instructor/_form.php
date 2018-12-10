<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="row">


    <?php $form = ActiveForm::begin(); ?>

<div class="col-md-12">
    <?php echo $form->errorSummary($model); ?>
    </div>

<div class="col-md-12">
  <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Datos del Instructor</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

 <div class="col-md-12">
		<div class="col-md-4">
				<p> Nombre del instructor</p>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'nombre', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-graduation-cap"></span>
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
				<small> Fecha de nacimiento. </small>
			</div>
			<div class="col-md-8">
    					<?php  
                    	echo $form->field($model, 'fecha_nacimiento')->widget(DateControl::classname(), [
                       		    'type'=>DateControl::FORMAT_DATE,
                       		    'ajaxConversion'=>false,
                    	        'value'=>date('dd/MM/yyyy'),
                       		    'widgetOptions' => [
                       		        'pluginOptions' => [
                       		               'autoclose' => true,
                       		            
                       		        ]
                       		    ]
                    	])->label(false);?>
     </div>
     </div>




<div class="col-md-12">
		<div class="col-md-4">
				<small> Ingrese telefono movil. </small>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'telefono', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-mobile"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'TELEFONO',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
     </div>
     </div>

<div class="col-md-12">
		<div class="col-md-4">
				<small> Correo electronico </small>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'correo_electroinico', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-envelope"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'EMAIL',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
     </div>
     </div>

 <div class="col-md-12">
		<div class="col-md-4">
				<small> Ingrese el domicilio completo. </small>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'direccion', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-map-marker"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'DOMICILIO',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
     </div>
     </div>

	 <div class="col-md-12">
		<div class="col-md-4">
				<p> CEDULA PROFESIONAL</p>
			</div>
			<div class="col-md-8">
    <?php echo $form->field($model, 'numero_cedula', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-graduation-cap"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'CEDULA PROFESIONAL',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
    	 </div>
     </div>




	<div class="col-md-12">
		<div class="col-md-4">
				<small>Sexo</small>
			</div>
			<div class="col-md-8">
    <?php
    $var = [ 0 => 'HOMBRE', 1 => 'MUJER'];
    echo $form->field($model, 'sexo', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-venus-mars"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->dropDownList($var,[
        'placeholder' => 'SEXO',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);?>
     </div>
     </div>


     	<div class="col-md-12">
		<div class="col-md-4">
				<small>DISPONIBLE</small>
			</div>
			<div class="col-md-8">
    <?php
    $var = [  1 => 'SI',0 => 'NO'];
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


    <div class="col-md-12">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


	</div>
	</div>
	</div>
	

    <?php ActiveForm::end(); ?>

</div>
