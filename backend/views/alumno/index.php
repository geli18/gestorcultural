<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Agregar alumno', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
      <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        
        'columns' => [

            'id',
            //  'numero_registro',
            'nombre',
            'fecha_nacimiento',
            'fecha_alta',
            'tel_emergencia',
            'afiliacion_seguro',
            'curp',
            'direccion',
            'codigo_postal',
            
            // 'sexo',
            // 'direccion',
     
                
            
            

            ['class' => 'yii\grid\ActionColumn',
                'options'=>['class'=>'skip-export']
            ],
            
        ],
        'toolbar' =>  [
            ['content'=>
                Html::a('<i class="fa fa-plus"></i>', ['create'], ['data-pjax'=>0, 'class' => 'btn btn-success', 'title'=>'Nueva']).
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
            ],
            '{export}',
            '{toggleData}'
        ],
        
      
        'beforeHeader'=>[
            [
                'columns'=>[
                    ['content'=>'Alumnos registrados en el centro cultural.', 'options'=>['colspan'=>3, 'class'=>'text text-left']],
                    ['content'=>Yii::$app->formatter->asDate(date('Y-m-d')), 'options'=>['colspan'=>2, 'class'=>'text-center']],
                ],
              //  'options'=>['class'=>'skip-export'] // remove this row from export
            ]
        ],
        
        
        
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'floatHeaderOptions' => ['scrollingTop' => true],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],
    ]); ?>

  

</div>
