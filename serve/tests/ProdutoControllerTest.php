<?php

// require_once __DIR__ . "/../controllers/ProdutoController.php";
// require_once __DIR__ . "/../services/ProdutoService.php";
// require_once __DIR__ . "/../models/Crud.php";

use Controllers\ProdutoController;
use Services\ProdutoService;
use Models\Crud;

use PHPUnit\Framework\TestCase;

class ProdutoControllerTest extends TestCase
{
    public function testListarProdutos()
    {
        $crudMock = $this->createMock(Crud::class);
        $produtoServiceMock = $this->createMock(ProdutoService::class);
        
        $produtos = [
            ['id' => 1, 'nome' => 'Produto A'],
            ['id' => 2, 'nome' => 'Produto B']
        ];

        $produtoServiceMock->expects($this->once())
            ->method('listarProdutos')
            ->willReturn($produtos);

        $controller = new ProdutoController($produtoServiceMock);

        ob_start(); // Captura a saída
        $controller->listar();
        $output = ob_get_clean(); // Pára a captura e retorna a saída

        // Verifisa a saída é igual ao JSON esperado
        $this->assertEquals(json_encode($produtos), $output);
    }
}
