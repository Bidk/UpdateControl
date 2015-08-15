    <?php

    //ini_set('display_errors','off');ini_set('display_startup_errors','off');error_reporting(0);//para desactivar los mensajes de ejecucion            
	session_start();
	// se utiliza para determinar si se debe mantener abierto o cerrado los modulos de administración de datos
		
	$admin_module = $_POST['admin_module'];
	 
		
	Switch($admin_module){
	  Case'1':	
	  
			$_SESSION['Adm_ejes'] = 1 + $_SESSION['Adm_ejes'];

			if(($_SESSION['Adm_ejes']%2)==1){ 
				
				$_SESSION['Adm_ejes']=1;
			}else{$_SESSION['Adm_ejes']=0;}
			
			echo $_SESSION['Adm_ejes'];

		break;
	  Case'2':	
	  
			$_SESSION['Adm_project1'] = 1 + $_SESSION['Adm_project1'];

			if(($_SESSION['Adm_project1']%2)==1){ 
				
				$_SESSION['Adm_project1']=1;
			}else{$_SESSION['Adm_project1']=0;}
			
			echo $_SESSION['Adm_project1'];

		break;
	  Case'3':	
	
			$_SESSION['Adm_project2'] = 1 + $_SESSION['Adm_project2'];

			if(($_SESSION['Adm_project2']%2)==1){ 
				
				$_SESSION['Adm_project2']=1;
			}else{$_SESSION['Adm_project2']=0;}
			
			echo $_SESSION['Adm_project2'];

		break;	
	  Case'4':	

			$_SESSION['Adm_project3'] = 1 + $_SESSION['Adm_project3'];

			if(($_SESSION['Adm_project3']%2)==1){ 
				
				$_SESSION['Adm_project3']=1;
			}else{$_SESSION['Adm_project3']=0;}
			
			echo $_SESSION['Adm_project3'];

		break;	
	  Case'5':	
	  
			$_SESSION['Adm_tiempo'] = 1 + $_SESSION['Adm_tiempo'];

			if(($_SESSION['Adm_tiempo']%2)==1){ 
				
				$_SESSION['Adm_tiempo']=1;
			}else{$_SESSION['Adm_tiempo']=0;}
			
			echo $_SESSION['Adm_tiempo'];

		break;
	}
	
	?>	
	