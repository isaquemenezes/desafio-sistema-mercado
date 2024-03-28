<?php
namespace Tests\Classes;

use PHPUnit\Framework\TestCase;
use Classes\TipoProduto;

class TipoProdutoTest extends TestCase
{
    public function testGetTipos()
    {
        $tipoProduto = new TipoProduto();

        $expectedTipos = [
            [
                "id" => 1,
                "tipo" => "A",
                "percentual_imposto" => 7
            ],
            [
                "id" => 2,
                "tipo" => "AA",
                "percentual_imposto" => 10
            ],
            [
                "id" => 3,
                "tipo" => "AAA",
                "percentual_imposto" => 17
            ]
        ];

        $this->assertEquals($expectedTipos, $tipoProduto->getTipos());
    }

    public function testGetDataset()
    {
        $tipoProduto = new TipoProduto();

        $expectedDataset = [
            "message" => "Tipos de produtos com percentual de imposto",
            "tipos" => [
                [
                    "id" => 1,
                    "tipo" => "A",
                    "percentual_imposto" => 7
                ],
                [
                    "id" => 2,
                    "tipo" => "AA",
                    "percentual_imposto" => 10
                ],
                [
                    "id" => 3,
                    "tipo" => "AAA",
                    "percentual_imposto" => 17
                ]
            ]
        ];

        $this->assertEquals($expectedDataset, $tipoProduto->getDataset());
    }
}
