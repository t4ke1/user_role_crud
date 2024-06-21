<?php

namespace App\DataBase;

use PDO;
use PDOException;

class DbConnection
{
    private string $host = "mysql";
    private string $user = "mysql";
    private string $pass = "mysql";
    private string $db = "mysql";
    private PDO $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * @throws \Exception
     */
    public function getConnection(): PDO
    {
        if (!$this->pdo) {
            throw new \Exception('Some trouble with connection');
        }
        return $this->pdo;
    }

}
