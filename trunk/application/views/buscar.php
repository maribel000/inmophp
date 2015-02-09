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
              <option value="2">Cochera</option>
              <option value="4">PH</option>
              <option value="5">Countries</option>
              <option value="6">Quintas</option>
              <option value="7">Terrenos y Lotes</option>
              <option value="8">Campos y Chacras</option>
              <option value="9">Locales Comerciales</option>
              <option value="10">Negocios y fondos de Comercio</option>
              <option value="11">Oficinas</option>
              <option value="12">Consultorios</option>
              <option value="13">Bovedas, Nichos y Parcelas</option>
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

    $ciudades_tmp = array();
    foreach ($ciudades->result() as $ciudad_tmp)
    {
      $ciudades_tmp[$ciudad_tmp->id] = $ciudad_tmp->nombre;
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
        <div class="panel-heading">Resultados de la busqueda: <?php echo "$tipoprops_tmp[$tipopro], en $tipoops_tmp[$tipoop], en la ciudad de $ciudad"?></div>
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
                <a href="<?php echo base_url();?>avisos/ver/<?php echo $aviso->id; ?>"><h4 class="media-heading"><?php echo $tipoprops_tmp[$aviso->id_tipo_inmueble] ;?> en <?php echo $tipoops_tmp[$aviso->id_tipo_op] ;?> en <?php echo $ciudades_tmp[$aviso->id_ciudad] ;?></h4></a>
<!--                TODO: agregar en la bd en la tabla avisos el id_localidad-->
              Ubicado en Capital Federal, 45 mt2, 2 ambientes, 1 baño. $4500<br/><?php echo $aviso->direccion; ?>
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
