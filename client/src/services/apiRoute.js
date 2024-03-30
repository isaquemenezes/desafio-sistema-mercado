const baseUrl = 'http://localhost:8000';

export const apiRoute = {
  
  produtos: {
    listar: `${baseUrl}/produtos/listar.php`,
    create: `${baseUrl}/produtos/create.php`,
    deletar: `${baseUrl}/produtos/deletar.php`,
    tipoImposto: `${baseUrl}/produtos/tipo-imposto.php`
  },

  vendas: {
    listar: `${baseUrl}/vendas/listar.php`,
    create: `${baseUrl}/vendas/create.php`,
    addProduto: `${baseUrl}/vendas/addProduto.php`
  },
  
};
