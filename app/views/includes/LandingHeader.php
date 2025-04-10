<div class="container sticky-top bg-white my-1 rounded-5 px-md-5" id="header" style="z-index: 1000; top: 5px;">
    <div class="d-flex justify-content-between align-items-center py-3">
        <a href="<?= INITIAL_ROUTE . '/' ?>" class="navbar-brand text-decoration-none fs-4 fw-bold">Florería Macus</a> <!-- "Macus" is intentional and correct -->
        <div class="d-none d-lg-flex align-items-center">
            <ul class="navbar-nav flex-row">
                <li class="nav-item me-3"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/' ?>">Inicio</a></li>
                <li class="nav-item me-3"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/home/servicios' ?>">Servicios</a></li>
                <li class="nav-item me-3"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/home/productos' ?>">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/#contacto' ?>">Contactos</a></li>
            </ul>
            <button class="btn btn-success rounded-3 text-decoration-none ms-3" data-bs-toggle="modal" data-bs-target="#loginModal" type="button">
                <i class="bi bi-person-circle"></i>
                <span>Iniciar Sesión</span>
            </button>
            <div class="dropdown ms-3">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownCart" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-cart3 fs-4"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownCart">
                    <li>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody id="lista-carrito"></tbody>
                        </table>
                    </li>
                    <li><a href="#" id="Vaciar-carrito" class="dropdown-item text-center btn btn-danger">Vaciar Carrito</a></li>
                </ul>
            </div>
        </div>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-3"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse d-lg-none" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/' ?>">Inicio</a></li>
            <li class="nav-item"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/home/servicios' ?>">Servicios</a></li>
            <li class="nav-item"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/home/productos' ?>">Productos</a></li>
            <li class="nav-item"><a class="nav-link text-decoration-none" href="<?= INITIAL_ROUTE . '/#contacto' ?>">Contactos</a></li>
        </ul>

        <div class="d-flex flex-column align-items-center mt-3">
            <button class="btn btn-success rounded-3 text-decoration-none mb-2" data-bs-toggle="modal" data-bs-target="#loginModal" type="button">
                <i class="bi bi-person-circle"></i>
                <span>Iniciar Sesión</span>
            </button>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownCartMobile" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= INITIAL_ROUTE ?>/assets/img/car.svg" id="img-carrito" alt="carrito">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownCartMobile">
                    <li>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody id="lista-carrito"></tbody>
                        </table>
                    </li>
                    <li><a href="#" id="Vaciar-carrito" class="dropdown-item text-center btn btn-danger">Vaciar Carrito</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Iniciar Sesión</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="loginForm">
                    <div class="row p-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="ej. SARM010101" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                        <div class="mt-3 text-center">
                            <span>¿No tienes una cuenta?</span>
                            <a href="<?= INITIAL_ROUTE . '/auth/registrar_cliente' ?>" class="text-decoration-none">Regístrate</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    const loginFormEl = document.querySelector('#loginForm'); // Select the login form element

    /**
     * @param {Event} e - The event object triggered by the form submission.
     */
    const handleSubmit = async (e) => {
        e.preventDefault(); // Prevent the default form submission behavior
        const formData = new FormData(loginFormEl); // Create a FormData object from the form element
        const data = Object.fromEntries(formData.entries()); // Convert FormData to a plain object
        const url = '<?= INITIAL_ROUTE . '/auth/login' ?>'; // Define the URL for the login request

        try {
            const response = await fetch(url, {
                method: 'POST', // Set the request method to POST
                headers: {
                    'Content-Type': 'application/json' // Set the content type to JSON
                },
                body: JSON.stringify(data) // Convert the data object to a JSON string
            });
            const result = await response.json(); // Parse the JSON response

            if (result.status === 'success') {
                // If the login is successful, redirect to the home page
                window.location.href = result.to;
            } else {
                // If the login fails, display an error message
                alert(result.message || 'Error al iniciar sesión.'); // Show an alert with the error message
            }

        } catch (error) {
            console.error('Error:', error); // Log any errors to the console
        }
    }

    loginFormEl.addEventListener('submit', handleSubmit); // Attach the handleSubmit function to the form's submit event
</script>