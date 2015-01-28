<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img style="padding-top:0.2em" src="<?php echo base_url();?>theme/img/logo-inm.png"></img> <b>InmoAvisos.com</b>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>buscar">Buscar <span class="glyphicon glyphicon-search"></a></li>
        <li><a href="<?php echo base_url();?>avisos/agregar">Publicar <span class="glyphicon glyphicon-plus"></a></li>
      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b> <span class="glyphicon glyphicon-user"></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>auth/login">Ingresar</a></li>
            <li><a href="<?php echo base_url();?>auth/create_user">Nuevo Usuario</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url();?>auth/forgot_password">Olvide mi contrase?a</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>