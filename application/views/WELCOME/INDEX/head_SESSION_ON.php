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
                    sysButtons: { btnClose: true },
                    icon: '<i class="icon-plus"></i>',
                    title: 'Agregar un Artículo',
                    content: '',
                    overlayClickClose: false,
                    onShow: function(_dialog){
                        var content = _dialog.children('.content');
$content = '<table id="form_addItem">'+
'   <tr>'+
'       <td style="padding: 6px;">'+
'           <label for="nombre">Nombre: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="nombre" name="nombre" />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 8px;">'+
'           <label for="cantidad">Cantidad: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="number" id="cantidad" name="cantidad" />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="precio_total">Costo Total ($): </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="precio_total" name="precio_total" placeholder="0.00" style="text-align: right;" />'+
'           </div>'+
'       </td>'+
'       <td rowspan="2" style="padding: 6px;">'+
'                <image id="picItem" src="<?=base_url()?>assets/img/show/new-product.jpg" style="width: 220px; height: 180px; margin: auto; display: block;" class="shadow" />'+
'               <div class="input-control file" data-role="input-control">'+
'                <input id="input-addImageItem" type="file" tabindex="-1" style="z-index: 1000; width: 100%; height: 100%;"><input type="text" id="__input_file_item__" readonly="" style="z-index: 1; cursor: default;" value="Click Aquí">'+
'                <button class="btn-file" type="button"></button>'+
'            </div>'+
'       </td>'+
'    </tr>'+
'    <tr>'+
'       <td style="padding: 6px;">'+
'           <label for="descripcion">Descripción: </label>'+
'           <div class="input-control textarea size3" data-role="input-control">'+
'               <textarea id="descripcion" name="descripcion"></textarea>'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="fecha_caducidad">Fecha de Caducidad: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="fecha_caducidad" name="fecha_caducidad" />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="precio_unitario">Precio Unitario ($): </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="precio_unitario" name="precio_unitario" placeholder="0.00" style="text-align: right;" />'+
'           </div>'+
'       </td>'+
'    </tr>'+
'    <tr>'+
'       <td style="padding: 6px;">'+
'           <label for="color">Color: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="color" name="color" placeholder="Ej. Azul" />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="materiales">Materiales </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="materiales" name="materiales" placeholder="Ej. Aluminio" />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="accesorios">Accesorios </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="accesorios" name="accesorios" placeholder="Ej: Cargador, Audifonos, Bocina." />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="iva">IVA (%): </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="iva" name="iva" style="text-align: right;" placeholder="Ej: 16.00" />'+
'           </div>'+
'       </td>'+
'    </tr>'+
'    <tr>'+
'       <td style="padding: 6px;">'+
'           <label for="talla">Talla: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="talla" name="talla" style="text-align: right;" placeholder="Ej. 28.5" />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="ingredientes">Ingredientes: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="ingredientes" name="ingredientes" placeholder="Ej. Arroz, Pescado, Elote." />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="medida">Medida: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="medida" name="medida" placeholder="Ej. Arroz, Pescado, Elote." />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="precio_final">Precio Final de Venta ($): </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" style="text-align: right;" id="precio_final" name="precio_final" placeholder="Ej. 789.50" />'+
'           </div>'+
'       </td>'+
'    </tr>'+
'    <tr>'+
'       <td style="padding: 6px;">'+
'           <label for="tela">Tela: </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" style="text-align: left;" id="tela" name="tela" placeholder="Ej. Seda." />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="cargo_extra">Cargo Extra (%): </label>'+
'           <div class="input-control text size3" data-role="input-control">'+
'               <input type="text" id="cargo_extra" name="cargo_extra" style="text-align: right;" placeholder="0.00" />'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <label for="motivos_del_cargo">Motivos del Cargo: </label>'+
'           <div class="input-control textarea size3" data-role="input-control">'+
'               <textarea id="motivos_del_cargo" name="motivos_del_cargo"></textarea>'+
'           </div>'+
'       </td>'+
'       <td style="padding: 6px;">'+
'           <input type="submit" id="submit_item" name="submit_item" value="Guardar Artículo" class="primary large" style="margin:auto; display:block;" />'+
'       </td>'+
'    </tr>'+
'</table>';

                        content.html($content);
                        $(function(){
                            
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#picItem').attr('src',e.target.result);
                                        $fileURL = $("#input-addImageItem").val();
                                        $('#__input_file_item__').attr('value',$fileURL);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $("#input-addImageItem").change(function(){
                                readURL(this);
                            });
                        });
                    }
                });
            });

        });
    </script>
</head>
<body class="metro" style="background-image: url('<?=base_url()?>assets/img/Penguins.jpg'); background-size: 100% 100%; background-attachment: fixed; background-repeat: no-repeat;">
