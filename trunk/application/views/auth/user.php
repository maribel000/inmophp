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
<?php if($rol != "Clientes") { echo $avisospendientes; } ?>
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
        <div class="col-xs-6">
			<div role="tabpanel">
			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Favoritos [<?php echo $nfavs;?>]</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Alertas [<?php echo $nalert;?>]</a></li>
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
					  <?php 
					  if ($nfavs) {
						foreach($favoritos as $row_fav) {
					  ?>
					  <tr id="<?php echo $row_fav['aviso_id'];?>"> 
						<td><a class="btn btn-xs btn-info" href="<?php echo base_url();?>avisos/ver/<?php echo $row_fav['aviso_id'];?>" target="_blank">ver aviso</a></td>
						<td><?php echo $row_fav['ti_descripcion']." en ".$row_fav['top_nombre']." en ".$row_fav['localidad_nombre'] ;?></td>
						<td>
							<a href="#borrarfav" class="btn btn-xs btn-danger" data-toggle="modal" data-aviso-id="<?=$row_fav['aviso_id']?>" data-target="#borrarfav">Borrar Favorito</a>
						</td>			
					  </tr>	
					  <?php 
						} 
					  }
					  ?>
			  
					</table>				
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
				<?php //print_r($alertas);?>
					Se avisara por mail, cuando ingresen avisos con las siguientes caracteristicas:
					<table class="table table-striped" width="100%">
					  <tr> 
						<td><b>Busqueda</b></td>
						<td><b>Opciones</b></td>
					  </tr>
					  <?php  
					  if ($nalert) { 
						foreach($alertas as $row_ale) {
					  ?>
					  <tr id="<?php echo $row_ale['id_alert'];?>"> 
						<td><?php echo $row_ale['ti_descripcion']." en ".$row_ale['top_nombre']." en ".$row_ale['localidad_nombre'] ;?></td>
						<td>
						<div class="btn-group">
							<a href="#borrarale" class="btn btn-xs btn-danger" data-toggle="modal" data-aviso-id="<?=$row_ale['id_alert']?>" data-target="#borrarale">Borrar Alerta</a>
						</div>
						</td>			
					  </tr>	  
					  <?php 
						} 
					  }
					  ?>					  
					</table>
				</div>
			  </div>
			</div>		
		</div>
</div>

<?php if($rol != "Clientes") { ?>
<div class="panel panel-success">
  <div class="panel-heading"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Avisos Publicados (<?php echo $navisos; ?>)</div>
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
		<?php 
		//print_r($avisos_user);
		if ($navisos) { 
		 foreach($avisos_user as $row_avi) {		
		?>		  
		  <tr id="aviso<?php echo $row_avi['id_aviso'];?>"> 
			<td><a class="btn btn-xs btn-info" href="<?php echo base_url();?>avisos/ver/<?php echo $row_avi['id_aviso'];?>" target="_blank">ver aviso</a></td>
			<td><?php echo $row_avi['tipo_inmueble']." en ".$row_avi['tipo_operacion']." en ".$row_avi['localidad'];?></td>
			<td><img data-holder-rendered="true" src="<?php echo base_url();?><?php echo $row_avi['url_foto'];?>" style="width: 50px; height: 50px;" class="media-object" alt="64x64"></td>
			<td><?php echo time_elapsed_string(strtotime($row_avi['fecha']));?></td>
			<td><?php echo $row_avi['cant_visualizaciones'];?></td>
			<td><?php echo $row_avi['cant_contactos'];?></td>
			<td>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				Accion <span class="caret"></span>
			  </button>			
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#borraravi"" data-toggle="modal" data-target="#borraravi" data-aviso-id="<?php echo $row_avi['id_aviso'];?>">Dar de baja</a></li>
					<li><a href="<?php echo base_url();?>avisos/editar/<?php echo $row_avi['id_aviso'];?>">Editar aviso</a></li>
				  </ul>
			</div>
			</td>			
		  </tr>

		<?php } } ?>
		</table>
		
<?php } ?>		


<!-- Modal -->
<div class="modal fade" id="borraravi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!-- Modal -->
<div class="modal fade" id="borrarfav" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmar baja de favorito</h4>
      </div>
      <div class="modal-body">
        Esta realmente seguro que desea borrar el favorito?
      </div>
      <div class="modal-footer">
	    <input type="hidden" id="idborrar" value="sa">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="borrarF" data="132">Borrar Favorito</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="borrarale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmar baja de alerta</h4>
      </div>
      <div class="modal-body">
        Esta realmente seguro que desea borrar esta alerta?
      </div>
      <div class="modal-footer">
	    <input type="hidden" id="idborrar" value="sa">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="borrarAl" data="132">Borrar Alerta</button>
      </div>
    </div>
  </div>
</div>

</div> <!-- /container -->


<script src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
<script>
 $( document ).ready(function() {

var iduser = <?php echo $user->id;?>;

$('#borraravi').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var idaviso = $(e.relatedTarget).data('aviso-id');
    //populate the textbox
	$( ".modal-body" ).html( "Esta realmente seguro que desea borrar el aviso con id "+idaviso+" ?" );
    $(e.currentTarget).find('div[class="modal-body"]').val(idaviso);
	
$("#borrarA").click(function(e){

	$('#aviso' + idaviso).closest('tr').remove();
	//llamado ajax para borrar el anuncio
	$('#borraravi').modal('hide');
	//alert("llega"+idaviso);
	//return;
		$.ajax({
		  type: "POST",
		  url: "<?php echo base_url();?>avisos/borrar/"+idaviso,
		}).done(function( msg ) {		});		
	$('#borraravi').modal('hide');

});

});

//---------------------------

$('#borrarfav').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var idaviso = $(e.relatedTarget).data('aviso-id');
    //populate the textbox
	$( ".modal-body" ).html( "Esta realmente seguro que desea borrar el favorito?" );
    $(e.currentTarget).find('div[class="modal-body"]').val(idaviso);
	
$("#borrarF").click(function(e){

	$('#' + idaviso).closest('tr').remove();
	//llamado ajax para borrar el anuncio
		$.ajax({
		  type: "POST",
		  url: "<?php echo base_url();?>avisos/check_fav/"+idaviso+"/"+iduser,
		}).done(function( msg ) {		});		
	$('#borrarfav').modal('hide');

});

});

$('#borrarale').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var idaviso = $(e.relatedTarget).data('aviso-id');
    //populate the textbox
	$( ".modal-body" ).html( "Esta realmente seguro que desea borrar el alerta?" );
    $(e.currentTarget).find('div[class="modal-body"]').val(idaviso);
	
$("#borrarAl").click(function(e){
	$('#' + idaviso).closest('tr').remove();
	//llamado ajax para borrar el anuncio
		$.ajax({
		  type: "POST",
		  url: "<?php echo base_url();?>avisos/delete_ale/"+idaviso+"/"+iduser,
		}).done(function( msg ) {} );		
	$('#borrarale').modal('hide');

});

});

});
</script>
</body>

</html>
<?php 


function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 segundos';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'anio',
                 30 * 24 * 60 * 60  =>  'mes',
                      24 * 60 * 60  =>  'dia',
                           60 * 60  =>  'hora',
                                60  =>  'minuto',
                                 1  =>  'segundo'
                );
    $a_plural = array( 'anio'   => 'anios',
                       'mes'  => 'meses',
                       'dia'    => 'dias',
                       'hora'   => 'horas',
                       'minuto' => 'minutos',
                       'segundo' => 'segundos'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' atras';
        }
    }
}


?>

