<?php 
                include ('../config/coneccion.php'); //incluir archivo de coneccion a la base de dato
                session_start(); //iniciar sesion
                //para desactivar los mensajes de ejecucion
               // ini_set('display_errors','off');ini_set('display_startup_errors','off');error_reporting(0); 
							   
				//dentro de los formularios principales esta un campo hidden llamado opcion_metodo es para saber si se esta registrando o modificando .
                $opcion_metodo= $_POST['opcion_metodo'];
								
                switch($opcion_metodo)
                {
                 
                    case '1':/*INSERTARRRR...................................................................................*/
                              
                            //capturando los datos del usuario traidos por ajax
							$code=pg_escape_string($_POST['code']);
							$section_name=pg_escape_string($_POST['section_name']); 
							$sub_section=pg_escape_string($_POST['sub_section']);
                            $data_type=pg_escape_string($_POST['data_type']);       
                            $last_update=pg_escape_string($_POST['last_update']); 
							$frequency=pg_escape_string($_POST['frequency']);														
							$next_update= date('Y-m-d', strtotime($last_update. ' + ' .next_time($frequency). 'days'));							
							$source=pg_escape_string($_POST['source']);
							$url_portal=pg_escape_string($_POST['url_portal']);
							$gtp_database=pg_escape_string($_POST['gtp_database']);
							$managers=pg_escape_string($_POST['managers']);
							$email1=pg_escape_string($_POST['email1']);
							$email2=pg_escape_string($_POST['email2']);
							$note=pg_escape_string($_POST['note']);
													
							$resultado= query("INSERT INTO data_control_portal.data_control
							(section_name, sub_section, data_type, last_update, next_update,frequency, source, url_portal, gtp_database, managers, note, email2, email1, code ) 
							VALUES ('{$section_name}','{$sub_section}','{$data_type}','{$last_update}','{$next_update}','{$frequency}','{$source}','{$url_portal}','{$gtp_database}','{$managers}','{$note}','{$email2}','{$email1}','{$code}')");

							//liberar la variable
                            pg_free_result($resultado);
							
							//cargar nuevamente la data para que se vean los datos insertados
                           header('location:../index.php');//regresar al formulario
                                 
                                 
                    break; /*FIN INSERTAR...................................................................................*/ 
                         
                    case '2':/*MODIFICAR O ELIMINAR.........................................................................*/
                             echo "entree";
     
                        foreach ($_POST['seleccion'] as $indice => $valor)
                        {
                             
                                $opcion = $_POST['seleccion'][$indice]; //extraemos cadena  elimina o modifica
                                 
                                switch($opcion)
                                {
									
                                    //generamos la sentencia para la modificación filtrando por el id para que solo cambie ese registro
                                    case 'Actualizar':
													
														$frequency=pg_escape_string($_POST['frequency'][$indice]);														
                                                      
									$resultado= query("UPDATE data_control_portal.data_control SET 
                                                        section_name='".pg_escape_string($_POST['section_name'][$indice])."',                                                        
                                                        sub_section='".pg_escape_string($_POST['sub_section'][$indice])."',
														data_type ='".pg_escape_string($_POST['data_type'][$indice])."',
														last_update='".pg_escape_string($_POST['last_update'][$indice])."',									
														next_update='".date('Y-m-d', strtotime($last_update. ' + ' .next_time($frequency). 'days'))."',                                                        
                                                        frequency='".$frequency."',
														source ='".pg_escape_string($_POST['source'][$indice])."',
														url_portal='".pg_escape_string($_POST['url_portal'][$indice])."',							
														gtp_database='".pg_escape_string($_POST['gtp_database'][$indice])."',                                                        
                                                        managers='".pg_escape_string($_POST['managers'][$indice])."',
														note='".pg_escape_string($_POST['note'][$indice])."'	
														
                                                        WHERE id=".$_POST['id'][$indice]);                                                                                                           
                                    break;
                                                         
                                 //sql para eliminar
                                   case 'Eliminar':$resultado= query("DELETE FROM data_control_portal.data_control WHERE id=".$_POST['id'][$indice]);
                                 //   break;                                    
                                }
                             
                                pg_free_result($resultado);
                         header('location:../index.php');//regresar al formulario                               
                        }                       												 
                        break;/* FINNN MODIFICAR O ELIMINAR.........................................................................*/
                                                 
            }/*Fin SWITCH*/
			Function next_time($frequency){
						switch($frequency){
							case 'Semanal':{$tiempo=7;}	break;
							case 'Mensual':{$tiempo=30;} break;
							case 'Trimestral':{$tiempo=90;} break;
							case 'Semestral':{$tiempo=180;}	break;
							case 'Anual':{$tiempo=365;}	break;	
							
						return $tiempo;
						}
			}
 
?>