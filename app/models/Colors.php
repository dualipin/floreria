<?php
namespace App\Models;

use Core\Database;

class Colors{
    private $pdo;

    public function __construct()
    {
        $this->pdo= new Database()->getConnection();
    }

    public function getColors(){
        $sql = "SELECT * FROM colores";
        $this->pdo->exec($sql);
        return $this->pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);
    }
}