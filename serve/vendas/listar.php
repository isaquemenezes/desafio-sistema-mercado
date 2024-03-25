<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 

require_once("../models/Crud.php");

class Vendas extends Crud {

    protected $crud;

    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function listarVendas() {
        try {
           
          
            $selectVendas = $this->crud->selectDB(
                "*", 
                "vendas", 
                "", 
                array()
            );
                                     
            $vendas = $selectVendas->fetchAll(PDO::FETCH_ASSOC);

            foreach ($vendas as &$venda) {
                
                $selectProduto = $this->crud->selectDB(
                    "*", 
                    "produtos", 
                    "WHERE id = ?", 
                    array(
                        $venda["produto_id"]
                    )
                );

                $produto = $selectProduto->fetch(PDO::FETCH_ASSOC);
                
                $venda["produto"] = $produto;

                // Calcula o total da venda
                $venda["total"] = $venda["quantidade_produto"] * $produto["preco"];

                // Calcula o imposto da venda sobre cada item
                $venda["imposto"] = ($produto["preco"] * $produto["percentual"]) / 100;

                // // Calcula o total de produtos por grupo de vendas
                // $grupo = $venda["numero_venda"];
                // if (!isset($totalPorGrupo[$grupo])) {
                //     $totalPorGrupo[$grupo] = 0;
                // }
                // $totalPorGrupo[$grupo] += $venda["total"];

                // // Calcula o imposto Total vendas
                // $grupo = $venda["numero_venda"];
                // if (!isset($totalImpostoPorGrupo[$grupo])) {
                //     $totalImpostoPorGrupo[$grupo] = 0;
                // }
                // $totalImpostoPorGrupo[$grupo] += $venda["imposto"];

            }

            $dataset = [
                "dados" => $vendas,
                // "totalPorGrupo" => $totalPorGrupo,
                // "totalImpostoPorGrupo" => $totalImpostoPorGrupo
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



