<?php

class Database {
    private $pdo;

    public function __construct() {
        $config = require __DIR__ . '/config/database.php';

        $connectionString = "pgsql:host={$config['host']};port={$config['port']};dbname={$config['database']}";
        
        try {
            $this->pdo = new PDO($connectionString, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
