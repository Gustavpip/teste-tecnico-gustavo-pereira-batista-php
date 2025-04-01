<?php
require_once __DIR__ . '/src/repositories/clientRepository.php';
require_once __DIR__ . '/src/services/clientService.php';
require_once __DIR__ . '/src/factories/clientControllerFactory.php';
require_once __DIR__ . '/src/services/userService.php';


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [

    '/' => 'client.php',
    '/clientes' => 'client.php',
    '/clientes/cadastro' => 'client-register.php',
];


if (array_key_exists($uri, $routes)) {
    $file = __DIR__ . '/src/pages/' . $routes[$uri];
    if (file_exists($file)) {
        switch ($uri) {
            case '/':
                $clientController = ClientControllerFactory::build();
                $clientController->index();
        
                break;

            case '/clientes':
                $clientController = ClientControllerFactory::build();
                $clientController->index();
            
                break;
            
            case '/clientes/cadastro':
                $clientController = ClientControllerFactory::build();
                $clientController->generate();
                
                break;
        }
    } else {
        echo "Erro: Arquivo não encontrado!";
    }
} else {
    echo "Página não encontrada!";
}
?>
