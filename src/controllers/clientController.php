<?php
require_once __DIR__ . '/../interfaces/interfaces.php';

class ClientController {
    private $clientService;

    public function __construct(ClientServiceInterface $clientService) {
        $this->clientService = $clientService;
    }

    public function index() {
        $clientes = $this->clientService->getAllClients();
        include __DIR__ . '/../pages/client.php';
    }

    public function generate() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include __DIR__ . '/../pages/client-register.php';
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome']);
            $telefone = trim($_POST['telefone']);
            $email = trim($_POST['email']);

            try {
                $this->clientService->registerClient($nome, $telefone, $email);
                header("Location: /clientes");
                exit;
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        } else {
            echo "Método inválido!";
        }
    }
}
