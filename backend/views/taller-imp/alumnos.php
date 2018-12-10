<?php

use yii\helpers\Html;
use kartik\grid\GridView;




/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = $model->id . ' -  ' .  $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Taller Imps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-md-12 col-sm-12 col-xs-12">
 <h2>Alumnos incritos al taller</h2>
	
</div>

<div class="col-md-12 col-sm-12 col-xs-12">

    <p>
        <?php echo Html::a('Inscribir alumno', ['inscripciones', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>


<?php 

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
       
        'attribute' => 'id',
        'vAlign'=>'middle',
        'header'=>'Folio de inscripción',
        
        
    ],
    [
        
        'attribute' => 'fecha_inscripcion',
        'vAlign'=>'middle',
        
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
                    
       

            ];




echo GridView::widget([
    'dataProvider' => $alumnoDataProvider,
    'filterModel' => $alumnoSearchModel,
    'columns' => $gridColumns,
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false

    'toolbar' =>  [
        ['content'=>
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Inscribir alumno'), 'class'=>'btn btn-success', ]) . ' '.
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
