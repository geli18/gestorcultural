<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\web\View;
use backend\models\Cuota;

/* @var $this yii\web\View */
/* @var $model backend\models\PagoTallerCuota */
/* @var $form yii\bootstrap\ActiveForm */


$cuotaList=ArrayHelper::map
(Cuota::findBySql('select id,  CONCAT(id, \' - \',concepto ) as concepto from tbl_cuota where id = 1 and disponible = 1')->all(), 'id', 'concepto');



$this->registerJs("
    
		
    

    
    
    
    
		", View::POS_READY);



?>

<div class="row">


	<div class="col-md-12 col-xs-12 col-sm-12">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php echo $form->errorSummary($model); ?>
    
    <div class="col-md-6 col-xs-12 col-sm-12">

			<div class="panel panel-info">

				<div class="panel-heading">Datos del alumno</div>

				<div class="panel-body">
    			 <?php echo $form->field($model, 'id_alumno')->hiddenInput(['id'=>'selectedAlumno',
                   
    			     
    			 ])->label(false); ?>
    			 
    			    <dl class="dl-horizontal">
						<dt><?= 'Id' ?></dt>
						<dd>
							
							<?php echo $form->field($model, 'id_alumno')->textInput(['maxlength' => true,'readonly'=>'readonly','id'=>'alumno_id',
							    'onchange'=>'alert("hola");'
							    
							])->label(false); ?>
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
    			
    			
    			<?php
    Modal::begin([
        'header' => '<h2>Seleccionar alumno</h2>',
        'toggleButton' => [
            'label' => 'Agregar'
        ]
    ]);
    
    echo 'Seleccionar alumno';
    ?>

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
                                                    'fecha_alta',
                                                    'sexo',
                                                    // 'direccion',
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
                                                
                                                

											   
									  " . '  $.get( "'.Yii::$app->urlManager->createUrl('taller-imp/get-cuotas?id=').'"+$("#selectedTaller").val()+"&id_cuota="+1+"&id_alumno="+$("#selectedAlumno").val(), function( data ) {
                        			                  

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
                                                                            cuotaTable +="<input id= \""+"id_cuota_imp_"+value[\'id\']+"\" class=\"form-check-input\" type=\"radio\" name=\"cuota\"  value=\""+value[\'id\']+"\" onclick=\"$(\'#cuota_monto\').val(\'"+value[\'monto\']+"\'); $(\'#cuota_concepto\').val(\'"+value[\'concepto_imp\']+"\'); \" />  ";
                                                                            cuotaTable +=value[\'concepto_imp\']+"</label></div></td><td>"+value[\'monto\']+"</td><td>"+value[\'fecha_max_pago\']+"</td><td>"+obligatoria+"</td></tr>";

                                                                          });

                                                                            cuotaTable +="</tbody></table>";
                                                                          $("#div_cuotas").append(cuotaTable);              

                                                                    
                                                                                
                                                                     }


                        			                }); return true'
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


<?php
Modal::end();

?>
    	
    			
    		</div>
			</div>


		</div>


		<div class="col-md-6 col-xs-12 col-sm-12">

			<div class="panel panel-info">

				<div class="panel-heading">Datos del taller</div>

				<div class="panel-body">
    			 <?php echo $form->field($model, 'id_taller_imp')->hiddenInput(['id'=>'selectedTaller',
    			     
    			 ])->label(false); ?>
    			 
    			    <dl class="dl-horizontal">
						<dt><?= 'Id' ?></dt>
						<dd>
							<label id="taller_id"> <?= $model->id_taller_imp ?></label>
						</dd>

						<dt><?= 'Nombre' ?></dt>
						<dd>
							<label id="taller_nombre"> <?= isset($model->tallerImp->nombre)?$model->tallerImp->nombre:'?' ?></label>
						</dd>

						<dt><?= 'Fecha inicio' ?></dt>
						<dd>
							<label id="taller_fecha_inicio"> <?= isset($model->tallerImp->fecha_inicio)?$model->tallerImp->fecha_inicio:'?' ?></label>
						</dd>

						<dt><?= 'Fecha fin' ?></dt>
						<dd>
							<label id="taller_fecha_fin"> <?= isset($model->tallerImp->fecha_fin)?$model->tallerImp->fecha_fin:'?' ?></label>
						</dd>

						<dt><?= 'Instructor' ?></dt>
						<dd>
							<label id="taller_instructor"> <?= isset($model->tallerImp->instructor)?$model->tallerImp->instructor->nombre:'?' ?></label>
						</dd>


					</dl>



				</div>

				<div class="panel-footer">
    			
    			
    			<?php
    Modal::begin([
        'header' => '<h2>Seleccionar alumno</h2>',
        'toggleButton' => [
            'label' => 'Agregar'
        ]
    ]);
    
    echo 'Seleccionar taller';
    ?>

