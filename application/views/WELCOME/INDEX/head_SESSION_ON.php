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
                                            '</tr>'+
                                        '</tfoot>'+
                                    '</table>'+
                                    '</div>';
                        content.html($content);
                        
                        $(function(){
                            $('#itemsTable-1').dataTable( {
                                "bProcessing": true,
                                "sAjaxSource": "<?=base_url()?>data/dataTables-objects.txt",
                                "aoColumns": [
                                    { "mData": "engine" },
                                    { "mData": "browser" },
                                    { "mData": "platform" },
                                    { "mData": "version" },
                                    { "mData": "grade" }
                                ]
                            } );
                        });

                    }
                });
            });
        });
    </script>
</head>
<body class="metro" style="background-image: url('<?=base_url()?>assets/img/Penguins.jpg'); background-size: 100% 100%; background-attachment: fixed; background-repeat: no-repeat;">
