<?php
namespace Core;
use PDO;
use PDOException;

class Database
{
    private $host = 'siutitsm.com.mx';  // O la IP del servidor de BD
    private $dbname = 'ostitsm1_siutitsm';
    private $username = 'ostitsm1';
    private $password = 'Guadalajara2022';
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->pdo;
    }
}
