<?php
require_once __DIR__ . '/../Database.php';

class CreateClientesTable {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function up() {
        $sql = "
            CREATE TABLE IF NOT EXISTS clientes (
                id SERIAL PRIMARY KEY,
                nome VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                telefone VARCHAR(20) NOT NULL,
                data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";

        try {
            $this->pdo->exec($sql);
            echo "Tabela 'clientes' criada com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage() . "\n";
        }
    }

    public function down() {
        $sql = "DROP TABLE IF EXISTS clientes;";

        try {
            $this->pdo->exec($sql);
 
        } catch (PDOException $e) {
            echo "Erro ao remover tabela: " . $e->getMessage() . "\n";
        }
    }
}

$migration = new CreateClientesTable();
$action = $argv[1] ?? null;

if ($action === "up") {
    $migration->up();
} elseif ($action === "down") {
    $migration->down();
} else {
    echo "Uso: php 20250401_create_clientes_table.php [up|down]\n";
}
?>
