import { Route, Routes as RoutesDom } from "react-router-dom"


import Home from '../pages/Home';
import ProdutoIndex from '../pages/produtos/index';
import VendaIndex from '../pages/vendas/index';
import CadastrarProduto from '../pages/produtos/cadastrar-produto';

const Routes = () => {
    return (
        <RoutesDom>

            <Route path="/" element={<Home />} />

            <Route path="/produtos" element={<ProdutoIndex />} />
            <Route path="/vendas" element={<VendaIndex />} />
            <Route path="/produtos/cadastrar-produto" element={<CadastrarProduto />} />


        </RoutesDom>
    )
}

export default Routes