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
		
		<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
		<script	src="<?php echo base_url();?>theme/dist/js/bootstrap-select.js"></script>
		
		<link href="<?php echo base_url();?>theme/assets/jquery/jquery-ui.css" type="text/css" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>theme/assets/jquery/jquery-ui.js"></script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="<?php echo base_url();?>theme/assets/js/html5shiv.js"></script>
		  <script src="<?php echo base_url();?>theme/assets/js/respond.min.js"></script>
		  <![endif]-->
		
		<link href="<?php echo base_url();?>theme/assets/jquery/jquery.ui.css" rel="stylesheet" type="text/css" />

	</head>
    <body>

    <?php
    $tipoops_tmp = array ();
    foreach ( $tipoops->result () as $tipoop_tmp ) {
        $tipoops_tmp [$tipoop_tmp->id] = $tipoop_tmp->nombre;
    }

    $tipoprops_tmp = array ();
    foreach ( $tipoprops->result () as $tipoprop_tmp ) {
        $tipoprops_tmp [$tipoprop_tmp->id] = $tipoprop_tmp->descripcion;
    }

    $localidades_tmp = array ();
    foreach ( $localidades->result () as $localidad_tmp ) {
        $localidades_tmp [$localidad_tmp->id] = $localidad_tmp->nombre;
    }

    $usuarios_tmp = array ();
    foreach ( $usuarios->result () as $usuario_tmp ) {
        $usuarios_tmp [$usuario_tmp->id] = $usuario_tmp->username;
    }
    ?>

    <div class="container">
        <center><h1>Avisos</h1></center>
        <div class="table-responsive">
            <p><a class="btn btn-xs btn-success" href="<?php echo base_url();?>avisos/agregar">Agregar</a></p>
            <table class="table table-striped table-hover">
                <tr>
                    <th>ID</th>
                    <th>Direcci&oacute;n</th>
                    <th>Tipo operaci&oacute;n</th>
                    <th>Tipo inmnueble</th>
                    <th>Fecha de publicaci&oacute;n</th>
                    <th>Ciudad</th>
                    <th>Publicador</th>
                    <th>Acci&oacute;n</th>
                </tr>
                <?php foreach ( $avisos->result() as $aviso ) {?>
                <tr>
                    <td><?=$aviso->id?></td>
                    <td><?=$aviso->direccion?></td>
                    <td><?=$tipoops_tmp[$aviso->id_tipo_op]?></td>
                    <td><?=$tipoprops_tmp[$aviso->id_tipo_inmueble]?></td>
                    <td><?=$aviso->fecha?></td>
                    <td><?=$localidades_tmp[$aviso->id_localidad]?></td>
                    <td><?=$usuarios_tmp[$aviso->id_usuario]?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?php echo base_url();?>avisos/ver/<?=$aviso->id?>">Ver</a>
                        <a class="btn btn-xs btn-primary" href="<?php echo base_url();?>avisos/editar/<?=$aviso->id?>">Editar</a>
                        <a class="btn btn-xs btn-danger" href="<?php echo base_url();?>avisos/borrar/<?=$aviso->id?>">Borrar</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <center>
            <ul class="pagination"><?=$this->pagination->create_links()?></ul>
        </center>
    </div>
		
	</body>

</html>
