<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:site_name" content="RedInmo.com">
<META name="description" content="red de inmobiliarias">
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <title>RedInmo</title>

    <link href="<?php echo base_url();?>theme/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/dist/css/propio.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/css/sticky-footer.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/jquery/jquery-ui.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
    <script	type="text/javascript" src="<?php echo base_url();?>theme/dist/js/bootstrap-select.js"></script>
    <script	type="text/javascript" src="<?php echo base_url();?>theme/dist/js/bootstrap-filestyle.min.js"></script>

    <link href="<?php echo base_url();?>theme/assets/jquery/jquery-ui.css" type="text/css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>theme/assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>theme/assets/js/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo base_url();?>theme/assets/jquery/jquery.ui.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        $(document).ready(function(){
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
    </script>
</head>
<body>

<?php echo $menu; ?>

    <div class="container">
	<center>
<div style="max-width:600px">
<h1>Agregar Aviso</h1>

<?php if(!$acceso) {?>
		<br>
		<div class="alert alert-danger" role="alert">
		  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		  <span class="sr-only">Aviso:</span>
		  Para agregar un aviso es necesario estar registrado como inmobiliaria o particular.
		</div>
</div>
	</div> <!-- container -->
</body>
</html>
<?php }else{ ?>
<br />
<?php if(validation_errors()) {?>
 <div class="alert alert-danger" role="alert" style="padding:4px"><?php echo validation_errors(); ?></div>
<?php } ?>

<form name="agregar_aviso" method="post" action="<?=base_url()?>avisos/agregar" enctype="multipart/form-data">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Tipo de operaci&oacute;n:</span>
<select name="tipoop" id="tipoop" class="form-control" data-toggle="popover" data-trigger="hover" data-content="Las ventas se realizan en dolares y los alquileres en pesos.">
  <?php foreach ($tipos_op as $tipo_op) { ?>
  <option value="<?php echo $tipo_op->id;?>"><?php echo $tipo_op->nombre;?></option>
  <?php } ?>
</select>
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Tipo de inmueble:</span>
<select name="tipoinm" id="tipoinm" class="form-control">
    <?php foreach ($tipos_inmuebles as $tipo_inmueble) { ?>
        <option value="<?php echo $tipo_inmueble->id;?>"><?php echo $tipo_inmueble->descripcion;?></option>
    <?php } ?>
</select>
</div>
</div>
<br>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Ciudad:</span>
<input name="localidad" type="text" id="localidades" value="" class="form-control">
<input name="idLocalidad" type="hidden" id="idLocalidad" value="">
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Barrio:</span>
<input name="barrio" type="text" id="barrio" value="" class="form-control">
</div>
<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Direcci&oacute;n:</span>
<input name="direccion" type="text" id="direccion" value="" class="form-control" data-toggle="popover" data-trigger="hover" data-content="Direccion exacta del inmueble.">
</div>
</div>
<div class="form-group">
<br>
      <div class="row">
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Ambientes:</span>
			<input name="ambientes" type="text" id="ambientes" value="" class="form-control">
			</div>		
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Dormitorios:</span>
			<input name="dormitorios" type="text" id="dormitorios" value="" class="form-control">
			</div>		
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Ba&ntilde;os:</span>
			<input name="banios" type="text" id="banios" value="" class="form-control">
			</div>	
		</div>		
      </div>
	  <br>
      <div class="row">
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Metros cuadrados: </span>
			<input name="metros2" type="text" id="metros2" value="" class="form-control">
			</div>	
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">Estado:</span>
			<input name="estado" type="text" id="estado" value="" class="form-control">
			</div>
		</div>
        <div class="col-md-4">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:100px">A&ntilde;o:</span>
			<input name="anio" type="text" id="anio" value="" class="form-control">
			</div>
		</div>		
      </div>	  
	 <br/>

<br>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Precio:</span>
<input name="precio" type="text" id="precio" value="" class="form-control">
</div>
<br>
<div class="input-group">
    <span class="input-group-addon" style="min-width:180px;">Fotos:</span>
    <input name="foto1" type="file" id="foto1" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
    <input name="foto1desc" type="text" id="foto1desc" value="" class="form-control" placeholder="Ingrese la descripci&oacute;n...">
    <input name="foto2" type="file" id="foto2" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
    <input name="foto2desc" type="text" id="foto2desc" value="" class="form-control" placeholder="Ingrese la descripci&oacute;n...">
    <input name="foto3" type="file" id="foto3" value="" size="30" class="form-control filestyle" data-buttonName="btn-primary" data-buttonText="&nbsp;Buscar foto">
    <input name="foto3desc" type="text" id="foto3desc" value="" class="form-control" placeholder="Ingrese la descripci&oacute;n...">
</div>
<br>
</div>
<div class="input-group">
<span class="input-group-addon" style="min-width:180px">Detalles:</span>
<textarea name="detalles" cols="35" rows="10" id="detalles" class="form-control" style="font-family:Courier New"></textarea>
</div>
<br>

    <center><button id="botagregar" type="submit" class="btn btn-default btn-lg" style="min-width:600px" name="save" >Enviar</button></center>
</form>
<br />
	
	</div>
	</center>
		
    </div> <!-- /container -->

	<script type="text/javascript">
	$('#direccion').popover({
        container: 'body'
    });
	$('#tipoop').popover({
        container: 'body'
    });
    </script>
</body>

</html>
<?php } ?>