<!DOCTYPE html>
<html lang="es">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <META name="description" content="red de inmobiliarias">
  <meta http-equiv="Content-Language" content="en-us">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>RedInmo</title>

  <link href="<?php echo base_url();?>theme/dist/css/bootstrap-select.css" rel="stylesheet">
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
  <div class="jumbotron" style="padding:1em; background-color: #F5ECCE;">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
		<form action="<?php echo base_url();?>buscar" method="post">
          <div class="col-md-3">
            Tipo de Operación:
            <select name="tipoop" class="selectpicker show-tick form-control" >
              <option value="1">Venta</option>
              <option value="2">Alquiler</option>
              <option value="3">Alquiler Temporario</option>
            </select>
          </div>
          <div class="col-md-3">
            Tipo de Propiedad:
            <select name ="tipopro" class="selectpicker show-tick form-control">
              <option value="1">Casa</option>
              <option value="3">Departamento</option>
              <option value="2">Garage</option>
              <option value="4">PH</option>
              <option value="5">Countrie</option>
              <option value="6">Quinta</option>
              <option value="7">Terreno y/o lote</option>
              <option value="8">Campo y/o chacra</option>
              <option value="9">Local comercial</option>
              <option value="10">Negocio y/o fondo de comercio</option>
              <option value="11">Oficina</option>
              <option value="12">Consultorio</option>
              <option value="13">Boveda, nichos y/o parcela</option>
            </select>
          </div>
          <div class="col-md-6">
            Localidad:
            <input name="localidad" type="text" class="form-control">
          </div>

        </div>
      </div>
      <div class="col-xs-4">
        <button type="submit" class="btn btn-default btn-lg" style="margin-top:10px">Buscar</button></form>
      </div>
    </div>
  </div>


  <?php if ($busqueda) { ?>

    <?php
    $tipoops_tmp = array();
    foreach ($tipoops->result() as $tipoop_tmp)
    {
      $tipoops_tmp[$tipoop_tmp->id] = $tipoop_tmp->nombre;
    }

    $tipoprops_tmp = array();
    foreach ($tipoprops->result() as $tipoprop_tmp)
    {
      $tipoprops_tmp[$tipoprop_tmp->id] = $tipoprop_tmp->descripcion;
    }

    $localidades_tmp = array();
    foreach ($localidades->result() as $localidad_tmp)
    {
      $localidades_tmp[$localidad_tmp->id] = $localidad_tmp->nombre;
    }
    ?>

  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">Refinar busqueda</div>
        <div class="panel-body">
          opciones
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">Resultados de la busqueda: <?php echo "<strong>$tipoprops_tmp[$tipopro]</strong> en <strong>$tipoops_tmp[$tipoop]</strong> en la localidad de <strong>$localidad</strong>"?></div>
        <div class="panel-body">
          <div class="row">
            <?php
              foreach ($avisos->result() as $aviso)
              { ?>

                <div class="media">
              <a class="media-left" href="#">
                <img src="theme/imgavisos/3.jpg" height="125" width="125" class="thumbnail" alt="Rounded Image">
              </a>
              <div class="media-body">
                <a href="<?php echo base_url();?>avisos/ver/<?php echo $aviso->id; ?>"><h4 class="media-heading"><?php echo $aviso->direccion ;?></h4></a>
                Ubicado en <?php echo $localidades_tmp[$aviso->id_localidad] ;?>, <?php echo $aviso->metros_cuadrados ;?> mt2, <?php echo $aviso->cant_ambientes ;?> ambientes, <?php echo $aviso->cant_banios ;?> baños. $<?php echo $aviso->precio ;?><br/>
              </div>
              </div>

            <?php } ?>

          </div>

          <center>
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </center>

        </div>
      </div>

    </div>

  </div>

  <?php } ?>


<script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap-select.js"></script>
</body>

</html>
