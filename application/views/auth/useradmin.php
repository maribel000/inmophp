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

<h1>Panel de Administrador</h1>

<div class="panel panel-success">
  <div class="panel-heading">Avisos Pendientes</div>
  <div class="panel-body">
		
 <iframe src="<?php echo base_url();?>avisos/listarpendientes" width="100%" height="400px"></iframe> 



		
  </div>
</div>

<div class="panel panel-success">
  <div class="panel-heading">Avisos Publicados</div>
  <div class="panel-body">
		
 <iframe src="<?php echo base_url();?>avisos/listarpublicados" width="100%" height="400px"></iframe> 



		
  </div>
</div>



</div> <!-- /container -->


<script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
<script>
 $( document ).ready(function() {


$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient = button.data('idanuncio'); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-body').text('Esta realmente seguro que desea borrar el aviso con ID: ' + recipient);
  $('#borrarA').attr( "data", recipient);

});
$('#borrarA').click(function(){
	$('#myModal').modal('hide');
	var idd = $(this).attr('data');
	alert("falta llamada AJAX para borrar el anuncio con id:" + idd);
		$.ajax({
		  type: "POST",
		  url: "<?=base_url();?>avisos/borrar/"+idd,
		}).done(function( msg ) {		
		  	  
		  alert( "aviso eliminado correctamente" + msg );

		  	
		});		
	$('#' + idd).closest('tr').remove();
   
});
$('#borrarfav').click(function(){
	var idd = $(this).attr('data');
	alert("falta llamada AJAX para borrar el fav con id:" + idd);
	//$('#' + idd).closest('tr').remove();
   
});

});
</script>
</body>

</html>


