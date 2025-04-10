<?php
class Router
{
    public function dispatch($initialRoute = "/")
    {
        error_log("Iniciando el routing...");

        // Obtener la ruta base del proyecto
        $basePath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

        // Limpiar la REQUEST_URI quitando el prefijo de basePath
        $REQUEST_URI = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
        $uri = trim($REQUEST_URI, '/');

        error_log("URI procesada: $uri");

        $segments = explode('/', $uri);
        error_log("Segmentos de la URI: " . json_encode($segments));

        // Valores por defecto
        $namespace = "App\\Controllers";
        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
        $method = $segments[1] ?? 'index';
        $parameters = array_slice($segments, 2);

        $controllerPath = "./app/controllers/$controllerName.php";

        // Si el controlador no está en la raíz, buscar en subcarpetas
        if (!file_exists($controllerPath) && isset($segments[1]) && is_dir(__DIR__ . "/../app/controllers/" . $segments[0])) {
            error_log("Buscando en subcarpeta: " . ucfirst($segments[0]));
            $namespace .= "\\" . ucfirst($segments[0]);
            $controllerName = ucfirst($segments[1]) . 'Controller';
            $controllerPath = "./app/controllers/{$segments[0]}/$controllerName.php";
            $method = $segments[2] ?? 'index';
            $parameters = array_slice($segments, 3);
        }

        // Construcción final del controlador
        $controllerClass = "$namespace\\$controllerName";
        error_log("Cargando controlador: $controllerClass desde $controllerPath");

        if (file_exists($controllerPath)) {
            require_once $controllerPath;

            if (class_exists($controllerClass)) {
                $controllerInstance = new $controllerClass();

                if (method_exists($controllerInstance, $method)) {
                    call_user_func_array([$controllerInstance, $method], $parameters);
                } else {
                    error_log("Error: Método no encontrado ($method)");
                    echo "Error: Método no encontrado ($method)";
                }
            } else {
                error_log("Error: Clase del controlador no encontrada ($controllerClass)");
                echo "Error: Clase del controlador no encontrada ($controllerClass)";
            }
        } else {
            error_log("Error: Controlador no encontrado ($controllerPath)");
            echo "Error: Controlador no encontrado ($controllerPath)";
            header("HTTP/1.0 404 Not Found");
            header("Location: $initialRoute/");
        }
    }
}
