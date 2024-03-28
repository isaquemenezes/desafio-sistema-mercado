# desafio-sistema-mercado

# client

## abra o diretório client
```
cd client
```
## instale as dependências
```
npm install
```

### levante o servidor
```
npm run serve
```

# serve - Fornecedor API

## abra o diretório serve
```
cd serve
```
## Instale as dependências - neste caso, somente o phpUnit
```
composer install
```

## levante na porta 8000 o servidor nativo php
```
php -S localhost:8000
```


### Versoes e tecnologias usada neste Project:
- [x] PHP 8.2.4
- [x] Node v14.21.3
- [x] Bootstrap: 5.3.3
- [x] vue: 3.2.13
- [x] phpunit: 11.0
- [x] DBeaver
- [x] MySQL
- [x] Composer version 2.6.3
- [x] Visual Studio Code
- [x] Git
- [x] Postman
- [x] Xampp
- [x] Servidor nativo do PHP (php -S localhost:8000)
- [x] Windows 10

## Executes todos os tests:
```
vendor/bin/phpunit
```

### Configure suas informaçoes de conexao development Phinx:
- [x] phinx.php

### Executando Migrações
```
vendor/bin/phinx migrate
```


### teste o controller cadastro
```
vendor/bin/phpunit tests/Unit/ProdutoControllerTest.php
```

### Testes o controller vanda
```
vendor/bin/phpunit tests/Unit/VendaControllerTest.php
```

### Instale ORM - já no composer
```
composer require robmorgan/phinx
```

```
php vendor/bin/phinx init
``` 



```
vendor/bin/phinx create CreateProdutosTable
```

