<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<link href="<?=base_url()?>assets/css/metro-bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>assets/css/metro-bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/iconFont.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>
     
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.easing.1.3.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.widget.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/metro-input-control.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/os/validator.upload.js"></script>

     <!-- Metro UI CSS JavaScript plugins -->
     <script src="<?=base_url()?>assets/js/start-screen.js"></script>

    <script text="text/javascript">
    $(function(){
        if ((document.location.host.indexOf('.dev') > -1) || (document.location.host.indexOf('modernui') > -1) ) {
            $("<script/>").attr('src', '<?=base_url()?>assets/js/metro/metro-loader.js').appendTo($('head'));
        } else {
            $("<script/>").attr('src', '<?=base_url()?>assets/js/metro.min.js').appendTo($('head'));
        }
    });
    </script>
    <script src="<?=base_url()?>assets/js/metro-dropdown.js"></script>
    <script src="<?=base_url()?>assets/js/upload.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 
    $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
    //función que observa los cambios del campo file y obtiene información
    $(':file').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#imagen")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
    });
 
    //al enviar el formulario
    $(':button').click(function(){
        //información del formulario
        var formData = new FormData($(".formulario")[0]);
        var message = "";
        //hacemos la petición ajax  
        $.ajax({
            url: '<?=base_url()?>index.php/item/upload_file',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)        
            },
            //una vez finalizado correctamente
            success: function(data){
            	console.log(data);
                message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                showMessage(message);
                if(isImage(fileExtension))
                {
                    $(".showImage").html("<img src='<?=base_url()?>files/"+data+"' />");
                }
            },
            //si ha ocurrido un error
            error: function(){
                message = $("<span class='error'>Ha ocurrido un error.</span>");
                showMessage(message);
            }
        });
    });
})
 
//como la utilizamos demasiadas veces, creamos una función para
//evitar repetición de código
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
 
//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
    switch(extension.toLowerCase())
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}
</script>
</head>
<body>
 <!--el enctype debe soportar subida de archivos con multipart/form-data-->
    <form enctype="multipart/form-data" class="formulario">
        <label>Subir un archivo</label><br />
        <input name="archivo" type="file" id="imagen" /><br /><br />
        <input type="button" value="Subir imagen" /><br />
    </form>
    <!--div para visualizar mensajes-->
    <div class="messages"></div><br /><br />
    <!--div para visualizar en el caso de imagen-->
    <div class="showImage"></div>
</form>
</body>
</html>
