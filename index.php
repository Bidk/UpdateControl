<!DOCTYPE html>
 
<html lang="es">
 
<head> 
    <title>Control de datos</title>
	<?php include('general/cabecera.html'); ?>
</head>
 
<body>
    <?php
        include ('config/coneccion.php');
		// ini_set('display_errors','off');ini_set('display_startup_errors','off');error_reporting(0);//para desactivar los mensajes de ejecucion             
        date_default_timezone_set("America/Bogota"); $today = date("Y-m-d");$hora=date("H:i"); //para darle formato al date picker
		session_start();
    
		// $res=query('SELECT Distinct(name_eje) FROM stafftime.ejes order by name_eje'); //lo utilizo para el selec de categoria
		// $reshour=query("SELECT sum(t.hour_record) as total_horas_dia FROM stafftime.time_record t join stafftime.user u on t.id_user=u.id_user where t.date_registered_record='".$today."' and u.id_user='".$_SESSION['ID_USER']."'");
		
		//if($_SESSION['Adm_tiempo']==1){
	?>		
			<script>
				$( document ).ready(function() {
				$( '#collapseTwo' ).removeClass( "collapsing", 1000, "easeOutBounce"  );
				$( '#collapseTwo' ).addClass( "collapse", 1000, "easeOutBounce"  );});
			</script>
	
	
	<?php//	}else{  ?>
			<script>
				$( document ).ready(function() {
					$( '#collapseTwo' ).removeClass( "collapsing", 1000, "easeOutBounce"  );
					$( "#collapseTwo" ).addClass( "collapsed in" );});
			</script>
	<?php//	} ?>


       <div id="contenedor"> 

		<header id="Cerrar_Sesion">
            <div id="usuario"><?php echo "| Fecha de creación: 7/17/2015 |";?> </div>	 				
		</header>
			
        <div  id="cabecera">
         	 <div id="titulo"><h2><strong>Control de Actualización del Portal</strong></h2></div>	
		</div>
          
       <div id="contenido">
		 
		<div style="background-color:#C55A4C; height:46px; padding:0px 5px 0px 0px">

		</div> 
                <!--Formulario para el de registro de datos-->   
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" >
						<div class="panel-heading" role="tab" id="headingTwo" >
						  <h4 class="panel-title" style="display:inline-block;">
							  Registro de datos
						  </h4>
						  <span style="float:right;" class="glyphicon glyphicon-hand-left" aria-hidden="true"></span>
						</div>
					</a>
				<div  id="collapseOne" class="panel-collapse collapsing" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body" style="background: #EFEFEF;">	
						<div id="formulario">
						<form action="project/data_process_tabla.php" method="post" name="form" id="form"> <!--data_process_activity.php-->		
							<table width="20%"  border="1" bordercolor="#DFDFDF" align='center'>						
							<tr><td><label> C&oacute;digo:</label></td> 
									<td><input class="form-control" id="codigoNuevo" name="code" type="text" readonly style="letter-spacing:1px; font-weight:bold; width:150px;text-align:center;" required /></td>
									<td><input value="..Generar.." name="generar_cod" type="button" onClick="generar_IDunico()"/></td> 
							</tr>
							</table></br></br>
							<table width="60%"  border="1" bordercolor="#DFDFDF" align='center'>	
							
								 <thead> <tr align="center" >
									<th>Secci&oacute;n</th><th>Sub-secci&oacute;n</th><th>Tipo de dato</th><th>&Uacute;ltima Actu.</th>
									<th>Frecuencia</th><th>Fuente</th>								
										</tr>
								</thead>	
								<tr>									
									<td><textarea class="form-control" name="section_name" style="width:150px;" required></textarea></td>					   
									<td><textarea class="form-control" name="sub_section" style="width:150px;" required></textarea></td>                                                               								  
									<td><select class="form-control" name="data_type" style="width:150px;" required>
										<option value="">--Seleccionar--</option>									
										<option value="Est&aacute;tica">Est&aacute;tica</option>
										<option value="Din&aacute;mica">Din&aacute;mica</option>							
									</select></td>									
									<td><input class="form-control" name="last_update" style="width:150px;" type="date"  value="<?php echo $today;?>" required/></td>   	                                                           
									<td><select class="form-control" name="frequency" style="width:150px;" required>										
										<option value="">--Seleccionar--</option>
										<option value="Semanal">Semanal</option>
										<option value="Mensual">Mensual</option>
										<option value="Trimestral">Trimestral</option>
										<option value="Semestral">Semestral</option>
										<option value="Anual">Anual</option>							
									</select></td>  
									<td><textarea class="form-control" name="source" style="width:150px;" required></textarea></td> 
								</tr>
							</table><br>
							<table width="60%"  border="1" bordercolor="#DFDFDF" align='center'>							 
								   <thead> <tr style="text-align:center !important;" >
										<th>Portal URL</th><th>GTP Database</th><th>Encargado(s)</th><th>Email 1</th><th>Email 2</th><th>Observaciones</th>
										</tr>
									</thead>
									<tr>																	  									
										<td><textarea class="form-control" name="url_portal" style="width:150px;" required></textarea></td>                        
										<td><textarea class="form-control" name="gtp_database" style="width:150px;" required></textarea></td>  	
										<td><textarea class="form-control" name="managers"style="width:150px;"></textarea></td> 
										<td><textarea class="form-control" name="email1"style="width:150px;"></textarea></td>  
										<td><textarea class="form-control" name="email2"style="width:150px;"></textarea></td>  										
										<td><textarea class="form-control" name="note" style="width:150px;"></textarea></td>  
										 									
									</tr>
									<tr>
										<td></td><td></td>
										<td ><input name="limpiar" style="width:150px;" type="reset" value="Limpiar" class="btnRegresar btn btn-danger btn-md btnstyle"/></td>
										<td ><input  name="registrar" type="submit" value="Guardar" style="width:100%;" class="btnRegresar btn btn-primary btn-md btnstyle" /></td><td></td><td></td></tr>
										<!-- Dato utilizado para ejecutar un metodo especifico  -->  
										<input name="opcion_metodo" value="1" type="hidden"/>
							</table>     
						</form>
						</div>           
					</div>
				</div>
			</div>
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<a  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" >
						<div class="panel-heading" role="tab" id="headingTwo" >
						  <h4 class="panel-title" style="display:inline-block;">
							  Administrador de datos
						  </h4>
						  <span style="float:right;" class="glyphicon glyphicon-hand-left" aria-hidden="true"></span>
						</div>
					</a>
					<div  id="collapseTwo" class="panel-collapse collapsing" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body" style="background: #EFEFEF;">
						  <div id="administrador"><p><!--<h5 id="subtitulo">ADMINISTRADOR DE DATOS</h5>--></p>  
							 
							<div id="tabla1">
								<table width="100%"  border="1" bordercolor="#DFDFDF" class="table table-hover tablaAdmin" id="tablad">
								 
								   <thead> <tr align="center" id="tr1">
										<th>Estado</th><th>C&oacute;digo</th><th>Secci&oacute;n</th><th>Sub-secci&oacute;n</th><th>&Uacute;ltima Actu.</th>
										<th>Frecuencia</th><th>Pr&oacute;x. actu.</th><th>Fuente</th>
										<th>Portal URL</th><th>GTP Database</th><th>Encargado(s)</th><th>Observaciones</th><th>Actualizar</th> <!--<th>Eliminar</th>-->
										</tr>
									</thead>
									
									<div id="resultado"><?php include('project/data_tabla.php'); //cargar data  ?></div>                    
								</table>
							</div><!--fin div tabla1-->
						   </div><!--fin div contenedor-->		 
						</div>
					</div>
				</div>
			</div>

</div></div>
</body>
</html>