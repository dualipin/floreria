<?php

namespace App\Controllers\Admin;

use BaseAdminController;

require_once __DIR__.'/BaseAdminController.php';

class HomeController extends BaseAdminController
{

    public function index()
    {
        $this->view('admin/MainView');
    }

    public function servicios()
    {
        $this->view('admin/ServiciosView', data: [
            'titulo' => 'Servicios',
        ]);
    }

    public function productos()
    {
        $this->view('admin/ProductosView');
    }

    public function promociones()
    {
        $this->view('admin/PromocionesView');
    }
}
