<?php
require_once __DIR__ . '/../interfaces/interfaces.php';
require_once __DIR__ . '/./logService.php';

class ClientService implements ClientServiceInterface {
    private $clientRepository;
    private $logService;

    public function __construct(ClientRepositoryInterface $clientRepository, LogService $logService) {
        $this->clientRepository = $clientRepository;
        $this->logService = $logService;
    }

    public function getAllClients() {
        return $this->clientRepository->getAllClients();
    }

    public function registerClient(string $nome, string $telefone, string $email) {
        if (empty($nome) || empty($telefone) || empty($email)) {
            throw new Exception("Todos os campos são obrigatórios!");
        }

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $clientIp = $_SERVER['REMOTE_ADDR'];
    
        $this->logService->generate($userAgent, $clientIp);
        // echo $userAgent;
        return $this->clientRepository->createClient($nome, $telefone, $email);
    }
}
?>
