<?php
require_once __DIR__ . '/../repositories/clientRepository.php';
require_once __DIR__ . '/../repositories/logRepository.php';
require_once __DIR__ . '/../services/clientService.php';
require_once __DIR__ . '/../services/logService.php';
require_once __DIR__ . '/../controllers/clientController.php';
require_once __DIR__ . '/../builder/logBuilder.php';

class ClientControllerFactory {
    public static function build(): ClientController {
        $apiUrl = "https://randomuser.me/api/"; 
        $logBuilder = new LogBuilder();
        $userService = new UserService($apiUrl);
        $logRepository = new LogRepository();
        $logService = new LogService($logRepository, $userService, $logBuilder);
        $clientRepository = new ClientRepository();
        $clientService = new ClientService($clientRepository, $logService);
        return new ClientController($clientService);
    }
}
?>
