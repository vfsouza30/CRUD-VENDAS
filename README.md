# CRUD-VENDAS

versões necessárias para o projeto:
1- PHP ^8.1
2 - composer ^2.7

Passos necessários para executar o projeto:

1- Clone o projeto usando:
<code>git clone https://github.com/vfsouza30/CRUD-VENDAS.git</code>

2- Na pasta do projeto execute
<code>composer install</code>
<code> cp .env.example .env
<code>php artisan key:generate</code>

3- Instale o MySQL e o XAMPP, e configure o .env com as credenciais do seu banco conforme o exemplo:

<code>
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT='PORT'
    DB_DATABASE='DATABASE'
    DB_USERNAME='USARNAME'
    DB_PASSWORD='PASSWORD'
</code>
<code>php artisan migrate</code>