<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		function showMessage(message){
            $("#output-success-file").html("").show();
            $("#output-success-file").html(message);
        }
        $("#submit_item").click(function(event){
        	event.preventDefault(); 
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
	                message = $("<span class='success'>La imagen ha subido correctamente.</span>");
	                showMessage(message);
	            },
	            error: function(){
	                message = $("<span class='error'>Ha ocurrido un error.</span>");
	                showMessage(message);
	            }
	        });
	    });
	});
</script>
</head>
<body>
	<form enctype="multipart/form-data" id="frm_data">
		<table id="form_addItem">
			<tr>
				<td style="padding: 6px;">
					<label for="codebar">Código de Barras </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="codebar" style="text-align: right" name="codebar" pattern="[0-9]{5,120}" placeholder="Ej. 12345" required="required"/>
				    </div>
				</td>
				<td style="padding: 6px;">
					<div class="input-control switch margin10" data-role="input-control">
		                <label>
		                   	Agregar IVA: 
		                    <input type="checkbox" id="checkIVA" name="checkIVA" value="0">
		                    <span class="check"></span>
		                </label>
		           	</div>
				</td>
				<td style="padding: 6px;">
					<!--<label for="iva">(%): </label>-->
					<div class="input-control text size2 block" data-role="input-control">
				        <input type="text" id="iva" style="text-align: right" name="iva" placeholder="Ej. 16.00" disabled="disabled"/>
				    </div>
				</td>
				<td rowspan="2" style="padding: 6px;">
		                <image id="picItem" src="<?=base_url()?>assets/img/show/new-product.jpg" style="width: 220px; height: 180px; margin: auto; display: block;" class="shadow" />
		               <div class="input-control file" data-role="input-control">
		                <input id="input-addImageItem" name="input-addImageItem" type="file" tabindex="-1" style="z-index: 1000; width: 100%; height: 100%;"><input type="text" id="__input_file_item__" readonly="" style="z-index: 1; cursor: default;" value="Click Aquí">
		                <button class="btn-file" type="button"></button>
		            </div>
		        </td>
			</tr>
			<tr>
				<td style="padding: 6px;">
					<label for="name-item">Nombre del artículo: </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="name-item" name="name-item" pattern="[a-z0-9]{1,79}" placeholder="Ej. Smart Tv 20\'\'" required="required"/>
				    </div>
				</td>
				<td style="padding: 6px;">
					<label for="cantidad">Existencia Tope (stock): </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="cantidad" style="text-align: right" name="cantidad" placeholder="Ej. 26" required="required"/>
				    </div>
				</td>
				<td style="padding: 6px;">
					<label for="cantidad">Existencia Actual: </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="cantidad_actual" style="text-align: right" name="cantidad_actual" placeholder="Ej. 15" required="required"/>
				    </div>
				</td>
			</tr>
			<tr>	
				<td style="padding: 6px;">
					<label for="description">Descripción: </label>
					<textarea id="description" name="description" class="size3 block" style="overflow: vertical; minheight:90px; height: 90px; font-family: inherit;"></textarea>
				</td>
				<td style="padding: 6px;">
					<label for="precio_unitario"> Precio Unitario ($): </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="precio_unitario" style="text-align: right" name="precio_unitario" placeholder="Ej. 1500.00" required="required"/>
				    </div>
				</td>
				<td style="padding: 6px;">
					<label for="precio_unitario"> Cargo IVA ($): </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="cargo_iva" style="text-align: right" name="cargo_iva" placeholder="Ej. 240.00" disabled="disabled" />
				    </div>
				</td>
				<td>
					<label for="precio_unitario"> Precio Final de Venta ($): </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="precio_final" style="text-align: right" name="precio_final" placeholder="Ej. 1740.00" required="required"/>
				    </div>
				</td>
			</tr>
			<tr>
				<td>	
					<label for="">Fecha de Caducidad (aaaa-mm-dd): </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="fecha_caducidad" style="text-align: right" name="fecha_caducidad" placeholder="Ej. 2014-11-09"/>
				    </div>
				</td>
				<td>	
					<label for="cargo_extra">Cargo Extra ($): </label>
					<div class="input-control text size3 block" data-role="input-control">
				        <input type="text" id="cargo_extra" style="text-align: right" name="cargo_extra" placeholder="Ej. 7.90"/>
				    </div>
				</td>
				<td>
					<label for="cargo_extra">Motivos del Cargo: </label>
					<textarea id="motivo_del_cargo" name="motivo_del_cargo" class="size3 block" style="overflow: vertical; minheight:90px; height: 90px; font-family: inherit;" placeholder="Ejemplo: Costo del Empaque."></textarea>
				</td>
				<td>
					<div class="tile double">
						<div class="tile-content icon">
		                	<i class="icon-cart-2 fg-gray"></i>
		                </div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
				<td>
					<input type="button" id="submit_item" name="submit_item" class="primary size3 block large" value="Guardar Artículo" />
				</td>
			</tr>
		</table>
	</form>
	<div id="output-success-file">- - - - - - - - - - - - - - - </div>
	<?php 
		$fecha = date("Ymd");
		echo $fecha;
			$length = 10;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $randomString = '';
		    for ($i = 0; $i < $length; ++$i) {
		        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		    }
		    echo $randomString;
		
	?>
</body>
</html>
