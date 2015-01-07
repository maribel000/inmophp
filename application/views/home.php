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
          <img style="padding-top:0.2em" src="<?php echo base_url();?>theme/img/logo-inm.png"></img> <b>RedInmobiliaria</b>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="lonuevo.php">Buscar Propiedad <span class="glyphicon glyphicon-search"></a></li>
            <li><a href="agregar.php?paso=1">Publicar Aviso <span class="glyphicon glyphicon-plus"></a></li>			
          </ul>
	  
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

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
		  <div class="row">
			<div class="col-md-8"><h1>RedInmobiliaria</h1><p>blablabla.</p></div>
			<div class="col-md-4"><center></div>
			<form class="navbar-form navbar-left navbar-input-group" role="search" method="post" action="buscar.php">
			  <div class="form-group">
				<input name="cadena" type="text" class="form-control search-query" placeholder="Ciudad">
			  </div>
			  <button type="submit" class="btn btn-default">buscar</button> 
			</form>	
		  </div>	 
      </div>

	<div class="row">
			<div class="col-md-3">
				<div class="panel panel-info">
				<div class="panel-heading">Buscar avisos por ciudad</div>
				<div class="panel-body">
					Avisos en Capital Federal<br>
					Avisos en Rosario<br>
					Avisos en Codoba

				</div>
				</div>
			</div>
				
			<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">Ultimos avisos publicados:</div>
				<div class="panel-body">
					ultimas
				</div>
				</div>

			</div>
		
			<div class="col-md-3">			
			<div class="panel panel-info">
				<div class="panel-heading">Ultimas inmobiliarias registradas</div>
				<div class="panel-body">

					algo a</a><br>
					algo b<br>

				</div>	
				</div>
			</div>	

	</div>
	
    </div> <!-- /container -->	


    <script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
</body>

</html>
