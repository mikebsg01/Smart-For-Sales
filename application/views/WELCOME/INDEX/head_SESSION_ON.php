<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title> <?=$AppName?> </title>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $.Metro.initDropdowns();
            
            <? if( $error_upload == 1 ){ ?>
                $.Dialog({
                    overlay: true,
                    shadow: true,
                    flat: true,
                    padding: 10,
                    icon: '<i class="icon-warning"></i>',
                    title: '<?=$error_upload_title?>',
                    content: '',
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        content.html('<?=$error_upload_content?>');
                    }
                });
            <? } ?> 
            

            $("#management-of-items").click(function(){
                $.Dialog({
                    width: '94%',
                    height: '86%',
                    padding: 15,
                    overlay: false,
                    shadow: true,
                    flat: true,
                    icon: '<i class="icon-clipboard-2"></i>',
                    title: 'Gestión de Articulos',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        $windowDialog = $('.content').parent();
                        $windowDialog.css({overflow:'scroll'});
                        
                        $content = '<div>'+
                                    '<table class="table striped hovered dataTable" id="itemsTable-1">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th class="text-left"># ID</th>'+
                                                '<th class="text-left">Nombre</th>'+
                                                '<th class="text-left">Descripción</th>'+
                                                '<th class="text-left">Cantidad</th>'+
                                                '<th class="text-left">Precio Unitario</th>'+
                                                '<th class="text-left">Precio de Venta</th>'
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '</tbody>'+
                                        '<tfoot>'+
                                            '<tr>'+
                                                '<th class="text-left"># ID</th>'+
                                                '<th class="text-left">Nombre</th>'+
                                                '<th class="text-left">Descripción</th>'+
                                                '<th class="text-left">Cantidad</th>'+
                                                '<th class="text-left">Precio Unitario</th>'+
                                                '<th class="text-left">Precio de Venta</th>'
                                            '</tr>'+
                                        '</tfoot>'+
                                    '</table>'+
                                    '</div>';
                        content.html($content);
                        
                        $(function(){
                            $('#itemsTable-1').dataTable( {
                                "bProcessing": true,
                                "sAjaxSource": "<?=base_url()?>index.php/item/getAllItems",
                                "aoColumns": [
                                    { "mData": "id" },
                                    { "mData": "nombre" },
                                    { "mData": "descripcion" },
                                    { "mData": "cantidad" },
                                    { "mData": "precio_unitario" },
                                    { "mData": "precio_final" }
                                ]
                            } );
                        });

                    }
                });
            });


            $("#add-item").click(function(){
                $.Dialog({
                    width: '68%',
                    height: '76%',
                    draggable: true,
                    padding: 15,
                    overlay: false,
                    shadow: true,
                    flat: true,
                    icon: '<i class="icon-plus"></i>',
                    title: 'Agregar un Artículo',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        $windowDialog = $('.content').parent();
                        $windowDialog.css({overflow:'scroll'});
$content = ' '+
'<table id="form_addItem">'+
'   <tr>'+
'       <td style="padding: 6px;">'+
'           <label for="codebar">Código de Barras </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="codebar" style="text-align: right" name="codebar" pattern="[0-9]{5,120}" placeholder="Ej. 12345" required="required"/>'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <div class="input-control switch margin10" data-role="input-control">'+
'                <label>'+
'                       Agregar IVA: '+
'                    <input type="checkbox" id="checkIVA" name="checkIVA" value="0">'+
'                    <span class="check"></span>'+
'                </label>'+
'               </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <!--<label for="iva">(%): </label>-->'+
'           <div class="input-control text size2 block" data-role="input-control">'+
'               <input type="text" id="iva" style="text-align: right" name="iva" placeholder="Ej. 16.00" disabled="disabled"/>'+
'           </div>'+
'       </td>'+
'       <td rowspan="2" style="padding: 6px;">'+
'           <form enctype="multipart/form-data" id="frm_addImageItem">'+
'           <image id="picItem" src="<?=base_url()?>assets/img/show/new-product.jpg" style="width: 220px; height: 180px; margin: auto; display: block;" class="shadow" />'+
'           <div class="input-control file" data-role="input-control">'+
'                <input id="input-addImageItem" name="input-addImageItem" type="file" tabindex="-1" style="z-index: 1000; width: 100%; height: 100%;"><input type="text" id="__input_file_item__" name="__input_file_item__" readonly="" style="z-index: 1; cursor: default;" value="Click Aquí">'+
'                <button class="btn-file" type="button"></button>'+
'            </div>'+
'            </form>'+
'            <div id="output-warning-file" class="notice marker-on-top bg-darkRed fg-white" style="display: none;"> </div>'+
'            <div id="output-success-file" class="notice marker-on-top bg-green fg-white" style="display: none;"> </div>'+ 
'        </td>'+
'   </tr>'+
'   <tr>'+
'       <td style="padding: 6px;">'+
'           <label for="name-item">Nombre del artículo: </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="name-item" name="name-item" pattern="[a-z0-9]{1,79}" placeholder="Ej. Smart Tv 20\'\'" required="required"/>'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="cantidad">Existencia Tope (stock): </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="cantidad" style="text-align: right" name="cantidad" placeholder="Ej. 26" required="required"/>'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="cantidad">Existencia Actual: </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="cantidadActual" style="text-align: right" name="cantidadActual" placeholder="Ej. 15" required="required"/>'+
'           </div>'+
'       </td>'+
'   </tr>'+
'   <tr>    '+
'       <td style="padding: 6px;">'+
'           <label for="description">Descripción: </label>'+
'           <textarea id="description" name="description" class="size3 block" style="overflow: vertical; minheight:90px; height: 90px; font-family: inherit;"></textarea>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="precio_unitario"> Precio Unitario ($): </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="precio_unitario" style="text-align: right" name="precio_unitario" placeholder="Ej. 1500.00" required="required"/>'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="precio_unitario"> Cargo IVA ($): </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="cargo_iva" style="text-align: right" name="cargo_iva" placeholder="Ej. 240.00" disabled="disabled" />'+
'           </div>'+
'       </td>'+
'       <td>'+
'           <label for="precio_unitario"> Precio Final de Venta ($): </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="precio_final" style="text-align: right" name="precio_final" placeholder="Ej. 1740.00" required="required"/>'+
'           </div>'+
'       </td>'+
'   </tr>'+
'   <tr>'+
'       <td>    '+
'           <label for="">Fecha de Caducidad (aaaa-mm-dd): </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="fecha_caducidad" style="text-align: right" name="fecha_caducidad" placeholder="Ej. 2014-11-09"/>'+
'           </div>'+
'       </td>'+
'       <td>    '+
'           <label for="cargo_extra">Cargo Extra ($): </label>'+
'           <div class="input-control text size3 block" data-role="input-control">'+
'               <input type="text" id="cargo_extra" style="text-align: right" name="cargo_extra" placeholder="Ej. 7.90"/>'+
'           </div>'+
'       </td>'+
'       <td>'+
'           <label for="cargo_extra">Motivos del Cargo: </label>'+
'           <textarea id="motivos_cargo" name="motivos_cargo" class="size3 block" style="overflow: vertical; minheight:90px; height: 90px; font-family: inherit;" placeholder="Ejemplo: Costo del Empaque."></textarea>'+
'       </td>'+
'       <td>'+
'           <div class="tile double">'+
'               <div class="tile-content icon">'+
'                   <i class="icon-cart-2 fg-gray"></i>'+
'                </div>'+
'           </div>'+
'       </td>'+
'   </tr>'+
'   <tr>'+
'       <td colspan="4">&nbsp;</td>'+
'   </tr>'+
'   <tr>'+
'       <td colspan="3">&nbsp;</td>'+
'       <td>'+
'           <input type="button" id="submit_item" name="submit_item" class="primary size3 block large" value="Guardar Artículo" />'+
'       </td>'+
'   </tr>'+
'</table>'+
'<!--</form>-->';

                        content.html($content);

                        $(function(){
                            
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        if(isDataCorrect('#input-addImageItem', e.target.result, '#output-warning-file')){
                                            $('#picItem').attr('src',e.target.result);
                                            $fileURL = $("#input-addImageItem").val();
                                            $('#__input_file_item__').attr('value',$fileURL);
                                        } else {
                                            $('#__input_file_item__').attr('value',' ');
                                            $('#picItem').attr('src','<?=base_url()?>assets/img/show/new-product.jpg');
                                        }
                                    }
                                    console.log(input.files[0]);
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $("#input-addImageItem").change(function(){
                                //alert($(this).val());
                                readURL(this);
                            });
                            $("#checkIVA").click(function(e){
                                $status = $(this).val();
                                if($status == 0){
                                    $("#iva").prop("disabled",false);
                                    $("#cargo_iva").prop("disabled",false);
                                    $(this).val('1');
                                    //alert("New status: "+$(this).val());
                                } else {
                                    $("#iva").prop("disabled",true);
                                    $("#cargo_iva").prop("disabled",true);
                                    $(this).val('0');
                                    //alert("New status: "+$(this).val());
                                }
                            });
                            
                            $("#submit_item").click(function(event){
                                event.preventDefault();
                                //alert("Submit!");
                                $codebar = $("#codebar").val();
                                $nameItem = $("#name-item").val();
                                $description = $("#description").val();
                                if($description == "" || $description == " " || !description){
                                    $description = null;
                                }
                                $precioUnitario = $("#precio_unitario").val();
                                $addIVA = $("#checkIVA").val();
                                $iva = 0;
                                $cargoIva = 0;
                                if($addIVA == 1){
                                    $iva = $("#iva").val();
                                    $cargoIva = $("#cargo_iva").val();
                                }
                                $cargoExtra = $("#cargo_extra").val();
                                $motivoCargo = null;
                                if($cargoExtra != "" || $cargoExtra != " " || $cargoExtra != null){
                                    $motivoCargo = $("#motivos_cargo").val();
                                } else {
                                    $cargoExtra = 0;
                                }
                                $precioFinal = $("#precio_final").val();
                                $urlImage = $("#__input_file_item__").val();
                                if($urlImage == ' ' || $urlImage == 'Click Aquí'){
                                    $urlImage = null;
                                }
                                $stock = $("#cantidad").val();
                                $existActual = $("#cantidadActual").val();
                                $fechaCaducidad = $("#fecha_caducidad").val();
                                $objItem = {
                                                insert: '1',
                                                codebar: $codebar,
                                                name: $nameItem,
                                                description: $description,
                                                precioUnitario: $precioUnitario,
                                                iva: $iva,
                                                cargoIva: $cargoIva,
                                                cargoExtra: $cargoExtra,
                                                motivoCargo: $motivoCargo,
                                                precioFinal: $precioFinal,
                                                urlImage: $urlImage,
                                                stock: $stock,
                                                existActual: $existActual,
                                                fechaCaducidad: $fechaCaducidad
                                            };
                                console.log(JSON.stringify($objItem));
                                $idNameItem = false;
                                $idURLItem = null;
                                $.ajax({
                                    type: "POST",
                                    url: '<?=site_url("../../item/addNewItem")?>',
                                    data: $objItem,
                                    dataType: "JSON",
                                }).done(function( data ) {
                                    //alert( "Data Loaded: " + data );
                                    $idNameItem = data.idNameItem;
                                    $idURLItem = data.idURLItem;
                                    alert($idNameItem+" : "+$idURLItem);
                                    console.log("\n\nDataMSG: "+JSON.stringify(data)+"\n");
                                });
                                var file = $("#input-addImageItem")[0].files[0];
                                var fileName = file.name;
                                fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
                                var fileSize = file.size;
                                var fileType = file.type;
                                showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
                                var formData = new FormData($("#frm_addImageItem")[0]);
                                var message = "";
                                function showMessage(message){
                                    $("#output-success-file").html("").show();
                                    $("#output-success-file").html(message);
                                }
                                function isImage(extension){
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
                                if(isImage(fileExtension)){
                                    $.ajax({
                                        url: '<?=base_url()?>index.php/item/upload_file',  
                                        type: 'POST',
                                        data: formData,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        beforeSend: function(){
                                            message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                                            showMessage(message);     
                                        },
                                        success: function(data){
                                            console.log("Request: "+data);
                                            message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                                            showMessage(message);
                                        },
                                        error: function(){
                                            message = $("<span class='error'>Ha ocurrido un error.</span>");
                                            showMessage(message);
                                        }
                                    });
                                }
                            });
                        });
                    }
                });
            });
        });
    </script>
</head>
<body class="metro" style="background-image: url('<?=base_url()?>assets/img/Penguins.jpg'); background-size: 100% 100%; background-attachment: fixed; background-repeat: no-repeat;">
