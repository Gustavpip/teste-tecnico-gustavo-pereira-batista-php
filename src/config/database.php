<?php

return [
    'host' => getenv('DB_HOST') ?: 'localhost',
    'port' => getenv('DB_PORT') ?: '5433',
    'database' => getenv('DB_NAME') ?: 'clientes',
    'username' => getenv('DB_USER') ?: 'promad',
    'password' => getenv('DB_PASS') ?: 'promad_password',
];
