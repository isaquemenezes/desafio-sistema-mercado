<?php
namespace Tests\Controllers;

use Controllers\ProdutoController;
use PHPUnit\Framework\TestCase;
use Services\ProdutoService;

class ProdutoControllerTest extends TestCase
{
    public function testListar()
    {
        $produtoServiceMock = $this->createMock(ProdutoService::class);
        $produtoServiceMock->expects($this->once())
                           ->method('listarProdutos')
                           ->willReturn(['produto1', 'produto2']); // Simula produtos retornados
        
        $produtoController = new ProdutoController($produtoServiceMock);
        
        // Capturar saída do método listar
        ob_start();
        $produtoController->listar();
        $output = ob_get_clean();

        // Verificar saída é um JSON válido produtos
        $this->assertJson($output);
        $this->assertEquals(
            json_encode(
                [
                    'dados' => ['produto1', 'produto2']
                ]
            ), $output);
    }

    public function testCriar()
    {
        $produtoServiceMock = $this->createMock(ProdutoService::class);
        $produtoServiceMock->expects($this->once())
                           ->method('criarProduto')
                           ->with(['nome' => 'Produto Teste'])
                           ->willReturn('Produto criado com sucesso'); // mensagem de sucesso
        
        $produtoController = new ProdutoController($produtoServiceMock);
        
        // Capturar saída do método criar
        ob_start();
        $produtoController->criar(['nome' => 'Produto Teste']);
        $output = ob_get_clean();

        // Verififar saída é um JSON válido com sucesso
        $this->assertJson($output);
        $this->assertEquals(
            json_encode(
                'Produto criado com sucesso'
            ), $output);
    }
}

