<?php

namespace Core;

class Controller
{
    protected $layout = 'BaseLayout';

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    public function view(string $view, $data = [])
    {
        $layoutPath = __DIR__ . "/../app/views/layout/{$this->layout}.php";
        $viewPath = __DIR__ . "/../app/views/$view.php";

        if (!file_exists($viewPath)) {
            die("El archivo de vista no existe: $view");
        }
        if (!file_exists($layoutPath)) {
            die("El archivo de diseño no existe: {$this->layout}");
        }

        extract($data);

        require_once $layoutPath;
    }
}
