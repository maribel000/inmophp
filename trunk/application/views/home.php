<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:site_name" content="RedInmo.com">
    <META name="description" content="red de inmobiliarias">
    <meta http-equiv="Content-Language" content="en-us">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <title>RedInmo</title>
    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/js/jquery.js"></script>
    <link href="<?php echo base_url();?>theme/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/dist/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/dist/css/propio.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/css/navbar-fixed-top.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/css/sticky-footer.css" rel="stylesheet">

    <script src="<?php echo base_url();?>theme/dist/js/bootstrap.min.js"></script>
    <script	src="<?php echo base_url();?>theme/dist/js/bootstrap-select.js"></script>

    <link href="<?php echo base_url();?>theme/assets/jquery/jquery-ui.css" type="text/css" rel="stylesheet">


    <script type="text/javascript" src="<?php echo base_url();?>theme/assets/jquery/jquery-ui.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>theme/assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url();?>theme/assets/js/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo base_url();?>theme/assets/jquery/jquery.ui.css" rel="stylesheet" type="text/css" />

    <script>
        $(document).ready(function(){
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
		
		  <!-- Main component for a primary marketing message or call to action -->
		  <div class="jumbotron" style="padding:2em; background-color: #E1F5A9;">
		    <div class="row">
		      <div class="col-md-8"><h1>InmoAvisos.com</h1><p>La herramienta online para los que buscan y ofrecen inmuebles en Argentina. <br>Venta y alquiler de departamentos, casas, PH, terrenos, locales, oficinas, quintas, cocheras y más en InmoAvisos.com</p></div>
		      <div class="col-md-4">
		        <center><img style="padding-top:0.2em" src="<?php echo base_url();?>theme/img/splash.png" class="img-responsive" alt="Responsive image"></img></center>
		      </div>
		
		    </div>
		  </div>
		
		  <div class="jumbotron" style="padding:0.5em; background-color: #F5ECCE">
		    <div class="row">
                <div class="col-md-11">
		        <div class="row">
                <form id="homeForm" name="buscar_avisos" method="get" action="<?=base_url()?>buscar/s" enctype="multipart/form-data">
                    <div class="col-md-3">
		            Tipo de Operación:
                      <select name="tipoop" id="tipoop" class="selectpicker show-tick form-control">
		             <?php echo $combo_tipoop; ?>
		            </select>
		          </div>
		        
		          <div class="col-md-3">
		            Tipo de Propiedad:
                    <select name="tipopro" id="tipopro" class="selectpicker show-tick form-control">
		           	  <?php echo $combo_tipopro; ?>
		            </select>
		          </div>

                  <div class="col-md-4">
                      Ciudad:
                      <input name="localidad" type="text" id="localidades" value="" class="form-control" >
                      <input name="idLocalidad" type="hidden" id="idLocalidad" value="">
                  </div>

                    <div class="col-xs-1">
                        <button type="submit" class="btn btn-default btn-lg" style="margin-top:30px">Buscar</button>
                    </div>
		        
		        </div>
		      </div>
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
		          Avisos en Codoba<br>
		          Avisos en Santa Fe<br>
		          Avisos en Mendoza<br>
		          Avisos en Tucuman<br>
		          Avisos en plumas verdes
		
		        </div>
		      </div>
		    </div>
		
		    <div class="col-md-6">
		      <div class="panel panel-info">
		        <div class="panel-heading">Ultimos avisos publicados:</div>
		        <div class="panel-body">
		          <div class="row">
		            <?php echo $ultimos_avisos; ?>
		          </div>
		
		        </div>
		      </div>
		
		    </div>
		
		    <div class="col-md-3">
		      <div class="panel panel-info">
		        <div class="panel-heading">Ultimas inmobiliarias registradas</div>
		        <div class="panel-body">
                    <?php foreach ($ultimas_inmobi->result() as $inmobi) { ?>
                        <a href="<?=base_url()?>users/ver/<?=$inmobi->id?>"><?=$inmobi->company?></a><br />
                    <?php } ?>
		        </div>
		      </div>
		    </div>
		
		  </div>
		
		</div> 
		<!-- /container -->
	
	</body>

</html>
