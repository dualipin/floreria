    <header class="header">
        <div class="header-content container mt-2 mt-md-5 pb-4">
            <div class="header-txt">
                <h1 class="fw-bold">Flores y Rosas</h1>
                <p>
                    Las flores son el lenguaje silencioso de la naturaleza,
                    y entre ellas, las rosas son las palabras más elocuentes,
                    capaces de expresar amor, pasión y belleza en un solo pétalo.

                </p>
                <a href="<?= INITIAL_ROUTE . '/home/flores_rosas' ?>" class="btn-1 text-decoration-none">Informacion</a>
            </div>
            <div class="header-img">
                <img src="<?= INITIAL_ROUTE ?>/assets/img/clavel.jpeg" style="aspect-ratio: 1/1;" alt="clavel" class="img-fluid radius shadow object-fit-cover">
            </div>
        </div>
    </header>

    <!-- Información de la florería -->
    <section class="information container py-5">
        <div class="row text-center">

            <div class="col-md-4 mb-4">
                <div class="information-1">
                    <i class="bi bi-patch-check-fill text-primary fs-1 mb-3"></i>
                    <h3 class="h5">Calidad Garantizada</h3>
                    <p>
                        Ofrecemos flores frescas y de la mejor calidad para cada ocasión especial.
                    </p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="information-1">
                    <i class="bi bi-flower1 text-warning fs-1 mb-3"></i>
                    <h3 class="h5">Diseños Exclusivos</h3>
                    <p>
                        Creamos arreglos únicos que destacan por su creatividad y elegancia.
                    </p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="information-1">
                    <i class="bi bi-person-heart text-danger fs-1 mb-3"></i>
                    <h3 class="h5">Atención Personalizada</h3>
                    <p>
                        Nuestro equipo está listo para ayudarte a elegir el arreglo perfecto.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <section class="container py-5">
        <h2 class="text-center mb-4">Últimas Ofertas</h2>
        <div class="row" id="ultimas-ofertas">
            <!-- Las ofertas se agregarán aquí dinámicamente -->
        </div>

    </section>

    <!-- Consultar las ultimas ofertas -->
    <script>
        const ultimasOfertasEl = document.getElementById('ultimas-ofertas');

        async function obtenerUltimasOfertas() {
            ultimasOfertasEl.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevas ofertas

            const response = await fetch('<?= INITIAL_ROUTE . '/productos/ultimas_ofertas' ?>');
            const ofertas = await response.json();
            console.log(ofertas); // Verifica la respuesta del servidor en la consola

            if (ofertas && ofertas.length > 0) {
                ofertas.forEach(oferta => {
                    const {
                        img,
                        h3,
                        p
                    } = oferta; // Desestructuración del objeto oferta
                    agregarOferta(img, h3, p);
                });
            } else {
                ultimasOfertasEl.innerHTML = `
                    <div class="alert alert-success text-center" role="alert">
                        No hay ofertas disponibles en este momento.
                    </div>`;
            }
        }


        function agregarOferta($img, $h3, $p) {
            const cardOfertaEl = `
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-sm">
                                    <img src="data:image/jpeg;base64,${btoa($img)}" class="card-img-top" alt="${h3}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">${$h3}</h5>
                                        <p class="card-text">${$p}</p>
                                    </div>
                                </div>
                            </div>`;
            ultimasOfertasEl.innerHTML += cardOfertaEl;
        }

        obtenerUltimasOfertas();
    </script>


    <main class="products container" id="lista-1">
        <h2>Productos destacados</h2>
        <div id="product-content" class="row"> </div>
    </main>

    <!-- Productos destacados -->
    <script>
        const productContentEl = document.querySelector('#product-content');

        async function obtenerProductosDestacados() {
            try {

                const response = await fetch('<?= INITIAL_ROUTE . '/productos/destacados' ?>');
                const productos = await response.json();
                console.log(productos); // Verifica la respuesta del servidor en la consola

                if (productos && productos.length > 0) {
                    productos.forEach(producto => {
                        const {
                            img,
                            h3,
                            p
                        } = producto; // Desestructuración del objeto producto
                        agregarProducto(img, h3, p);
                    });
                } else {
                    productContentEl.innerHTML = `
                <div class="alert col-12 alert-success text-center" role="alert">
                No hay productos destacados disponibles en este momento.
                </div>`;
                }
            } catch (error) {
                console.error('Error al obtener los productos destacados:', error);
                productContentEl.innerHTML = `
                <div class="alert alert-danger text-center" role="alert">
                    Ocurrió un error al cargar los productos destacados.
                </div>`;
            }
        }


        function agregarProducto($img, $h3, $p) {
            const cardProductoEl = `
                            <div class="product-1">
                                <img src="data:image/jpeg;base64,${btoa($img)}" alt="${h3}">
                                <h3>${$h3}</h3>
                                <p>${$p}</p>
                            </div>`;
            productContentEl.innerHTML += cardProductoEl;
        }

        obtenerProductosDestacados();
    </script>

    <section class="container mb-5">
        <h2 class="text-center mb-4">Servicios Destacados</h2>
        <div id="servicios-destacados"></div>
    </section>

    <script>
        const serviciosDestacadosEl = document.getElementById('servicios-destacados');
        async function obtenerServiciosDestacados() {
            try {


                const response = await fetch('<?= INITIAL_ROUTE . '/servicios/destacados' ?>');
                const servicios = await response.json();
                console.log(servicios); // Verifica la respuesta del servidor en la consola

                if (servicios && servicios.length > 0) {
                    servicios.forEach(servicio => {
                        const {
                            img,
                            h3,
                            p
                        } = servicio; // Desestructuración del objeto servicio
                        agregarServicio(img, h3, p);
                    });
                } else {
                    serviciosDestacadosEl.innerHTML = `
                <div class="alert alert-success text-center" role="alert">
                No hay servicios destacados disponibles en este momento.
                </div>`;
                }
            } catch (error) {
                serviciosDestacadosEl.innerHTML = `
                <div class="alert alert-danger text-center" role="alert">
                    Ocurrió un error al cargar los servicios destacados.
                </div>`;
                console.error('Error al obtener los servicios destacados:', error);
            }
        }

        function agregarServicio(img, h3, p) {
            const cardServicioEl = `
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="data:image/jpeg;base64,${btoa(img)}" class="card-img-top" alt="${h3}">
                    <div class="card-body text-center">
                        <h5 class="card-title">${h3}</h5>
                        <p class="card-text">${p}</p>
                    </div>
                </div>
            </div>`;
            serviciosDestacadosEl.innerHTML += cardServicioEl;
        }

        obtenerServiciosDestacados();
    </script>

    <section id="contacto" class="container py-5">
        <div class="row">
            <h2 class="text-center mb-4">Contáctanos</h2>
        </div>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" placeholder="Tu nombre" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Tu correo electrónico" required>
            </div>
            <div class="col-12">
                <label for="message" class="form-label">Mensaje</label>
                <textarea class="form-control" id="message" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-success">Enviar Mensaje</button>
            </div>
        </form>
    </section>