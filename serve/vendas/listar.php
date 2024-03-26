<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 

require_once("../classes/venda/Listar.php");

$crud = new Crud();
$vendas = new Listar($crud);

$vendas->listarVendas();



