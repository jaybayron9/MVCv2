<?php

namespace DBConn;
use PDO;
use PDOException;

class Connect {  
    public function __construct(protected $conn) {
        try {
            $dsn ="mysql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_DATABASE']};chartset=utf8mb4";
            $this->conn = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            echo "Error Connection " . $e->getMessage();
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}