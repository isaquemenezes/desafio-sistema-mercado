<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 

require_once("../classes/produto/TipoProduto.php");

$tipoProduto = new TipoProduto();
$dataset = $tipoProduto->getDataset();

echo json_encode($dataset);
