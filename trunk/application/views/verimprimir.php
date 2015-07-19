<!DOCTYPE html>
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
    <div class="container">
	<div class="row">
			<div class="col-md-8">
				<div class="panel panel-info">
				<div class="panel-body" style="padding-top:0">
					<h2 style="margin-top:10px"><?=$aviso['tipo_inmueble']?> en <?=$aviso['tipo_op']?></h2>
					<h3><?=$aviso['direccion']?></h3>
					<h4><?=$aviso['nombre_localidad']?>, <?=$aviso['provincia']?></h4>
                    <span><?=$aviso['m2']?> metros | <?=$aviso['dormitorios']?> dormitorios | <?=(date("Y") - $aviso['anio'])?> a&ntilde;os | <?=$aviso['banios']?> ba&ntilde;os</span>
<h3>Fotos:</h3>



                    <?php if (isset($aviso['foto_url'][0])){?><li><img src="<?=base_url();?><?=$aviso['foto_url'][0]?>" title="<?=$aviso['foto_desc'][0]?>" / width="80%"></li><?php } ?>
					<br><br>
                    <?php if (isset($aviso['foto_url'][1])){?><li><img src="<?=base_url();?><?=$aviso['foto_url'][1]?>" title="<?=$aviso['foto_desc'][1]?>" / width="80%"></li><?php } ?>
                    <br><br>
					<?php if (isset($aviso['foto_url'][2])){?><li><img src="<?=base_url();?><?=$aviso['foto_url'][2]?>" title="<?=$aviso['foto_desc'][2]?>" / width="80%"></li><?php } ?>


<h3>Mapa:</h3>
		<iframe
		  width="85%"
		  height="400"
		  frameborder="0" style="border:0"
		  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB96q5AA5OZHRE1lYz4Hex7-0a_1d9yStA&q=Argentina, <?=$aviso['provincia']?>, <?=$aviso['nombre_localidad']?>, <?=$aviso['direccion']?>">
		</iframe>	
		


</div>



                </div>
				</div>


				
			<div class="col-md-4">
			<div class="panel panel-info">
				
				<div class="panel-body" style="padding-top:0">
					<h3 style="color: green">$ <?=$aviso['precio']?></h3>

				<h3>Caracteristicas</h3>
				Ba&ntilde;os: <?=$aviso['banios']?><br />
				Metros cuadrados: <?=$aviso['m2']?><br />
				Ambientes: <?=$aviso['ambientes']?><br />
				Dormitorios: <?=$aviso['dormitorios']?><br />
				<br />
				<h3>Detalles:</h3>

				<?=$aviso['detalles']?>
				</div>
				</div>

					</div>
					</div>


	</div>


	
    </div> <!-- /container -->	


    <script src="<?=base_url();?>theme/assets/js/jquery.js"></script>
    <script src="<?=base_url();?>theme/dist/js/bootstrap.min.js"></script>


</body>

</html>

