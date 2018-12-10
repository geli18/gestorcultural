<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Aula;
use backend\models\Instructor;
use yii\helpers\ArrayHelper;
use backend\models\Categoria;

/* @var $this yii\web\View */
/* @var $model backend\models\Taller */
/* @var $form yii\bootstrap\ActiveForm */

$instructorList = ArrayHelper::map(Instructor::findBySql('select id,  CONCAT(id, \' - \',nombre ) as nombre from tbl_instructor where disponible = 1')->all(), 'id', 'nombre');

$aulaList = ArrayHelper::map(Aula::findBySql('select id,  CONCAT(id, \' - \',nombre ) as nombre from tbl_aula where disponible = 1')->all(), 'id', 'nombre');

$categoriaList = ArrayHelper::map(Categoria::findBySql('select id,  CONCAT(id, \' - \',nombre ) as nombre from tbl_categoria where disponible = 1')->all(), 'id', 'nombre');

?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>

     
	<div class="col-md-12">
    <?php echo $form->errorSummary($model); ?>
    </div>



		<div class="col-md-3 col-sm-12 col-xs-12">
		
		
		   <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Imagen del curso</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
		
        		<?php
                        echo $form->field($model, 'imagen_url')->widget(\trntv\filekit\widget\Upload::classname(), [
                    'url' => [
                        'avatar-upload'
                    ],
                    'maxNumberOfFiles' => 1
                ])->label(false)?>
        	</div>
        	</div>
        	</div>
	

<div class="col-md-9">
  <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Información de taller </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


		<div class="col-md-12">
		<div class="col-md-4">
				<small>Instructor que imapartira el taller.</small>
		</div>
			<div class="col-md-8">
      <?=$form->field($model, 'id_instructor', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa-user-secret"></span>
		          </span>
		              {input}		     		
		          </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($instructorList, ['prompt' => '-- Seleccione una opción  --','id' => 'selectPro','onchange' => '
			                $.get( "' . Yii::$app->urlManager->createUrl('tipo-producto/get-img?id=') . '"+$(this).val(), function( data ) {
			                  $( "#divimg" ).html( data );
			                });
            			'])?>
    
    </div>
			
		</div>
		
		<div class="col-md-12">
			<div class="col-md-4">
				<small>Categoría del curso.</small>
			</div>

			<div class="col-md-7">
      <?=$form->field($model, 'id_categoria', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($categoriaList, ['prompt' => '-- Categoría  --'])?>
    
    </div>

		</div>
		



		<div class="col-md-12">
			<div class="col-md-4">
				<small>Aula donde se impartira el taller.</small>
			</div>

			<div class="col-md-7">
      <?=$form->field($model, 'id_aula', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
    
    </div>

		</div>




		<div class="col-md-12">
		
		<div class="col-md-4">
				<small>Nombre base del taller.</small>
			</div>
			<div class="col-md-8">
    <?php
    
echo $form->field($model, 'nombre', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-cog"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'NOMBRE TALLER',
        'class' => 'form-control input-lg',
        'maxlength' => '16'
    ])
        ->label(false);
    ?>
			
	</div>
			
		</div>


		<div class="col-md-12">
		<div class="col-md-4">
				<small> Agregue una descripción del curso para que se pueda
					identificar de mejor manera. </small>
			</div>
			<div class="col-md-8">
     <?php
    
echo $form->field($model, 'descripcion', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textArea([
        'placeholder' => 'DESCRIPCIÓN Y DETALLES DEL TALLER',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);
    ?>
			
    
	</div>

			

		</div>


		<div class="col-md-12">
		
		<div class="col-md-4">
				<small> Agregue el temario  basico de este taller. </small>
			</div>
		
			<div class="col-md-8">
     <?php
    
echo $form->field($model, 'descripcion_temario', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-file-text"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textArea([
        'placeholder' => 'TEMARIO DEL TALLER',
        'class' => 'form-control input-lg',
        'maxlength' => '200'
    ])
        ->label(false);
    ?>
			
    
	</div>

			

		</div>


		<div class="col-md-12">
		
		<div class="col-md-4">
				<small>Maximo de personas para este taller.</small>
			</div>
		
			<div class="col-md-8">
    <?php
    
echo $form->field($model, 'numero_personas', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-users"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'NUMERO DE PERSONAS',
        'class' => 'form-control input-lg',
        'maxlength' => '16'
    ])
        ->label(false);
    ?>
			
	</div>
			
		</div>



    <div class="col-md-12">
		
		<div class="col-md-4">
				<small>Temario en formato archivo.</small>
			</div>
		
			<div class="col-md-8">

    <?php echo $form->field($model, 'temario_url')->fileInput()->label(false); ?>
		
		</div>
		</div>
    
    
    
	   <div class="col-md-12">
	   <div class="col-md-4">
				<small>¿El taller está disponible?</small>
			</div>
			<div class="col-md-8">
      <?=$form->field($model, 'disponible', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-info"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList([0 => 'No esta disponible',1 => 'Disponible'], ['prompt' => '-- Disponibilidad  --'])?>
    
    </div>
			
		</div>

		<div class="col-md-12">
		
		
			<div class="panel panel-default">
			
			<div class="panel-body">
			<div class="col-md-4">
				<small>Defina en que dias se impartira el taller.</small>
			</div>
			<div class="col-md-8">
				<div class="col-md-3">
					<?php echo $form->field($model, 'lunes')->checkbox(['class'=>'form form-horizontal']); ?>
				</div>
				<div class="col-md-3">
	            	<?php echo $form->field($model, 'martes')->checkbox(['class'=>'form form-horizontal']); ?>
            	</div>
				<div class="col-md-3">
	                <?php echo $form->field($model, 'miercoles')->checkbox(['class'=>'form']); ?>
                </div>
				<div class="col-md-3">
	            	<?php echo $form->field($model, 'jueves')->checkbox(['class'=>'form-vertical']); ?>
            	</div>
				<div class="col-md-3">
	            	<?php echo $form->field($model, 'viernes')->checkbox(['class'=>'form form-horizontal']); ?>
            	</div>

				<div class="col-md-3">
	            	<?php echo $form->field($model, 'sabado')->checkbox(['class'=>'form form-horizontal']); ?>
            	</div>
				<div class="col-md-3">
	            	<?php echo $form->field($model, 'domingo')->checkbox(['class'=>'form form-horizontal']); ?>
            	</div>
            </div>
	
	</div>
			</div>

			
		</div>

   <div class="col-md-12">
	   <div class="col-md-4">
				<small>Numero de meses que durara el taller.</small>
			</div>
			<div class="col-md-8">
<?php 
   echo $form->field($model, 'duracion_mes', [
        'template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-hourglass"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'
    ])
        ->textInput([
        'placeholder' => 'NUMERO MESES',
        'class' => 'form-control input-lg',
        'maxlength' => '16'
    ])
        ->label(false);
   
        ?>
    
    </div>
    
    </div>

    <div class="col-md-12">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    </div>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>

</div>