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

require_once("../models/ConexaoDb.php");

class Vendas extends ConexaoDb {

    public function listarVendas() {
        try {
           
            $conexao = $this->conectaDB();
                           
            $sql = "SELECT * FROM devedor";
            
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            
            $vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $dataset = [
                "dados" => $vendas
            ];

            
            echo json_encode($dataset);
           
        } catch (PDOException $erro) {
          
            echo json_encode(array('error' => 'Erro ao buscar as vendas: ' . $erro->getMessage()));
        }
    }
}

// Crie uma instância da classe Vendas
$vendas = new Vendas();

// Chame o método para listar as vendas
$vendas->listarVendas();



