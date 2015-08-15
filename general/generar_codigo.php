<?php 
    include ('/../config/coneccion.php');
     
    $cant=$_POST['cant'];   
     
    do{
        $id=generarID($cant);
        $resultado= query("SELECT code FROM data_control_portal.data_control where code='".$id."'");
    }while(pg_num_rows($resultado)>0);                                

     
    function generarID($length)
        {
            $str = 'ABCDEFGHJKLMNOPQRSTUWVXYZ0123456789';
            for($i=0; $i<$length; $i++){
            echo $str[mt_rand(0,34)];
            }
        }       
?>