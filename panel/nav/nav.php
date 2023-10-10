<?php
include("../verify/verify.php");
$text_movil = "";
if ($device) {
  $text_movil = 'data-widget="pushmenu"';
}
$t = time();
$id_personita=$_SESSION['idUsuario'];
if (file_exists("../../images/logo.png")) {
  $url_imagen = "../../images/logo.png?r=" . $t;
} else {
  $url_imagen = "../../images/empty.jpg";
}
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="<?php echo $url_imagen; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Administrador <i>CAS</i></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
         <img src="../../images/empty.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= isset($userData['nombres']) ? $userData['nombres'] : '' ?></a>
      </div>
    </div>
   <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">AFILIADOS</li>
        <li class="nav-item">
          <a href="#afiliado" onclick="listarAfiliadosEspera()" <?php echo $text_movil ?> id="nav_afiliado_espera" class="nav-link">
          <i class="nav-icon fas fa-question"></i>
            <p>
              Solicitudes de Vinculación
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#afiliados" onclick="listarAfiliados()" <?php echo $text_movil ?> id="nav_afiliados" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
            <p>
              Socios
            </p>
          </a>
        </li> 

        <li class="nav-header">PRÉSTAMOS</li>
        <li class="nav-item">
          <a href="#solicitudes" onclick="listarSolicitudes(1)" <?php echo $text_movil ?> id="nav_solicitudes" class="nav-link">
          <i class="nav-icon fas fa-address-book"></i>
            <p>
              Solicitudes de préstamo
            </p>
          </a>
        </li>  
        <li class="nav-item">
          <a href="#prestamos" onclick="listarPrestamos()" <?php echo $text_movil ?> id="nav_prestamos" class="nav-link">
          <i class="nav-icon fas fa-address-book"></i>
            <p>
              Prestamos
            </p>
          </a>
        </li>
        
        <li class="nav-header">SESIÓN</li>
        <li class="nav-item">
          <a href="../login/logout.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Cerrar sesión
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


