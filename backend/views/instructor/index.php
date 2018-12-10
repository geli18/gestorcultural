<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InstructorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instructores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Nuevo instructor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    
    
      <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        
        'columns' => [

            'id',
            'nombre',
            'telefono',
            'correo_electroinico',
            'direccion',
            'numero_cedula',
            [
                'attribute'=>'disponible',
                
                'content'=>function($data){
                
                return  ($data->disponible)?'SI':'Opcional';
                
                },
                'filter'=>[0=>'No',1=>'Si'],
                ],
                
            
            

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
                    ['content'=>'Instructores en el centro cultural  al día ', 'options'=>['colspan'=>6, 'class'=>'text text-left']],
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
