function validarFormularioVenta() {
    let inputs = document.querySelectorAll("#formVenta input[required]");
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
// REGISTRAR VENTA Y MOSTRAR EN TABLA
// =======================
document.addEventListener("DOMContentLoaded", function () {
    let formVenta = document.getElementById("formVenta");
    let tablaVentas = document.querySelector("#tablaVentas");

    formVenta.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita recargar la página

        if (!validarFormularioVenta()) return;

        // Obtener valores del formulario
        let fechaVenta = document.getElementById("fechaVenta").value;
        let horaVenta = document.getElementById("horaVenta").value;
        let clienteRFC = document.getElementById("clienteRFC").value;
        let empleadoRFC = document.getElementById("empleadoRFC").value;
        let claveProducto = document.getElementById("claveProducto").value;
        let tipoProducto = document.getElementById("tipoProducto").value || "N/A";
        let cantidadVenta = document.getElementById("cantidadVenta").value;
        let montoTotal = document.getElementById("montoTotal").value;

        // Crear una nueva fila en la tabla de ventas
        let nuevaFila = document.createElement("tr");
        nuevaFila.innerHTML = `
            <td>${fechaVenta}</td>
            <td>${horaVenta}</td>
            <td>${clienteRFC}</td>
            <td>${empleadoRFC}</td>
            <td>${claveProducto}</td>
            <td>${tipoProducto}</td>
            <td>${cantidadVenta}</td>
            <td>${montoTotal}</td>
        `;

        tablaVentas.appendChild(nuevaFila);

        // Cerrar modal y limpiar formulario
        cerrarModalVenta();
    });
});

// =======================
// ABRIR MODAL DE REGISTRO DE VENTA
// =======================
document.addEventListener("DOMContentLoaded", function () {
    let btnMostrarVenta = document.getElementById("btnMostrarVenta");

    if (btnMostrarVenta) {
        btnMostrarVenta.addEventListener("click", function () {
            let modal = new bootstrap.Modal(document.getElementById("modalRegistrarVenta"));
            modal.show();
        });
    }
});

// =======================
// CERRAR MODAL DESPUÉS DE REGISTRAR VENTA
// =======================
function cerrarModalVenta() {
    let modalElement = document.getElementById("modalRegistrarVenta");
    let modalInstance = bootstrap.Modal.getInstance(modalElement);

    if (modalInstance) {
        modalInstance.hide(); // Cerrar modal correctamente
    }

    // Remover la capa oscura (backdrop) de Bootstrap si no desaparece automáticamente
    document.querySelectorAll(".modal-backdrop").forEach(backdrop => backdrop.remove());

    // Resetear formulario para limpiar los campos
    document.getElementById("formVenta").reset();
}



