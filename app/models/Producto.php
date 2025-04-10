<?php

namespace App\Models;

use Core\Database;

class Producto
{
    private $pdo;

    public function __construct()
    {
        $db =  new Database();
        $this->pdo = $db->getConnection();
    }

    public function getLatestOffers() {
        $query = "SELECT * FROM productos ORDER BY creado DESC LIMIT 5";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
