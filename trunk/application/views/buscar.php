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

		<script>
            $(document).ready(function(){
			
				$('#buscar_avisos').submit(function( event ) {
					if ($('#localidades').val() != "" && $('#idLocalidad').val() == "") {
						alert("seleccione una ciudad de la lista");
						event.preventDefault();
					}	
				});				
			
                $("#localidades").autocomplete({
                    source: "<?=base_url()?>avisos/get_localidades",
                    select: function(e, ui) {
                        $('#idLocalidad').val(ui.item.idLocalidad);
                    }
                }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                    var inner_html = '<a><div class="list_item_container"><div class="localidad">' + item.localidad + '</div><div class="provincia">' + item.provincia + '</div></div></a>';
                    return $( "<li></li>" )
                        .data( "item.autocomplete", item )
                        .append(inner_html)
                        .appendTo( ul );
                };
            });
		</script>
	</head>
    <body>


	<?php echo $menu; ?>
    <div class="container">
			<div class="jumbotron" style="padding: 1em; background-color: #F5ECCE;">
				<div class="row">
					<div class="col-md-11">
						<div class="row">
                            <form id="buscar_avisos" name="buscar_avisos" method="get" action="<?=base_url()?>buscar/s" enctype="multipart/form-data">

                                <div class="col-md-3">
							        Tipo de Operación:

                                    <select name="tipoop" class="selectpicker show-tick form-control">
							            <?php echo $combo_tipoop; ?>
							        </select>
							    </div>
							
							    <div class="col-md-3">
							        Tipo de Propiedad: 
							        <select name="tipopro" class="selectpicker show-tick form-control">
							            <?php echo $combo_tipopro; ?>
							        </select>
							    </div>

							    <div class="col-md-4">
							        Ciudad:
                                    <input name="localidad" type="text" id="localidades" value="<?=$localidad;?>"class="form-control" >
                                    <input name="idLocalidad" type="hidden" id="idLocalidad" value="<?=$idLocalidad;?>">
							    </div>
							
							    <div class="col-xs-1">
							        <button type="submit" class="btn btn-default btn-lg" style="margin-top: 30px">Buscar</button>
							    </div>
							    
							</form>							
						</div>
					</div>
				</div>
			</div>

		    <?php if ($busqueda) {
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
			?>

 			<div class="row">
<!--				<div class="col-md-4">
					<div class="panel panel-info">
						<div class="panel-heading">Refinar busqueda</div>
						<div class="panel-body">opciones</div>
					</div>
				</div>		-->
				
<!--				<div class="col-md-8">-->
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							Resultados de la busqueda: 
							<?php echo ' <strong>'.$total_rows.'</strong> inmuebles encontrados.';?>
						</div>
						
						<div class="panel-body">
							<div class="row">									
								<?php foreach ( $avisos->result() as $aviso ) {?>
								    
								<div class="media">
								    <a class="media-left" href="<?php echo base_url();?>avisos/ver/<?php echo $aviso->id; ?>"> 
								        <img src="<?php echo  base_url().$aviso->url;?>" height="125" width="125" class="thumbnail" alt="Rounded Image">
								    </a>
								    <div class="media-body">
								        <a href="<?php echo base_url();?>avisos/ver/<?php echo $aviso->id; ?>">
								            <h4 class="media-heading"><?php echo $aviso->direccion ;?></h4>
								        </a>
								        Ubicado en 
								        <?php echo $localidades_tmp[$aviso->id_localidad] ;?>, 
								        <?php echo $aviso->metros_cuadrados ;?> mt2, 
								        <?php echo $aviso->cant_ambientes ;?> ambientes, 
								        <?php echo $aviso->cant_banios ;?> 
								        baños. $<?php echo $aviso->precio ;?>
								        <br />
								    </div>
								</div>
								
								<?php } ?>
				
							</div>
				
							<center>
								<ul class="pagination"><?=$this->pagination->create_links()?></ul>
							</center>						
						</div>
					</div>					
				</div>
	  			<?php } ?>		
			</div>
		</div>
		
	</body>

</html>
