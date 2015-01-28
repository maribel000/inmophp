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

<h1>Busqueda de Inmueble:</h1>

  <div class="jumbotron" style="padding:3em; background-color: #F5ECCE;">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
		<form action="<?php echo base_url();?>buscar" method="post">
          <div class="col-md-3">
            Tipo de Operación:
            <select name="tipoop" class="form-control">
              <option>Venta</option>
              <option>Alquiler</option>
              <option>Alquiler Temporario</option>
            </select>
          </div>
          <div class="col-md-3">
            Tipo de Propiedad:
            <select name ="tipopro" class="form-control">
              <option>Casa</option>
              <option>Departamento</option>
              <option>Cochera</option>
            </select>
          </div>
          <div class="col-md-6">
            Ciudad:
            <input name="ciudad" type="text" class="form-control">
          </div>
		  
        </div>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-default btn-lg" style="margin-top:10px">Buscar</button></form>
      </div>
    </div>
  </div>
  
<?php if ($busqueda) echo "Se busco $tipopro, en $tipoop, en la ciudad de $ciudad"?>


</div> <!-- /container -->


<script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
</body>

</html>
