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
<h1>Panel de usuario</h1>
<?php //print_r($user); ?>
<br>Nombre y Apellido: <?php echo $user->username;?>
<br>Empresa:  <?php echo $user->company;?>
<br>Telefono: <?php echo $user->phone;?>
<br>Email:  <?php echo $user->email;?>
<br>Tipo de usuario: <?php echo $rol;?>
<br><br>
<a href="#">[cambiar datos]</a>

<br>
<h2>Mis avisos:</h2>
aviso 1<br>
aviso 2<br>
aviso 3<br>

</div> <!-- /container -->


<script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
</body>

</html>


