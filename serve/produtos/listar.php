<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 

require_once("../classes/produto/Produtos.php");

$crud = new Crud();
$produtos = new Produtos($crud);

$produtos->listarProdutos();



