import React, { useState, useEffect } from 'react';

const Vendas = () => {
    const [vendas, setVendas] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetch(`http://localhost:8000/vendas/listar.php`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar os dados');
                }
                return response.json();

            })
            .then(data => {
                setVendas(data.dados);
                setLoading(false);
            })
            .catch(error => {
                setError(error.message);
                setLoading(false);
            });
    }, []);

    if (loading) {
        return <div>Carregando...</div>;
    }

    if (error) {
        return <div>Erro: {error}</div>;
    }

    return (
        <main class="container">

            <div class="mt-3 my-3 p-3 bg-body rounded shadow-sm">
            </div>

            <div class="mt-5 my-3 p-3 bg-body rounded shadow-sm">

                <div class="d-flex justify-content-between">
                    <h3 class="border-bottom pb-2 mb-0">Todas as Vendas</h3>

                    <div class="d-flex justify-content-between">
                        <router-link class="btn btn-success" to="/cadastroProduto">
                            Cadastrar Venda
                        </router-link>
                    </div>

                </div>

                <div v-if="produtos.length == 0">
                    <strong class="d-block mt-2"> Sem Vendas </strong>
                </div>

                {/* start loop  */}
                {vendas.map(venda=> (
                    <div class="d-flex text-body-secondary pt-3" >

                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">

                            <div class="d-flex justify-content-between align-items-center">
                                <strong class="text-gray-dark"><b>Descrição: </b>{venda.descricao}</strong>

                                <div>
                                    <button type="button" class="btn btn-primary me-2">Editar</button>
                                    <button type="button" class="btn btn-danger">Excluir</button>
                                </div>

                            </div>

                            <div class="d-flex justify-content-start">

                                <div class="d-block">
                                    <b>Preço (R$): </b> {venda.preco}
                                </div>

                                <div class="d-block  ms-3">
                                    <b>Tipo: </b> {venda.tipo}
                                </div>

                                <div class="d-block ms-3">
                                    <b>Imposto (%): </b> {venda.percentual}
                                </div>

                            </div>
                        </div>
                    </div>
                ))}
                {/*  end loop */}

            </div>
        </main>
      
    );
};

export default Vendas;
