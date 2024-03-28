import { createRouter, createWebHistory } from 'vue-router'

import Home from '@/components/Home';
import Produtos from '../views/Produtos.vue'
import Vendas from '../views/Vendas.vue'
import CadastroVenda from '../views/CadastroVenda.vue'
import CadastroProduto from '../views/CadastroProduto.vue'

const routes = [

  {
    path: '/',
    name: 'Home',
    component: Home,
  },
   
  {
    path: '/produtos',
    name: 'Produtos',
    component: Produtos,
   
  },

  {
    path: '/cadastroProduto',
    name: 'CadastroProduto',
    component: CadastroProduto
  },

 
  {
    path: '/vendas',
    name: 'Vendas',
    component: Vendas
  },

  {
    path: '/cadastroVenda',
    name: 'CadastroVenda',
    component: CadastroVenda
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
