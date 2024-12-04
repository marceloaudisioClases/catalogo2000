<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="bi bi-magic"></i> App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo site_url("Principal/index"); ?>"><i class="bi bi-house-fill"></i> Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url("catalogo"); ?>" target="_blank"><i class="bi bi-cart-fill"></i> Catálogo</a>
        </li>
        <?php if($this->session->userdata("rol_id")==ROL_ADMIN){ ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear-fill"></i> Administración
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo site_url("usuarios/index"); ?>">Usuarios</a></li>
                <li><a class="dropdown-item" href="#">Roles</a></li>
                <li><a class="dropdown-item" href="#">Categorias</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php echo site_url("productos"); ?>">Productos</a></li>
            </ul>
            </li>
        <?php } ?>
      </ul>
      <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i> <?php echo $this->session->userdata("apellido").", ".$this->session->userdata("nombre"); ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo site_url("Principal/micuenta"); ?>"><i class="bi bi-briefcase-fill"></i> Mi Cuenta</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo site_url("auth/logout"); ?>"><i class="bi bi-door-open-fill"></i> Salir</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>