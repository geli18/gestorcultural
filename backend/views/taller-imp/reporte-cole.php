<?php

Yii::$app->formatter->locale = 'es-MX';


?>


<div style="width:21cm;height:29.7cm;margin:0; " >

<table style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">


		<tr>
    		<th align="left"><img alt="" src="/img/tlaxcalalogo.png" width="200" height="130"></th>
    		<th align="right"></th>
    		<th align="right"><img alt="" src="/img/LCC.jpg" width="200" height="100"></th>
		</tr>
			<tr ><th ></th ></tr >
		
		<tr >
<th ></th >
			<th align="center" ><H2>"LA LIBERTAD"</H2></th>
			
			</tr>
			
		<tr align="center">
		<th ></th >
			<td align="center">CENTRO CULTURAL DE APIZACO</td>
			
			
						
		</tr>
		<tr align="center">
		<th ></th >
			<td align="center">Av. 5 de Mayo esq. Hidalgo s/n</td>
			
	<tr align="center">
	<th ></th >
			<td align="center">Aplizaco tlaxcala C.P 90300 Tel/Fax (01-241)41 8 09 60</td>
		
		</tr>
	
</table>

<br />
<br />

<table style="width: 100%; font-size: 12px;  font-family:times new roman; font-style:bold;">
		<tr align="center">
			<tH style=" width: 60%;" rowspan="2"><h3>COLEGIATURA</h3></tH>
		
			<th align="left"  style="background: #d4d6d8;">Fecha de inscripción</th>
			<th align="left"  style="background: #d4d6d8;">Folio inscripción</th>
			
						
		</tr>
		<tr align="center">
			
		
			<td align="center"   style="background: #d4d6d8;"><?= $model->fecha_inscripcion; ?></td>
			<td align="center"   style="background: #d4d6d8;"><?= $model->id; ?></td>
		</tr>
</table>
<br />

<table  style="width:100%; font-size: 17px; border: 1px solid black; font-family:times new roman;">
		<tr>
			<th align="left" style="background: #d4d6d8" >Recibimos de:</th>
			
			<td rowspan="2" align="left"><?= isset( $model->alumno)?$model->alumno->nombre : '?' ;?></td>
			<td ></td>
			
	
						
		</tr>
</table>
<br>
<table  style="width:100%; font-size: 17px; border: 1px solid black; font-family:times new roman;">
			
		
		
	
		<tr>
			<th   align="center" style="background: #d4d6d8  width: 70% ; " >DESCRIPCION</th>
			<th   align="center" style="background: #d4d6d8  width: 30% ; "  >IMPORTE</th>
		
			
			
	
						
		</tr>
			<tr>
			
		<td align="center" ><?=$model->tallerImp->descripcion;?></td>
			<td align="center" >$<?=$model->pago->monto;?></td>
			
								
		

	
</table>



<br />
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

