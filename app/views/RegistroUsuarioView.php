<section class="d-flex flex-column min-vh-100">
    <div class="row g-0 flex-grow-1">
        <div class="col-xl-5 col-lg-12 register-bg position-relative d-none d-md-block">
            <div class="d-flex justify-content-center align-items-center h-100 text-center flex-column text-white">
                <h3 class="fw-bold fs-2 px-5">La belleza de la naturaleza en tus manos</h3>
                <p class="lead">Flores que dicen lo que las palabras no pueden</p>
                <img src="/assets/img/arreglo1.jpeg" alt="flores" class="img-fluid w-100 h-100 position-absolute opacity-25 rounded-4" style="object-fit: cover; inset: 0; z-index: -1;">
            </div>
        </div>
        <div class="col-xl-7 col-lg-12 d-flex align-items-center">
            <div class="container p-5">
                <h1 class="fw-bold mb-4 text-center">Crea tu cuenta gratis</h1>
                <p class="text-muted mb-4 text-center">Ingresa la siguiente información para registrarte.</p>

                <form id="form-registro-cliente" class="d-flex flex-column">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">RFC <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="rfc" placeholder="Ingresa tu RFC" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nombre" placeholder="Tu nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Apellido <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="apellido" placeholder="Tu apellido" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Domicilio <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="domicilio" placeholder="Ingresa tu domicilio" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo Electrónico <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="Ingresa tu correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Ingresa una contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto">Regístrate</button>
                </form>
            </div>
        </div>
    </div>
</section>
