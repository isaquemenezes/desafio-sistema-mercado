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
           
            // $conexao = $this->conectaDB();
            $selectVendas = $this->crud->selectDB(
                "*", 
                "devedor", 
                "", 
                array()
            );
                           
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



