<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->setLayout('LandingLayout');
        $this->view('HomeView');
    }

    public function servicios()
    {
        $this->setLayout('LandingLayout');
        $this->view('ServiciosView');
    }

    public function productos()
    {
        $this->setLayout('LandingLayout');
        $this->view('ProductosView');
    }

    public function flores_rosas()
    {
        $this->setLayout('LandingLayout');
        $this->view('FloresRosasView');
    }

    public function contacto()
    {
        $this->setLayout('LandingLayout');
        $this->view('ContactoView');
    }
}
