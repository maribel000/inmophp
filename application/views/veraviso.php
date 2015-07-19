<!DOCTYPE html>
<?php //print_r($aviso);?>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<META name="description" content="red de inmobiliarias">
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>RedInmo</title>

  <link rel="stylesheet" type="text/css" href="<?=base_url();?>theme/dist/css/bootstrap-select.css">
  <link href="<?=base_url();?>theme/dist/css/bootstrap.css" rel="stylesheet">
  <link href="<?=base_url();?>theme/dist/css/propio.css" rel="stylesheet">  
  <link href="<?=base_url();?>theme/css/navbar-fixed-top.css" rel="stylesheet">
  <link href="<?=base_url();?>theme/css/sticky-footer.css" rel="stylesheet">  
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>dist/css/bootstrap-select.css">
  <link href="<?=base_url();?>theme/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?=base_url();?>theme/assets/js/html5shiv.js"></script>
      <script src="<?=base_url();?>theme/assets/js/respond.min.js"></script>
    <![endif]-->  

	
</head>
<body>

<?=$menu?>


    <div class="container">
	<?php //print_r($aviso); ?>
	<?php if($aviso['estado_aviso']) {?>
		<div class="alert alert-danger" role="alert">
		  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		  <span class="sr-only">Error:</span>
		  este aviso esta pendiente de moderacion!
		</div>
	<?php }?>	
	<div class="row">
			<div class="col-md-8">
				<div class="panel panel-info">
				<div class="panel-body" style="padding-top:0">
					<h2 style="margin-top:10px"><?=$aviso['tipo_inmueble']?> en <?=$aviso['tipo_op']?></h2>
					<h3><?=$aviso['direccion']?></h3>
					<h4><?=$aviso['nombre_localidad']?>, <?=$aviso['provincia']?></h4>
                    <span><?=$aviso['m2']?> metros | <?=$aviso['dormitorios']?> dormitorios | <?=(date("Y") - $aviso['anio'])?> a&ntilde;os | <?=$aviso['banios']?> ba&ntilde;os</span>
<br />

<h3>Fotos:</h3>
   <div class="tab-pane fade in active" id="fotos">
		<ul class="bxslider">
                    <?php if (isset($aviso['foto_url'][0])){?><li><img src="<?=base_url();?><?=$aviso['foto_url'][0]?>" title="<?=$aviso['foto_desc'][0]?>" /></li><?php } ?>
                    <?php if (isset($aviso['foto_url'][1])){?><li><img src="<?=base_url();?><?=$aviso['foto_url'][1]?>" title="<?=$aviso['foto_desc'][1]?>" /></li><?php } ?>
                    <?php if (isset($aviso['foto_url'][2])){?><li><img src="<?=base_url();?><?=$aviso['foto_url'][2]?>" title="<?=$aviso['foto_desc'][2]?>" /></li><?php } ?>
		</ul>	
   </div>

<h3>Detalles:</h3>
<?=$aviso['detalles']?>

                </div>
				</div>
			</div>
				
			<div class="col-md-4">
			<div class="panel panel-info">
				
				<div class="panel-body" style="padding-top:0">
					<h3 style="color: green">$ <?=$aviso['precio']?></h3>
					
					<div style="text-align:right; font-size:12px">
						<a style="margin-bottom: 5px" href="#" data-toggle="modal" data-target="#newalert" class="btn btn-info btn-large">crear alerta <span class="glyphicon glyphicon-bell"></span></a><br>					
						<a style="margin-bottom: 5px" href="#" data-toggle="modal" data-target="#sendmail" class="btn btn-info btn-large">enviar por correo <span class="glyphicon glyphicon-envelope"></span></a><br>
						<a style="margin-bottom: 5px"href="<?=base_url();?>avisos/verimprimir/<?=$aviso['id']?>" class="btn btn-info btn-large" target="_blank">version para imprimir <span class="glyphicon glyphicon-print"></span></a><br>
						<div id="fav">
						 <?php if($is_fav) { ?>
								<a href="javascript:favorito(<?=$aviso['id']?>, <?=$user_id?>);" class="btn btn-info btn-warning">aviso favorito <span class="glyphicon glyphicon-star"></span></a>
						 <?php }else { ?>		
								<a href="javascript:favorito(<?=$aviso['id']?>, <?=$user_id?>);" class="btn btn-info btn-large">marcar como favorito <span class="glyphicon glyphicon-star-empty"></span></a>
						 <?php } ?>							
						 
						</div>
					</div>
				
				<h3>Caracteristicas Principales:</h3>
				Ba&ntilde;os: <?=$aviso['banios']?><br />
				Metros cuadrados: <?=$aviso['m2']?><br />
				Ambientes: <?=$aviso['ambientes']?><br />
				Dormitorios: <?=$aviso['dormitorios']?><br />
				<br />
					<center>
					<button data-toggle="modal" data-target="#datacontact" type="button" class="btn btn-success btn-lg">
					  Me interesa,<br>Obtener datos.
					</button>					
					</center>
