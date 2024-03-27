<?php

namespace Models;

use PDOException;

class Venda extends Crud
{
    public function listar()
    {
        try {

            $selectVendas = $this->selectDB(
                "*",
                "vendas",
                "",
                array()
            );

            $vendas = $selectVendas->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($vendas as &$venda) {

                $selectProduto = $this->selectDB(
                    "*",
                    "produtos",
                    "WHERE id=?",
                    array(
                        $venda["produto_id"]
                    )
                );

                $produto = $selectProduto->fetch(\PDO::FETCH_ASSOC);

                $venda["produto"] = $produto;

                // Calcula o total da venda
                $venda["total"] = $venda["quantidade_produto"] * $produto["preco"];

                // Calcula o imposto da venda sobre cada item
                $venda["calculo_imposto"] = ($produto["preco"] * $produto["percentual"]) / 100;

            }

            $dataset= [
                "dados" => $vendas,
            ];

            echo json_encode($dataset);

        } catch (PDOException $e) {
            throw new PDOException('Erro ao buscar produtos: ' . $e->getMessage());
        }
    }

    public function criar(array $addProduto)
    {
      
        if (isset($addProduto['id_produto'])) {
            $id = 0;
            $numeroVenda = null;
            $insertProduto = $this->insertDB(
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


        if (isset($addProduto['finalizar']) && $addProduto['finalizar'] === true) {


            $ultimoNumeroVenda = $this->selectDB(
                "*",
                "vendas",
                "WHERE numero_venda <> ? ORDER BY id DESC LIMIT 1",
                array(
                    0
                )
            )->fetch(\PDO::FETCH_ASSOC);

            $numeroVenda = $ultimoNumeroVenda
                ? $ultimoNumeroVenda['numero_venda'] + 1
                : 1;


            $this->updateDB(
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

    }

  
  
}
