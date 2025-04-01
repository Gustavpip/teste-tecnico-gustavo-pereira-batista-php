<?php
require_once __DIR__ . '/../Database.php';

class CreateLogsTable {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function up() {
        $sql = "
        CREATE TABLE IF NOT EXISTS logs (
            id SERIAL PRIMARY KEY,
            url_chamada VARCHAR(255) NOT NULL,
            codigo_status INT NOT NULL,
            corpo_resposta TEXT,  
            metodo_requisicao VARCHAR(10),
            ip_cliente VARCHAR(45),
            usuario_agente VARCHAR(255),
            data_criacao TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP,
            tempo_resposta INT,
            cabecalhos JSONB,
            mensagem_erro TEXT
        );
        ";

        try {
            $this->pdo->exec($sql);
            echo "Tabela 'logs' criada com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage() . "\n";
        }
    }

    public function down() {
        $sql = "DROP TABLE IF EXISTS logs;";

        try {
            $this->pdo->exec($sql);
            echo "Tabela 'logs' removida com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao remover tabela: " . $e->getMessage() . "\n";
        }
    }
}

$migration = new CreateLogsTable();
$action = $argv[1] ?? null;

if ($action === "up") {
    $migration->up();
} elseif ($action === "down") {
    $migration->down();
} else {
    echo "Uso: php 20250401_create_logs_table.php [up|down]\n";
}
?>
