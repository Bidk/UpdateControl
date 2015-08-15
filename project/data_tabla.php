<?php
		
         $resultado = query("SELECT * FROM data_control_portal.data_control order by id Desc");
		 
         $i = 0 ;
		 
?>	 		<tbody> 
 <?php	           while($row = pg_fetch_array($resultado))
            {
?>                              
					 <tr align="center" >    
                        <!--Formulario para cargar los datos registrados en la base de dato-->                    
                       <form method="post" action="project/data_process_tabla.php" name="form" >
<?php					
						//definir estado de actualización de la sección
						if($today > $row['next_update']){$color="rgb(186, 0, 0)"; $ban="---";}else{ $color="rgb(0, 130, 0)";$ban="+++";	}			
?>					
						<td style="width:40px; background:<?php echo $color; ?>"><?php echo $ban; ?></td> 			
					    <td><span style="align-text:middle;" name="code[<?php echo $i ?> ]" ><?php echo $row['code'];?></span></td>  		  
						<td><textarea class="form-control" name="section_name[<?php echo $i ?> ]" style="width:100px;" ><?php echo $row['section_name'];?></textarea></td>					   
                        <td><textarea class="form-control" name="sub_section[<?php echo $i ?> ]" style="width:100px;"><?php echo $row['sub_section'];?></textarea></td>                                                               
						<!--<td><textarea class="form-control" name="data_type[<?php // echo $i ?> ]" style="width:100px;" ><?php // echo $row['data_type'];?></textarea></td>  -->                     				                        
                        <td><input class="form-control" name="last_update[<?php echo $i ?> ]" style="width:150px;" type="date"  value="<?php echo $row['last_update'];?>" /></td>   	
						<td><select class="form-control" name="frequency[<?php echo $i ?> ]" style="width:100px;" >
							<option value="<?php echo $row['frequency'];?>"><?php echo $row['frequency'];?></option>
							<option value="Semanal">Semanal</option>
							<option value="Mensual">Mensual</option>
							<option value="Trimestral">Trimestral</option>
							<option value="Semestral">Semestral</option>
							<option value="Anual">Anual</option>							
						</select></td>  
<?php
						$tiempo=0;
						switch($row['frequency']){
							case 'Semanal':{$tiempo=7;}	break;
							case 'Mensual':{$tiempo=30;} break;
							case 'Trimestral':{$tiempo=90;} break;
							case 'Semestral':{$tiempo=180;}	break;
							case 'Anual':{$tiempo=365;}	break;						
						}
?>
                        <td><input class="form-control" name="next_update[<?php echo $i ?> ]" style="width:150px;" type="date" value="<?php echo date('Y-m-d', strtotime($row['last_update']. ' + ' .$tiempo. 'days'));?>" readonly /></td>                                                                
                   
						<td><textarea class="form-control" name="source[<?php echo $i ?> ]" style="width:100px;" ><?php echo $row['source'];?></textarea></td> 	
                        <td><textarea class="form-control" name="url_portal[<?php echo $i ?> ]" style="width:100px;"><?php echo $row['url_portal'];?></textarea></td>                        
                        <td><textarea class="form-control" name="gtp_database[<?php echo $i ?> ]" style="width:100px;"><?php echo $row['gtp_database'];?></textarea></td>  	
                        <td><textarea class="form-control" name="managers[<?php echo $i ?> ]"style="width:100px;"> <?php echo $row['managers'];?></textarea></td>                                                                  
						<td><textarea class="form-control" name="note[<?php echo $i ?> ]" style="width:100px;"><?php echo $row['note'];?></textarea></td>   						   
						<td><input class="btn btn-success btn-xs" type="submit"  value="Actualizar"  name="seleccion[<?php echo $i ?> ]"onclick="return confirm('&#191;Est&aacute; seguro de **Actualizar** los datos&#63;');"/></td>									
						<!--<td><input class="btn btn-warning btn-xs" type="submit"  value="Eliminar"  name="seleccion[<?php echo $i ?> ]"onclick="return confirm('&#191;Est&aacute; seguro de **Eliminar** los datos&#63;');"/></td>-->
                        <!-- Dato utilizado para ejecutar un metodo especifico -->   
                        <input name="opcion_metodo" value="2" type="hidden"/>     
						<input name="id[<?php echo $i ?> ]" value="<?php echo $row['id'];?>" type="hidden"/>						
                       </form>
                     </tr>
					                     
<?php        $i++;};  
?>	 		</tbody> 
 <?php	     
            pg_free_result($resultado);
?> 