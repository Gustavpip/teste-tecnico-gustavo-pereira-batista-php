<?php

class LogService implements ILogService {
    
    private $logRepository;
    private $userService;
    private $logBuilder;

    public function __construct(ILogRepository $logRepository, IUserService $userService, LogBuilder $logBuilder) {
        $this->logRepository = $logRepository;
        $this->userService = $userService;
        $this->logBuilder = $logBuilder;
    }

    public function generate(string $userAgent, string $clientIp): ?array {
    
        $users = $this->userService->getAll();
        $log = [];

        if (isset($users['results'][0])) {

            $user = $users['results'][0];

            $log = $this->logBuilder
                ->setUrlChamada('https://randomuser.me/api/')
                ->setCodigoStatus(200)
                ->setResponseBody(json_encode($user))
                ->setRequestMethod('GET')
                ->setClientIp($clientIp ?? 'IP não disponível')
                ->setUserAgent($userAgent ?? 'User agent não disponível')
                ->setResponseTime(150)
                ->setHeaders(json_encode(getallheaders()))
                ->setErroMessage('Nenhum erro')
                ->build();

        } else {
            $log = $this->logBuilder
                ->setUrlChamada('https://randomuser.me/api/')
                ->setCodigoStatus(404)
                ->setResponseBody('{}')
                ->setRequestMethod('GET')
                ->setClientIp($clientIp ?? 'IP não disponível')
                ->setUserAgent($userAgent ?? 'User agent não disponível')
                ->setResponseTime(150)
                ->setHeaders(json_encode(getallheaders()))
                ->setErroMessage('Nenhum usuário encontrado')
                ->build();
        }

        $this->logRepository->generate($log);
      
        return $log;
    }
}
?>
