<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Alumno */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">

    <div class="col-md-12">
        <?php echo Html::a('<i class="fa fa-pencil"></i>  Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('<i class="fa fa-id-card"></i>  Generar credencial', ['imprimir-credencial', 'id' => $model->id], ['class' => 'btn btn-primary', 'target'=>'_blank']) ?>
        <?php echo Html::a('<i class="fa fa-info-circle"></i> Generar ficha personal', ['imprimir-comprobante', 'id' => $model->id], ['class' => 'btn btn-primary','target'=>'_blank']) ?>
      
        <?php echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirmar borrar eeste alumno ?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <br />
    <br />
<div class="col-md-3">
            <dl>
              
               <dd><img class="img-thumbnail" style="width:350px; height:250px;" src="<?= isset ($model->path)? $model->base_url.'/' . $model->path : '/img/usuario.jpg'?>" alt="" /></dd>
                
              
              </dl>
</div>

<div class="col-md-9">
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           // 'numero_registro',
            'nombre',
            'taller_inscribe',
            'fecha_ingreso',
            'fecha_nacimiento',
            'lugar_nacimiento',
            'sexo',
            'direccion',
            'nacionalidad',
           
            //'estado',
            
            'telefono_movil',
            'telefono_casa',
            'nombre_padre',
            'edad_padre',
            'ocupacion_padre',
            'tel_padre',
            'nombre_madre',
            'edad_madre',
            'ocupacion_madre',
            'tel_madre',
            
            
            'tel_emergencia',
            'escuela_procedencia',
            'alergia_enfermedad',
            'tipo_sangineo',
            'afiliacion_seguro',
            'curp',
            'fecha_alta',
            'codigo_postal',
            'fecha_baja',
            'correo_electronico',   
        ],
    ]) ?>

</div>
</div>

