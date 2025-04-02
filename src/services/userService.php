<?php

class UserService implements IUserService {

    private $apiUrl;
    private $client;

    public function __construct(string $apiUrl) {
        $this->apiUrl = $apiUrl;
        $this->client = curl_init();
    }

    public function getAll(): ?array {
        curl_setopt($this->client, CURLOPT_URL, $this->apiUrl);
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->client, CURLOPT_HEADER, false);

        $response = curl_exec($this->client);

        if ($response === false) {
            echo "Erro cURL: " . curl_error($this->client);
            return null;
        }

        $statusCode = curl_getinfo($this->client, CURLINFO_HTTP_CODE);

        if ($statusCode != 200) {
            echo "Erro HTTP: " . $statusCode;
            return null;
        }

        $data = json_decode($response, true);

        return $data ? [
            'statusCode' => $statusCode,
            'data' => $data
        ] : null;
    }

    public function __destruct() {
        curl_close($this->client);
    }
}