<br>
<h3>Mapa:</h3>
		<iframe
		  width="95%"
		  height="250"
		  frameborder="0" style="border:0"
		  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB96q5AA5OZHRE1lYz4Hex7-0a_1d9yStA&q=Argentina, <?=$aviso['provincia']?>, <?=$aviso['nombre_localidad']?>, <?=$aviso['direccion']?>">
		</iframe>					
					
				</div>
				</div>

			</div>


	</div>

<!-- Modal -->
<div class="modal fade" id="sendmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enviar por email</h4>
      </div>
      <div class="modal-body">
        <form id="enviarmail" method="post">
			<input type="hidden" id="idaviso" value="<?=$aviso['id']?>">
			<div class="input-group">
			<span class="input-group-addon" style="min-width:200px">Nombre:</span>
			<input name="nombre" type="text" id="nombre" value="" class="form-control">
			</div>
			<br>
			<div class="input-group">
			<span class="input-group-addon" style="min-width:200px">Email para enviar el aviso:</span>
			<input name="emailsend" type="text" id="emailsend" value="" class="form-control">
			</div>			
			<br>
			<center><button id="sndm" type="submit" class="btn btn-default btn-lg" style="min-width:100px">Enviar</button></center>			
		</form>
      </div>
      <div class="modal-footer">
	    <input type="hidden" id="idborrar" value="sa">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>




</script>
<!-- Modal -->
<div class="modal fade" id="datacontact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Datos de Contacto</h4>
      </div>
      <div class="modal-body">
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1" style="min-width:250px"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Nombre y Apellido:</span>
  <span class="form-control" id="sizing-addon1"><?=$aviso['first_name'].' '.$aviso['last_name']?></span>
</div>  
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1" style="min-width:250px"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Telefono:</span>
  <span class="form-control" id="sizing-addon1"><?=$aviso['phone']?></span>
</div>	  
<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1" style="min-width:250px"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email:</span>
  <span class="form-control" id="sizing-addon1"><?=$aviso['email']?></span>
</div>	  	  
	  
      </div>
      <div class="modal-footer">
	    <input type="hidden" id="idborrar" value="sa">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    </div> <!-- /container -->	
	
	
