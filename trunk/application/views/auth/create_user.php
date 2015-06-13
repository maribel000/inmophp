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
<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>


<?php echo form_open('email/send', array('id' => 'newuser'));?>

      <p>
            Tipo de usuario: <br />
            <select name="tipo">
			  <option value="3">Inmobiliaria</option>
			  <option value="4">Particular</option>
			  <option value="5">Cliente</option>
			</select> 
      </p>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>


</div> <!-- /container -->


<script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>theme/assets/js/jquery.validate.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){	
			$('#newuser').validate({
					rules: {
						first_name: {
							required: true,
							minlength: 3,
						},
						last_name: {
							required: true,
							minlength: 3,
						},
						company: {
							required: true,
							minlength: 2,
						},	
						email: {
							required: true,
							email: true
						},	
						phone: {
							required: true,
							minlength: 6,
						},	
						password: {
							required: true,
							minlength: 6,
						},						
						password_confirm: {
							required: true,
							minlength: 6,
							equalTo: "#password"
						}	
						
					},
					messages: {
						first_name: {
							required: "Por favor ingrese su nombre",
							minlength: "Minimo 3 caracteres"
						},
						last_name: {
							required: "Por favor ingrese su apellido",
							minlength: "Minimo 3 caracteres"							
						},
						company: {
							required: "Por favor ingrese el nombre de su empresa",
							minlength: "Minimo 2 caracteres"							
						},	
						email: {
							required: "Por favor ingrese correo electronico",
							email: "Por favor ingrese una direccion de correo valida"
						},	
						phone: {
							required: "Por favor ingrese su numero de telefono",
							minlength: "Minimo 6 caracteres"							
						},	
						password: {
							required: "Por favor ingrese un password",
							minlength: "Minimo 6 caracteres"							
						},						
						password_confirm: {
							required: "Por favor repita el password",
							minlength: "Minimo 6 caracteres",							
							equalTo: "Los passwords ingresados no son iguales."
						}						
					}
			});	
		});
    </script>		
</body>

</html>

