<?php

namespace App\Controllers;

use Core\Controller;

class ServiciosController extends Controller
{
    public function index()
    {
        $this->setLayout('LandingLayout');
        $this->view('ServiciosView');
    }

    public function arreglos()
    {
        $this->setLayout('LandingLayout');
        $this->view('ArreglosView');
    }

    public function destacados()
    {
        header('Content-Type: application/json');
        $destacados = [];
        print json_encode($destacados);
    }
}
