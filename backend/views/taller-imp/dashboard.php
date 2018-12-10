<?php
 
use backend\models\Cuota;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\CuotaTallerImp;

/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = "Implementación de Taller:  "  .  $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Talleres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


Yii::$app->formatter->locale = 'es-MX';


$cuotasDB = Cuota::findBySql('select id,  CONCAT(id, \' - \',concepto ) as concepto from tbl_cuota where disponible = 1')->all();

$cuotaList=ArrayHelper::map
($cuotasDB, 'id', 'concepto');

$cuotaList2=$cuotaList;

$cuotaList2[0] = 'Seleccionar todas';


?>

<div class="row">



   <div >
   	<?php 
   	
   	    $cuotaDBTest = Cuota::find()->all();
   	
   	    foreach ($cuotaDBTest as $itemCuota){
            
            echo Html::input('hidden','cuota_monto'.$itemCuota->id, $itemCuota->monto, ['id'=>'cuota_monto'.$itemCuota->id]);
            echo Html::input('hidden','cuota_concepto'.$itemCuota->id, $itemCuota->concepto, ['id'=>'cuota_concepto'.$itemCuota->id]);
            
        }   	    
   	?>
   		
   		
   	
   </div>

          
          <div class="col-md-12">
               <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Información de taller</h3>

              <div class="box-tools pull-right">
              <?php echo Html::a('<i class="fa fa-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn']) ?>
              <?php echo Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
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
          
              <div class="col-md-3">
				
              <dl>
              
               <dt>ID </dt>
               <dd><?=$model->id;?></dd>
              
                <dt>Nombre del taller </dt>
               <dd><?=$model->nombre;?></dd>
                
                <dt>Descripción</dt>
                <dd><?=$model->descripcion;?></dd>
               <dt><i class="fa fa-black-tie"></i> Instructor</dt>
              
                <dd><?=isset($model->instructor->nombre)?$model->instructor->nombre:'?';?></dd>
               <dt><i class="fa fa-sitemap"></i> Categoría</dt>
                <dd><?=isset($model->cursoBase->categoria->nombre)?$model->cursoBase->categoria->nombre:'?';?></dd>
              </dl>
             </div> 
              <div class="col-md-3">
            
              <dl>
               <dt>Aula preferente</dt>
               <dd><?=isset($model->cursoBase->aula->nombre) ?$model->cursoBase->aula->nombre:'?';?></dd>
                <dt>Maximo de personas</dt>
                 <dd><?=$model->numero_max_personas;?></dd>
              
               <dt>Duración meses</dt>
               <dd><?=$model->duracion_mes;?></dd>
               <dt>Duración hora</dt>
               <dd><?=$model->duracion_hora;?></dd>
               
              </dl>
             </div> 
              <div class="col-md-3">
              <dl>
                <dt>Dias preferentes para impartir</dt>
                 <?php if ($model->lunes):?>
                <dd>Lunes</dd>
                <?php endif;?>
                <?php if ($model->martes):?>
                <dd>Martes</dd>
                <?php endif;?>
                <?php if ($model->miercoles):?>
                <dd>Miercoles</dd>
                <?php endif;?>
                <?php if ($model->jueves):?>
                <dd>Jueves</dd>
                <?php endif;?>
                <?php if ($model->viernes):?>
                <dd>Viernes</dd>
                <?php endif;?>
                <?php if ($model->sabado):?>
                <dd>Sabado</dd>
                <?php endif;?>
                <?php if ($model->domingo):?>
                <dd>Domingo</dd>
                <?php endif;?>
                
                <dt>Disponible</dt>
               <dd><?= ($model->disponible)?'Si':'No';?></dd>
               
               
               
              </dl>
             </div> 
             </div> 
            </div>
            <div class="box-footer no-padding">
            	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <div class="col-md-12">
               <div class="box box-success with-border">
            <div class="box-header with-border">
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Cuotas del taller</h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             	    <?php   
             	    
             	    
             	    $gridCuotaColumns = [   ['class' => 'yii\grid\SerialColumn'],
             	        
             	        //'id',
             	        'concepto_imp',
             	        [
             	            'attribute'=>'id_cuota',
             	            'header'=>'Tipo cuota',
             	            'content'=>function($data){
             	            return  $data->idCuota->concepto;
             	            },
             	            'filter'=>ArrayHelper::map(Cuota::findAll([ 'disponible'=>1]), 'id','concepto'),
             	            ],
             	            
             	            
             	            [
             	                'attribute'=>'monto',
             	                'header'=>'Monto',
             	                'content'=>function($data){
             	                
             	                return  Yii::$app->formatter->asCurrency($data->monto);
             	                },
             	                
             	                ],
             	                
             	               
             	                [
             	                    'attribute'=>'fecha_max_pago',
             	                    'header'=>'Fecha limite',
             	                    'content'=>function($data){
             	                    
             	                    return  Yii::$app->formatter->asDate($data->fecha_max_pago,'dd/MMM/Y');
             	                    },
             	                    
             	                    ],
             	                [
             	                    'attribute'=>'obligatoria',
             	                    
             	                    'content'=>function($data){
             	                    
             	                    return  ($data->obligatoria)?'SI':'Opcional';
             	                    
             	                    },
             	                    'filter'=>[0=>'Opcional',1=>'Si'],
             	                 ],
             	                    
             	                    ['class' => 'yii\grid\ActionColumn',
             	                        'template' => '{delete}',
             	                        'buttons' => [
             	                            
             	                            'delete' => function ($url, $model, $key) {
             	                            //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
                         	                    return Html::a('', ['delete-cuota', 'id'=>$model->id, 'id_taller_imp'=>$model->id_taller_imp], [
                         	                    'class' => 'fa fa-trash',
                         	                    'data' => [
                         	                    'confirm' => "Esta seguro de borrar esta cuota?",                         	                    
                         	                    ],
                         	                    ]);
             	                            }
             	                            ]
             	                            
             	                            
             	                            ],];
             	    
             	    
             	    echo GridView::widget([
             	        'dataProvider' => $dataCuotaProvider,
             	        'filterModel' => $searchCuotaModel,
             	        'columns' => $gridCuotaColumns,
             	        'resizableColumns'=>true,
             	        
             	        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
             	        
             	        'toolbar' =>  [
             	            ['content'=>
             	                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button','data-target'=>'#modal-default' , 'data-toggle'=>'modal' , 'title'=>'Nueva cuota', 'class'=>'btn btn-success', ]) . ' '.
             	                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
             	            ],
             	            '{export}',
             	            '{toggleData}'
             	        ],
             	        'pjax' => true,
             	        'bordered' => true,
             	        'striped' => true,
             	        'condensed' => true,
             	        'responsive' => true,
             	        'hover' => true,
             	        'floatHeader' => true,
             	        'floatHeaderOptions' => ['scrollingTop' => false],
             	        'panel' => [
             	            'type' => GridView::TYPE_PRIMARY
             	        ],
             	    ]);
             	    
             	    
             	   ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        <div class="col-md-12">
               <div class="box box-success with-border">
            <div class="box-header with-border">
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Relación de pagos</h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                             	   <?php 
                
                $gridColumns = [
                    ['class' => 'kartik\grid\SerialColumn'],
                    
                    [
                        'attribute'=>'id_alumno',
                        'value'=>function ($data, $key, $index, $widget) {
                        return "".$data->alumno->nombre;
                        },
                        'vAlign'=>'middle',
                        'format'=>'raw',
                        'header'=>'Alumno',
                        'group'=>true,
                    ],
                        
                        
                    [
                       
                        'attribute' => 'id',
                        'vAlign'=>'middle',
                        'header'=>'Referencia pago',
                        
                        
                    ],
                    
                    [
                        
                        'attribute' => 'concepto',
                        'vAlign'=>'middle',
                        
                        
                    ],
                    [
                        'attribute'=>'fecha_pago',
                       
                        'content'=>function($data){
                        
                        return  Yii::$app->formatter->asDate($data->fecha_pago,'dd/MMM/Y');
                        },
                        
                        ],
                        [
                            'attribute'=>'monto',
                            'content'=>function($data){
                            
                            return  Yii::$app->formatter->asCurrency($data->monto);
                            },
                            
                            ],
                    
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{print}',
                                'buttons' => [
                                    
                                    'print' => function ($url, $model, $key) {
                                    //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
                            return Html::a('', ['confirma-pago', 'id'=>$model->id_taller_imp, 'id_pago'=> $model->id], [
                            'class' => 'fa fa-print fa-2x',
                            'target' =>'_blank',
                            'data-pjax'=>0
                            ]);
                                    },]]
                            
                            
                            ];
                
                
                
                
                echo GridView::widget([
                    'dataProvider' => $pagoDataProvider,
                    'filterModel' => $pagoSearchModel,
                    'columns' => $gridColumns,
                    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
                
                    'toolbar' =>  [
                        ['content'=>
                            Html::a('<i class="glyphicon glyphicon-plus"></i>',['pago','id'=>$model->id], ['type'=>'button', 'title'=> 'Nuevo pago', 'class'=>'btn btn-success', ]) . ' '.
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
                        ],
                        '{export}',
                        '{toggleData}'
                    ],
                    'pjax' => true,
                    'bordered' => true,
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'hover' => true,
                    'floatHeader' => true,
                    'floatHeaderOptions' => ['scrollingTop' => false],
                    
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY
                    ],
                ]);
                
                
                ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
         <div class="col-md-12">
               <div class="box box-success with-border">
            <div class="box-header with-border">
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Relación de alumnos inscritos</h3>

              <div class="box-tools pull-right">
              	
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php 
          $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
       
        'attribute' => 'id',
        'vAlign'=>'middle',
        'header'=>'Folio de inscripción',
        
        
    ],
              [
                  'attribute'=>'fecha_inscripcion',
                  
                  'content'=>function($data){
                  
                  return  Yii::$app->formatter->asDate($data->fecha_inscripcion,'dd/MMM/Y');
                  },
                  
                  ],
    [
        
        'attribute' => 'id_pago',
        'vAlign'=>'middle',
       
        
        
    ],
    [
        'attribute'=>'id_alumno',
        'value'=>function ($data, $key, $index, $widget) {
        return "".$data->alumno->nombre;
        },
        'vAlign'=>'middle',
        'format'=>'raw',
        'header'=>'Alumno',
        ],
        [
            'attribute'=>'id_alumno',
            'value'=>function ($data, $key, $index, $widget) {
            return "".$data->alumno->direccion;
            },
            'vAlign'=>'middle',
            'header'=>'Dirección',
            ],
            [
                'attribute'=>'id_alumno',
                'value'=>function ($data, $key, $index, $widget) {
                return "".($data->alumno->sexo)?'Hombre':'Mujer';
                },
                'vAlign'=>'middle',
                'header'=>'Sexo',
                ],
                
                [
                    'attribute'=>'id_alumno',
                    'value'=>function ($data, $key, $index, $widget) {
                    return "".($data->alumno->tel_emergencia);
                    },
                    'vAlign'=>'middle',
                    'header'=>'Telefono emergencía',
                    ],
                    
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{print} {reporte}',
                        'buttons' => [
                            
                            'print' => function ($url, $model, $key) {
                            //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
                    return Html::a('', ['imprimir-anual', 'id'=>$model->id], [
                    'class' => 'fa fa-print fa-2x',
                    'target' =>'_blank',
                    'data-pjax'=>0
                    ]);
                            },
                            'reporte' => function ($url, $model, $key) {
                            //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
                            return Html::a('', ['imprimir-comprobante', 'id'=>$model->id], [
                            'class' => 'fa fa-list fa-2x',
                            'target' =>'_blank',
                            'data-pjax'=>0
                            ]);
                            }
                            
                            ]
                            
                            
                            ]

            ];




