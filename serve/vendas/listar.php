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
            }

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



