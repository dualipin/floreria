<?php
namespace App\Controllers\Admin;
use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('admin/HomeView');
    }

    public function getData()
    {
        header('Content-Type: application/json');
        $data = [
            'message' => 'Hello from the dashboard!',
            'status' => 'success'
        ];
        print json_encode($data);
    }
}