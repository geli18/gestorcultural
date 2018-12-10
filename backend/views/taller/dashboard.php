<?php

use backend\models\Cuota;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\models\CuotaTaller;  
use backend\models\constants\Constantes;



/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = 'Taller base.  [' . $model->id . ']  ' .$model->nombre;
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->locale = 'es-MX';

$cuotaList=ArrayHelper::map
(Cuota::findBySql('select id,  CONCAT(id, \' - \',concepto ) as concepto from tbl_cuota where disponible = 1')->all(), 'id', 'concepto');

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

<div class="col-md-12 col-sm-12 col-xs-12">


   

          
          <div class="col-md-12">
               <div class="box box-info with-border">
            <div class="box-header with-border">
            	<i class="fa fa-th"></i>
              <h3 class="box-title">Información de taller base</h3>

              <div class="box-tools pull-right">
              <?php echo Html::a('<i class="fa fa-print"></i>', ['imprimir-info', 'id' => $model->id], ['class' => 'btn','target'=>'_blank']) ?>
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
              
               <dd><img class="img-thumbnail" style="width:350px; height:250px;" src="<?= isset ($model->path)? Yii::getAlias('@storageUrl').'/source/' . $model->path : '/img/clipboard.png'?>" alt="" /></dd>
                
              
              </dl>
              </div>
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
               <dd><?=$model->categoria->nombre;?></dd>
              </dl>
             </div> 
              <div class="col-md-3">
            
              <dl>
               <dt>Aula preferente</dt>
               <dd><?=isset($model->aula->nombre) ?$model->aula->nombre:'?';?></dd>
                <dt>Maximo de personas</dt>
                 <dd><?=$model->numero_personas;?></dd>
              
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
               <dt>Fecha de creación</dt>
               <dd><?=Yii::$app->formatter->asDate($model->fecha_creacion,'dd/MMM/Y');?></dd>
               
               
              </dl>
             </div> 
            </div>
            <div class="box-footer">
            	
            	<a href="implement?id=<?php echo $model->id;?>" class="btn btn-success btn-lg" ><i class="fa fa-arrow-circle-right"></i>&nbsp;Impartir taller</a>
            	 	<a href="update?id=<?php echo $model->id;?>" class="btn btn-primary btn-lg" ><i class="fa fa-pencil"></i>&nbsp;Actualizar taller base</a>
            	
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <div class="col-md-12">
               <div class="box box-success with-border">
            <div class="box-header with-border">
            <i class="fa fa-dollar"></i>
              <h3 class="box-title">Cuotas base</h3>

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
             	        'nombre',
             	        [
             	            'attribute'=>'id_cuota',
             	            'header'=>'Tipo de cuota',
             	            'content'=>function($data){
             	            
             	            //   $categoriaproducto = isset(TipoProducto::$categoriaDesc[$data->tipoProducto->categoria]) ? TipoProducto::$categoriaDesc[$data->tipoProducto->categoria] : 'Desconocido';
             	        
             	        return   isset( $data->cuota->concepto)?$data->cuota->concepto:'?';
             	        
             	            },
             	            'filter'=>ArrayHelper::map(Cuota::findAll([ 'disponible'=>1]), 'id','concepto'),
             	            ],
             	            
             	            
             	            [
             	                'header'=>'Monto',
             	                'content'=>function($data){
             	                
             	                return  Yii::$app->formatter->asCurrency($data->monto);
             	                },
             	                
             	                ],
             	                
             	              
             	                
             	                [
             	                    'attribute'=>'obligatoria',
             	                    
             	                    'content'=>function($data){
             	                    
             	                    return  ($data->obligatoria)?'SI':'Opcional';
             	                    
             	                    },
             	                    'filter'=>[0=>'Opcional',1=>'Si'],
             	                    ],
             	                    
             	                    // 'comentario',
             	                    // 'tipo_periodo',
             	                    
             	                    ['class' => 'yii\grid\ActionColumn',
             	                        'template' => '{delete}',
             	                        'buttons' => [
             	                            
             	                            'delete' => function ($url, $model, $key) {
             	                            //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
             	                    return Html::a('', ['cuota-taller/delete', 'id'=>$model->id], [
             	                    'class' => 'fa fa-trash',
             	                    'data' => [
             	                    'confirm' => "Are you sure you want to delete profile?",
             	                    'method' => 'post',
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
               <div class="box box-primary with-border">
            <div class="box-header with-border">
              <h3 class="box-title">Historial de Talleres impartidos o por impartir.</h3>

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
  
    [
        'attribute' => 'id',
        'vAlign'=>'middle',
        
    ],
    [
        'attribute' => 'nombre',
        'vAlign'=>'middle',
        
    ],
    [
        'attribute' => 'fecha_inicio',
        'vAlign'=>'middle',
        'content'=>function($data){
        
        return  Yii::$app->formatter->asDate($data->fecha_inicio,'dd/MMM/Y');
        },
        
    ],
    [
        'attribute' => 'fecha_fin',
        'vAlign'=>'middle',
        'content'=>function($data){
        
        return  Yii::$app->formatter->asDate($data->fecha_fin,'dd/MMM/Y');
        },
    ],
    
    [
        'attribute' => 'estatus',
        'format' => 'raw',
        'value'=>function($data){
        
            $currentDate  = date('Y-m-d');
            
            $inicion = $data->fecha_inicio;
            
            if (isset($data->fecha_inicio) &&  $currentDate < $data->fecha_inicio ){
                return '<p class="label label-info"><i class="fa fa-clock-o"></i>  '.Constantes::getTallerEstatusDesc(Constantes::TALLER_ESTATUS_POR_IMPARTIR).' </p>';
            }
           
            if (isset($data->fecha_fin) &&  $currentDate > $data->fecha_fin ){
                return '<p class="label label-info"><i class="fa fa-clock-o"></i>  '.Constantes::getTallerEstatusDesc(Constantes::TALLER_ESTATUS_FINALIZADO).' </p>';
            }
            
            
            if( (isset($data->fecha_inicio) &&  $currentDate >= $data->fecha_inicio )&& (isset($data->fecha_fin) &&  $currentDate <= $data->fecha_fin ) ) {
                return '<p class="label label-warning"><i class="fa fa-clock-o"></i>  '.Constantes::getTallerEstatusDesc(Constantes::TALLER_ESTATUS_IMPARTIENDO).' </p>';
            }
            
            return '<p class="label label-default"><i class="fa fa-plus"></i>  '.Constantes::getTallerEstatusDesc(-1).' </p>';
        
        },
    ],
    
    
    ['class' => 'yii\grid\ActionColumn',
        'template' => '{view}',
        'buttons' => [
            
            'view' => function ($url, $model, $key) {
            //Html::a('borrar', ['cuota-taller/delete','id'=>$key], ['class' => 'bg-red label']);
    return Html::a('<i class="fa fa-tachometer"></i> Admin', ['taller-imp/dashboard', 'id'=>$model->id], [
    'class' => 'btn btn-primary','data-pjax' => '0',
    ]);
            }
            ]
            
            
            ]
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'resizableColumns'=>true,
    
    //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    
    'toolbar' =>  [
        ['content'=>
            Html::a('<i class="glyphicon glyphicon-plus"></i>',  ['implement','id'=>$model->id], ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Imartir nuevo'), 'class'=>'btn btn-success', ]) . ' '.
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

</div>



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
    
    $cuotaModel  =  new CuotaTaller();
    echo $form->errorSummary($model); ?>
    </div> 


 <?= $form->field($cuotaModel, 'id_cuota',['template' => 
		     		'
                    {label} 
                    <div class="form-group">
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
   						    
   						,
   						
      ])->label('Tipo de cuota'); ?>
      
      <?php echo $form->field($cuotaModel, 'nombre', ['template' => 
		     		'
                    {label} 
                    <div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['id'=>'cuota_concepto',  'placeholder' => 'Alias para esta cuota','class'=>'form-control input-lg','maxlength' => '16'])->label(false); ?>
      
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
      
   
      
       <?= $form->field($cuotaModel, 'tipo_periodo',['template' => 
		     		' <div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-calendar-o"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->dropDownList([2=>'Semanal', 1=>'Mensual', 3=>'Anual'],
   						['prompt'=>'-- PERIODICIDAD  --',
   						'id' => 'selectPeriodo',
   						
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
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


