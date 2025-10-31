# 🐳 DOCKER.md — Ambiente Laravel com Docker

Este guia explica como configurar e executar o projeto Laravel usando Docker. Ele inclui PHP, MySQL, Nginx e Node.js (Vite) em containers separados, com volumes e permissões corretamente ajustados.

---

## 📦 Requisitos

-   [Docker Desktop](https://www.docker.com/products/docker-desktop)
-   [Node.js](https://nodejs.org/) (opcional, se quiser rodar Vite localmente)
-   Git (para clonar o projeto, se necessário)

---

## 📁 Estrutura esperada do projeto

```
team-meta-demo/
├── app/                  # Código Laravel
├── docker/
│   ├── php/
│   │   ├── Dockerfile
│   │   ├── php.ini
│   │   └── entrypoint.sh
│   ├── nginx/
│   │   └── default.conf
│   └── node/
│       └── Dockerfile
├── .env.docker           # Arquivo de ambiente para Docker
├── docker-compose.yml
├── .dockerignore
```

---

## ⚙️ Configuração inicial

### 1. Clone o projeto ou copie os arquivos

```bash
git clone https://github.com/ElisameAraujo/team-meta-demo.git
cd team-meta-demo
```

### 2. Crie o arquivo `.env` a partir do modelo

```bash
cp .env.docker .env
```

> Edite se necessário: APP_URL, DB_DATABASE, DB_USERNAME, DB_PASSWORD

---

## 🚀 Subindo os containers

```bash
docker-compose build
docker-compose up -d
```

---

## 🧪 Testes rápidos

### Verificar se o Laravel está rodando:

Acesse [http://localhost](http://localhost)

### Verificar se o banco está acessível:

Use o MySQL Workbench com:

| Campo    | Valor     |
| -------- | --------- |
| Hostname | 127.0.0.1 |
| Port     | 3306      |
| Username | root      |
| Password | root      |
| Database | team_meta |

---

## 🛠️ Scripts internos

### `entrypoint.sh` (executado ao iniciar o container PHP)

```bash
#!/bin/bash

chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
rm -rf public/storage
php artisan storage:link

exec "$@"
```

---

## 📂 Acesso aos arquivos do container

Como o volume `.:/var/www/html` está montado, você já tem acesso aos arquivos do container diretamente pela pasta local do projeto.

Para explorar o sistema de arquivos completo do container:

```bash
docker exec -it team-meta-demo bash
```

Ou use o [VS Code com a extensão Docker](https://marketplace.visualstudio.com/items?itemName=ms-azuretools.vscode-docker).

---

## 🧹 Limpeza e boas práticas

### `.dockerignore` recomendado:

```
vendor
node_modules
public/storage
.env
.env.local
```

---

## ✅ Pronto para produção?

-   Configure variáveis sensíveis via `.env.prod`
-   Use volumes nomeados para persistência de dados
-   Adicione HTTPS no Nginx se necessário
-   Configure backups do banco de dados

---

Se quiser, posso te ajudar a montar um `Makefile` ou script de setup automático para facilitar ainda mais. Esse refinamento tá com acabamento de Laravel Dockerizado pronto pra qualquer máquina! 🧠📦🌍
