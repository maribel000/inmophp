<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<META name="description" content="red de inmobiliarias">
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>RedInmo</title>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/dist/css/bootstrap-select.css">
  <link href="<?php echo base_url();?>theme/dist/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>theme/dist/css/propio.css" rel="stylesheet">  
  <link href="<?php echo base_url();?>theme/css/navbar-fixed-top.css" rel="stylesheet">
  <link href="<?php echo base_url();?>theme/css/sticky-footer.css" rel="stylesheet">  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/bootstrap-select.css">
  <link href="<?php echo base_url();?>theme/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url();?>theme/assets/js/html5shiv.js"></script>
      <script src="<?php echo base_url();?>theme/assets/js/respond.min.js"></script>
    <![endif]-->  

	
</head>
<body>

<?=$menu?>


    <div class="container">
	<div class="row">
			<div class="col-md-8">
				<div class="panel panel-info">
				<div class="panel-body" style="padding-top:0">
					<h2 style="margin-top:10px"><?=$aviso['tipo_inmueble']?> en <?=$aviso['tipo_op']?></h2>
					<h3><?=$aviso['direccion']?></h3>
					<h4><?=$aviso['nombre_localidad']?>, <?=$aviso['provincia']?></h4>
                    <span><?=$aviso['m2']?> metros | <?=$aviso['dormitorios']?> dormitorios | <?=(date("Y") - $aviso['anio'])?> a&ntilde;os | <?=$aviso['banios']?> ba&ntilde;os</span>
<br /><br />

<ul id="myTab" class="nav nav-tabs">
   <li class="active">
      <a href="#fotos" data-toggle="tab">Fotos</a>
   </li>
   <li><a href="#mapa" data-toggle="tab">Mapa</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="fotos">
		<ul class="bxslider">
                    <li><img src="<?php echo base_url();?><?=$aviso['foto_url'][0]?>" title="<?=$aviso['foto_desc'][0]?>" /></li>
                    <li><img src="<?php echo base_url();?><?=$aviso['foto_url'][1]?>" title="<?=$aviso['foto_desc'][1]?>" /></li>
                    <li><img src="<?php echo base_url();?><?=$aviso['foto_url'][2]?>" title="<?=$aviso['foto_desc'][2]?>" /></li>
		</ul>	
   </div>
   <div class="tab-pane fade" id="mapa">
		<img src="<?php echo base_url();?>theme/img/map.png" class="img-responsive" alt="Responsive image"></img>
		
   </div>

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
						enviar por correo <span class="glyphicon glyphicon-envelope"></span><br>
						version para imprimir <span class="glyphicon glyphicon-print"></span>
					</div>
				
				<h3>Caracteristicas</h3>
				Ba&ntilde;os: <?=$aviso['banios']?><br />
				Metros cuadrados: <?=$aviso['m2']?><br />
				Ambientes: <?=$aviso['ambientes']?><br />
				Dormitorios: <?=$aviso['dormitorios']?><br />
				<br />
					<center>
					<button type="button" class="btn btn-default btn-lg" style="color: #0404B4">
					  ver datos de contacto
					</button>					
					</center>
				</div>
				</div>

			</div>


	</div>
	
    </div> <!-- /container -->	


    <script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>theme/dist/js/bootstrap-select.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>theme/jquery.bxslider/jquery.bxslider.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		   	$('.bxslider').bxSlider({
				mode: 'fade',
				captions: true
			});
		});	

	</script>

</body>

</html>

