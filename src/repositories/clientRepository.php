<?php
require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../interfaces/interfaces.php';

class ClientRepository implements ClientRepositoryInterface {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getAllClients() {
        $stmt = $this->pdo->query("SELECT * FROM clientes");
        return $stmt->fetchAll();
    }

    public function createClient($nome, $telefone, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO clientes (nome, telefone, email) VALUES (?, ?, ?)");
        return $stmt->execute([$nome, $telefone, $email]);
    }
}
?>
