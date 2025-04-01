# Guia de Configuração do Projeto

Este guia explica como configurar e rodar o backend em PHP.

---

## Backend

### 1. Clonar o Repositório

```bash
git clone https://github.com/Gustavpip/teste-tecnico-gustavo-pereira-batista.git
cd teste-tecnico-gustavo-pereira-batista/backend
```

### 3. Subir os containers com Docker

O projeto depende de um banco de dados PostgreSQL. Para subir os containers necessários, execute:

```bash
docker compose up -d
```

### 4. Instalar Dependências

```bash
npm ci
```

### 5. Rodar as Migrações

```bash
npm run migration:run
```

### 6. Iniciar o Servidor

```bash
npm run dev
```

O backend estará rodando na porta **3005**.

---

## Frontend

### 1. Acessar o Diretório do Frontend

```bash
cd teste-tecnico-gustavo-pereira-batista/frontend
```

### 2. Criar o Arquivo `.env`

Crie um arquivo `.env` na raiz do projeto frontend e configure a seguinte variável:

```env
VITE_API_URL=http://localhost:3005
```

### 3. Instalar Dependências

```bash
npm ci
```

### 4. Iniciar o Servidor

```bash
npm run dev
```

O frontend estará disponível em **http://localhost:5173**.

Agora você pode acessar a aplicação pelo navegador e começar a utilizá-la!

