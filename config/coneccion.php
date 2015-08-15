<?php

//funcion para conectarse al servidor y a la base de dato
	function conectarse()
	{
  
		$host = ""; 
		$port = ""; 
		$data = ""; 
		$user = "";
		$pass = "";
		  
		$conn_string = "host=". $host . " port=" . $port . " dbname= " . $data . " user=" . $user . " password=" . $pass; 
		  
		$dbconn = pg_connect($conn_string) or die; 
		  
		//validar la conexión 
		if(!$dbconn) { 
			echo "Error al conectar a la Base de datos\n"; 
			exit(); 
		} 

	}
	
// Funcion para realizar consultas sql
	function query($sql){
		$conect=conectarse();
		$res=pg_query($sql) or die ("Error en la consulta");
		//pg_close($conect);
		return $res;
	   }

?>
