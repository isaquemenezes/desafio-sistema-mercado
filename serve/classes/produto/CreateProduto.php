<?php
  
    require_once(__DIR__ . "/../../models/Crud.php");

     class CreateProduto extends Crud {
 
         protected $crud;
         public function __construct(Crud $crud) {
             $this->crud = $crud;
         }
 
         public function createProduto(array $produtos) {
             try {
 
                 $id = 0;
                 $preco = $produtos['preco'];
                 $descricao = $produtos['descricao'];
                 $tipo = $produtos['tipo'];
                 $percentual_imposto = $produtos['percentual_imposto'];
 
                 $insertProdutos = $this->crud->insertDB(
                     "produtos", 
                     "?,?,?,?,?",
                     array(  
                         $id,
                         $preco,
                         $descricao,
                         $tipo,
                         $percentual_imposto
                     )                     
                 );
 
                 if ($insertProdutos) {
                     echo json_encode(
                         array(
                             'success' => 'Produto cadastrado com sucesso.'
                         )
                     );
                 } else {
                     echo json_encode(
                         array(
                             'error' => 'Erro ao cadastrar o produto.'
                         )
                     );
                 }
             } catch (PDOException $erro) {
                 echo json_encode(
                     array(
                         'error' => 'Erro ao cadastrar o produto: ' . $erro->getMessage()
                     )
                 );
             }
         }
     }