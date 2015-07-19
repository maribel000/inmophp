<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:site_name" content="RedInmo.com">
<META name="description" content="red de inmobiliarias">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>RedInmo</title>

  <link href="<?php echo base_url();?>theme/dist/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>theme/dist/css/propio.css" rel="stylesheet">  
  <link href="<?php echo base_url();?>theme/css/navbar-fixed-top.css" rel="stylesheet">
  <link href="<?php echo base_url();?>theme/css/sticky-footer.css" rel="stylesheet">  
  <link href="<?php echo base_url();?>theme/assets/jquery/jquery-ui.css" type="text/css" rel="stylesheet">  
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>theme/assets/js/html5shiv.js"></script>
      <script src="<?php echo base_url(); ?>theme/assets/js/respond.min.js"></script>
    <![endif]-->  
</head>
<body>

<?php echo $menu; ?>

    <div class="container">
	<center>
<div style="max-width:900px">
<h1>Editar Aviso</h1>
<?php if(validation_errors()) {?> 
 <div class="alert alert-danger" role="alert" style="padding:4px"><?php echo validation_errors(); ?></div>
<?php } ?>


<form id="editar_aviso" name="editar_aviso" method="post" action="<?=base_url()?>avisos/editar/<?php echo $id; ?>" enctype="multipart/form-data">
<div class="form-group">
<div class="input-group"><?php 	  //echo "esssssssssssssss $tipo_op";?>
<span class="input-group-addon" style="min-width:180px">Tipo de operacion</span>
	<select name="tipoop" id="tipoop" class="form-control" data-toggle="popover" data-trigger="hover" data-content="Las ventas se hacen en dolares y los alquileres en pesos">
	  <?php 
		$opciones = '
    <option value="1">Venta</option>
    <option value="2">Alquiler</option>
    <option value="3">Alquiler temporario</option>';
	    $opciones = str_replace("value=\"$id_tipo_inmueble\"", "value=\"$id_tipo_inmueble\" selected", $opciones);
		echo $opciones;
	  ?>
	</select>
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Tipo de inmueble:</span>
<select name="tipoinm" id="tipoinm" class="form-control">
<?php 
  $opciones = '
            <option value="1">Casa</option>
            <option value="2">Garage</option>
            <option value="3">Departamento</option>
            <option value="4">PH</option>
            <option value="5">Countrie</option>
            <option value="6">Quinta</option>
            <option value="7">Terreno y/o lote</option>
            <option value="8">Campo y/o chacra</option>
            <option value="9">Local Comercial</option>
            <option value="10">Negocio y/o fondo de comercio</option>
            <option value="11">Oficina</option>
            <option value="12">Consultorio</option>
            <option value="13">Boveda, nicho y/o parcela</option>';
  $opciones = str_replace("value=\"$id_tipo_inmueble\"", "value=\"$id_tipo_inmueble\" selected", $opciones);
  echo $opciones;
 ?>
</select>
</div>
</div>
<br>
<div class="form-group">
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Ciudad:</span>
<input name="localidad" type="text" id="localidades" value="<?php echo $nombre_localidad;?>" class="form-control">
<input name="idLocalidad" type="hidden" id="idLocalidad" value="<?php echo $id_localidad;?>">
</div>

<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Barrio:</span>
<input name="barrio" type="text" id="barrio" value="<?php echo $nombre_barrio;?>" class="form-control">
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Direcci&oacute;n:</span>
<input name="direccion" type="text" id="direccion" value="<?php echo $direccion;?>" class="form-control" data-toggle="popover" data-trigger="hover" data-content="Direccion exacta para ubicar en google maps.">
</div>
<br>
</div>
<div class="form-group">
<br>
      <div class="row">
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Ambientes:</span>
			<input name="ambientes" type="text" id="ambientes" value="<?php echo $ambientes;?>" class="form-control">
			</div>		
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Dormitorios:</span>
			<input name="dormitorios" type="text" id="dormitorios" value="<?php echo $dormitorios;?>" class="form-control">
			</div>		
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Ba&ntilde;os:</span>
			<input name="banios" type="text" id="banios" value="<?php echo $banios;?>" class="form-control">
			</div>	
		</div>		
      </div>
	  <br>
      <div class="row">
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Metros2: </span>
			<input name="metros2" type="text" id="metros2" value="<?php echo $m2;?>" class="form-control">
			</div>	
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Estado:</span>
			<input name="estado" type="text" id="estado" value="<?php echo $estado_inmueble;?>" class="form-control">
			</div>
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">A&ntilde;o:</span>
			<input name="anio" type="text" id="anio" value="<?php echo $anio;?>" class="form-control">
			</div>
		</div>		
      </div>	  
	 <br/>

<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Precio:</span>
<input name="precio" type="text" id="precio" value="<?php echo $precio;?>" class="form-control">
</div>
<br>
</div>

                    

