<?php
    namespace Models;

    class ModelRegisterPagamento extends ModelCrud{

    
        #inserção um novo pagamento devedores cartao 
        public function insertDbPagamento($arrVarPag) 
        {
            $this->insertDB(
                "pagamento",
                "?,?,?,?,?,?",
                array(
                    0,
                    $arrVarPag['fk_devedor'],
                    $arrVarPag['data'],
                    $arrVarPag['valor'],
                    $arrVarPag['numero_parcela'],
                    $arrVarPag['forma_pagamento']       
                )
            );

        }

    
    }