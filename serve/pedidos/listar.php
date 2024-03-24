<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); 

require_once("../models/Crud.php");

class Produtos extends Crud {

    protected $crud;

    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function listarProdutos() {
        try {
           
            $selectProdutos = $this->crud->selectDB(
                "*", 
                "card", 
                "", 
                array()
            );
         
            $produtos = $selectProdutos->fetchAll(PDO::FETCH_ASSOC);
           
            $dataset = [
                "dados" => $produtos
            ];
            
            echo json_encode($dataset);
           
        } catch (PDOException $erro) {
          
            echo json_encode(array(
                'error' => 'Erro ao buscar as produtos: ' . $erro->getMessage()
            ));
        }
    }
}

$crud = new Crud();
$produtos = new Produtos($crud);

$produtos->listarProdutos();