<div class="table-responsive">	
     <?php \yii\widgets\Pjax::begin(['timeout'=>8000,'id'=>'taller-modal']); ?>
                                        
	                                        <div class="modal-body">
	                                        
	                                        
	    <?php
    
echo GridView::widget([
        'dataProvider' => $tallerImpDataProvider,
        'filterModel' => $tallerImpSearchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn'
            ],
            
            'id',
            // 'numero_registro',
            'nombre',
            'fecha_inicio',
            'fecha_fin',
            [
                'attribute' => 'id_instructor',
                'content' => function ($data) {
                    return ($data->instructor) ? $data->instructor->nombre : '';
                }
            
            ],
            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{select}', // Template de los botones. Aqui se indica que botones apareceran y el orden en el que apareceran
                'buttons' => [
                    'select' => function ($url, $data, $id) { // Boton actualizar
                        
                        $instructor = isset($data->instructor) ? $data->instructor->nombre : '?';
                        
                        return Html::a('<span class="fa fa-check-circle  fa-2x"></span>', '#', [
                            'title' => 'Seleccionar',
                            'class' => 'btn btn-primary',
                            'data-loading-text' => "Loading...",
                            'id' => 'alumno_' . $data->id,
                            'name' => 'SeleccionarInstructor',
                            'value' => $data->id,
                            'onclick' => "
												$('#taller_$data->id').fadeIn(300);												
												$('#taller_$data->id').removeClass('btn btn-primary').addClass('btn btn-success');
                                                $('.modal.in').modal('hide');
                                                $('#selectedTaller').val($data->id);
                                                $('#taller_id').html('$data->id');
                                                $('#taller_nombre').html('$data->nombre');                        
                                                $('#taller_fecha_inicio').html('$data->fecha_inicio');
                                                $('#taller_fecha_fin').html('$data->fecha_fin');
                                                $('#taller_instructor').html('$instructor');
                                           " . '  $.get( "'.Yii::$app->urlManager->createUrl('taller-imp/get-cuotas?id=').'"+$("#selectedTaller").val()+"&id_cuota="+1+"&id_alumno="+$("#selectedAlumno").val(), function( data ) {
                            
                            
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
                                                                            cuotaTable +="<input id= \""+"id_cuota_imp_"+value[\'id\']+"\" class=\"form-check-input\" type=\"radio\" name=\"cuota\"  value=\""+value[\'id\']+"\" onclick=\"$(\'#cuota_monto\').val(\'"+value[\'monto\']+"\'); $(\'#cuota_concepto\').val(\'"+value[\'concepto_imp\']+"\'); \" />  ";
                                                                            cuotaTable +=value[\'concepto_imp\']+"</label></div></td><td>"+value[\'monto\']+"</td><td>"+value[\'fecha_max_pago\']+"</td><td>"+obligatoria+"</td></tr>";
                            
                                                                          });
                            
                                                                            cuotaTable +="</tbody></table>";
                                                                          $("#div_cuotas").append(cuotaTable);
                            
                            
                            
                                                                     }
                            
                            
                        			                }); return true'
                            
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


<?php
Modal::end();

?>
    	
    			
    		</div>
			</div>


		</div>
    

   <div class="col-md-12 col-xs-12 col-sm-12">

            <div class="col-md-6 col-xs-12 col-sm-12">
            
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
                           						['readonly'=>'true',
                           						'id' => 'selectPro',
                           						
                           						
                              ]) ?>
                  
             	 </div>
             	 </div>
             	 </div>
             	 
             	  <div class="col-md-6 col-xs-12 col-sm-12" id="div_cuotas">
             	  
             	  </div>
     	 
   </div>  	 
      

    <?php echo $form->field($model, 'monto')->textInput(['maxlength' => true,'id'=>'cuota_monto']) ?>

   

    <?php echo $form->field($model, 'concepto')->textInput(['maxlength' => true,'id'=>'cuota_concepto']) ?>

    <?php echo $form->field($model, 'fecha_pago')->textInput(['id'=>'cuota_fecha_pago']) ?>

    <?php echo $form->field($model, 'metodo_pago')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


</div>