<?php
   
    require_once(__DIR__ . "/../../models/Crud.php");

    class AddProduto extends Crud {

        protected Crud $crud;

        public function __construct(Crud $crud) {
            $this->crud = $crud;
        }

        public function createVenda(array $addProduto, ?array $dados = null): void {
            try {           

                if(isset($addProduto['id_produto'])) {
                    $id = 0;
                    $numeroVenda = null;
                    $insertProduto = $this->crud->insertDB(
                        "vendas", 
                        "?,?,?,?",
                        array(  
                            $id,
                            $addProduto['id_produto'],
                            0,
                            $addProduto['quantidade_produto']
                        ) 
                    );
                }        


                if (isset($dados['finalizar']) && $dados['finalizar'] === true) {
                        
                
                    $ultimoNumeroVenda = $this->crud->selectDB(
                        "*", 
                        "vendas",  
                        "WHERE numero_venda <> ? ORDER BY id DESC LIMIT 1",
                        array(
                            0
                        )
                    )->fetch(PDO::FETCH_ASSOC);

                    $numeroVenda = $ultimoNumeroVenda 
                        ? $ultimoNumeroVenda['numero_venda'] + 1 
                        : 1;

                            
                    $this->crud->updateDB(
                        "vendas", 
                        "numero_venda=?", // values
                        "numero_venda=?", // where
                        array(
                            $numeroVenda,
                            0
                        )
                    );          
                
                    echo json_encode([
                        'venda' => 'Venda registrada com sucesso'
                    ]);
                
                } else {
                    echo json_encode(
                        array(
                            'numero_venda' => 'A venda não deve ser finalizada.'
                        )
                    );
                    
                }

            
            } catch (PDOException $erro) {
                echo json_encode(array('error' => 'Erro ao buscar as vendas: ' . $erro->getMessage()));
            }
        }
    }