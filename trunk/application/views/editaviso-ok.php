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

    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/jquery/jquery-ui.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
    <script	type="text/javascript" src="<?php echo base_url();?>theme/dist/js/bootstrap-select.js"></script>

    <link href="<?php echo base_url();?>theme/assets/jquery/jquery-ui.css" type="text/css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>theme/assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>theme/assets/js/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo base_url();?>theme/assets/jquery/jquery.ui.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php echo $menu; ?>

<div class="container">

    Aviso editado correctamente!. En segundos sera redirigido a el panel de control..

</div> <!-- /container -->

</body>
<script type="text/javascript">
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "<?php echo base_url();?>auth/user";

    }, 5000);
</script>	

</html>