<div class="input-group">
	<span class="input-group-addon" style="min-width:180px;">Fotos:</span>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:11px;border: 1px solid grey;">
	  <tr>
		<td id="foto0form" style="margin-top:3em; background-color: #FFFFE0; border: 1px solid grey">
			<?php if (isset($foto_url[0])){?>
      <div class="row">	  
        <div class="col-md-4">Foto 1: <center><a href="javascript:cambiarfoto(0, '<?=@$foto_desc[0]?>');">[cambiar foto]</a></center><br><a href="#" class="thumbnail"><img src="<?=base_url();?><?=$foto_url[0]?>" width="100px"/></a></div>
        <div class="col-md-8">Texto descripcion foto 1:<input name="foto0desc" type="text" id="foto1desc" value="<?=@$foto_desc[0]?>" class="form-control"></div>
      </div>			
			<?php }else{ ?>
				<input name="foto0" type="file" id="foto0" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
				<br>descripcion:<input name="foto0desc" type="text" id="foto0desc" value="<?=@$foto_desc[0]?>" class="form-control">
			<?php } ?>		
		</td>
	  </tr>
	  <tr>
		<td id="foto1form" style="margin-top:3em; background-color: #FFFFE0; border: 1px solid grey">
			<?php if (isset($foto_url[1])){?>
      <div class="row">
        <div class="col-md-4">Foto 2: <center><a href="javascript:cambiarfoto(1, '<?=@$foto_desc[1]?>');">[cambiar foto]</a></center><br><a href="#" class="thumbnail"><img src="<?=base_url();?><?=$foto_url[1]?>" width="100px"/></a></div>
        <div class="col-md-8">Texto descripcion foto 2:<input name="foto1desc" type="text" id="foto1desc" value="<?=@$foto_desc[1]?>" class="form-control"></div>
      </div>			
			<?php }else{ ?>
				<input name="foto1" type="file" id="foto1" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
				<br>descripcion:<input name="foto1desc" type="text" id="foto1desc" value="<?=@$foto_desc[1]?>" class="form-control">
			<?php } ?>			
		</td>
	  </tr>
	  <tr>
		<td id="foto2form" style="margin-top:3em; background-color: #FFFFE0; border: 1px solid grey">
			<?php if (isset($foto_url[2])){?>
      <div class="row">
        <div class="col-md-4">Foto 3: <center><a href="javascript:cambiarfoto(2, '<?=@$foto_desc[2]?>');">[cambiar foto]</a></center><br><a href="#" class="thumbnail"><img src="<?=base_url();?><?=$foto_url[2]?>" width="100px"/></a></div>
        <div class="col-md-8">Texto descripcion foto 3:<input name="foto2desc" type="text" id="foto2desc" value="<?=@$foto_desc[2]?>" class="form-control"></div>
      </div>			
			<?php }else{ ?>
				<input name="foto2" type="file" id="foto2" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
				<br>descripcion:<input name="foto2desc" type="text" id="foto2desc" value="<?=@$foto_desc[2]?>" class="form-control">
			<?php } ?>		
		</td>
	  </tr>
	</table>
</div>


<br><br>
<div class="input-group">
<span class="input-group-addon" style="vertical-align:top; padding-top:30px; min-width:180px">Detalles:</span>
<textarea name="detalles" cols="35" rows="10" id="detalles" class="form-control" style="font-family:Courier New"><?php echo $detalles;?></textarea>
</div>
<br>

    <center><button id="botagregar" type="submit" class="btn btn-default btn-lg" name="save" >Guardar</button></center>
</form>
	
	</div>
	</center>
		
    </div> <!-- /container -->	


    <script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>theme/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/jquery/jquery-ui.js"></script>
	
	<script type="text/javascript">
        $(document).ready(function(){
		
		$('#editar_aviso').submit(function( event ) {
			if ($('#idLocalidad').val() == "") {
				alert( "Seleccione una ciudad de la lista" );
				return;
			}
		});	
	
		$('#direccion').popover({
			container: 'body'
		});
		$('#tipoop').popover({
			container: 'body'
		});		
		/* validaciones JS */
		$('#editar_aviso').validate({

				rules: {
					precio: {
						required: true,
						number: true
					},
					direccion: {
						required: true,
					},					
					detalles: {
						required: true,
					},
					localidad: {
						required: true,
					},
					
				},
				messages: {
					precio: {
						required: "Por favor ingrese el precio",
						number: "Ingrese un valor numerico",
					},
					direccion: {
						required: "Por favor ingrese la direccion exacta del inmueble",
					},	
					detalles: {
						required: "Por favor ingrese el detalle del inmueble",
					},	
					localidad: {
						required: "Por favor ingrese una localidad",
					},					
				}
		});	

//////////////////		
		
            $("#localidades").autocomplete({
                source: "<?=base_url()?>avisos/get_localidades",
                select: function(e, ui) {
                    $('#idLocalidad').val(ui.item.idLocalidad);
                }
            }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                var inner_html = '<a><div class="list_item_container"><div class="localidad">' + item.localidad + '</div><div class="provincia">' + item.provincia + '</div></div></a>';
                return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append(inner_html)
                    .appendTo( ul );
            };
        });	
	
	$('#direccion').popover();
	$('#tipoop').popover();
	function cambiarfoto (fotnum, fotdesc) {
		alert("click");
				$('#foto' + fotnum + 'form').html("<br>Foto "+fotnum+":<input name=\"foto"+fotnum+"\" type=\"file\" id=\"foto"+fotnum+"\" value=\"\" size=\"30\" class=\"form-control filestyle\" data-buttonName=\"btn-primary\" data-buttonText=\"&nbsp;Buscar foto\"><br>descripcion:<input name=\"foto"+fotnum+"desc\" type=\"text\" id=\"foto"+fotnum+"desc\" value=\""+fotdesc+"\" class=\"form-control\">");
	}
	</script>

	
	
</body>

</html>
