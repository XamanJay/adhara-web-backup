<!--<?php session_start(); ?>-->
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/home" class="site_title"><img src="/img/logos/gph.png" style="width: 30px; height: auto;"> <span>Panel GPHoteles!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="/img/logos/gph.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?php echo $_SESSION['user']->getAdmin(); ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />
    <?php 
    if ($_SESSION['user']->getCorreo() == "juan.alucard.02@gmail.com" || $_SESSION['user']->getCorreo() == "ventas3@gphoteles.com" || $_SESSION['user']->getCorreo() == "revenue@gphoteles.com" || $_SESSION['user']->getCorreo() == "gerencia@gphoteles.com") {

    ?>
      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <!--<li><a href="/panel">Home</a></li>-->
                <li><a href="/Seasons">Temporadas</a></li>
                <li><a href="/Seasons/create">Cargar Temporadas</a></li>
                <li><a href="/Seasons/magica">Tarifa Magica</a></li>
                <li><a href="/Seasons/manipulate">StopSales/Rooms</a></li>
                <li><a href="/Seasons/pagodestino">Pago en Destino</a></li>
                <li><a href="/Seasons/promociones">Promociones</a></li>
                <li><a href="/Seasons/tipodecambio">Dolar TipodeCambio</a></li>
                <li><a href="/Seasons/grupos">Grupos</a></li>
                <li><a href="/Seasons/reservas">Reservaciones</a></li>
                <li><a href="/Seasons/offline">Reservaciones Offline</a></li>
                <li><a href="/Seasons/multimedia">Multimedia</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Actualizar datos<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="/ciudades">Ciudades</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->

    <?php
    }
    else{
    ?>
      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="/panel">Home</a></li>
                <li><a href="/Seasons">Temporadas</a></li>
                <li><a href="/Seasons/manipulate">StopSales/Rooms</a></li>
                <li><a href="/Seasons/pagodestino">Pago en Destino</a></li>
                <li><a href="/Seasons/reservas">Reservaciones</a></li>
                <li><a href="/Seasons/offline">Reservaciones Offline</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->
    <?php
    }

    ?>   

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>