<!-- Modal Alerta -->
<div class="modal fade" id="newalert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear Alerta</h4>
      </div>
      <div class="modal-body">
		<form id="alertForm" method="post" class="form-horizontal">
			Esta accion creara una alerta para todos los nuevos avisos ingresados a partir de este momento, con las siguientes caracteristicas:
			<center><h3><?=$aviso['tipo_inmueble']?> en <?=$aviso['tipo_op']?> en <?=$aviso['nombre_localidad']?>, <?=$aviso['provincia']?></h3></center>
			Precio minimo:<input name="pmin" type="text" id="pmin" value="" class="form-control"><br>
			Precio maximo:<input name="pmax" type="text" id="pmax" value="" class="form-control"><br>

			<center><button type="submit" class="btn btn-primary">Crear Alerta</button></center>
		</form>			
      </div>
      <div class="modal-footer">
	    <input type="hidden" id="idborrar" value="sa">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    </div> <!-- /container -->	
	



    <script src="<?=base_url();?>theme/assets/js/jquery.js"></script>
	<script src="<?=base_url();?>theme/assets/js/jquery.validate.min.js"></script>
    <script src="<?=base_url();?>theme/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>theme/dist/js/bootstrap-select.js"></script>
	<script type="text/javascript" src="<?=base_url();?>theme/jquery.bxslider/jquery.bxslider.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		   	$('.bxslider').bxSlider({
				mode: 'fade',
				captions: true
			});	
		$('#alertForm').validate({
				rules: {
					pmin: {
						required: true,
						number: true						
					},
					pmax: {
						required: true,
						number: true
					}					
					
				},
				messages: {
					pmin: {
						required: "Por favor ingrese un precio minimo",
						number: "Por favor ingrese un valor numerico"
					},
					pmax: {
						required: "Por favor ingrese un precio maximo",
						number: "Por favor ingrese un valor numerico"
					},					

				}
		});	
		$('#enviarmail').validate({
				rules: {
					nombre: {
						required: true,		
				
					},
					emailsend: {
						required: true,
						email: true		
					}					
					
				},
				messages: {
					nombre: {
						required: "Por favor ingresa el nombre del destinatario",
					},
					emailsend: {
						required: "Por favor ingrese una direccion de correo",
						email: "Por favor ingrese una direccion de correo valida"
					},					

				},
				
                    //perform an AJAX post to ajax.php
                    submitHandler: function(form) {
							var email = encodeURIComponent($('#emailsend').val());
							$.ajax({
							  type: "POST",
							  url: "<?=base_url();?>avisos/snd_mail/"+$('#idaviso').val()+"/"+$('#nombre').val()+"/" + email,
							}).done(function( msg ) {		
							  alert( "Mensaje enviado correctamente!" + msg );
							  $('#sendmail').modal('hide')
							  
							});		  
							  return false;
                    }
					//					
		});			
		});	

		

               

	</script>



  <script type="text/javascript"> 	
  
		$('#newalert').on('show.bs.modal', function (e) {
		  	if(<?=$user_id?> == 0) {
				alert("Para poder crear una alerta, es necesario estar logueado.");
				return e.preventDefault() // stops modal from being shown
			}
		})	
		/*
		$('#enviarmail').submit(function() {
		//return;
		$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>avisos/snd_mail/"+$('#idaviso').val()+"/"+$('#emailsend').val()+"/"+$('#nombre').val(),
		}).done(function( msg ) {		
		  	  
		  alert( "Mensaje enviado correctamente!" + msg );
		  $('#sendmail').modal('hide')
		  
		});		  
		  return false;
		});	
		*/
		$('#newalert').submit(function() {		
		//return;
		$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>avisos/new_alert/"+<?=$user_id?>+"/"+<?=$aviso['id_tipo_inmueble']?>+"/"+<?=$aviso['id_tipo_op']?>+"/"+<?=$aviso['id_localidad']?>+"/"+$('#pmin').val()+"/"+$('#pmax').val(),
		}).done(function( msg ) {		
		  	  
		  alert( "Alerta creada correctamente!" + msg );
		  $('#newalert').modal('hide')
		  
		});		  
		  return false;
		});			

	  $('#datacontact').on('shown.bs.modal', function() {
		//alert("aca");
		$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>avisos/show_data/"+$('#idaviso').val(),
		}).done(function( msg ) {});			
	  })

	  function favorito(idaviso, iduser){
	    if(!iduser) {
			alert("Para poder marcar un anuncio como favorito, es necesario estar logueado.");
			return;
		}
		$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>avisos/check_fav/"+idaviso+"/"+iduser,
		}).done(function( msg ) {
			if (msg == "error") {
			  alert("error");
			  return;
			}
		if (msg == "0") {
			$('#fav').html("<a href=\"javascript:favorito(<?=$aviso['id']?>, <?=$user_id?>);\" class=\"btn btn-info btn-large\">marcar como favorito <span class=\"glyphicon glyphicon-star-empty\"></span></a>");
			
		}else{
			$('#fav').html("<a href=\"javascript:favorito(<?=$aviso['id']?>, <?=$user_id?>);\" class=\"btn btn-info btn-warning\">aviso favorito <span class=\"glyphicon glyphicon-star\"></span></a>");
		}
		});
	  }
    </script>	
</body>

</html>

