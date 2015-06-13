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
<div style="max-width:600px">
<h1>Editar Aviso</h1>
<?php if(validation_errors()) {?> 
 <div class="alert alert-danger" role="alert" style="padding:4px"><?php echo validation_errors(); ?></div>
<?php } ?>

<form name="agregar_aviso" method="post" action="<?php echo base_url();?>avisos/editar/<?php echo $id; ?>">
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
<input name="ciudad" type="text" id="ciudad" value="<?php echo $nombre_localidad;?>" class="form-control">
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
			<div class="btn-group-vertical" role="group" aria-label="..."  style="min-height:150px;">
				<input name="foto1" type="file" id="foto1" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
				<input name="foto1desc" type="text" id="foto1desc" value="" class="form-control" placeholder="Ingrese la descripci&oacute;n...">
			</div>
			<div class="btn-group-vertical" role="group" aria-label="..."  style="min-height:150px;">
				<input name="foto2" type="file" id="foto2" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
				<input name="foto2desc" type="text" id="foto2desc" value="" class="form-control" placeholder="Ingrese la descripci&oacute;n...">
			</div>
			<div class="btn-group-vertical" role="group" aria-label="..."  style="min-height:150px;">
				<input name="foto3" type="file" id="foto3" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
				<input name="foto3desc" type="text" id="foto3desc" value="" class="form-control" placeholder="Ingrese la descripci&oacute;n...">
			</div>
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
	<script type="text/javascript">
	$('#direccion').popover();
	$('#tipoop').popover();
	</script>
</body>

</html>
