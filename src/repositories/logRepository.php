<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../interfaces/interfaces.php';

class LogRepository implements ILogRepository {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function generate(mixed $log): mixed {
        try {
            var_dump("fui chamado");
            $stmt = $this->pdo->prepare("INSERT INTO logs (url_chamada, codigo_status, corpo_resposta, metodo_requisicao, ip_cliente, usuario_agente, tempo_resposta, cabecalhos, mensagem_erro)
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $result = $stmt->execute([
                $log['url_chamada'],
                $log['codigo_status'],
                $log['corpo_resposta'],
                $log['metodo_requisicao'],
                $log['ip_cliente'],
                $log['usuario_agente'],
                $log['tempo_resposta'],
                $log['cabecalhos'],
                $log['mensagem_erro']                
            ]);
            return $result;
        } catch (PDOException $e) {
            echo "Erro ao inserir log: " . $e->getMessage();
            return false;
        }
    }
}
?>
