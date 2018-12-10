<?php
?>
<div class="box-body">
<div class="col-md-3">
<table    style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">


		<tr >
    		<th width="300" align="left"><img alt="" src="/img/gobtlax.jpg"  height="130"></th>
    		<th align="center" valign="bottom" colspan="2" ></th>
    		
    		<th width="300"align="right"><img alt="" src="/img/logoLCC.jpg"  height="100"></th>
		</tr>
			
</table>
<h3>Detalle del taller:</h3>
<table  style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">
        <tr>
        	<td  width="42%"><img class="img-thumbnail" style="width:40%; height:30%;" src="<?= isset ($model->path)? $model->base_url.'/' . $model->path : '/img/clipboard.png'?>" alt="" /></td>
        
        <td   align="center" valign="top">
        
         <dl>
                <dt><b>Nombre del taller</b> </dt>
               <dd><?=$model->nombre;?></dd>
                
                <dt><b>Descripción</b></dt>
                <dd><?=$model->descripcion;?></dd>
               <dt><b>Instructor</b></dt>
              
                <dd><?=isset($model->instructor->nombre)?$model->instructor->nombre:'?';?></dd>
               <dt><b>Categoría</b></dt>
               <dd><?=$model->categoria->nombre;?></dd>
              </dl>
        </td>
         
        <td  align="center" valign="top">
        
         <dl>
               <dt><b>Aula preferente</b></dt>
               <dd><?=isset($model->aula->nombre) ?$model->aula->nombre:'?';?></dd>
                <dt><b>Maximo de personas</b></dt>
                 <dd><?=$model->numero_personas;?></dd>
              
               <dt><b>Duración meses</b></dt>
               <dd><?=$model->duracion_mes;?></dd>
               <dt><b>Duración hora</b></dt>
               <dd><?=$model->duracion_hora;?></dd>
               
              </dl>
        </td>
         
        <td  align="center" valign="top">
        
         <dl>
                <dt><b>Dias preferentes para impartir</b></dt>
                 <?php if ($model->lunes):?>
                <dd>Lunes</dd>
                <?php endif;?>
                <?php if ($model->martes):?>
                <dd>Martes</dd>
                <?php endif;?>
                <?php if ($model->miercoles):?>
                <dd>Miercoles</dd>
                <?php endif;?>
                <?php if ($model->jueves):?>
                <dd>Jueves</dd>
                <?php endif;?>
                <?php if ($model->viernes):?>
                <dd>Viernes</dd>
                <?php endif;?>
                <?php if ($model->sabado):?>
                <dd>Sabado</dd>
                <?php endif;?>
                <?php if ($model->domingo):?>
                <dd>Domingo</dd>
                <?php endif;?>
                
                <dt><b>Disponible</b></dt>
               <dd><?=$model->disponible;?></dd>
               <dt><b>Fecha de creación</b></dt>
               <dd><?=$model->fecha_creacion;?></dd>
               
               
              </dl>
        </td>
        </tr>
</table>
<table style="width: 100%; font-size: 15px;  font-family:times new roman; font-style:bold;">

<tr>
	<td><img class="img-thumbnail" style="width:350px; height:250px;" src="<?= isset ($model->path)? $model->base_url.'/' . $model->path : '/img/clipboard.png'?>" alt="" /></td>


</tr>





    <tr>
    	<td ><b>Nombre del taller:</b> </td>
    	<td><?=$model->nombre;?></td>
    
    
    </tr>

    <tr>
    	<td><b>Descripción:</b></td>
    	<td><?=$model->descripcion;?></td>
    
    
    </tr>
    <tr>
    	<td ><b>Instructor:</b></td>
    	<td><?=isset($model->instructor->nombre)?$model->instructor->nombre:'?';?></td>
    
    
    </tr>
    <tr>
    	<td ><b>Categoría:</b></td>
    	<td><?=$model->categoria->nombre;?></td>
    
    
    </tr>
    <tr>
    	<td ><b>Aula preferente:</b></td>
    	<td><?=$model->aula->nombre;?></td>
    
    
    </tr>
    <tr>
    	<td ><b>Maximo de personas:</b></td>
    	<td><?=$model->numero_personas;?></td>
    
    
    </tr>
    <tr>
    	<td ><b>Duración meses:</b></td>
    	<td><?=$model->duracion_mes;?></td>
    
    
    </tr><tr>
    	<td ><b>Duración hora:</b></td>
    	<td><?=$model->duracion_hora;?></td>
    
    
    </tr>
	<tr>
                <td><b>Dias preferentes para impartir: </b></td>
                 <?php if ($model->lunes):?>
                <td>Lunes<br>
                <?php endif;?>
                <?php if ($model->martes):?>
                Martes <br>
                <?php endif;?>
                <?php if ($model->miercoles):?>
                Miercoles<br>
                <?php endif;?>
                <?php if ($model->jueves):?>
                Jueves<br>
                <?php endif;?>
                <?php if ($model->viernes):?>
                Viernes<br>
                <?php endif;?>
                <?php if ($model->sabado):?>
                Sabado<br>
                <?php endif;?>
                <?php if ($model->domingo):?>
                Domingo<br>
                <?php endif;?>
                </td>
     </tr>
     <tr>
    		 <td><b>Disponible:</b></td>
               <td><?=$model->disponible;?></td>
     </tr>   
     <tr>
     <td><b>Fecha de creación:</b></td>
               <td><?=$model->fecha_creacion;?></td>
     </tr>        
                
 
               
               
        
              
</table>
</div>
</div>

