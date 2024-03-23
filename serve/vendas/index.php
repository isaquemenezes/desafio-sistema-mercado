<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 


// $dadosVendas = [
//     [
//         "id" => 1,
//         "produto" => "Produto A",
//         "quantidade" => 10,
//         "preco_unitario" => 25.99
//     ],
//     [
//         "id" => 2,
//         "produto" => "Produto B",
//         "quantidade" => 5,
//         "preco_unitario" => 19.99
//     ],
//     [
//         "id" => 3,
//         "produto" => "Produto C",
//         "quantidade" => 8,
//         "preco_unitario" => 30.50
//     ]
// ];


// $resposta = [
//     "message" => "Hello, world API - Vendas!",
//     "data" => $dadosVendas
// ];


// echo json_encode($resposta);

// require_once("../models/ConexaoDb.php");
require_once("../models/Crud.php");

// class Vendas extends ConexaoDb {
class Vendas extends Crud {

    protected $crud;

    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function listarVendas() {
        try {
           
            // $conexao = $this->conectaDB();
            $selectVendas = $this->crud->selectDB("*", "devedor", "", array());
                           
            // $sql = "SELECT * FROM devedor";
            
            // $stmt = $conexao->prepare($sql);
            // $stmt->execute();
            
            // $vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $vendas = $selectVendas->fetchAll(PDO::FETCH_ASSOC);
           

            $dataset = [
                "dados" => $vendas
            ];

            
            echo json_encode($dataset);
           
        } catch (PDOException $erro) {
          
            echo json_encode(array('error' => 'Erro ao buscar as vendas: ' . $erro->getMessage()));
        }
    }
}


$crud = new Crud();
$vendas = new Vendas($crud);

$vendas->listarVendas();



