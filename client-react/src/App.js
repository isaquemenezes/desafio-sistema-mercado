import React from 'react';
// import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

// import Home from './pages/Home';
// import ProdutoIndex from './pages/produtos/index';
// import VendaIndex from './pages/vendas/index';
// import CadastrarProduto from './pages/produtos/cadastrar-produto';
import Routes from './router/routes';
import './App.css';

function App() {
    return (
        // <Router>
        <div className="App">
        <Routes />
            {/* <Routes>
               <Route path="/" element={<Home />} />

               <Route path="/produtos" element={<ProdutoIndex />} />
               <Route path="/vendas" element={<VendaIndex />} />
               <Route path="/produtos/cadastrar-produto" element={<CadastrarProduto />} />
              
               
            </Routes> */}
        </div>
    // </Router>
    );
}

export default App;
