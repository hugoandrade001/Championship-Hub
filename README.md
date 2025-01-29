# Sistema de Gerenciamento de Jogos

Este projeto é um sistema desenvolvido em Laravel para gerenciar partidas de um campeonato. Ele permite cadastrar, visualizar, atualizar e excluir jogos, além de gerar placares automaticamente através de um script Python.

## 🚀 Tecnologias Utilizadas

- **PHP 8.2**
- **Laravel 11**
- **Python 3.10**
- **MySQL**
- **Insomnia** (para testes de API)

📌 O que foi feito?
- Desenvolvimento de uma API REST para gerenciamento de campeonatos.
- Implementação de um sistema eliminatório, seguindo as regras do teste técnico:
- Quartas de final (8 times).
- Semifinais (4 times).
- Final e disputa pelo terceiro lugar.
- Geração de placares automáticos através de um script Python.
- Implementação de critérios de desempate:
1º critério: Maior pontuação acumulada.
2º critério: Time inscrito primeiro no campeonato.
Banco de dados relacional (MySQL).
Testes de API com Insomnia.

📜 Critérios de Desempate
1️⃣ Maior pontuação acumulada durante o campeonato.
2️⃣ Time cadastrado primeiro no campeonato, em caso de empate.

🏆 Como Funciona o Gerador de Placar?
O sistema utiliza um script Python (teste.py) para gerar placares de forma aleatória.

Código do script:
import random
print(random.randrange(0, 8, 1))
print(random.randrange(0, 8, 1))
Laravel executa esse script automaticamente, captura o output e o usa como resultado das partidas.




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


