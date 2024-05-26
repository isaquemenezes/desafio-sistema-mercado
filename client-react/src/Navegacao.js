import React from 'react';
import { Link } from 'react-router-dom';

const Navegacao = () => {
    return (
        <div>
            <Link className="btn btn-success" to="/cadastroProduto">
                Cadastrar Produto--
            </Link>
        </div>
    );
};

export default Navegacao;