# Chirper Brasil (Laravel)

Aplicação de microblog desenvolvida com Laravel. O sistema inclui autenticação de usuários, criação de posts (chirps), edição de perfil e interface com tema escuro.

---

## Tecnologias utilizadas

* PHP ^8.2
* Laravel Framework ^12.0
* Composer
* Node.js + NPM
* Vite + Tailwind CSS
* SQLite (padrão local) ou qualquer banco compatível com o Laravel

---

## Requisitos

Antes de executar o projeto, certifique-se de ter instalado:

### PHP

* Versão 8.2 ou superior
* Verifique com:

```bash
php -v
```

### Composer

Gerenciador de dependências do PHP, essencial para instalar os pacotes do projeto.

* Verifique com:

```bash
composer -V
```

### Laravel (opcional)

Não é obrigatório para rodar este projeto já clonado, mas pode ser útil para criar novos projetos.

* Instalação opcional:

```bash
composer global require laravel/installer
```

* Verificar instalação:

```bash
laravel --version
```

### Node.js e NPM

Responsáveis pelo build do front-end (Vite e Tailwind).

* Verifique:

```bash
node -v
npm -v
```

---

## Como executar o projeto

Acesse a pasta do projeto (`chirper`) e siga os passos abaixo:

### 1. Instalar dependências do PHP

```bash
composer install
```

---

### 2. Configurar o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

No PowerShell (caso o `cp` não funcione):

```powershell
Copy-Item .env.example .env
```

---

### 3. Configurar o banco de dados

Forma mais simples utilizando SQLite:

```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate
```

Se preferir usar MySQL ou PostgreSQL, ajuste o arquivo `.env` antes de rodar as migrations.

---

### 4. Instalar dependências do front-end

```bash
npm install
```

---

### 5. Rodar o ambiente de desenvolvimento

Abra dois terminais:

**Terminal 1**

```bash
php artisan serve
```

**Terminal 2**

```bash
npm run dev
```

Depois, acesse:
http://127.0.0.1:8000

---

### Alternativa

Você também pode iniciar tudo com um único comando:

```bash
composer run dev
```

---

## Comandos úteis

* Executar testes:

```bash
php artisan test
```

* Gerar build para produção:

```bash
npm run build
```

---

## Aprendizados do projeto

Durante o desenvolvimento, foram trabalhados diversos conceitos importantes:

* Organização no padrão MVC (Models, Controllers, Views e rotas) do Laravel
* Utilização do Eloquent ORM para manipulação de dados
* Implementação de autenticação com Laravel Breeze (login, cadastro, recuperação de senha e perfil)
* Criação e controle de banco de dados com migrations
* Uso de Blade Components para reutilização de interface
* Integração de front-end com Vite e Tailwind CSS
* Personalização visual com tema escuro e identidade própria
* Tradução da aplicação para português do Brasil
* Boas práticas de configuração e execução em ambiente local

---

## Observações

* O projeto está preparado para rodar localmente de forma simples (`artisan serve` + `npm run dev`)
* Sempre que alterar o `.env`, reinicie o servidor
* Para produção, utilize:

```bash
npm run build
```

e configure corretamente um servidor web como Nginx ou Apache
