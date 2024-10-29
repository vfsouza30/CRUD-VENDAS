# CRUD-VENDAS

versões necessárias para o projeto:
1- PHP ^8.1
2 - composer ^2.7

Passos necessários para executar o projeto:

1- Clone o projeto usando:
```
    git clone https://github.com/vfsouza30/CRUD-VENDAS.git
```
2- Na pasta do projeto execute

```
    composer install
    cp .env.example .env
    php artisan key:generate
```
3- Instale o MySQL e o XAMPP, e configure o .env com as credenciais do seu banco conforme o exemplo:

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT='PORT'
    DB_DATABASE='DATABASE'
    DB_USERNAME='USARNAME'
    DB_PASSWORD='PASSWORD'
```
4- Finalize com comandos do artisan para criar o banco e rodar o servidor
```
    php artisan migrate
    php artisan serve
```

5- Para ver as telas acesse crud-vendas/public/prints