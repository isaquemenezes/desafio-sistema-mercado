<?php

namespace Models;

use PDOException;


class Produto extends Crud
{
    public function listar()
    {
        try {
            return $this->selectDB(
                '*',
                'produtos',
                'ORDER BY id DESC',
                array()
            )->fetchAll(\PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new PDOException('Erro ao buscar produtos: ' . $e->getMessage());
        }
    }

    public function criar(array $dados)
    {
        try {
              
               $id = 0;
               $preco = $dados['preco'];
               $descricao = $dados['descricao'];
               $tipo = $dados['tipo'];
               $percentual_imposto = $dados['percentual_imposto'];
   
              
               $insertProdutos = $this->inserirProduto(
                    $id, 
                    $preco,
                    $descricao,
                    $tipo,
                    $percentual_imposto
               );
   
              
               if ($insertProdutos) {
                  
                   return ['success' => 'Produto cadastrado com sucesso.'];
               } else {
                  
                   return ['error' => 'Erro ao cadastrar o produto.'];
               }

        } catch (PDOException $e) {
            throw new PDOException('Erro ao criar produto: ' . $e->getMessage());
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
    protected function inserirProduto(int $id, int $preco, string $descricao, string $tipo, int $percentual_imposto) {
        return $this->insertDB(
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

    public function deletar($produto_id) 
    {
        try {
            // $id = $produto_id['id'];

            $produto = $this->deleteDB(
                'produtos',
                'id=?',
                array(
                    $produto_id
                )
            );

            if ($produto) {
                  
                return ['success' => 'Produto cadastrado com sucesso.'];
            } else {
               
                return ['error' => 'Erro ao cadastrar o produto.'];
            }

        } catch (PDOException $e) {
            throw new PDOException('Erro ao deletar produto: ' . $e->getMessage());
        }

      

        
    } 
}
