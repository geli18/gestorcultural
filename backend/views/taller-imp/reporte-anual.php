<?php


Yii::$app->formatter->locale = 'es-MX';

?>


<div style="width:21cm;height:29.7cm;margin:0; " >

<table border="" style="width: 100%; font-size: 12px;  font-family:times new roman; font-style:bold;">


		<tr>
    		<td     align="center"><img alt="" src="/img/tlaxcalalogo.png" width="120" height="90"></td>
    		
    		<td   align="left"><img alt="" src="/img/LCC.jpg" width="120" height="90"></td>
    		<td align="right" >
    		<table>
    		<tr >			
			<td align="left">
    			<b>NOMBRE:</b> 
    		</td>
    		<td align="left" style="border-bottom: 1px solid; width: 300px">
    		<?= isset( $model->alumno)?$model->alumno->nombre : '?' ;?>
    		</td>
    		</tr>
    		<tr >			
				<td align="left"><b>TALLER: </b></td >
				<td align="left" style="border-bottom: 1px solid; "><?=$model->tallerImp->nombre;?></td >
			</tr >
		
			<tr >			
				<td align="left"><b>MAESTRO:</b> </td >
				<td align="left" style="border-bottom: 1px solid; "><?=$model->tallerImp->instructor->nombre;?></td >
			</tr>
		</table>
    		</td>
		</tr>
			

			
</table>


<br />

<table  style="width:100%; font-size: 12px; border: 3px solid black; font-family:times new roman;" class="table table-bordered">

<thead>
	<tr style="background: #d4d6d8" >
		<th  align="center">CONCEPTO</th>
		<th align="center">CUOTA DE RECUPERACIÓN</th>
		<th align="center">FECHA, FIRMA Y SELLO</th>
	</tr>
</thead>

<tbody style="border: 1px solid black;">
			
		<?php foreach ($model->tallerImp->cuotaTallerImps as $cuota):?>
	
		<tr>
			<td align="center" ><?=$cuota->concepto_imp;  ?></td>
			<td align="right"><?= Yii::$app->formatter->asCurrency($cuota->monto);  ?></td>
			<td align="left">
			<?php if(count( $cuota->pagoTallerCuotas )):?>
				<?=   Yii::$app->formatter->asDate($cuota->pagoTallerCuotas[0]->fecha_pago,'dd/MMM/Y'); ?>
				<img alt="" src="/img/qr.png" style="width: 20; height: 15px">
			<?php endif;?>
			 </td>
		</tr>
		
		<?php endforeach;?>
		
	</tbody>
	
	<tfoot>
		
	</tfoot>
	
</table>



<br />
<table border="" style="width: 100%; font-size: 12px;  font-family:times new roman; font-style:bold;">


		<tr>
    		<td  width="25%"   align="right"></td>
    		
    		<td width="25%"  align="right">FECHA DE INSCRIPCIÓN:</td>
		
    		<td width="50%"align="right" style="border-bottom: 1px solid;"> <?= Yii::$app->formatter->asDate($model->fecha_inscripcion,'dd/MMM/Y');  ?></td>
    		</tr>
		<tr>
    		<td  width="25%"   align="right"></td>
    		
    		<td width="25%"  align="right">FECHA DE REINSCRIPCIÓN:</td>
    		<td width="50%"align="right" style="border-bottom: 1px solid;"> <?= Yii::$app->formatter->asDate($model->fecha_inscripcion,'dd/MMM/Y');  ?></td>
		</tr>
				

			
</table>

<!-- 

<table border="1"  style="width:100%; font-size: 12px; border: 1px dotted gray; font-family:times new roman;">
		<tr>
			<th align="left" style="background: #d4d6d8;" >Item</th>
			<th align="left" style="background: #d4d6d8;">Numero serie</th>
			<th align="left" style="background: #d4d6d8;">Codigo desbloqueo</th>				
			<th align="left" style="background: #d4d6d8;">Nombre</th>
			<th align="left" style="background: #d4d6d8;">Precio unitario</th>
		</tr>
		<tbody>
			
			
			<tr>
			<td>++$i; ?></td>
			<td>$producto->numero_serie; ?></td>
			<td>$producto->codigo_registro; ?></td>
			<td>isset($producto->tipoProducto)?$producto->tipoProducto->getCategoriaProducto() .' - '.$producto->tipoProducto->nombre:' -- ';?></td>
			<td align="right">$producto->precio_sugerido; ?></td>
			</tr>
			
		</tbody>
		
		<tfoot>
				
				<tr>
					<td colspan="4" align="right" style="background: #d4d6d8;">Sub total</td>
						<td  align="right">$ $model->precio_publico; ?></td>
				</tr>
				
				<tr>
					<td colspan="4" align="right" style="background: #d4d6d8;">+ IVA 16 % ($model->iva)?'':'(no aplica)'; ?></td>
						<td  align="right">$ ($model->iva)? $model->precio_publico * 1.16 : $model->precio_publico ?></td>
				</tr>
				
				
				<tr>
					<td colspan="4" align="right" style="background: #d4d6d8;">- Descuento</td>
					<td  align="right">$model->descuento; ?> %</td>
				</tr>
				
				
				<tr>
					<td colspan="4" align="right" style="background: #d4d6d8;">Total</td>
					<td  align="right">$ $model->monto_total; ?></td>
				</tr>
				
			</tfoot>
		
	</table>
 -->
</div>