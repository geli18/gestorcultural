<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\web\View;
use backend\models\Cuota;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model backend\models\PagoTallerCuota */
/* @var $form yii\bootstrap\ActiveForm */

 
$this->title = "Pago cuota de taller";
$this->params['breadcrumbs'][] = ['label' => $modelTaller->nombre, 'url' => ['dashboard','id'=>$modelTaller->id]];
$this->params['breadcrumbs'][] = 'Pagar cuota de taller';

$cuotaList=ArrayHelper::map
(Cuota::findBySql('select id,  CONCAT(id, \' - \',concepto ) as concepto from tbl_cuota where disponible = 1')->all(), 'id', 'concepto');

$cuotaList[0] = 'Seleccionar todas';


$this->registerJs("
    
			/*Pos end function**/
    
    
        $(\"[id^=id_cuota_imp_]\").click(function() {
    
				alert('hola');
        });
    
    
    
    
    
		", View::POS_END, 'noneoptions_drop_functions');



?>

<div class="row">

    <div class="col-md-12">
               <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Información de taller</h3>

              <div class="box-tools pull-right">
              <?php echo Html::a('<i class="fa fa-pencil"></i>', ['update', 'id' => $modelTaller->id], ['class' => 'btn']) ?>
              <?php echo Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $modelTaller->id], [
                    'class' => 'btn',
                    'data' => [
                        'confirm' => 'Si elimina este curso base se perdera todo el historial de los cursos impartidos y por impartir?',
                        'method' => 'post',
                    ],
                ]) ?>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
            <div class="col-md-4">
              <dl>
                <dt>Nombre</dt>
               <dd><?=$modelTaller->nombre;?></dd>
                
                <dt>Descripción</dt>
                <dd><?=$modelTaller->descripcion;?></dd>
               <dt>Duración meses</dt>
               <dd><?=$modelTaller->duracion_mes;?></dd>
               <dt>Duración hora</dt>
               <dd><?=$modelTaller->duracion_hora;?></dd>
              </dl>
             </div> 
              <div class="col-md-4">
            
              <dl>
                <dt>Instructor</dt>
                <dd><?=isset($modelTaller->instructor->nombre)?$modelTaller->instructor->nombre:'?';?></dd>
                <dt>Descripción</dt>
                <dd><?=$modelTaller->descripcion;?></dd>
               <dt>Duración meses</dt>
               <dd><?=$modelTaller->duracion_mes;?></dd>
               <dt>Duración hora</dt>
               <dd><?=$modelTaller->duracion_hora;?></dd>
              </dl>
             </div> 
              <div class="col-md-4">
              <dl>
                <dt>Dias preferentes para impartir</dt>
                 <?php if ($modelTaller->lunes):?>
                <dd>Lunes</dd>
                <?php endif;?>
                <?php if ($modelTaller->martes):?>
                <dd>Martes</dd>
                <?php endif;?>
                <?php if ($modelTaller->miercoles):?>
                <dd>Miercoles</dd>
                <?php endif;?>
                <?php if ($modelTaller->jueves):?>
                <dd>Jueves</dd>
                <?php endif;?>
                <?php if ($modelTaller->viernes):?>
                <dd>Viernes</dd>
                <?php endif;?>
                <?php if ($modelTaller->sabado):?>
                <dd>Sabado</dd>
                <?php endif;?>
                <?php if ($modelTaller->domingo):?>
                <dd>Domingo</dd>
                <?php endif;?>
                
                <dt>Descripción</dt>
                <dd><?=$modelTaller->descripcion;?></dd>
               <dt>Duración meses</dt>
               <dd><?=$modelTaller->duracion_mes;?></dd>
               <dt>Duración hora</dt>
               <dd><?=$modelTaller->duracion_hora;?></dd>
              </dl>
             </div> 
            </div>
            <div class="box-footer no-padding">
            	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


	<div class="col-md-12 col-xs-12 col-sm-12">
	
	  <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Pagar nueva cuota</h3>

              <div class="box-tools pull-right">
              
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	<div class="row">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php echo $form->errorSummary($model); ?>
    <div class="col-md-6 col-xs-12 col-sm-12">
    <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">

			<div class="panel panel-info">

				<div class="panel-heading">Datos del alumno</div>

				<div class="panel-body">
    			 <?php echo $form->field($model, 'id_alumno')->hiddenInput(['id'=>'selectedAlumno'])->label(false); ?>
    			  <?php echo $form->field($model, 'id_taller_imp')->hiddenInput(['id'=>'selectedTaller'])->label(false); ?>
    			 
    			    <dl class="dl-horizontal">
						<dt><?= 'Id' ?></dt>
						<dd>
							
							<?php echo $form->field($model, 'id_alumno')->textInput(['maxlength' => true,'readonly'=>'readonly','id'=>'alumno_id'])->label(false); ?>
						</dd>

						<dt><?= 'Nombre' ?></dt>
						<dd>
							<label id="alumno_nombre"> <?= isset($model->alumno->nombre)?$model->alumno->nombre:'?' ?></label>
						</dd>

						<dt><?= 'CURP' ?></dt>
						<dd>
							<label id="alumno_curp"> <?= isset($model->alumno->curp)?$model->alumno->curp:'?' ?></label>
						</dd>

						<dt><?= 'Edad' ?></dt>
						<dd>
							<label id="alumno_fecha_nacimiento"> <?= isset($model->alumno->fecha_nacimiento)?$model->alumno->fecha_nacimiento:'?' ?></label>
						</dd>

					</dl>



				</div>

				<div class="panel-footer">
    			
    			<?=	
    			Html::button('Seleccionar alumno', ['type'=>'button','data-target'=>'#modal-default' , 'data-toggle'=>'modal' , 'title'=>'Nueva cuota', 'class'=>'btn btn-primary', ]); 
        			?>
 	
    			
    		</div>
			</div>


		</div>

		<div class="col-md-12 col-xs-12 col-sm-12">
		
		<div class="panel panel-info">
            
            				<div class="panel-heading">Cuota que desea pagar</div>
            
            				<div class="panel-body">
               
                        
                            <?= $form->field($model, 'id_cuota',['template' => 
                        		     		'<div class="form-group">
                        		       		 <div class="input-group">
                        		          <span class="input-group-addon" >
                        		             <span class="fa fa-cube"></span>
                        		          </span>
                        		          {input}
                        		     		
                        		       </div>
                        		     			
                        		      <div> {error}{hint}</div>
                           				</div>'])->dropDownList($cuotaList,
                           						['prompt'=>'-- TIPO DE CUOTA A PAGAR  --',
                           						'id' => 'selectPro',
                           						'onchange'=>'
                        			                $.get( "'.Yii::$app->urlManager->createUrl('taller-imp/get-cuotas?id=').'"+$("#selectedTaller").val()+"&id_cuota="+$(this).val()+"&id_alumno="+$("#selectedAlumno").val(), function( data ) {
                        			                  

                                                            $( "#div_cuotas" ).html( data );
                                                            
                                                             if(data==null){
                                                                          $("#div_cuotas").empty();    
                                                                     }else{
                                                                          var obj = eval(data);
                                                                          var cuotaTable = "<table class=\"table table-hover table-bordered\">"; 
                                                                          $("#div_cuotas").empty();
                                                                          
                                                                          cuotaTable +="<thead>";
                                                                          cuotaTable +="<th></th><th>Concepto</th><th>$ monto</th><th>Fecha max pago</th><th>Obligatoría</th>";
                                                                          cuotaTable +="</thead><tbody>";
                                                                            
                                                                           $.each(obj, function(key, value) {
                                                                                
                                                                            var tableClass = (value[\'estatus\'] == "1")? "success":(value[\'obligatoria\'] == "1")?"warning":"";
                                                                            var obligatoria = (value[\'obligatoria\'] == "1")? "Obligatoria":"Opcional";
                                                                           var thumbsStatus = (value[\'estatus\'] == "1")? "fa fa-thumbs-o-up":(value[\'obligatoria\'] == "1")?"fa fa-clock-o":"";
                                                            
                                                                            cuotaTable +="<tr class=\""+tableClass+"\">";
                                                                             cuotaTable += "<td><i class=\""+thumbsStatus+"\"></i></td>";
                                                                             cuotaTable += "<td><div class=\"form-check\"><label class=\"form-check-label\">";
                                                                            cuotaTable +="<input id= \""+"id_cuota_imp_"+value[\'id\']+"\" class=\"form-check-input\" type=\"radio\" name=\"PagoTallerCuota[id_cuota_taller_imp]\"  value=\""+value[\'id\']+"\" onclick=\"$(\'#cuota_monto\').val(\'"+value[\'monto\']+"\'); $(\'#cuota_concepto\').val(\'"+value[\'concepto_imp\']+"\'); \" />  ";
                                                                            cuotaTable +=value[\'concepto_imp\']+"</label></div></td><td>"+value[\'monto\']+"</td><td>"+value[\'fecha_max_pago\']+"</td><td>"+obligatoria+"</td></tr>";

                                                                          });

                                                                            cuotaTable +="</tbody></table>";
                                                                          $("#div_cuotas").append(cuotaTable);              

                                                                    
                                                                                
                                                                     }


                        			                });
                                    			',
                           						
                              ]) ?>
                  
                  
                    <div class="col-md-12 col-xs-12 col-sm-12" id="div_cuotas">
             	  	</div>
                  
             	 </div>
             	 </div>
			</div>
	</div>
    </div>
	<div class="col-md-6 col-xs-12 col-sm-12">
	
	<div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
            
            			
             	 
             	 <div class="panel panel-default">
             	 <div class="panel-heading"> <h4>Información del pago</h4></div>
             	 <div class="panel-body">
             	
             	 	 <?php echo $form->field($model, 'monto')->textInput(['maxlength' => true,'id'=>'cuota_monto']) ?>

                    <?php echo $form->field($model, 'concepto')->textInput(['maxlength' => true,'id'=>'cuota_concepto']) ?>
                
                    	<?php  
                    	echo $form->field($model, 'fecha_pago')->widget(DateControl::classname(), [
                       		    'type'=>DateControl::FORMAT_DATE,
                       		    'ajaxConversion'=>false,
                    	        'value'=>date('dd/MM/yyyy'),
                       		    'widgetOptions' => [
                       		        'pluginOptions' => [
                       		               'autoclose' => true,
                       		            
                       		        ]
                       		    ]
                       		]);?>
                    
                     <?= $form->field($model, 'metodo_pago',['template' => 
                        		     		'<div class="form-group">
                        		       		 <div class="input-group">
                        		          <span class="input-group-addon" >
                        		             <span class="fa fa-cube"></span>
                        		          </span>
                                          {label}
                        		          {input}
                        		     		
                        		       </div>
                        		     			
                        		      <div> {error}{hint}</div>
                           				</div>'])->dropDownList([1=>'Efectivo', 2=>'Tarjeta de credito',3=>'Comprobante bancario'],
                           						[
                           						'id' => 'selectTipoPago',]) ?>
                
                    <?php echo $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>
             	 </div>
             	 <div class="panel-footer">
             	 	 <?php echo Html::submitButton( 'Pagar cuota', [ 'class'=>'btn btn-success' ]) ?>
             	 </div>
             	 </div>
             	 
             	 </div>
             	 
             	
     	 
   </div>  	 
</div>


   

    <?php ActiveForm::end(); ?>
</div>
</div>

</div>
</div>


</div>


	<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Seleccionr alumno</h4>
              </div>
              <div class="modal-body">
              
              
        <div class="table-responsive">	
             <?php \yii\widgets\Pjax::begin(['timeout'=>8000,'id'=>'alumno-modal']); ?>
                                                
        	                                        <div class="modal-body">
        	                                        
        	                                        
        	                                           <?php
                                                    
        echo GridView::widget([
                                                        'dataProvider' => $alumnoDataProvider,
                                                        'filterModel' => $alumnoSearchModel,
                                                        'columns' => [
                                                            [
                                                                'class' => 'yii\grid\SerialColumn'
                                                            ],
                                                            
                                                            'id',
                                                            // 'numero_registro',
                                                            'nombre',
                                                            'fecha_nacimiento',                                                    
                                                            'sexo',
                                                            'curp',
                                                            [
                                                                'class' => 'yii\grid\ActionColumn',
                                                                'template' => '{select}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
                                                                'buttons' => [
                                                                    'select' => function ($url, $data, $id) { // Boton actualizar
                                                                        return Html::a('<span class="fa fa-check-circle  fa-2x"></span>', '#', [
                                                                            'title' => 'Seleccionar',
                                                                            'class' => 'btn btn-primary',
                                                                            'data-loading-text' => "Loading...",
                                                                            'id' => 'alumno_' . $data->id,
                                                                            'name' => 'seleccionarAlumno',
                                                                            'value' => $data->id,
                                                                            'onclick' => "
                                                        
        												$('#alumno_$data->id').fadeIn(300);												
        												$('#alumno_$data->id').removeClass('btn btn-primary').addClass('btn btn-success');
                                                        $('.modal.in').modal('hide');
                                                        $('#selectedAlumno').val($data->id);
                                                        $('#alumno_id').val('$data->id');
                                                        $('#alumno_nombre').html('$data->nombre');                        
                                                        $('#alumno_curp').html('$data->curp');
                                                            dob = new Date('$data->fecha_nacimiento');
                                                            var today = new Date();
                                                            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                                                        $('#alumno_fecha_nacimiento').html(age+' años');
        
        											    return true;
        									  "
                                                                        ]);
                                                                    }
                                                                
                                                                ]
                                                            ]
                                                        
                                                        ]
                                                    ]);
                                                    ?>
        												
        												
        										    </div>
        										    <?php \yii\widgets\Pjax::end(); ?>
        										    
        										    </div>
        
                      
                      </div>
             </div>
             </div>
    </div> 
