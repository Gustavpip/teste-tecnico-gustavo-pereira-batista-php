<?php

interface IClientRepositoryInterface {
    public function getAllClients();
    public function createClient($nome, $telefone, $email);
}

interface IClientServiceInterface {
    public function __construct(IClientRepositoryInterface $clientRepository, LogService $logService);
    public function getAllClients();
    public function registerClient(string $nome, string $telefone, string $email);
}


interface ILogService {
    public function generate(string $userAgent, string $clientIp): ?array;
}

interface IUserService {
    public function getAll(): ?array;
}

interface ILogRepository {
    public function generate(mixed $log): mixed;
}
