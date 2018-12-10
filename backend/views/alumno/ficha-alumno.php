<?php



?>


<div style="width:30cm;height:29.7cm;margin:0;" >

<table    style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">


		<tr >
    		<th width="300" align="left"><img alt="" src="/img/gobtlax.jpg"  height="130"></th>
    		<th align="center" valign="bottom" colspan="2" >"LA LIBERTAD"</th>
    		
    		<th width="300"align="right"><img alt="" src="/img/logoLCC.jpg"  height="100"></th>
		</tr>
			
</table>
	<table   style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">		
			
		<tr align="center">
		<th > </th >
			
			<td align="center" colspan="2">CENTRO CULTURAL DE APIZACO</td>
			<td > </td>				
		</tr>
		
		<tr align="center">
			<th ></th >
			<td align="center" style="font-size: 10px;" colspan="2" >FICHA PERSONAL DEL ALUMNO(A)</td>
			
			<td ></td>
			
		</tr>
		

</table>




<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="10%"><b>NOMBRE:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->nombre; ?></td>
	</tr>
</table>

<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="38%"><b>TALLER AL QUE SE INCRIBE EL ALUMNO(A):</b></td>
		<td style="border-bottom: 1px solid #000000"></td>
	</tr>
</table>
	<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="17%"><b>FECHA DE INGRESO:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->fecha_ingreso; ?></td>
	</tr>
</table>




<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="20%"><b>FECHA DE NACIMIENTO:</b></td>
		<td width="23%" style="border-bottom: 1px solid #000000"><?= $model->fecha_nacimiento; ?></td>
		
		<td width="20%"><b>LUGAR DE NACIMIENTO:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->lugar_nacimiento; ?></td>
	</tr>
</table>

<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="10%"><b>DOMICILIO:</b></td>
		<td width="40%" style="border-bottom: 1px solid #000000"><?= $model->direccion; ?></td>
		
		<td width="11%"><b>LOCALIDAD:</b></td>
		<td width="20%"  style="border-bottom: 1px solid #000000"><?= $model->nacionalidad; ?></td>
		<td width="10%"><b>TELEFONO:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->telefono_casa; ?></td>
	</tr>
</table>

<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="20%"><b>NOMBRE DEL PADRE:</b></td>
		<td width="60%" style="border-bottom: 1px solid #000000"><?= $model->nombre_padre; ?></td>
		
		<td width="7%"><b>EDAD:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->edad_padre; ?></td>
	</tr>
</table>
<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="12%"><b>OCUPACION:</b></td>
		<td width="50%" style="border-bottom: 1px solid #000000"><?= $model->ocupacion_padre; ?></td>
		
		<td width="10%"><b>TELEFONO:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->tel_padre; ?></td>
	</tr>
</table>


<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="20%"><b>NOMBRE DE LA MADRE:</b></td>
		<td width="60%" style="border-bottom: 1px solid #000000"><?= $model->nombre_madre; ?></td>
		
		<td width="7%"><b>EDAD:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->edad_madre; ?></td>
	</tr>
</table>
<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="12%"><b>OCUPACION:</b></td>
		<td width="50%" style="border-bottom: 1px solid #000000"><?= $model->ocupacion_madre; ?></td>
		
		<td width="10%"><b>TELEFONO:</b></td>
		<td style="border-bottom: 1px solid #000000"><?= $model->tel_madre; ?></td>
	</tr>
</table>


<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="32%"><b>EN CASO DE EMERGENCIA LLAMAR AL:</b></td>
		<td  style="border-bottom: 1px solid #000000"><?= $model->tel_emergencia; ?></td>
		
		
	</tr>
</table>

<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="48%"><b>NOMBRE DE LA ESCUELA DONDE ESTUDIA ACTUALMENTE:</b></td>
		<td  style="border-bottom: 1px solid #000000"><?= $model->escuela_procedencia; ?></td>
		
		
	</tr>
</table>
<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="29%"><b>ALERGIA O ENFERMEDAD CRÓNICA:</b></td>
		<td  style="border-bottom: 1px solid #000000"><?= $model->alergia_enfermedad; ?></td>
		
		
	</tr>
</table>
<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="10%"><b> TIPO SANGINEO:</b></td>
		<td   width="36%" style="border-bottom: 1px solid #000000"><?= $model->alergia_enfermedad; ?></td>
		
		
		
		
		
	</tr>
</table>
<table border="" style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td width="14%"><b>TIPO SANGINEO:</b></td>
		<td width="30%" style="border-bottom: 1px solid #000000"><?= $model->alergia_enfermedad; ?></td>
		
		<td width="20%"><b>ESTA AFILIADO A:  IMSS</b></td>
		<td width="4%" style="border-bottom: 1px solid #000000"></td>
		<td width="7%"><b>  ISSSTE</b></td>
		<td width="4%" style="border-bottom: 1px solid #000000"></td>
		<td width="15%"><b>  SEGURO POPULAR</b></td>
		<td style="border-bottom: 1px solid #000000"></td>
	</tr>
</table>

	
<br><br><br><br>
<table  style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
	<tr>
		<td align="center">
		____________________________
		</td>
		<td align="center">
		____________________________
		</td>
		<td align="center">
		____________________________
		</td >
	</tr>
	<tr>
		<td align="center">
		<b>FIRMA DEL PADRE</b>
		</td>
		<td align="center">
		<b>FIRMA DE LA MADRE</b>
		</td>
		<td align="center">
		<b>FIRMA DEL ALUMNO</b>
		</td >
	</tr>
</table>
</div>
