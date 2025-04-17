<?php

namespace App\Controllers;

use Core\Controller;
use Core\DatabaseSqlite;
use Core\Email;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->db = (new DatabaseSqlite())->getConnection();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            // Aquí puedes manejar la lógica de inicio de sesión
            // Por ejemplo, validar las credenciales y establecer la sesión
            $input = json_decode(file_get_contents('php://input'), true);
            $usuario = $input['usuario'] ?? null;
            $password = $input['password'] ?? null;

            // Aquí iría la lógica para verificar las credenciales en la base de datos
            if (empty($usuario) || empty($password)) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'Usuario y contraseña son obligatorios.',
                ]));
            }

            $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE curp = :usuario");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$user) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'Usuario no encontrado.',
                ]));
            }

            if (!password_verify($password, $user['contra'])) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'Contraseña incorrecta.',
                ]));
            }

            if ($user['tipo'] == 'cliente') {


                $stmt = $this->db->prepare("SELECT * FROM clientes WHERE curp = :usuario");
                $stmt->bindParam(':usuario', $usuario);
                $stmt->execute();
                $client = $stmt->fetch(\PDO::FETCH_ASSOC);

                if (!$client) {
                    exit(json_encode([
                        'status' => 'error',
                        'message' => 'Cliente no encontrado.',
                    ]));
                }



                // Aquí puedes establecer la sesión del usuario
                $_SESSION['usuario'] = [
                    'rfc' => $user['curp'],
                    'tipo' => $user['tipo'],
                    'nombre' => $client['nombre'],
                    'apellido' => $client['apellido'],
                    'domicilio' => $client['domicilio'],
                    'correo' => $client['correo'],
                ]; // Guardar el RFC en la sesión

                // Redirigir o mostrar un mensaje de éxito
                exit(json_encode([
                    'status' => 'success',
                    'to' => INITIAL_ROUTE . '/', // Cambia esto a la ruta a la que quieras redirigir
                ]));
            }
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
            $email = $_POST['correo'];
            $password = $_POST['contra'];


            // Validar los datos del formulario
            if (empty($rfc) || empty($nombre) || empty($apellido) || empty($domicilio) || empty($email) || empty($password)) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'Todos los campos son obligatorios.',
                ]));
            }

            if (!preg_match('/^[A-Z]{4}\d{6}[A-Z0-9]{8}$/', $rfc)) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'El CURP no es válido.',
                ]));
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'El correo electrónico no es válido.',
                ]));
            }

            if (strlen($password) < 6) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'La contraseña debe tener al menos 6 caracteres.',
                ]));
            }

            $password = $this->hash_password($password);
            // Aquí iría la lógica para guardar el usuario en la base de datos

            try {
                //code...
                $stmt = $this->db->prepare("INSERT INTO clientes (curp, nombre, apellido, domicilio, correo) VALUES (:rfc, :nombre, :apellido, :domicilio, :email)");
                $stmt->bindParam(':rfc', $rfc);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellido', $apellido);
                $stmt->bindParam(':domicilio', $domicilio);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                $stmt = $this->db->prepare("INSERT INTO usuarios (curp, contra, tipo) VALUES (:rfc, :password, :tipo)");
                $stmt->bindParam(':rfc', $rfc);
                $stmt->bindParam(':password', $password);
                $tipo = 'cliente'; // Asignar el tipo de usuario
                $stmt->bindParam(':tipo', $tipo);
                $stmt->execute();
            } catch (\Throwable $th) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'Error al registrar el usuario.' . $th->getMessage(),
                ]));
            }

            try {
                $mail = new Email();
                $mail->send(
                    $email,
                    'Registro Exitoso',
                    'Gracias ' . $nombre . ' por registrarte en Florería Macus.',
                    'Gracias por registrarte en Florería Macus.',
                    null,
                    'Florería Macus'
                );
            } catch (\Exception $e) {
                exit(json_encode([
                    'status' => 'error',
                    'message' => 'Error al enviar el correo electrónico: ' . $e->getMessage(),
                ]));
            }

            $_SESSION['usuario'] = [
                'rfc' => $rfc,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'domicilio' => $domicilio,
                'correo' => $email,
                'tipo' => 'cliente',
            ]; // Guardar el RFC en la sesión


            // Redirigir o mostrar un mensaje de éxito
            exit(json_encode([
                'status' => 'success',
                'message' => 'Usuario registrado exitosamente.',
                'to' => INITIAL_ROUTE . '/', // Cambia esto a la ruta a la que quieras redirigir
            ]));
        }

        $this->setLayout('LandingLayout');
        $this->view('RegistroUsuarioView', [
            'title' => 'Registro de Usuario'
        ]);
    }


    public function logout()
    {
        // Aquí puedes manejar la lógica de cierre de sesión
        // Por ejemplo, destruir la sesión y redirigir al usuario a la página de inicio
        session_destroy();
        header('Location: ' . INITIAL_ROUTE . '/');
    }


    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
