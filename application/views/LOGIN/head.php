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
    <script>
        $(document).ready(function () {
            $.Metro.initDropdowns();
        });
    </script>
    <script> 
        $(document).ready(function(){
            $.Dialog({
                overlay: true,
                shadow: true,
                flat: true,
                icon: '<i class="icon-rocket"></i>',
                title: 'Cargando...',
                content: '',
                width: '50%',
                padding: 10,
                overlayClickClose: false,
                sysButtons: { btnClose: false, btnMin: false, btnMax: false },
                onShow: function(_dialog){
                    var content = '<h3 style="text-align: center" style="display:block;">Espere un momento por favor.</h3>'+
                                  '<img src="<?=base_url()?>assets/img/gif/ajax-loader.gif" style="margin-left: auto; margin-right: auto; margin-top: 50px; display: block;">';
                      $.Dialog.content(content);     
                }
            });
            $redirect = <?=$redirect?>;
            if($redirect == 1){
                $url = <?='"'.$redirectToURL.'"'?>;
                setTimeout(function(){
                    $(location).attr('href',$url);
                }, 1600);
                //alert($url);
            }
        });
    </script>
    <script src="<?=base_url()?>assets/js/start-screen.js"></script>
</head>
<body class="metro" style="background-image: url('<?=base_url()?>assets/img/Penguins.jpg'); background-size: 100% 100%; background-attachment: fixed; background-repeat: no-repeat;">
