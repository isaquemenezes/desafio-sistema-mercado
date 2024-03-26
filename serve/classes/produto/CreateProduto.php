<?php

/*
  
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

*/

require_once(__DIR__ . "/../../models/Crud.php");

class CreateProduto extends Crud {

    protected Crud $crud;

    /**
     * @param Crud $crud 
     */
    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    /**
     * Cria um novo produto.
     * @param array $produtos
     * @return array 
     */
    public function createProduto(array $produtos): array {
        try {
            $id = 0;
            $preco = $produtos['preco'];
            $descricao = $produtos['descricao'];
            $tipo = $produtos['tipo'];
            $percentual_imposto = $produtos['percentual_imposto'];

           
            $insertProdutos = $this->inserirProduto(
                $id, 
                $preco, 
                $descricao, 
                $tipo, 
                $percentual_imposto
            );

            if ($insertProdutos) 
            {
                echo json_encode([
                    'success' => 'Produto cadastrado com sucesso.' 
                ]);

                return ['success' => 'Produto cadastrado com sucesso.'];

            } else {
                return ['error' => 'Erro ao cadastrar o produto.'];
            }
        } catch (PDOException $erro) {
            return ['error' => 'Erro ao cadastrar o produto: ' . $erro->getMessage()];
        }
    }

   
    /**
     * Insere um novo produto no banco de dados.
     * @param int $id
     * @param int $preco
     * @param string $descricao
     * @param string $tipo 
     * @param int $percentual_imposto
     * @return bool
     */
    protected function inserirProduto(int $id, int $preco, string $descricao, string $tipo, int $percentual_imposto): bool {
        return $this->crud->insertDB(
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
    }
}

