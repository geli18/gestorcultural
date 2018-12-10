<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\TallerImp;
use backend\models\Instructor;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PagoTallerCuotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingresos por talleres';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->formatter->locale = 'es-MX';
?>
<div class="row">

<div class="col-md-12">
<div class="callout callout-info">
                <h4>Ingresos generados por talleres</h4>
                <p>Puede genear reportes especificos por taller, por instructor, por  un rango de fecha, y exportarlos para manipularlos.</p>
</div>
</div>

<div class="col-md-12">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Crear nuevo pago de cuota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    
    
    
    
    <?php 

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
       
        'attribute' => 'id',
        'vAlign'=>'middle',
        'header'=>'Folio',
        
        
    ],
    
    
    [
        'attribute' => 'id_taller_imp',
        'vAlign' => 'middle',
        'width' => '180px',
        'value' => function ($model, $key, $index, $widget) {
        return Html::a($model->id_taller_imp . ' - ' . $model->tallerImp->nombre,
            '#',
            ['title' => 'View author detail', 'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")']);
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map(TallerImp::findBySql('select id, concat (id, " - " , nombre) as nombre  from tbl_taller_imp')->orderBy('nombre')->asArray()->all(), 'id', 'nombre'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Todos'],
        'format' => 'raw'
        ],
        
        
        [
            'attribute' => 'id_cuota',
            'vAlign' => 'middle',
            'width' => '180px',
            'value' => function ($model, $key, $index, $widget) {
            return Html::a($model->cuota->concepto,
                '#',
                ['title' => 'View author detail', 'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")']);
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(TallerImp::findBySql('select id, concepto  from tbl_cuota')->orderBy('concepto')->asArray()->all(), 'id', 'concepto'),
            
                
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Todas','multiple'=>true],
            'format' => 'raw'
      ],
    
      
      [
          'attribute' => 'id_instructor',
          'vAlign' => 'middle',
          'width' => '180px',
          'value' => function ($model, $key, $index, $widget) {
          return Html::a($model->tallerImp->instructor->nombre,
              '#',
              ['title' => 'View author detail', 'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")']);
          },
          'filterType' => GridView::FILTER_SELECT2,
          'filter' => ArrayHelper::map(Instructor::findBySql('select id, nombre  from tbl_instructor')->orderBy('nombre')->asArray()->all(), 'id', 'nombre'),
          
          
          'filterWidgetOptions' => [
              'pluginOptions' => ['allowClear' => true],
          ],
          'filterInputOptions' => ['placeholder' => 'Todos','multiple'=>true],
          'format' => 'raw',
            'pageSummary' => 'Total',
              ],

    
    
    
    [
        
        'attribute' => 'monto',
        'vAlign'=>'middle',
        'format' => ['decimal', 2],
        'pageSummary' => true,
        'pageSummaryFunc' => GridView::F_SUM,
        'footer' => true,
        
    ],
    

    
    [
        
        'attribute' => 'concepto',
        'vAlign'=>'middle',
        
    ],
    

    
    [
        
        'attribute' => 'fecha_pago',
        'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions' => [
            'presetDropdown' => true,
            'hideInput'=>false,
            'value'=>'',
            'pluginOptions'=>[
                'locale'=>[
                    'format' => 'YYYY-MM-DD',
                    'separator'=>' a ',
                ],

            ]
           
        ],
        'vAlign'=>'middle',
        'width' => '200px',
        
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
           
                    
       

            ];




echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'showPageSummary' => true,
    'resizableColumns'=>true,

//    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false

    'toolbar' =>  [
        ['content'=>
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Inscribir alumno'), 'class'=>'btn btn-success', ]) . ' '.
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
</div>
    
    

