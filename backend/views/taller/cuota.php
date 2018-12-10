<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use backend\models\Cuota;

/* @var $this yii\web\View */
/* @var $model backend\models\Taller */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tallers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;




$cuotaList=ArrayHelper::map
(Cuota::findBySql('select id,  CONCAT(id, \' - \',concepto ) as concepto from tbl_cuota where disponible = 1')->all(), 'id', 'concepto');

?>
<div class="col-md-12">

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            
            [
                'attribute'=>'id_cuota',
                'header'=>'Concepto',
                'content'=>function($data){
                
             //   $categoriaproducto = isset(TipoProducto::$categoriaDesc[$data->tipoProducto->categoria]) ? TipoProducto::$categoriaDesc[$data->tipoProducto->categoria] : 'Desconocido';
                
            return  $data->idCuota->concepto;
                
                },
                'filter'=>ArrayHelper::map(Cuota::findAll([ 'disponible'=>1]), 'id','concepto'),
              ],
              
              
              [
                'header'=>'Monto',
                'content'=>function($data){
                    
                return  Yii::$app->formatter->asCurrency($data->idCuota->monto);
                },
               
              ],
              
            'nombre',
           
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
                            'class' => 'glyphicon glyphicon-remove',
                            'data' => [
                                'confirm' => "Are you sure you want to delete profile?",
                                'method' => 'post',
                            ],
                        ]);
                    }
                    ]
                    
                
            ],
        ],
    ]); ?>

</div>

<div class="col-md-12">
<?php
Modal::begin([
    'header' => '<h2>Nueva cuota</h2>',
    'toggleButton' => ['label' => 'Agregar'],
]);

echo 'Say hello...'; ?>



<?php $form = ActiveForm::begin(); ?>

     
	<div class="col-md-12">
    <?php echo $form->errorSummary($model); ?>
    </div> 


 <?= $form->field($model, 'id_cuota',['template' => 
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
   						'id' => 'selectPro',
   						'onchange'=>'
			                $.get( "'.Yii::$app->urlManager->createUrl('tipo-producto/get-img?id=').'"+$(this).val(), function( data ) {
			                  $( "#divimg" ).html( data );
			                });
            			',
   						
      ]) ?>
      
      <?php echo $form->field($model, 'obligatoria')->checkbox(['class'=>'form']); ?>
      
       <?= $form->field($model, 'tipo_periodo',['template' => 
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
   						'id' => 'selectPro',
   						'onchange'=>'
			                $.get( "'.Yii::$app->urlManager->createUrl('tipo-producto/get-img?id=').'"+$(this).val(), function( data ) {
			                  $( "#divimg" ).html( data );
			                });
            			',
   						
      ]) ?>
      
      
       <?php echo $form->field($model, 'nombre', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textInput(['placeholder' => 'Alias para esta cuota','class'=>'form-control input-lg','maxlength' => '16'])->label(false); ?>
      
      
      
        <?php echo $form->field($model, 'comentario', ['template' => 
		     		'<div class="form-group">
		       		 <div class="input-group">
		          <span class="input-group-addon" >
		             <span class="fa fa-pencil"></span>
		          </span>
		          {input}
		     		
		       </div>
		     			
		      <div> {error}{hint}</div>
   				</div>'])->textArea(['placeholder' => 'Comentario de ayuda','class'=>'form-control input-lg','maxlength' => '200'])->label(false); ?>
      
      
       <?php echo Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         

<?php ?>
<?php ActiveForm::end(); ?>


<?php 
Modal::end();

?>
</div>

