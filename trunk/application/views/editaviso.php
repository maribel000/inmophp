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
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Tipo de operacion</span>
	<select name="tipoop" id="tipoop" class="form-control" data-toggle="popover" data-trigger="hover" data-content="Las ventas se hacen en dolares y los alquileres en pesos">
	  <?php
		$opciones = '
		<option value="0">Venta</option>
		<option value="1">Alquiler</option>';
	    $opciones = str_replace("value=\"$tipo_op\"", "value=\"$tipo_op\" selected", $opciones);
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
  <option value="0">Casa</option>
  <option value="1">Departamento</option>
  <option value="2">Cochera</option>';
  $opciones = str_replace("value=\"$tipo_inm\"", "value=\"$tipo_inm\" selected", $opciones);
  echo $opciones;
 ?>
</select>
</div>
</div>
<br>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Provincia:</span>
<select name="provincia" id="provincia" class="form-control">
  <option>Santa Fe</option>
  <option>Buenos Aires</option>
</select>
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Ciudad:</span>
<input name="ciudad" type="text" id="ciudad" value="<?php echo $ciudad;?>" class="form-control">
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Barrio:</span>
<input name="barrio" type="text" id="barrio" value="<?php echo $barrio;?>" class="form-control">
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Dirección:</span>
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
			<span class="input-group-addon" style="min-width:100px">Baños:</span>
			<input name="banios" type="text" id="banios" value="<?php echo $banios;?>" class="form-control">
			</div>	
		</div>		
      </div>
	  <br>
      <div class="row">
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Metros2: </span>
			<input name="metros2" type="text" id="metros2" value="<?php echo $metros2;?>" class="form-control">
			</div>	
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Estado:</span>
			<input name="estado" type="text" id="estado" value="<?php echo $estado;?>" class="form-control">
			</div>
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Año:</span>
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
fotos<br><br>
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
