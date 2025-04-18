<?php

use Core\Controller;

class BaseAdminController extends Controller
{
    public function __construct()
    {
        // if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
        //     header('Location: ' . INITIAL_ROUTE . '/');
        //     exit;
        // }

        $this->setLayout('AdminLayout');
        define('ADMIN_URL', INITIAL_ROUTE . '/admin/home/');
    }
}
