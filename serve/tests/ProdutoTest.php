<?php

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testListar()
    {
        // require_once __DIR__ . "/../controllers/ProdutoController.php";
        // require_once __DIR__ . "/../services/ProdutoService.php";
        // require_once __DIR__ . "/../models/Crud.php";
    
        $crud = new \Models\Crud();
        $produtoService = new \Services\ProdutoService($crud);
    
        $controller = new \Controllers\ProdutoController($produtoService);
        // $result = $controller->listar();

        // $this->assertJson($result);
        ob_start(); // Inicia o buffer de saída para capturar a saída do echo
        $controller->listar();
        $result = ob_get_clean(); // Captura a saída do echo e limpa o buffer

        $this->assertJson($result);
        $this->assertStringContainsString('success', $result);

    }
}
