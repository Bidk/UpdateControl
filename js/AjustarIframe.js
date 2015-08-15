
	//Ajusta el tamaño de un iframe al de su contenido interior para evitar scroll
	function autofitIframe(id){
		if (!window.opera && document.all && document.getElementById){
			id.style.height=id.contentWindow.document.body.scrollHeight;
		} else if(document.getElementById) {
			id.style.height=id.contentDocument.body.scrollHeight+"px";
			console.log(id.style.height);
		}
	}