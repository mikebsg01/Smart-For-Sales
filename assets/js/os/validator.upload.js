function initValitadatorUpload(){
	alert("Hola init");
	return true;
}

function isDataCorrect(input, strURL, output){
	if(strURL && $(input).val()){
		var fsize = $(input)[0].files[0].size; //get file size
        var ftype = $(input)[0].files[0].type; // get file type
        switch(ftype)
        {
            case 'image/png': 
            case 'image/gif': 
            case 'image/jpeg': 
            case 'image/pjpeg':
            	break;
            default:
            	$(output).html("");
                $(output).html("<b>"+ftype+"</b> Tipo de archivo no soportado!");
                $(output).fadeIn(1000);
                return false;
        }
        if(fsize>1048576) 
        {
        	$(output).html("");
            $(output).html("<b>"+fsize +"bytes</b> El tamaño de la imagen es demasiado grande! <br />Por favor sube una imagen de menor tamaño.");
            $(output).fadeIn(1000);
            return false;
        }
        $(output).html("");
        $(output).css({display:'none'});
		return true;
	} else {
		$(output).html("");
		$(output).html("Por favor actualice su navegador, esto debido a que su navegador actual carece de algunas características nuevas que necesitamos!");
		$(output).fadeIn(1000);
		return false;
	}
}