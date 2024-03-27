<?php

require_once __DIR__ . "/../../models/Crud.php";

class Listar extends Crud
{

    protected Crud $crud;

    public function __construct(Crud $crud)
    {
        $this->crud = $crud;
    }

    public function listarVendas(): void
    {
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
                    "WHERE id=?",
                    array(
                        $venda["produto_id"]
                    )
                );

                $produto = $selectProduto->fetch(PDO::FETCH_ASSOC);

                $venda["produto"] = $produto;

                // Calcula o total da venda
                $venda["total"] = $venda["quantidade_produto"] * $produto["preco"];

                // Calcula o imposto da venda sobre cada item
                $venda["calculo_imposto"] = ($produto["preco"] * $produto["percentual"]) / 100;

            }

            $dataset = [
                "dados" => $vendas,
            ];

            echo json_encode($dataset);

        } catch (PDOException $erro) {

            echo json_encode(array('error' => 'Erro ao buscar as vendas: ' . $erro->getMessage()));
        }
    }
}