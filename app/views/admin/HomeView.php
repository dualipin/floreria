<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Florería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('imagenes/fondo_admin2.jpg');
            background-size: cover;
            background-position: center;
        }
        .navbar { background-color: #343a40 !important; }
        .content-section { display: none; }
        .active-section { display: block; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuAdmin">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-text text-white">Panel de Administración</span>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start bg-light" id="menuAdmin">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menú</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <li ><a href="#" class="nav-link" onclick="showSection('inicio')">Inicio</a></li>
                <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('producto')">Productos</a></li>
                <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('ventas')">Ventas</a></li>
                <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('productosD')">Productos dañados</a></li>
                <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('clientes')">Clientes</a></li>
                <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('empleados')">Empleados</a></li>
                <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('proveedores')">Proveedores</a></li>
                <li class="list-group-item"><a href="#" class="nav-link" onclick="showSection('consultas')">Consultas</a></li>
            </ul>
        </div>
    </div>
        <!-- Sección INICIO (solo aquí aparece la bienvenida) -->
<section id="inicio" class="content-section active-section">
    <div class="container mt-4 text-center">
        <h1 class="display-4">BIENVENIDO A LA ADMINISTRACIÓN DE FLORERÍA MACUS</h1>
        <p class="lead">Administra eficientemente tu negocio con nuestra plataforma.</p>
    </div>
</section>


<section id="producto" class="content-section">
    <h2>Productos</h2>

    <!-- Botón para abrir la modal -->
    <button id="btnMostrarFormulario" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrarProducto">
        Registrar Producto Nuevo
    </button>

    <!-- MODAL PARA REGISTRAR PRODUCTO -->
    <div class="modal fade" id="modalRegistrarProducto" tabindex="-1" aria-labelledby="modalProductoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProductoLabel">Registrar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="formProducto">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label class="form-label">Clave del Producto</label>
                                <input type="text" class="form-control" id="claveProducto" required>
                            </div>
                            <div class="col-sm-8">
                                <label class="form-label">Nombre del Producto</label>
                                <input type="text" class="form-control" id="nombreProducto" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcionProducto"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label class="form-label">Fecha de Entrada</label>
                                <input type="date" class="form-control" id="fechaEntrada">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Estado</label>
                                <select class="form-control" id="estadoProducto">
                                    <option>Buen estado</option>
                                    <option>Dañado</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Tipo</label>
                                <select class="form-control" id="tipoProducto">
                                    <option>Paquete</option>
                                    <option>Ramillete</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label class="form-label">Número de Paquetes</label>
                                <input type="number" class="form-control" id="numPaquetes">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Fecha de Compra</label>
                                <input type="date" class="form-control" id="fechaCompra">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Número Factura</label>
                                <input type="text" class="form-control" id="numFactura">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label class="form-label">Existencia</label>
                                <input type="number" class="form-control" id="existencia">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Proveedor</label>
                                <input type="text" class="form-control" id="proveedor">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen del Producto</label>
                            <input type="file" class="form-control" id="imagenProducto" accept="image/*">
                        </div>
                        <div class="mb-3 text-center">
                            <img id="previewImagen" src="#" alt="Vista previa" style="max-width: 200px; display: none;">
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLA PARA MOSTRAR PRODUCTOS REGISTRADOS -->
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha Entrada</th>
                <th>Estado</th>
                <th>Tipo</th>
                <th>Paquetes</th>
                <th>Fecha Compra</th>
                <th>Factura</th>
                <th>Existencia</th>
                <th>Proveedor</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody id="tablaProductos"></tbody>
    </table>
</section>


<section id="ventas" class="content-section">
    <h2>Ventas</h2>

    <!-- Botón para abrir la modal -->
    <button id="btnMostrarVenta" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrarVenta">Registrar Venta</button>
    
    <!-- Filtros de búsqueda -->
    <div class="row mb-3 mt-3">
        <div class="col-md-3">
            <label class="form-label">Filtrar por:</label>
            <select id="filtroVentas" class="form-control">
                <option value="todas">Todas las Ventas</option>
                <option value="temporada">Temporada Alta</option>
                <option value="frecuentes">Clientes Frecuentes</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Buscar por RFC Cliente / Empleado:</label>
            <input type="text" id="buscarRFC" class="form-control" placeholder="Ingrese RFC...">
        </div>
        <div class="col-md-3">
            <label class="form-label">Filtrar por Fecha:</label>
            <input type="date" id="buscarFecha" class="form-control">
        </div>
    </div>
    
    <!-- Tabla de ventas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>RFC Cliente</th>
                <th>RFC Empleado</th>
                <th>Clave Producto</th>
                <th>Tipo Producto</th>
                <th>Cantidad</th>
                <th>Monto Total</th>
                <th>Método de Pago</th>
            </tr>
        </thead>
        <tbody id="tablaVentas">
            <!-- Aquí se llenarán los datos dinámicamente -->
        </tbody>
    </table>
    
    <!-- MODAL PARA REGISTRAR VENTA -->
    <div class="modal fade" id="modalRegistrarVenta" tabindex="-1" aria-labelledby="modalVentaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVentaLabel">Registrar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="formVenta">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">RFC Cliente</label>
                                <select id="clienteRFC" class="form-control">
                                    <option value="">Seleccionar Cliente</option>
                                    <option value="frecuente1">Cliente Frecuente 1</option>
                                    <option value="frecuente2">Cliente Frecuente 2</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">RFC Empleado</label>
                                <input type="text" id="empleadoRFC" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="form-label">Clave de Producto</label>
                                <input type="text" id="claveProducto" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tipo de Producto</label>
                                <select id="tipoProducto" class="form-control">
                                    <option value="flores">Flores</option>
                                    <option value="decoraciones">Decoraciones</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Nombre del Producto / Servicio</label>
                                <input type="text" id="nombreProducto" class="form-control">
                            </div>
                        </div>
    
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label class="form-label">Fecha</label>
                                <input type="date" id="fechaVenta" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Hora</label>
                                <input type="time" id="horaVenta" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Cantidad</label>
                                <input type="number" id="cantidadVenta" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Monto Total</label>
                                <input type="number" id="montoTotal" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label">Método de Pago</label>
                                <select id="metodoPago" class="form-control">
                                    <option value="efectivo">Efectivo</option>
                                    <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                                    <option value="transferencia">Transferencia Bancaria</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="d-flex gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>





        <!-- Sección Registro de productos dañados -->
        <section id="productosD" class="content-section">
            <h2>Registro de Productos Dañados</h2>
        
            <!-- Botón para abrir el modal -->
            <button class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#modalRegistrarProductoD">Nuevo Registro</button>
        
            <!-- Tabla para visualizar los registros -->
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Clave</th>
                        <th>Condición</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="tablaProductosD">
                    <!-- Aquí se insertarán los datos dinámicamente -->
                </tbody>
            </table>
        
        
        <!-- Modal de Registro de Productos Dañados -->
        <div class="modal fade" id="modalRegistrarProductoD" tabindex="-1" aria-labelledby="modalProductoDLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalProductoDLabel">Registrar Producto Dañado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formProductoD">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Producto Dañado</label>
                                    <input type="text" class="form-control" id="productoD" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">Clave de Producto</label>
                                    <input type="text" class="form-control" id="claveProductoD" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Condición</label>
                                    <input type="text" class="form-control" id="condicionD" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadD" required>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="clientes" class="content-section">
        <h2>Registro de Clientes</h2>
    
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalRegistrarCliente">
            Registrar Nuevo Cliente
        </button>
    
        <!-- Tabla de Clientes Registrados -->
        <h3 class="mt-4">Clientes Registrados</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo de Cliente</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se insertarán los registros de clientes -->
            </tbody>
        </table>
    </section>
    
    <!-- Modal de Registro de Cliente -->
    <div class="modal fade" id="modalRegistrarCliente" tabindex="-1" aria-labelledby="modalRegistrarClienteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRegistrarClienteLabel">Registrar Nuevo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Menú de selección de tipo de cliente -->
                    <div class="mb-3">
                        <label class="form-label">Tipo de Cliente</label>
                        <select class="form-control" id="tipoCliente" onchange="mostrarFormulario()">
                            <option value="general">Clientes Generales</option>
                            <option value="frecuente">Clientes Frecuentes</option>
                        </select>
                    </div>
    
                    <!-- Formulario de Clientes Generales -->
                    <form id="formClientesGenerales">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" placeholder="Mi calle no tiene número" id="direccion">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sinNumero" onclick="toggleDireccion()">
                                <label class="form-check-label" for="sinNumero">
                                    Mi calle no tiene número
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Código Postal</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Estado</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="form-label">Municipio</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="form-label">País</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Localidad</label>
                                <select class="form-control">
                                    <option>Selecciona una localidad</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Colonia</label>
                                <select class="form-control">
                                    <option>Selecciona una colonia</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Referencia</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </form>
    
                    <!-- Formulario de Clientes Frecuentes (oculto por defecto) -->
                    <form id="formClientesFrecuentes" style="display: none;">
                        <h4>Datos de Cliente Frecuente</h4>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">RFC Cliente</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label">Puntos Acumulados</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Registrar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function mostrarFormulario() {
            let tipoCliente = document.getElementById("tipoCliente").value;
            document.getElementById("formClientesGenerales").style.display = tipoCliente === "general" ? "block" : "none";
            document.getElementById("formClientesFrecuentes").style.display = tipoCliente === "frecuente" ? "block" : "none";
        }
    
        function toggleDireccion() {
            let direccionInput = document.getElementById("direccion");
            let checkSinNumero = document.getElementById("sinNumero");
            direccionInput.disabled = checkSinNumero.checked;
            if (checkSinNumero.checked) {
                direccionInput.value = "Mi calle no tiene número";
            } else {
                direccionInput.value = "";
            }
        }
    </script>
    
<section id="empleados" class="content-section">
    <h2>Registro de Empleados</h2>

    <form>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">RFC</label>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Nombre(s)</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" class="form-control" placeholder="Mi calle no tiene número" id="direccion">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sinNumero" onclick="toggleDireccion()">
                <label class="form-check-label" for="sinNumero">
                    Mi calle no tiene número
                </label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Código Postal</label>
                <input type="text" class="form-control" id="codigoPostal">
            </div>
            <div class="col">
                <label class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" readonly>
            </div>
            <div class="col">
                <label class="form-label">Municipio</label>
                <input type="text" class="form-control" id="municipio" readonly>
            </div>
            <div class="col">
                <label class="form-label">País</label>
                <input type="text" class="form-control" id="pais" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Localidad</label>
                <select class="form-control">
                    <option>Selecciona una localidad</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label">Colonia</label>
                <select class="form-control">
                    <option>Selecciona una colonia</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Referencia</label>
            <input type="text" class="form-control">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Teléfono</label>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Cargo</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Hora de Registro</label>
                <input type="time" class="form-control">
            </div>
        </div>
        
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</section>
<section id="proveedores" class="content-section">
    <h2>Registro de Proveedores</h2>
    <form>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Clave Proveedor</label>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Tipo de Proveedor</label>
                <select class="form-control">
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="mayorista">Mayorista</option>
                    <option value="minorista">Minorista</option>
                    <option value="distribuidor">Distribuidor</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nombre(s)</label>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Apellido Materno</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Producto</label>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Precio</label>
                <input type="number" class="form-control" step="0.01">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Cantidad</label>
                <input type="number" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Total de Compras</label>
                <input type="number" class="form-control" step="0.01" readonly>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary">Registrar</button>

        </div>
    </form>

</section>
<section id="consultas" class="content-section">
    <h2>Consultas</h2>

    <div class="mb-3">
        <label for="tipoConsulta" class="form-label">Selecciona una consulta:</label>
        <select id="tipoConsulta" class="form-control">
            <option value="productos">Productos</option>
            <option value="ventas">Ventas</option>
            <option value="clientes">Clientes</option>
            <option value="empleados">Empleados</option>
            <option value="proveedores">Proveedores</option>
        </select>
    </div>
    <div class="mb-3">
        <input type="text" id="campoBusqueda" class="form-control" placeholder="Buscar...">
    </div>
    <button class="btn btn-primary" onclick="realizarBusqueda()">Buscar</button>
    
</section>
     
    </div>
    
    <script src="<?=INITIAL_ROUTE?>/assets/js/script.js"></script>
    <script src="<?=INITIAL_ROUTE?>/assets/js/productos.js"></script>
    <script src="<?=INITIAL_ROUTE?>/assets/js/ventas.js"></script>
    <script src="<?=INITIAL_ROUTE?>/assets/js/productosD.js "></script>  
    <script src="<?=INITIAL_ROUTE?>/assets/js/clientes.js"></script> <!-- Funciones específicas de clientes -->
    <script src="<?=INITIAL_ROUTE?>/assets/js/empleados.js"></script> <!-- Funciones específicas de empleados -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
