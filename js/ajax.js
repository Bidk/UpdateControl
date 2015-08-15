// JavaScript Document
 
// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {xmlhttp = false;}	
		
	}
 
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
//Funciones para recoger los datos de formulario y enviarlos por post  


//////////////////////////////////////////METODOS////////////////////////////////////
/*
function capturar_datos(){ 
    var divResultado = document.getElementById('resultado'); 
    var code=document.form.code.value;
	var section_name=document.form.section_name.value;
	var sub_section=document.form.sub_section.value;
	var data_type=document.form.data_type.value;
	var last_update=document.form.last_update.value;
	var next_update=document.form.next_update.value;
	var frequency=document.form.frequency.value;
	var source=document.form.source.value;
	var url_portal=document.form.url_portal.value;
	var gtp_databade=document.form.gtp_database.value;
	var managers=document.form.managers.value;
	var email1=document.form.email1.value;
	var email2=document.form.email2.value;
	var note=document.form.note.value;
	var opcion_metodo=document.form.opcion_metodo.value;
     
        ajax=objetoAjax();
        ajax.open("POST", "/project/data_process_tabla.php",true);
        ajax.onreadystatechange=function(){       
            if (ajax.readyState==4 && ajax.status==200) {
			divResultado.innerHTML = ajax.responseText;
			}
		}
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&code="+code+"&section_name="+section_name+"&sub_section="+sub_section+"&data_type="+data_type+"&last_update="+last_update
		+"&next_update="+next_update+"&frequency="+frequency+"&source="+source+"&url_portal="+url_portal+"&gtp_databade="+gtp_databade+"&managers="+managers
		+"&email1="+email1+"&email2="+email2+"&note="+note+"&opcion_metodo="+opcion_metodo);       

}*/

function generar_IDunico(){//Lo uso para generar id unicos en los lotes de finca, planta y venta
      divResultado=document.getElementById("codigoNuevo"); 
      if (divResultado.value==''){
          var cant="6";
          ajax=objetoAjax();
          ajax.open("POST", "general/generar_codigo.php",true);
          ajax.onreadystatechange=function() {
           
            if (ajax.readyState==4 && ajax.status==200 ) {
                 var R=innerHTML = ajax.responseText;
                 divResultado.value=R;
                }
            }
    } 
        ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        ajax.send("&cant="+cant); 

}
