<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TallerImp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['dashboard','id'=>$model->id]];
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->locale = 'es-MX';

?>


<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Reporte de pago.
            <small class="pull-right"> <?= Yii::$app->formatter->asDate($modelPago->fecha_pago,'dd/MMM/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <strong>Alumno</strong> 
          <address>
           <?= isset( $modelPago->alumno)?$modelPago->alumno->nombre : '?' ;?><br>
           &nbsp;&nbsp;<b>Direccion:</b> <?= isset( $modelPago->alumno)?$modelPago->alumno->direccion : '?' ;?><br>
            &nbsp;&nbsp;<b>Correo:</b> <?= isset( $modelPago->alumno)?$modelPago->alumno->correo_electronico : '?' ;?><br>
             &nbsp;&nbsp;<b>Telefono:</b> <?= isset( $modelPago->alumno)?$modelPago->alumno->telefono_casa : '?' ;?><br>
          &nbsp;&nbsp;<b>Nombre del padre:</b> <?= isset( $modelPago->alumno)?$modelPago->alumno->nombre_padre : '?' ;?>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong> Taller </strong><br>
         <address>
            <?=$model->nombre;?><br>
            Descripción: <?=$model->descripcion;?><br>
            Duracion: <?=$model->duracion_mes;?> meses
              </address>
           
          
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Instructor</b><br>
       <?=isset($model->instructor->nombre)?$model->instructor->nombre:'?';?>
          <br>
	        Correo Electronico: <?=$model->instructor->correo_electroinico;?><br>
    	    Telefono: <?=$model->instructor->telefono;?><br>
          
          
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              
              <th>Concepto</th>
              <th>Detalles</th>
              <th>Descripcion</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            
              
              <td><?=$modelPago->concepto;?></td>
              <td><?=$modelPago->comentario;?></td>
              <td><?=$model->descripcion;?></td>
              <td><?= Yii::$app->formatter->asCurrency($modelPago->monto); ?></td>
            </tr>
           
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Formas de pago:</p>
          
           <i class="fa fa-cc-visa fa-5x"></i>
           <i class="fa fa-cc-mastercard fa-5x"></i>
           <i class="fa fa-cc-amex fa-5x"></i>
           <i class="fa fa-cc-paypal fa-5x"></i>
         
          
         

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           Para su comodidad, puede realizar su pago por estos metodos.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
        

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td><?= Yii::$app->formatter->asCurrency($modelPago->monto); ?></td>
              </tr>
              <tr>
                <th>IVA (0.16%)</th>
                <td>$0</td>
              </tr>
             
              <tr>
                <th>Total:</th>
                <td><?= Yii::$app->formatter->asCurrency($modelPago->monto); ?></td>
              </tr>
            </tbody></table>
            
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
        
         
           <?=HTML::a('<i class="fa  fa-reply"></i> Regresar',['dashboard','id'=>$model->id],['class'=>'btn btn-danger pull-right'])
          ?>
          <?=HTML::a('<i class="fa fa-download"></i> Imprimir comprobante de pago',['imprimir-cole','id'=>$modelPago->id],['class'=>'btn btn-primary pull-right','target'=>'_blank'])
          ?>
          
        </div>
      </div>
    </section>