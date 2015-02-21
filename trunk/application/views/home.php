<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <script src="<?php echo base_url();?>theme/assets/js/html5shiv.js"></script>
  <script src="<?php echo base_url();?>theme/assets/js/respond.min.js"></script>
  <![endif]-->
   
</head>
<body>

<?php echo $menu; ?>

<div class="container">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron" style="padding:2em; background-color: #E1F5A9;">
    <div class="row">
      <div class="col-md-8"><h1>InmoAvisos.com</h1><p>La herramienta online para los que buscan y ofrecen inmuebles en Argentina. <br>Venta y alquiler de departamentos, casas, PH, terrenos, locales, oficinas, quintas, cocheras y más en InmoAvisos.com</p></div>
      <div class="col-md-4">
        <center><img style="padding-top:0.2em" src="<?php echo base_url();?>theme/img/splash.png" class="img-responsive" alt="Responsive image"></img></center>
      </div>

    </div>
  </div>

  <div class="jumbotron" style="padding:0.5em; background-color: #F5ECCE">
    <div class="row">
	<form id="homeForm" action="<?=base_url()?>index.php/buscar" method="get">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-3">
            Tipo de Operación:
            <select name="tipoop" class="form-control">
             <?php echo $combo_tipoop; ?>
            </select>
          </div>
          <div class="col-md-3">
            Tipo de Propiedad:
           <select name ="tipopro" class="form-control">
           	  <?php echo $combo_tipopro; ?>
            </select>
          </div>
          <div class="col-md-6">
            Ciudad:
            <input name="ciudad" type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-default btn-lg" style="margin-top:10px">Buscar</button>
      </div>
    </div>
	</form>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-info">
        <div class="panel-heading">Buscar avisos por ciudad</div>
        <div class="panel-body">
          Avisos en Capital Federal<br>
          Avisos en Rosario<br>
          Avisos en Codoba<br>
          Avisos en Santa Fe<br>
          Avisos en Mendoza<br>
          Avisos en Tucuman<br>
          Avisos en plumas verdes

        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-info">
        <div class="panel-heading">Ultimos avisos publicados:</div>
        <div class="panel-body">
          <div class="row">
            <?php echo $ultimos_avisos; ?>
          </div>

        </div>
      </div>

    </div>

    <div class="col-md-3">
      <div class="panel panel-info">
        <div class="panel-heading">Ultimas inmobiliarias registradas</div>
        <div class="panel-body">
          <?php echo $ultimas_inmobi; ?>
        </div>
      </div>
    </div>

  </div>

</div> <!-- /container -->

<script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>

</body>

</html>
