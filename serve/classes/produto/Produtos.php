<?php 

    require_once(__DIR__ . "/../../models/Crud.php");

    class Produtos extends Crud {

        protected Crud $crud;

        public function __construct(Crud $crud) {
            $this->crud = $crud;
        }

        public function listarProdutos(): void {
            try {
            
                $selectProdutos = $this->crud->selectDB(
                    "*", 
                    "produtos", 
                    "ORDER BY id DESC", 
                    array()
                );
            
                $produtos = $selectProdutos->fetchAll(PDO::FETCH_ASSOC);
            
                $dataset = [
                    "messagem" => 'Produto cadastrado com sucesso!',
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