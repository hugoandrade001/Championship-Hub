# Sistema de Gerenciamento de Jogos

Este projeto é um sistema desenvolvido em Laravel para gerenciar partidas de um campeonato. Ele permite cadastrar, visualizar, atualizar e excluir jogos, além de gerar placares automaticamente através de um script Python.

## 🚀 Tecnologias Utilizadas

- **PHP 8.2**
- **Laravel 11**
- **Python 3.10**
- **MySQL**
- **Insomnia** (para testes de API)

## ⚙️ Como Configurar e Rodar o Projeto

### 1️⃣ Clonar o Repositório


git clone https://github.com/seu-usuario/seu-repositorio.git


### 2️⃣ Acessar o Diretório do Projeto


cd seu-repositorio


### 3️⃣ Instalar as Dependências


composer install


### 4️⃣ Configurar as Variáveis de Ambiente

`
cp .env.example .env
php artisan key:generate


> **Atenção:** Configure as credenciais do banco de dados no arquivo `.env`.

### 5️⃣ Rodar as Migrations e Seeders


php artisan migrate --seed


### 6️⃣ Iniciar o Servidor Laravel


php artisan serve


## 📜 Rotas da API

- **Criar um jogo:** `POST /api/games`
- **Listar todos os jogos:** `GET /api/games`
- **Visualizar um jogo específico:** `GET /api/games/{id}`
- **Atualizar um jogo:** `PUT /api/games/{id}`
- **Deletar um jogo:** `DELETE /api/games/{id}`

## 🔗 Testando com Insomnia

Para testar a API, você pode usar o [Insomnia](https://insomnia.rest/download), Postman ou qualquer ferramenta de requisições HTTP.


