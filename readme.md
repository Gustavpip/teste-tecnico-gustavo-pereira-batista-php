# Guia de Configuração do Projeto

Este guia explica como configurar e rodar o backend em PHP.

---

## Backend

### 1. Clonar o Repositório

```bash
git clone https://github.com/Gustavpip/teste-tecnico-gustavo-pereira-batista-php.git
cd teste-tecnico-gustavo-pereira-batista-php
```

### 3. Subir os containers com Docker

O projeto depende de um banco de dados PostgreSQL. Para subir os containers necessários, execute:

```bash
docker compose up -d
```

### 5. Rodar as Migrações

```bash
php src/migrations/create_clients_table.php up
php src/migrations/create_logs_table.php up
```

### 6. Iniciar o Servidor

```bash
php -S localhost:8000
```

O sistema estará rodando na porta **8000**.

---
Agora você pode acessar a aplicação pelo navegador e começar a utilizá-la!

