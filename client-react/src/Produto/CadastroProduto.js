import React, { useState, useEffect } from 'react';
// import 'bootstrap/dist/css/bootstrap.min.css';

const CadastroProduto = () => {
    // const [nome, setNome] = useState('');
    const [preco, setPreco] = useState('');
    const [descricao, setDescricao] = useState('');
    const [tipo, setTipo] = useState('');
    const [percentual_imposto, setpercentual_imposto] = useState('');
    const [arrayTipos, setArrayTipos] = useState([]);
    const [mensagem, setMensagem] = useState('');

    useEffect(() => {
        fetch('http://localhost:8000/produtos/tipo-imposto.php')
            .then(response => response.json())
            .then(data => {
                setArrayTipos(data.tipos);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();

        const produto = { 
            preco, 
            descricao, 
            tipo, 
            percentual_imposto 
        };

        fetch('http://localhost:8000/produtos/create.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(produto),
        })
        .then(response => {
            if (!response.ok) {
                
                throw new Error('Erro ao cadastrar o produto');
            }
            return response.json();
        })
        .then(data => {
            setMensagem('Produto cadastrado com sucesso!');
            // setNome('');
            setPreco('');
            setDescricao('');
            setTipo('');
            setpercentual_imposto('');
        })
        .catch(error => {
            setMensagem('Erro ao cadastrar o produto: ' + error.message);
        });
    };

    return (
        <div className="container mt-5">
            <h1 className="text-center">Cadastro de Produto</h1>
            { 
                mensagem && 
                <div className="alert alert-info"> { mensagem } 
                </div> 
            }

            <form onSubmit={handleSubmit}>
               
                
                <div className="form-group mt-2">
                    <label htmlFor="preco" className="text-start d-block">Preço</label>
                    <input
                        type="number"
                        className="form-control"
                        id="preco"
                        value={preco}
                        onChange={(e) => setPreco(e.target.value)}
                        required
                    />
                </div>

                <div className="form-group mt-2">
                    <label htmlFor="descricao" className="text-start d-block">Descrição</label>
                    <textarea
                        className="form-control"
                        id="descricao"
                        value={descricao}
                        onChange={(e) => setDescricao(e.target.value)}
                        required
                    ></textarea>
                </div>

                <div className="form-group mt-2">
                    <label htmlFor="tipo" className="text-start d-block">Tipo</label>
                    <select
                        className="form-control"
                        id="tipo"
                        value={tipo}
                        onChange={(e) => setTipo(e.target.value)}
                        required
                    >
                        <option value="" disabled selected>Selecione um tipo</option>
                        {arrayTipos.map(tipo => (
                            <option key={tipo.id} value={tipo.tipo}>
                                {tipo.tipo}
                            </option>
                        ))}
                    </select>
                </div>

                <div className="form-group mt-2">
                    <label htmlFor="percentual_imposto" className="text-start d-block">Percentual de Imposto</label>
                    <select
                        className="form-control"
                        id="percentual_imposto"
                        value={percentual_imposto}
                        onChange={(e) => setpercentual_imposto(e.target.value)}
                        required
                    >
                        <option value="" disabled selected>Selecione um tipo</option>
                        {arrayTipos.map(tipo => (
                            <option key={tipo.id} value={tipo.percentual_imposto}>
                                {tipo.percentual_imposto} %
                            </option>
                        ))}
                    </select>
                </div>

                <button type="submit" className="btn btn-primary mt-3">Cadastrar</button>
            </form>
        </div>
    );
};

export default CadastroProduto;
