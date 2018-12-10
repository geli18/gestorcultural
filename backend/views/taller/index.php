<?php

use backend\models\Categoria;
use kartik\grid\GridView;
use yii\helpers\Html;
$this->title = 'Talleres disponibles';
$this->params['breadcrumbs'][] = $this->title;

$categorias  = Categoria::findAll(['disponible'=>1]);

?>
<div class="row">

<div class="col-md-12">
<div class="callout callout-info">
                <h4>Talleres</h4>
                <p>En esta sección podras encontrar los talleres base  que imparte el centro cultural.</p>
</div>
</div>

<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-body">
		<?= Html::a('<i class="fa fa-plus-square"></i>  Agregar nuevo', ['create'], [ 'class' => 'btn btn-primary', 'title'=>'Agregar nuevo']);?>		
	</div>
</div>
</div>

<?php foreach ($categorias as $categoria):?>

<div class="col-md-12">
	<div class="box box-info with-border">
        <div class="box-header with-border">
        	<i class="fa fa-sitemap"></i>
          <h2 class="box-title"><?= $categoria->nombre ?></h2>
    
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            
         </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <?php foreach ($categoria->tallers as $taller):?>
        <div class="col-md-4">
            <div class="thumbnail">
              <img src="<?php echo $taller->base_url . '/' .$taller->path; ?>" alt="...">
              <div class="caption">
                <h3><?php echo $taller->nombre;?></h3>
                <p><?php echo $taller->descripcion;?></p>
                <p><strong>Instructor:</strong>&nbsp; <?php echo isset( $taller->instructor->nombre)?$taller->instructor->nombre: '?'; ?></p>
                <p><a href="/taller/dashboard?id=<?=$taller->id?>" class="btn btn-primary" role="button"><i class="fa fa-tachometer"></i> Administrar</a> <a href="/taller/update?id=<?=$taller->id?>" class="btn btn-warning" role="button"><i class="fa fa-pencil"></i>Editar</a></p>
              </div>
            </div>
    	</div>
    	<?php endforeach;?>
	</div>
</div>
		
</div>			
<?php endforeach;?>


<div class="col-md-12">
	<div class="box box-info with-border">
        <div class="box-header with-border">
        	<i class="fa fa-sitemap"></i>
          <h2 class="box-title">Todos</h2>
    
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            
         </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">




    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
           
            
            'nombre',
            [
                
                'header'=>'Instructor',
                'attribute'=>'id_instructor',
                'value'=>function($data){
                return isset( $data->instructor->nombre)?$data->instructor->nombre: '?' ;
                }
             ],
            'descripcion',
            'descripcion_temario',
            // 'numero_personas',
            // 'imagen_url:url',
            // 'temario_url:url',
            // 'fecha_creacion',
            // 'creado_por',
            // 'disponible',
            // 'duracion_mes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'resizableColumns'=>true,
        
        //    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
            
            'toolbar' =>  [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['data-pjax'=>0, 'class' => 'btn btn-primary', 'title'=>'Agregar nuevo']) . ' '.
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
        
    ]); ?>
    
    </div>
    </div>
    </div>
    

</div>
