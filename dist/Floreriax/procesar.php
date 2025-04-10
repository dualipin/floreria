<?php
// Datos de conexión
$servidor = "localhost";
$usuario = "root"; 
$password = "12345678"; 
$basededatos = "registro_usuarios";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $password, $basededatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar datos del formulario
$rfc = $_POST['rfc'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$domicilio = $_POST['domicilio'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (rfc, nombre, apellido, domicilio, email, password) VALUES ('$rfc', '$nombre', '$apellido', '$domicilio', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Cerrar conexión
$conn->close();
?>
