<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title> Sistema TPV </title>
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

     <!-- Metro UI CSS JavaScript plugins -->
     <script src="<?php echo base_url()?>assets/js/start-screen.js"></script>
    <script text="text/javascript">
    $(function(){
        if ((document.location.host.indexOf('.dev') > -1) || (document.location.host.indexOf('modernui') > -1) ) {
            $("<script/>").attr('src', '<?php echo base_url()?>assets/js/metro/metro-loader.js').appendTo($('head'));
        } else {
            $("<script/>").attr('src', '<?php echo base_url()?>assets/js/metro.min.js').appendTo($('head'));
        }
    });
    </script>

<script type="text/javascript">
$(document).ready(function(){
	$(function(){
        $('#itemsTable-2').dataTable( {
  		    "bProcessing": true,
            "sAjaxSource": "<?php echo base_url()?>index.php/item/getAllItems",
            "aoColumns": [
	            { "mData": "id" },
	            { "mData": "imagen" },
	            { "mData": "nombre" },
	            { "mData": "descripcion" },
	            { "mData": "cantidad" },
	            { "mData": "precio_unitario" },
	            { "mData": "precio_final" }
            ]
        });
    });
});
</script>
</head>
<body class="metro" style="background-image: url('<?php echo base_url()?>assets/img/Penguins.jpg'); background-size: 100% 100%; background-attachment: fixed; background-repeat: no-repeat;">


<div id="items" style="width: 48%; height: 66%; max-height: 66%; overflow: scroll; background-color: white; padding: 22px;display: inline-block; vertical-align:top; ">
	<table id="itemsTable-2"> 
		<thead>
			<tr>
				<th class="text-left">ID</th> 
				<th class="text-left">Imagen</th>
				<th class="text-left">Nombre</th>
				<th class="text-left">Descripción</th>
				<th class="text-left">Cantidad</th>
				<th class="text-left">Precio Unitario</th>
				<th class="text-left">Precio de Venta</th>
			</tr>
		</thead>
		<tbody>
		</tbody>	
	</table>
</div>
<div id="items-selected" style="display: inline-block; vertical-align:top; width: 36%; height: 66%; max-height: 66%; overflow: scroll; background-color: white;">
	<table id="itemsTable-3">
		<tr><td>
			<img src="http://localhost/SmartForSales/files/FDr3Oxov3aCnD-20141128.jpg" style="width: 120px; height: 120ppx;"  />
			Cantidad: 1 - Precio: $500
		</td></tr>
	</table>
</div>

</body>
</html>