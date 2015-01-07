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

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          logo
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="lonuevo.php">Ultimas Publicaciones <span class="glyphicon glyphicon-refresh"></a></li>
            <li><a href="agregar.php?paso=1">Agregar Nuevo aviso <span class="glyphicon glyphicon-plus"></a></li>			
          </ul>
<form class="navbar-form navbar-left navbar-input-group" role="search" method="post" action="buscar.php">
  <div class="form-group">
    <input name="cadena" type="text" class="form-control search-query" placeholder="Artista o Canción">
  </div>
  <button type="submit" class="btn btn-default">buscar</button> 
</form>		  
          <ul class="nav navbar-nav navbar-right">		
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b> <span class="glyphicon glyphicon-user"></a>
              <ul class="dropdown-menu">
                <li><a href="ingresar.php">Ingresar</a></li>
                <li><a href="usuario.php">Nuevo Usuario</a></li>
                <li class="divider"></li>
				<li><a href="retpass.php">Olvide mi contraseña</a></li>		
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">
ver aviso

<?php echo $detalles;?>
	
    </div> <!-- /container -->	


    <script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
</body>

</html>
