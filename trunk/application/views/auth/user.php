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
<?php if($rol != "Clientes")echo $avisospendientes;?>
<?php 
			if($rol != "Clientes") {
				foreach ($infoavisos->result_array() as $row){
					print_r($row);
				}
			}
?>
<div class="row">
        <div class="col-xs-6">
			<div class="panel panel-default">
			  <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Informaci&oacute;n de usuario</div>
			  <div class="panel-body">
						<b>Nombre y Apellido:</b> <?php echo $user->username;?>
					<br><b>Empresa:</b>  <?php echo $user->company;?>
					<br><b>Telefono:</b> <?php echo $user->phone;?>
					<br><b>Email:</b>  <?php echo $user->email;?>
					<br><b>Tipo de usuario:</b> <?php echo $rol;?>
					<br><br>
					<a href="<?php echo base_url();?>index.php/auth/edit_user/<?php echo $user->id;?>" class="btn btn-default">Modificar datos</a>
			  </div>
			</div>		
		</div>
		<?php print_r($favoritos);?>
        <div class="col-xs-6">
			<div role="tabpanel">
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Favoritos [2]</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Alertas [1]</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="home">
				    Avisos marcados como favoritos:
					<table class="table table-striped" width="100%">
					  <tr> 
						<td><b>Visualizar</b></td>
						<td><b>Caracteristicas</b></td>
						<td><b>Opciones</b></td>
					  </tr>
					  <tr id="fav333"> 
						<td><a class="btn btn-xs btn-info" href="#" target="_blank">ver</a></td>
						<td>Departamento en Venta en Rosario 3233</td>
						<td>
							<button type="button" class="btn btn-default" id="borrarfav" data="333">borrar favorito</button>
						</td>			
					  </tr>						  
					  <tr id="fav111"> 
						<td><a class="btn btn-xs btn-info" href="#" target="_blank">ver</a></td>
						<td>Departamento en Venta en Rosario 111</td>
						<td>
							<button type="button" class="btn btn-default" id="borrarfav" data="111">borrar favorito</button>
						</td>			
					  </tr>
					  <tr id="fav222"> 
						<td><a class="btn btn-xs btn-info" href="#" target="_blank">ver</a></td>
						<td>Departamento en Venta en Rosario 222</td>
						<td>
							<button type="button" class="btn btn-default" id="borrarfav" data="222">borrar favorito</button>
						</td>			
					  </tr>						  
					</table>				
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					Se avisara por mail, cuando ingresen avisos con las siguientes caracteristicas:
					<table class="table table-striped" width="100%">
					  <tr> 
						<td><b>Fecha</b></td>
						<td><b>Busqueda</b></td>
						<td><b>Opciones</b></td>
					  </tr>
					  <tr id="fav789"> 
						<td>18/01/1980</td>
						<td>Departamento en Venta en Rosario</td>
						<td>
						<div class="btn-group">
							<a href="#" class="btn btn-default">borrar alerta</a>
						</div>
						</td>			
					  </tr>	  
					</table>
				</div>
			  </div>
			</div>		
		</div>
</div>

<?php if($rol != "Clientes") { ?>
<div class="panel panel-success">
  <div class="panel-heading"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Avisos Publicados</div>
  <div class="panel-body">
		<table class="table table-striped" width="100%">
		  <tr> 
			<td><b>Visualizar</b></td>
			<td><b>Caracteristicas</b></td>
			<td><b>Foto</b></td>
			<td><b>Tiempo Publicado</b></td>
			<td><b># Visualizaciones</b></td>
			<td><b># Contactos</b></td>
			<td><b>Opciones</b></td>
		  </tr>
		  <tr id="7894"> 
			<td><a class="btn btn-xs btn-info" href="#" target="_blank">ver</a></td>
			<td>Departamento en Venta en Rosario</td>
			<td><img data-holder-rendered="true" src="http://localhost/redinmo/theme/imgavisos/2.jpg" style="width: 50px; height: 50px;" class="media-object" alt="64x64"></td>
			<td>12 dias</td>
			<td>345</td>
			<td>7</td>
			<td>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				Accion <span class="caret"></span>
			  </button>			
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#" data-toggle="modal" data-target="#myModal" data-idanuncio="7894">Dar de baja</a></li>
				  </ul>
			</div>
			</td>			
		  </tr>
		  <tr id="1234"> 
			<td><a class="btn btn-xs btn-info" href="#" target="_blank">ver</a></td>
			<td>Departamento en Venta en Rosario</td>
			<td><img data-holder-rendered="true" src="http://localhost/redinmo/theme/imgavisos/3.jpg" style="width: 50px; height: 50px;" class="media-object" alt="64x64"></td>
			<td>12 dias</td>
			<td>345</td>
			<td>7</td>
			<td>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				Accion <span class="caret"></span>
			  </button>			
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#" data-toggle="modal" data-target="#myModal" data-idanuncio="1234">Dar de baja</a></li>
				  </ul>
			</div>
			</td>			
		  </tr>		  
		</table>
<?php } ?>		


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmar baja de anuncio</h4>
      </div>
      <div class="modal-body">
        Esta realmente seguro que desea borrar este aviso?
      </div>
      <div class="modal-footer">
	    <input type="hidden" id="idborrar" value="sa">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="borrarA" data="132">Borrar anuncio</button>
      </div>
    </div>
  </div>
</div>

		
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