echo GridView::widget([
    'dataProvider' => $alumnoDataProvider,
    'filterModel' => $alumnoSearchModel,
    'columns' => $gridColumns,
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false

    'toolbar' =>  [
        ['content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create-inscripcion','id'=>$model->id],['type'=>'button', 'title'=>Yii::t('kvgrid', 'Inscribir alumno'), 'class'=>'btn btn-success', ]) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
        ],
        '{export}',
        '{toggleData}'
    ],
    'pjax' => true,
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => false],
    
    'panel' => [
        'type' => GridView::TYPE_PRIMARY
    ],
]);


?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        





	<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
             <?php $form = ActiveForm::begin(['action' =>['cuota','id'=>$model->id]]); ?>
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Crear nueva cuota base</h4>
              </div>
              <div class="modal-body">
                
					<div class="col-md-12">
    <?php 
    
    $cuotaModel  =  new CuotaTallerImp(); ?>
   
    </div> 


 <?= $form->field($cuotaModel, 'id_cuota',['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-sticky-note"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList($cuotaList,
   						['prompt'=>'-- TIPO DE CUOTA  --',
   						'id' => 'selectProCuota',
   						'onchange'=>'var id_cuota = $("#selectProCuota option:selected").val();  
                                    $("#cuota_monto").val($("#cuota_monto"+id_cuota).val());  
                                    $("#cuota_concepto").val($("#cuota_concepto"+id_cuota).val());'
   						
   						
      ]) ?>
      
        <?php echo $form->field($cuotaModel, 'concepto_imp', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Concepto de la cuota','class'=>'form-control input-lg','maxlength' => '50', 'id'=>'cuota_concepto'])->label(false); ?>
     
      
      <?php echo $form->field($cuotaModel, 'monto', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-dollar"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Monto para esta cuota','class'=>'form-control input-lg','maxlength' => '50', 'id'=>'cuota_monto'])->label(false); ?>
      
      <?php echo $form->field($cuotaModel, 'obligatoria')->checkbox(['class'=>'form']); ?>
      
   		<?php  
   		echo $form->field($cuotaModel, 'fecha_max_pago')->widget(DateControl::classname(), [
   		    'type'=>DateControl::FORMAT_DATE,
   		    'ajaxConversion'=>false,
   		    'widgetOptions' => [
   		        'pluginOptions' => [
   		            'autoclose' => true
   		        ]
   		    ]
   		]);?>
      
       <?= $form->field($cuotaModel, 'tipo_periodo',['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-calendar-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList([2=>'Semanal', 1=>'Mensual', 3=>'Anual'],
   						['prompt'=>'-- PERIODICIDAD  --',
   						'id' => 'selectPeriod',
   						
   						
      ]) ?>
      
      
      
      
      
        <?php echo $form->field($cuotaModel, 'comentario', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textArea(['placeholder' => 'Comentario de ayuda','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <?php echo Html::submitButton($cuotaModel->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
            </div>
            <?php ActiveForm::end(); ?>


     
          <!-- /.modal-dialog -->
        </div>
        </div>
        

