<?php
namespace Classes;

class TipoProduto
{
    private array $tipos;

    public function __construct()
    {
        $this->tipos = [
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
    }

    public function getTipos(): array
    {
        return $this->tipos;
    }

    public function getDataset(): array
    {
        return [
            "message" => "Tipos de produtos com percentual de imposto",
            "tipos" => $this->tipos
        ];
    }
}