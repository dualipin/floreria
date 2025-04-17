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

    public function getConnection()
    {
        return $this->pdo;
    }
}

class DatabaseSqlite
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('sqlite:' . __DIR__ . '/../db/floreria.db');

        // // Check if tables exist, if not, create them
        // $query = "SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%';";
        // $result = $this->pdo->query($query);

        // if ($result->fetch() === false) {
        //     $this->createAll();
        // }

        $this->createAll();
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    private function createAll() {
        $sql = file_get_contents(__DIR__ . '/../db/floreria.sql');

        if ($sql) {
            try {
                $this->pdo->exec($sql);
                $this->pdo->exec("PRAGMA foreign_keys = ON;"); // Activar las claves foráneas
            } catch (PDOException $e) {
                throw new \Exception("Failed to execute SQL: " . $e->getMessage());
            }
        } else {
            throw new \Exception("SQL file not found or empty.");
        }
    }
}
