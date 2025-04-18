<nav class="navbar navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="adminMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['usuario']['nombre'] ?? 'Panel de Administración' ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="adminMenuDropdown">
                <li><a class="dropdown-item" href="<?= ADMIN_URL . 'perfil' ?>">Perfil</a></li>
                <li><a class="dropdown-item" href="<?= ADMIN_URL . 'configuracion' ?>">Configuración</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-danger" href="/auth/logout">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-start bg-light" id="menuAdmin">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group">
            <li class="list-group-item"><a href="<?= ADMIN_URL ?>" class="nav-link">Inicio</a></li>
            <li class="list-group-item"><a href="<?= ADMIN_URL . 'productos' ?>" class="nav-link">Productos</a></li>
            <li class="list-group-item"><a href="<?= ADMIN_URL . 'servicios' ?>" class="nav-link">Servicios</a></li>
            <li class="list-group-item"><a href="<?= ADMIN_URL . 'promociones' ?>" class="nav-link">Promociones</a></li>
            <li class="list-group-item"><a href="<?= ADMIN_URL . 'ventas' ?>" class="nav-link">Ventas</a></li>
            <li class="list-group-item"><a href="<?= ADMIN_URL . 'clientes' ?>" class="nav-link">Clientes</a></li>
            <li class="list-group-item"><a href="<?= ADMIN_URL . 'proveedores' ?>" class="nav-link">Proveedores</a></li>
            <li class="list-group-item"><a href="<?= ADMIN_URL . 'empleados' ?>" class="nav-link">Empleados</a></li>
            <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('productosD')">Productos dañados</a></li>
            <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('consultas')">Consultas</a></li>
        </ul>
    </div>
</div>