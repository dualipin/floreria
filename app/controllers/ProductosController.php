<?php

namespace App\Controllers;

use Core\Controller;

class ProductosController extends Controller
{
    public function index()
    {
        $this->setLayout('LandingLayout');
        $this->view('ProductosView');
    }

    public function destacados()
    {
        header('Content-Type: application/json');
        $destacados = [];
        print json_encode($destacados);
    }

    public function ultimas_ofertas()
    {
        header('Content-Type: application/json');
        $ofertas = [];
        print json_encode($ofertas);
    }

    public function flores_blancas()
    {
        $this->setLayout('LandingLayout');
        $this->view('FloresBlancasView');
    }
}
