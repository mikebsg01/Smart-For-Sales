<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title> <?php echo $AppName?> </title>
	<link href="<?php echo base_url()?>assets/css/metro-bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>assets/css/metro-bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/css/iconFont.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
     
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.easing.1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.widget.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/metro-input-control.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/os/validator.upload.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/os/tpv.system.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/codebar/jquery-barcode.min.js"></script>

     <!-- Metro UI CSS JavaScript plugins -->
     <script src="<?php echo base_url()?>assets/js/start-screen.js"></script>
    <script type="text/javascript">
    $(function(){
        if ((document.location.host.indexOf('.dev') > -1) || (document.location.host.indexOf('modernui') > -1) ) {
            $("<script/>").attr('src', '<?php echo base_url()?>assets/js/metro/metro-loader.js').appendTo($('head'));
        } else {
            $("<script/>").attr('src', '<?php echo base_url()?>assets/js/metro.min.js').appendTo($('head'));
        }
    });
    </script>
    <script src="<?php echo base_url()?>assets/js/metro-dropdown.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.Metro.initDropdowns();
            <?php if( $error_upload == 1 ){ ?>
                $.Dialog({
                    overlay: true,
                    shadow: true,
                    flat: true,
                    padding: 10,
                    icon: '<i class="icon-warning"></i>',
                    title: '<?php echo $error_upload_title?>',
                    content: '',
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        content.html('<?php echo $error_upload_content?>');
                    }
                });
            <?php } ?> 
            $("#TPV-System").click(function(){
                $.Dialog({
                    width: '92%',
                    height: '88%',
                    padding: 15,
                    overlay: true,
                    shadow: true,
                    flat: true,
                    icon: '<b style="margin-top: -8px; font-size:22px;">$</b>',
                    title: 'Sistema Punto de Venta',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        total = 0.00;
                        total_dollars = 0.00;
                        total_euros = 0.00;
                        var content = _dialog.children('.content');
                        $windowDialog = $('.content').parent();
                        $windowDialog.css({overflow:'scroll','overflow-x':'hidden'});
$content = ''+
'<div id="TPV-System-content" style="background-color:#CCC;width:99%;padding:10px; background-color:red;">'+
'    <table id="TPV-System-table" style="width:99%;">'+
'        <tr>'+
'            <td>'+
'                <div style="background-color:yellow;margin-right:auto;width:54%;vertical-align:top;">'+
'                    <p style="display:inline-block;"> ($) Valor del Dólar: </p> '+
'                    <p id="tpv-dollar" style="display:inline-block;">$12.35  MXN</p> '+
'                </div>'+
'            </td>'+
'            <td style="width:344px;">'+
'                  <img src="<?php echo base_url()?>assets/img/Windows-8-Logo.png" style="width:32px; height:32px;display:inline-block;vertical-align:center;" /><h3 style="display:inline-block;vertical-align:top;" id="tpv-enterprise">&nbsp;Smart For Sales</h3>'+ 
'            </td>'+
'            <td> '+
'                <div style="background-color:yellow;margin-left:auto;width:54%;vertical-align:top;">'+
'                    <p style="display:inline-block;"> Atiende: </p> '+
'                    <p id="tpv-employee" style="display:inline-block;"><?=$userdata["usuario"]?></p> '+
'                </div>'+
'            </td>'+
'        </tr>'+
'        <tr>'+
'            <td>'+
'                <div style="background-color:yellow;margin-right:auto;width:54%;vertical-align:top;">'+
'                    <p style="display:inline-block;"> (€) Valor del Euro: </p> '+
'                    <p id="tpv-euro" style="display:inline-block;">$18.55  MXN</p> '+
'                </div>'+
'            </td>'+
'            <td></td>'+
'            <td> '+
'                <div style="background-color:yellow;margin-left:auto;width:54%;">'+
'                    <p style="display:inline-block;"> Fecha: </p> '+
'                    <p id="tpv-date" style="display:inline-block;"><?php echo date("d/m/y"); ?></p> '+
'                </div>'+
'            </td>'+
'        </tr>'+
'    </table>'+
'    <div id="tpv-addItems" style="display:inline-block;vertical-align:top;width:50% !important; height: 314px; max-height: 314px; overflow:scroll;overflow-x:hidden; background-color:green">'+
'       <table id="tpv-allItems" style="width: 98%;" class="table striped hovered dataTable" id="itemsTable-1">'+
'           <thead>'+
'               <tr>'+
'                   <th class="text-left"># Código de Barras</th>'+
'                   <th class="text-left">Producto</th>'+
'                   <th class="text-left">Nombre</th>'+
'                   <th class="text-left">Cantidad</th>'+
'                   <th class="text-left">Precio Unitario</th>'+
'                   <th class="text-left">IVA</th>'+
'                   <th class="text-left">Precio de Venta</th>'+
'                   <th class="text-left">Agregar</th>'+
'               </tr>'+
'            </thead>'+
'            <tbody>'+
'            </tbody>'+
'            <tfoot>'+
'               <tr>'+
'                   <th class="text-left"># Código de Barras</th>'+
'                   <th class="text-left">Imagen</th>'+
'                   <th class="text-left">Nombre</th>'+
'                   <th class="text-left">Cantidad</th>'+
'                   <th class="text-left">Precio Unitario</th>'+
'                   <th class="text-left">IVA</th>'+
'                   <th class="text-left">Precio de Venta</th>'+
'                   <th class="text-left">Agregar</th>'+
'               </tr>'+
'            </tfoot>'+
'       </table>'+
'   </div>'+
'   <div id="itemsSelected" style="background-color:blue;margin-left:7px;display:inline-block;vertical-align:top;width:48% !important; height: 314px; max-height: 314px; overflow:scroll;overflow-x:hidden;">'+
'       <table style="witdth:99% !important;" class="table striped hovered dataTable">'+
'           <thead style="width:100% !important;">'+
'               <tr style="width:100% !important;">'+
'                   <th style="width:5%;">Codigo de Barras</th>'+
'                   <th style="width:22%;">Producto</th>'+
'                   <th style="width:22%;">Cantidad</th>'+
'                   <th style="width:22%;">Precio Unitario</th>'+
'                   <th>IVA</th>'+
'                   <th>Precio de Venta</th>'+
'                   <th style="width:22%;">Subtotal</th>'+
'               </tr>'+
'           </thead>'+
'           <tbody>'+
'           </tbody>'+
'       </table>'+
'   </div>'+
'   <div style="background-color: gray;color:white !important;width:99% !important;margin-top:8px;padding:2px;">'+
'       <div style="background-color:#f1f1f1;width:76%;height:99%;display:inline-block;vertical-align:top;">'+
'           <table>'+
'               <tr>'+
'                   <td><button class="info large" onClick="resetTPV();">Limpiar &nbsp;<i class="icon-remove"><i/></button></td>'+
'                   <td><button class="info large" onClick="saleTPV();">Realizar Venta <i class="icon-checkmark"><i/></button></td>'+
'               </tr>'+
'           </table>'+
'       </div>'+
'       <div style="background-color:pink;width:22%;display:inline-block;vertical-align:top;">'+
'           <h3 style="background-color:white;width:254px;margin:auto;margin-top:10px;text-align:center;">Total: $ <b id="tpv-total">0.00</b> MXN</h3>'+
'           <h3 style="background-color:white;width:254px;margin:auto;margin-top:10px;text-align:center;">Dollars: $ <b id="tpv-total-dollars">0.00</b></h3>'+
'           <h3 style="background-color:white;width:254px;margin:auto;margin-top:10px;margin-bottom:10px;text-align:center;">Euros: € <b id="tpv-total-euros">0.00</b></h3>'+
'       </td>'+
'   </div>'+
'</div>';
                        
                    
                        content.html($content);
                        $("#itemsSelected tbody").empty();
                        $('#tpv-allItems').dataTable( {
                                "bProcessing": true,
                                "sAjaxSource": "<?php echo base_url()?>index.php/item/TPVgetAllItems",
                                "aoColumns": [
                                    { "mData": "codebar" },
                                    { "mData": "imagen" },
                                    { "mData": "nombre" },
                                    { "mData": "cantidad" },
                                    { "mData": "precio_unitario" },
                                    { "mData": "iva" },
                                    { "mData": "precio_final" },
                                    { "mData": "agregar" }
                                ]
                            } );
                        $.getJSON("<?php echo base_url()?>index.php/datacenter/getForeignCurrency", function( data ) {
                            console.log(data);
                            val_dollar = parseFloat(data.data.dollar);
                            val_euro = parseFloat(data.data.euro);
                            $("#tpv-dollar").text(val_dollar.toFixed(2)+' MXN');
                            $("#tpv-euro").text(val_euro.toFixed(2)+' MXN');
                        });
                        $.getJSON("<?php echo base_url()?>index.php/item/getNumberItems", function( data ) {
                            console.log(data);
                            if(data.numItems == 0){
                                alert("No hay artículos guardados en la Base de Datos.");
                            }
                        });
                    }
                });
            });
            $("#company-data").click(function(){
                $.Dialog({
                    width: '42%',
                    height: '79%',
                    padding: 0,
                    overlay: true,
                    shadow: true,
                    draggable: true,
                    flat: true,
                    icon: '<i class="icon-briefcase"></i>',
                    title: 'Datos de la Empresa',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        $windowDialog = $('.content').parent();
                        $content = ' '+ 
                        '<style type="text/css">'+
                        '#companyData-content input, #companyData-content textarea { '+ 
                        '   border: 0;'+  
                        '   cursor:not-allowed;'+
                        ' }'+
                        '</style>'+
                        '<div id="companyData-content" style="witdth:100%;height:400px;max-height:400px;overflow:scroll;overflow-x:hidden;display:block;margin:auto;padding:15px;">'+
                        '   <h1 id="title-company">Datos de la Empresa</h1>'+
                        '   <br/><form enctype="multipart/form-data" id="frmDataCompany">'+
                        '   <img id="company-logo-view" src="<?php echo base_url()?>assets/img/no_disponible.png" style="width: 190px;height:140px;margin:auto;" />'+
                        '   <br/><br/><input type="file" id="company-logo" style="display:none;" />'+
                        '   <div id="output-warning-file" class="notice marker-on-top bg-darkRed fg-white" style="display: none;"> </div>'+
                        '   <div id="output-success-file" class="notice marker-on-top bg-green fg-white" style="display: none;"> </div>'+ 
                        '   <br/><br/>'+
                        '   <table id="companyData-Table">'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyName-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Nombre de la Empresa: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-name" name="company-name" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyChief-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Dueño de la Empresa o Gerente: '+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-chief" name="company-chief" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyIndustry-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Tipo de Industria: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-industry" name="company-industry" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyServices-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Servicios: &nbsp;'+
                        '                       <div class="input-control textarea size3 block" data-role="input-control">'+
                        '                           <textarea type="text" id="company-services" name="company-services"></textarea>'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyCountry-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> País: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-country" name="company-country" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyDesignation-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Denominación: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-designation" name="company-designation" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyState-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Estado: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-state" name="company-state" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyCity-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Ciudad: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-city" name="company-city" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyPhone-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Teléfono: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-phone" name="company-phone" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyAddress-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Dirección: &nbsp;'+
                        '                       <div class="input-control textarea size3 block" data-role="input-control">'+
                        '                           <textarea type="text" id="company-address" name="company-address"></textarea>'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyPostal-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Código Postal: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-postal" name="company-postal" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '       <tr>'+
                        '           <td>'+
                        '               <div id="companyWebsite-field" class="field-set">'+
                        '                   <label style="display:inline-block;vertical-align:center;"> Sitio Web: &nbsp;'+
                        '                       <div class="input-control text size3 block" data-role="input-control">'+
                        '                           <input type="text" id="company-website" name="company-website" />'+
                        '                       </div>'+
                        '                   </label>'+
                        '               </div>'+
                        '           </td>'+
                        '       </tr>'+
                        '   </table></form>'+
                        '</div>'+
                        '<div class="control-set" style="margin:auto;display:block;">'+
                        '    <button id="editDataCompany" class="btn primary" style="display:inline-block;vertical-align:center;">Editar Información <i class="icon-pencil"></i></button>'+
                        '    <button id="saveData" class="btn success" style="display:none;"> Listo </button>'+
                        '    <button id="cancel" class="btn danger" style="display:none;"> Cancelar </button>'+
                        '</div>';
                        content.html($content);
                        $.getJSON("<?php echo base_url()?>index.php/datacenter/getDataCompany", function( data ) {
                            $("#company-name").val(data.allData[0].nombre);
                            $("#company-chief").val(data.allData[0].gerente);
                            $("#company-industry").val(data.allData[0].industria);
                            $("#company-services").val(data.allData[0].servicios);
                            $("#company-country").val(data.allData[0].pais);
                            $("#company-designation").val(data.allData[0].denominacion);
                            $("#company-state").val(data.allData[0].estado);
                            $("#company-city").val(data.allData[0].ciudad);  
                            $("#company-phone").val(data.allData[0].telefono);
                            $("#company-address").val(data.allData[0].direccion);
                            $("#company-postal").val(data.allData[0].codigopostal);
                            $("#company-website").val(data.allData[0].website);    
                        });
                        $(function(){
                             function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        if(isDataCorrect('#company-logo', e.target.result, '#output-warning-file')){
                                            $('#company-logo-view').attr('src',e.target.result);
                                        } else {
                                            $('#company-logo').attr('value',' ');
                                            $('#company-logo-view').attr('src','<?php echo base_url()?>assets/img/show/new-product.jpg');
                                        }
                                    }
                                    console.log(input.files[0]);
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#company-logo").change(function(){
                                readURL(this);
                            });
                            $("#companyData-content input[type='text'],#companyData-content textarea").each(function(){
                               $(this).prop("disabled",true);
                            });
                            $("#editDataCompany").click(function(event){
                                event.preventDefault();
                                $("#companyData-content input[type='text'],#companyData-content textarea").each(function(){
                                    $(this).css({'border':'1px solid #c9c9c9','cursor':'auto'});
                                    $(this).prop("disabled",false);
                                });
                                $("#company-logo").show();
                                $("#saveData").show();
                                $("#cancel").show();
                                $(this).hide();
                            });
                            $("#cancel").click(function(event){
                                event.preventDefault();
                                $("#companyData-content input[type='text'],#companyData-content textarea").each(function(){
                                    $(this).css({'border':'0','cursor':'not-allowed'});
                                    $(this).prop("disabled",true);
                                });
                                $("#company-logo").hide();
                                $("#saveData").hide();
                                $(this).hide();
                                $("#editDataCompany").show();
                            });
                            $("#saveData").click(function(){
                                    var formData = new FormData($("#frmDataCompany")[0]);
                                    $.ajax({
                                    url: '<?php echo base_url()?>index.php/datacenter/updateData',  
                                    type: 'POST',
                                    data: formData,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    beforeSend: function(){
                                        message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                                        //showMessage(message);     
                                    },
                                    success: function(data){
                                        message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                                        //showMessage(message);
                                        data = ''+data+' ';
                                        var obj = jQuery.parseJSON(data);
                                        console.log(obj);
                                        $("#cancel").hide();
                                        $("#company-logo").hide();
                                        $("#editDataCompany").show();
                                        $("#saveData").hide();
                                        $("#companyData-content input[type='text'],#companyData-content textarea").each(function(){
                                            $(this).css({'border':'0','cursor':'not-allowed'});
                                            $(this).prop("disabled",true);
                                        });
                                    },
                                    error: function(){
                                        alert("Error del Servidor\nOcurrió un error al actualizar los datos. Por favor intentelo más tarde.");
                                        message = $("<span class='error'>Ha ocurrido un error.</span>");
                                        //showMessage(message);
                                    }
                                });
                            });
                        });
                    }
                });
            });
            $("#management-of-items").click(function(){
                $.Dialog({
                    width: '94%',
                    height: '92%',
                    padding: 15,
                    overlay: true,
                    shadow: true,
                    flat: true,
                    icon: '<i class="icon-clipboard-2"></i>',
                    title: 'Gestión de Articulos',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        $windowDialog = $('.content').parent();
                        //$windowDialog.css({overflow:'scroll'});
                        $content =  '<h3 style="width:32% !important;display:block;vertical-align:top;margin-right:auto;float:left;">¡Bienvenido este es tu Inventario!</h3>'+
                                    '<h3 style="width:32% !important;font-size:18px;display:block;vertical-align:top;margin-left:auto !important;">Cuentas con una mercancía de: $<b id="total-mercancia">0.00 MXN</b></h3>'+
                                    '<div style="width:100% !important; height:420px !important;max-height:420px !important;overflow:scroll;overflow-x:hidden;display:block;margin:auto;">'+
                                        '<table class="table striped hovered dataTable" id="itemsTable-1">'+
                                            '<thead>'+
                                                '<tr>'+
                                                    '<th class="text-left"># ID</th>'+
                                                    '<th class="text-left">Producto</th>'+
                                                    '<th class="text-left">Código de Barras</th>'+
                                                    '<th class="text-left">Nombre</th>'+
                                                    '<th class="text-left" style="max-width:120px !important;">Descripción</th>'+
                                                    '<th class="text-left">Cantidad</th>'+
                                                    '<th class="text-left">Precio Unitario</th>'+
                                                    '<th class="text-left">Precio de Venta</th>'+
                                                    '<th class="text-left">Mercancía ($)</th>'+
                                                    '<th class="text-left">Modificar Datos</th>'+
                                                '</tr>'+
                                            '</thead>'+
                                            '<tbody>'+
                                            '</tbody>'+
                                            '<tfoot>'+
                                                '<tr>'+
                                                    '<th class="text-left"># ID</th>'+
                                                    '<th class="text-left">Imagen</th>'+
                                                    '<th class="text-left">Código de Barras</th>'+
                                                    '<th class="text-left">Nombre</th>'+
                                                    '<th class="text-left" style="max-width:120px !important;">Descripción</th>'+
                                                    '<th class="text-left">Cantidad</th>'+
                                                    '<th class="text-left">Precio Unitario</th>'+
                                                    '<th class="text-left">Precio de Venta</th>'+
                                                    '<th class="text-left">Mercancía ($)</th>'+
                                                    '<th class="text-left">Modificar Datos</th>'+
                                                '</tr>'+
                                            '</tfoot>'+
                                        '</table>'+
                                        '</div>';
                        content.html($content);
                         $.getJSON("<?php echo base_url()?>index.php/item/getValMerc", function( data ) {
                            var val_tmp = parseFloat(data.totalMerc);
                            $("#total-mercancia").text(" "+val_tmp.toFixed(2)+" MXN");
                        });
                        $(function(){
                            $('#itemsTable-1').dataTable( {
                                "bProcessing": true,
                                "sAjaxSource": "<?php echo base_url()?>index.php/item/getAllItems",
                                "aoColumns": [
                                    { "mData": "id" },
                                    { "mData": "imagen" },
                                    { "mData": "codebar" },
                                    { "mData": "nombre" },
                                    { "mData": "descripcion" },
                                    { "mData": "cantidad" },
                                    { "mData": "precio_unitario" },
                                    { "mData": "precio_final" },
                                    { "mData": "mercancia" },
                                    { "mData": "editar" }
                                ]
                            } );
                        });
                         $.getJSON("<?php echo base_url()?>index.php/item/getNumberItems", function( data ) {
                            console.log(data);
                            if(data.numItems == 0){
                                alert("No hay artículos guardados en la Base de Datos.");
                            }
                        });
                    }
                });
            });
            $("#add-item").click(function(){
                $.Dialog({
                    width: '68%',
                    height: '92%',
                    draggable: true,
                    padding: 0,
                    overlay: true,
                    shadow: true,
                    flat: true,
                    icon: '<i class="icon-plus"></i>',
                    title: 'Agregar un Artículo',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        $windowDialog = $('.content').parent();
                        $content = '<form enctype="multipart/form-data" id="frm_data">'+ 
                        '   <div id="itemFormDiv" style="width:100%;height:500px;max-height:500px;overflow:scroll;overflow-x:hidden;padding:10px;">'+
                        '       <table id="form_addItem">'+
                        '           <tr>'+
                        '               <td style="padding: 6px;">'+
                        '                   <label for="codebar">Código de Barras </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="codebar" style="text-align: right" name="codebar" pattern="[0-9]{5,120}" placeholder="Ej. 12345" required="required"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td style="padding: 6px;">'+
                        '                   <div class="input-control switch margin10" data-role="input-control">'+
                        '                       <label>'+
                        '                           Agregar IVA: '+
                        '                           <input type="checkbox" id="checkIVA" name="checkIVA" value="0">'+
                        '                           <span class="check"></span>'+
                        '                       </label>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td style="padding: 6px;">'+
                        '                   <!--<label for="iva">(%): </label>-->'+
                        '                   <div class="input-control text size2 block" data-role="input-control">'+
                        '                       <input type="text" id="iva" style="text-align: right" name="iva" placeholder="Ej. 16.00" disabled="disabled"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td rowspan="2" style="padding: 6px;">'+
                        '                       <image id="picItem" src="<?=base_url()?>assets/img/show/new-product.jpg" style="width: 220px; height: 180px; margin: auto; display: block;" class="shadow" />'+
                        '                  <div class="input-control file" data-role="input-control">'+
                        '                       <input id="input-addImageItem" name="input-addImageItem" type="file" tabindex="-1" style="z-index: 1000; width: 100%; height: 100%;"><input type="text" id="__input_file_item__" readonly="" style="z-index: 1; cursor: default;" value="Click Aquí">'+
                        '                       <button class="btn-file" type="button"></button>'+
                        '                   </div>'+
                        '                   <div id="output-warning-file" class="notice marker-on-top bg-darkRed fg-white" style="display: none;"> </div>'+
                        '                   <div id="output-success-file" class="notice marker-on-top bg-green fg-white" style="display: none;"> </div>'+ 
                        '               </td>'+
                        '           </tr>'+
                        '           <tr>'+
                        '               <td style="padding: 6px;">'+
                        '                   <label for="name-item">Nombre del artículo: </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="name-item" name="name-item" pattern="[a-z0-9]{1,79}" placeholder="Ej. Smart Tv 20\'\'" required="required"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td style="padding: 6px;">'+
                        '                   <label for="cantidad">Existencia Tope (stock): </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="cantidad" style="text-align: right" name="cantidad" placeholder="Ej. 26" required="required"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td style="padding: 6px;">'+
                        '                   <label for="cantidad">Existencia Actual: </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="cantidad_actual" style="text-align: right" name="cantidad_actual" placeholder="Ej. 15" required="required"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '           </tr>'+
                        '           <tr>    '+
                        '               <td style="padding: 6px;">'+
                        '                   <label for="description">Descripción: </label>'+
                        '                   <textarea id="description" name="description" class="size3 block" style="overflow: vertical; minheight:90px; height: 90px; font-family: inherit;"></textarea>'+
                        '               </td>'+
                        '               <td style="padding: 6px;">'+
                        '                   <label for="precio_unitario"> Precio Unitario ($): </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="precio_unitario" style="text-align: right" name="precio_unitario" placeholder="Ej. 1500.00" required="required"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td style="padding: 6px;">'+
                        '                   <label for="precio_unitario"> Cargo IVA ($): </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="cargo_iva" style="text-align: right" name="cargo_iva" placeholder="Ej. 240.00" disabled="disabled" />'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td>'+
                        '                   <label for="precio_unitario"> Precio Final de Venta ($): </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="precio_final" style="text-align: right" name="precio_final" placeholder="Ej. 1740.00" required="required"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '           </tr>'+
                        '           <tr>'+
                        '               <td>    '+
                        '                   <label for="">Fecha de Caducidad (aaaa-mm-dd): </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="fecha_caducidad" style="text-align: right" name="fecha_caducidad" placeholder="Ej. 2014-11-09"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td>    '+
                        '                   <label for="cargo_extra">Cargo Extra ($): </label>'+
                        '                   <div class="input-control text size3 block" data-role="input-control">'+
                        '                       <input type="text" id="cargo_extra" style="text-align: right" name="cargo_extra" placeholder="Ej. 7.90"/>'+
                        '                   </div>'+
                        '               </td>'+
                        '               <td>'+
                        '                   <label for="cargo_extra">Motivos del Cargo: </label>'+
                        '                   <textarea id="motivo_del_cargo" name="motivo_del_cargo" class="size3 block" style="overflow: vertical; minheight:90px; height: 90px; font-family: inherit;" placeholder="Ejemplo: Costo del Empaque."></textarea>'+
                        '               </td>'+
                        '               <td>'+
                        '                   <div id="codebar-tag" class="tile double">'+
                        '                       <div class="tile-content icon">'+
                        '                           <i class="icon-cart-2 fg-gray"></i>'+
                        '                       </div>'+
                        '                   </div>'+
                        '               </td>'+
                        '           </tr>'+
                        '           <tr>'+
                        '               <td colspan="4">&nbsp;</td>'+
                        '           </tr>'+
                        '           <tr>'+
                        '               <td colspan="3">&nbsp;</td>'+
                        '               <td> &nbsp;'+
                        '               </td>'+
                        '           </tr>'+
                        '       </table>'+
                        '   </div>'+
                        '   <input type="button" id="submit_item" name="submit_item" class="primary size3 block large" value="Guardar Artículo" style="display:block !important;margin-right:48px !important;float:right !important;" />'+
                        '</form>';
                        content.html($content);
                        $("#codebar").keyup(function(e){
                            var $cb = $(this).val();
                            $("#codebar-tag").barcode(""+$cb+"", "ean13",{barWidth:2, barHeight:'100%'});
                        });
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
                                            $('#picItem').attr('src','<?php echo base_url()?>assets/img/show/new-product.jpg');
                                        }
                                    }
                                    console.log(input.files[0]);
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#input-addImageItem").change(function(){
                                readURL(this);
                            });
                            $("#checkIVA").click(function(e){
                                $status = $(this).val();
                                if($status == 0){
                                    $("#iva").prop("disabled",false);
                                    $("#cargo_iva").prop("disabled",false);
                                    $(this).val('1');
                                } else {
                                    $("#iva").prop("disabled",true);
                                    $("#cargo_iva").prop("disabled",true);
                                    $(this).val('0');
                                }
                            });
                            
                            $("#submit_item").click(function(event){
                                event.preventDefault();
                                //alert("Submit!");
                                function showMessage(message){
                                    $("#output-success-file").html("").show();
                                    $("#output-success-file").html(message);
                                }
                                var formData = new FormData($("#frm_data")[0]);
                                $.ajax({
                                    url: '<?php echo base_url()?>index.php/test/upload',  
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
                                        message = $("<span class='success'>El artículo se ha guardado correctamente.</span>");
                                        showMessage(message);
                                    },
                                    error: function(){
                                        message = $("<span class='error'>Ha ocurrido un error.</span>");
                                        showMessage(message);
                                    }
                                });
                            });
                        });
                    }
                });
            });
            $("#foreign-currency").click(function(){
                $.Dialog({
                    width: '33%',
                    height: '53%',
                    overlay: true,
                    flat: true,
                    shadow: true,
                    draggable: true,
                    padding: 10,
                    icon: '<i class="icon-dollar"></i>',
                    title: 'Moneda Extranjera',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
                        $content = '<h3 style="text-align:center;">Cambio de Moneda Extranjera</h3>'+
                        '<form id="frmForeignCurrency" method="post"><table>'+
                        '<tr>'+
                        '   <td>($) Valor del Dólar: &nbsp;</td><td>&nbsp;  <div class="input-control text size3 block" data-role="input-control"><input type="text" style="text-align:right;" id="dollar" name="dollar" placeholder="0.00" /></div></td>'+
                        '</tr>'+
                        '<tr>'+
                        '   <td>(€) Valor del Euro: &nbsp;</td><td>&nbsp;  <div class="input-control text size3 block" data-role="input-control"><input type="text" style="text-align:right;" id="euro" name="euro" placeholder="0.00" /></div></td>'+
                        '</tr>'+
                        '</table></form><br>'+
                        '<button id="saveValues" class="btn primary large size3" style="display:block;margin:auto;">Guardar</button>';
                        content.html($content);
                         $.getJSON("<?php echo base_url()?>index.php/datacenter/getForeignCurrency", function( data ) {
                            console.log(data);
                            $("#dollar").val(data.data.dollar);
                            $("#euro").val(data.data.euro);
                        });
                        $("#saveValues").click(function(){
                            //alert("Click");
                            var formData = new FormData($("#frmForeignCurrency")[0]); 
                            $.ajax({
                                url: '<?php echo base_url()?>index.php/datacenter/updateForeignCurrency',  
                                type: 'POST',
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                beforeSend: function(){
                                    message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                                    //showMessage(message);     
                                },
                                success: function(data){
                                    console.log("Request: "+data);
                                    alert("Datos actualizados correctamente! ");
                                },
                                error: function(){
                                    message = $("<span class='error'>Ha ocurrido un error.</span>");
                                    //showMessage(message);
                                }
                            });
                        });
                    }
                });
            });
        });
    </script>
</head>
<body class="metro" style="background-image: url('<?php echo base_url()?>assets/img/wallpaper-prov1.png'); background-size: 100% 100%; background-attachment: fixed; background-repeat: no-repeat;">
