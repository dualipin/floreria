<?php

namespace App\Controllers;

use Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aquí puedes manejar la lógica de inicio de sesión
            // Por ejemplo, validar las credenciales y establecer la sesión
            $input = json_decode(file_get_contents('php://input'), true);
            $usuario = $input['usuario'] ?? null;
            $password = $input['password'] ?? null;

            // Aquí iría la lógica para verificar las credenciales en la base de datos

            header('Content-Type: application/json');
            // Redirigir o mostrar un mensaje de éxito
            echo json_encode([
                'status' => 'success',
                'to' => INITIAL_ROUTE . '/admin/home', // Cambia esto a la ruta a la que quieras redirigir
            ]);
        } else {
            header('Location: ' . INITIAL_ROUTE . '/');
        }
    }

    public function registrar_cliente()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aquí puedes manejar la lógica de registro del cliente
            // Por ejemplo, validar los datos y guardarlos en la base de datos
            $rfc = $_POST['rfc'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $domicilio = $_POST['domicilio'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Aquí iría la lógica para guardar el usuario en la base de datos

            // Redirigir o mostrar un mensaje de éxito
            exit(json_encode([
                'status' => 'success',
                'message' => 'Usuario registrado exitosamente.',
            ]));
        }

        $this->setLayout('LandingLayout');
        $this->view('RegistroUsuarioView', [
            'title' => 'Registro de Usuario'
        ]);
    }
}
