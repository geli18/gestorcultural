<?php

use backend\models\Aula;
use backend\models\Categoria;
use backend\models\Instructor;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$instructorList = ArrayHelper::map(Instructor::findBySql('select id,  CONCAT(id, \' - \',nombre ) as nombre from tbl_instructor where disponible = 1')->all(), 'id', 'nombre');

$aulaList = ArrayHelper::map(Aula::findBySql('select id,  CONCAT(id, \' - \',nombre ) as nombre from tbl_aula where disponible = 1')->all(), 'id', 'nombre');

$categoriaList = ArrayHelper::map(Categoria::findBySql('select id,  CONCAT(id, \' - \',nombre ) as nombre from tbl_categoria where disponible = 1')->all(), 'id', 'nombre');



$this->title = 'Implementar taller base. [' . $model->id_curso_base . '] ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['dashboard',  'id'=>$model->id_curso_base]];
$this->params['breadcrumbs'][] = 'Implementar taller base';

Yii::$app->formatter->locale = 'es-MX';
?>



<div class="row">

<div class="col-md-12">

<div class="box box-primary with-border">
            <div class="box-header with-border">
            	<i class="fa fa-list"></i>
              <h3 class="box-title">Datos del taller</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_curso_base')->hiddenInput()->label(false) ?>

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
        'maxlength' => '50'
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
				<small>Duración del taller</small>
		</div>
			<div class="col-md-8">
			<div class="row">
    		<div class="col-md-6">
                <?php  
               		echo $form->field($model, 'fecha_inicio')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_DATE,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		]);?>
               
            </div>
            <div class="col-md-6">    
            	<?php  
               		echo $form->field($model, 'fecha_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_DATE,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		]);?>
              </div>
			</div>

	</div>
	</div>
	
    
    <div class="col-md-12">
		
		<div class="col-md-4">
				<small>Numero maximo de personas</small>
			</div>
			<div class="col-md-8">
    <?php
    
echo $form->field($model, 'numero_max_personas', [
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
				<small>Disponibilidad</small>
		</div>
			<div class="col-md-8">
      <?=$form->field($model, 'disponible', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-cog"></span>
		          </span>
		              {input}		     		
		          </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList([0=>'NO', 1=>'SI'], ['prompt' => '-- Seleccione una opción  --','id' => 'selectPro','onchange' => '
			                $.get( "' . Yii::$app->urlManager->createUrl('tipo-producto/get-img?id=') . '"+$(this).val(), function( data ) {
			                  $( "#divimg" ).html( data );
			                });
            			'])?>
    
    </div>
			
		</div>
    
    
	<div class="col-md-12">
		<div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-clock-o"></i>
              <h3 class="box-title">Horarios definidos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    		
    		<div class="col-md-4">
    		<div class="panel panel-default">
    		<div class="panel-heading">Lunes</div>
    		<div class="panel-body">
    		<label>Aula</label>
    			<?=$form->field($model, 'id_aula_lunes', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
    			
    			<?php  
               		echo $form->field($model, 'lunes')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Inicio");?>
    			
    			
    			<?php  
               		echo $form->field($model, 'lunes_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Fin");?>
    			
    		</div>
    		</div>
    		</div>
    		<div class="col-md-4">
    		<div class="panel panel-default">
    		<div class="panel-heading">Martes</div>
    		<div class="panel-body">
    		<label>Aula</label>
    			<?=$form->field($model, 'id_aula_martes', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
   				
   				<?php  
               		echo $form->field($model, 'martes')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Inicio");?>
    			
    			
    			<?php  
               		echo $form->field($model, 'martes_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Fin");?>
    			
    		</div>
    		</div>
    		</div>
    		<div class="col-md-4">
    		<div class="panel panel-default">
    		<div class="panel-heading">Miercoles</div>
    		<div class="panel-body">
    			<label>Aula</label>
    			<?=$form->field($model, 'id_aula_miercoles', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
                    
		          {input}
                    
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
    			
    			<?php  
               		echo $form->field($model, 'miercoles')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Inicio");?>
    			
    			
    			<?php  
               		echo $form->field($model, 'miercoles_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Fin");?>
    			
    		</div>
    		</div>
    		</div>
    		<div class="col-md-4">
    		<div class="panel panel-default">
    		<div class="panel-heading">Jueves</div>
    		<div class="panel-body">
    		<label>Aula</label>
    			<?=$form->field($model, 'id_aula_jueves', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
    			
    			<?php  
               		echo $form->field($model, 'jueves')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Inicio");?>
    			
    			
    			<?php  
               		echo $form->field($model, 'jueves_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Fin");?>
    			
    		</div>
    		</div>
    		</div>
    		<div class="col-md-4">
    		<div class="panel panel-default">
    		<div class="panel-heading">Viernes</div>
    		<div class="panel-body">
    		<label>Aula</label>
    			<?=$form->field($model, 'id_aula_viernes', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
    			
    			<?php  
               		echo $form->field($model, 'viernes')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Inicio");?>
    			
    			
    			<?php  
               		echo $form->field($model, 'viernes_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Fin");?>
    			
    		</div>
    		</div>
    		</div>
    		<div class="col-md-4">
    		<div class="panel panel-default">
    		<div class="panel-heading">Sabado</div>
    		<div class="panel-body">
    		<label>Aula</label>
    			<?=$form->field($model, 'id_aula_sabado', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
    			
    			<?php  
               		echo $form->field($model, 'sabado')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Inicio");?>
    			
    			
    			<?php  
               		echo $form->field($model, 'sabado_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Fin");?>
    			
    		</div>
    		</div>
    		</div>
    		<div class="col-md-4">
    		<div class="panel panel-default">
    		<div class="panel-heading">Domingo</div>
    		<div class="panel-body">
    		<label>Aula</label>
    			<?=$form->field($model, 'id_aula_domingo', ['template' => '<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-building-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($aulaList, ['prompt' => '-- Aula/salon  --'])?>
    			
    			<?php  
               		echo $form->field($model, 'domingo')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Inicio");?>
    			
    			
    			<?php  
               		echo $form->field($model, 'domingo_fin')->widget(DateControl::classname(), [
               		    'type'=>DateControl::FORMAT_TIME,
               		    'ajaxConversion'=>false,
               		    'widgetOptions' => [
               		        'pluginOptions' => [
               		            'autoclose' => true
               		        ]
               		    ]
               		])->label("Fin");?>
    			
    		</div>
    		</div>
    		</div>
    
   </div>
   </div>
   </div>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>