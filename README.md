
## Configuração do projeto

### Banco de dados

1. Criar o banco de dados chamado **cotacaodb**
2. Importar o banco que está na raiz
ou
3. Criar banco a partir das migrations do laravel.
O código abaixo vai gerar as tabelas do banco e também vai inserir os registros na tabela *transportadora*.

```sh
php artisan migrate:refresh --seed
```
4. Abrir a pasta cotacao_api, localizar o arquivo **.env.example** e renomear para **.env**
### Rodar API
1. Abrir a pasta cotacao_api e rodar o comando para atualizar as dependências
```sh
composer update
```
2. Iniciar a aplicação
```sh
php artisan serve
```

### Acessar Front-end
1. Com o servidor apache iniciado, acessar o endereço: http://localhost/teste_dev_ordeco/cotacao_front/