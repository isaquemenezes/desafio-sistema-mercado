import { createRouter, createWebHistory } from 'vue-router'
import Pedidos from '../views/Pedidos.vue'
import Produtos from '../views/Produtos.vue'
import Vendas from '../views/Vendas.vue'
import CadastrarVenda from '../views/CadastrarVenda.vue'

const routes = [
  {
    path: '/pedidos',
    name: 'Pedidos',
    component: Pedidos
  },
  {
    path: '/produtos',
    name: 'Produtos',
    component: Produtos,
    // component: () => import('../views/produtos/Index.vue'),
    //   children: [        
    //     {
    //       path: 'cadastro',
    //       name: 'CadastroProduto',
    //       component: () => import('../views/produtos/CadastroProduto.vue')
    //     },
      
      
        
    //   ]
  },

 
  {
    path: '/vendas',
    name: 'Vendas',
    component: Vendas
  },

  {
    path: '/cadastrarVenda',
    name: 'CadastrarVenda',
    component: CadastrarVenda
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
