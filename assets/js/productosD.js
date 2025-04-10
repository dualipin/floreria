document.getElementById("formProductoD").addEventListener("submit", function(event) {
    event.preventDefault();

    // Obtener valores del formulario
    let producto = document.getElementById("productoD").value;
    let clave = document.getElementById("claveProductoD").value;
    let condicion = document.getElementById("condicionD").value;
    let cantidad = document.getElementById("cantidadD").value;

    // Insertar fila en la tabla
    let tabla = document.getElementById("tablaProductosD");
    let nuevaFila = tabla.insertRow();
    
    nuevaFila.insertCell(0).textContent = producto;
    nuevaFila.insertCell(1).textContent = clave;
    nuevaFila.insertCell(2).textContent = condicion;
    nuevaFila.insertCell(3).textContent = cantidad;

    // Limpiar formulario y cerrar modal
    document.getElementById("formProductoD").reset();
    let modal = bootstrap.Modal.getInstance(document.getElementById("modalRegistrarProductoD"));
    modal.hide();
});
