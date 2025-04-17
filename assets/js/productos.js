function validarFormularioProducto() {
    let inputs = document.querySelectorAll("#formProducto input[required]");
    let incompleto = false;

    inputs.forEach(input => {
        if (input.value.trim() === "") {
            incompleto = true;
            input.classList.add("is-invalid");
        } else {
            input.classList.remove("is-invalid");
        }
    });

    if (incompleto) {
        alert("Por favor, completa todos los campos requeridos.");
        return false;
    }
    return true;
}

// =======================
// REGISTRAR PRODUCTO Y MOSTRAR EN TABLA
// =======================
document.addEventListener("DOMContentLoaded", function () {
    let formProducto = document.getElementById("formProducto");
    let tablaProductos = document.getElementById("tablaProductos");

    formProducto.addEventListener("submit", function (event) {
        event.preventDefault();

        if (!validarFormularioProducto()) return;

        if (!tablaProductos) {
            console.error("No se encontró la tabla de productos.");
            return;
        }

        // Obtener valores del formulario
        let clave = document.getElementById("claveProducto").value;
        let nombre = document.getElementById("nombreProducto").value;
        let description = document.getElementById("descripcionProducto").value;
        let fechaEntrada = document.getElementById("fechaEntrada").value;
        let estado = document.getElementById("estadoProducto").value;
        let tipo = document.getElementById("tipoProducto").value;
        let numPaquetes = document.getElementById("numPaquetes").value;
        let fechaCompra = document.getElementById("fechaCompra").value;
        let numFactura = document.getElementById("numFactura").value;
        let existencia = document.getElementById("existencia").value;
        let proveedor = document.getElementById("proveedor").value;
        let imagenInput = document.getElementById("imagenProducto");

        let imagenSrc = "Sin imagen";

        // Si hay imagen, leerla
        if (imagenInput.files.length > 0) {
            let reader = new FileReader();
            reader.onload = function (event) {
                imagenSrc = `<img src="${event.target.result}" style="max-width: 50px;">`;

                agregarFilaProducto();
            };
            reader.readAsDataURL(imagenInput.files[0]);
        } else {
            agregarFilaProducto();
        }

        // Función para agregar fila a la tabla
        function agregarFilaProducto() {
            let nuevaFila = document.createElement("tr");
            nuevaFila.innerHTML = `
                <td>${clave}</td>
                <td>${nombre}</td>
                <td>${description}</td>
                <td>${fechaEntrada}</td>
                <td>${estado}</td>
                <td>${tipo}</td>
                <td>${numPaquetes}</td>
                <td>${fechaCompra}</td>
                <td>${numFactura}</td>
                <td>${existencia}</td>
                <td>${proveedor}</td>
                <td>${imagenSrc}</td>
            `;

            tablaProductos.appendChild(nuevaFila);
            cerrarModalProducto();
        }
    });
});

// =======================
// ABRIR MODAL DE REGISTRO DE PRODUCTO
// =======================
document.addEventListener("DOMContentLoaded", function () {
    let btnMostrarFormulario = document.getElementById("btnMostrarFormulario");

    if (btnMostrarFormulario) {
        btnMostrarFormulario.addEventListener("click", function () {
            let modal = new bootstrap.Modal(document.getElementById("modalRegistrarProducto"));
            modal.show();
        });
    }
});

// =======================
// CERRAR MODAL DESPUÉS DE REGISTRAR PRODUCTO
// =======================
function cerrarModalProducto() {
    let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById("modalRegistrarProducto"));
    modal.hide();
    document.getElementById("formProducto").reset();
}

// =======================
// VISTA PREVIA DE IMAGEN DEL PRODUCTO
// =======================
document.addEventListener("DOMContentLoaded", function () {
    let inputImagen = document.getElementById("imagenProducto");
    let preview = document.getElementById("previewImagen");

    if (inputImagen) {
        inputImagen.addEventListener("change", function (event) {
            let file = event.target.files[0];

            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert("La imagen es muy pesada (máximo 2MB).");
                inputImagen.value = "";
                return;
            }

            let reader = new FileReader();
            reader.onload = function () {
                preview.src = reader.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);
        });
    }
});
