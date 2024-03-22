<?php
namespace Models;

class ModelRegister extends ModelCrud{

    #Realizará a inserção no banco de dados
    public function insertReg($arrVar)
    {
        $this->insertDB(
          "account",
          "?,?,?,?,?,?,?,?,?,?",
                array(
                    0,
                    $arrVar['nome'],
                    $arrVar['email'],
                    $arrVar['contato'],
                    $arrVar['cidade'],
                    $arrVar['bairro'],
                    $arrVar['hashSenha'],
                    $arrVar['dataCreate'],
                    'user',
                    'confirmation'
                )
        );
        $this->insConfirmation($arrVar);
    }

    #inserção novo registro de cartão
    public function insertRegCard($arrVarCard) 
    {
        $this->insertDB(
            "card",
            "?,?,?,?",
            array(
                0,
                $arrVarCard['nome'],
                $arrVarCard['limite'],
                $arrVarCard['vencimento']
            )
        );

    }

    #inserção novo registro de devedor
    public function insertRegDevedor($arrVarDev) 
    {
        $this->insertDB(
            "devedor",
            "?,?,?,?,?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrVarDev['nome'],
                $arrVarDev['numero_total_parcela'],
                $arrVarDev['xparcela'],
                $arrVarDev['valor_parcela_cartao'],
                $arrVarDev['valor_parcela_devedor'],
                $arrVarDev['valor_entrada'],
                $arrVarDev['tipo'],
                $arrVarDev['taxa'],
                $arrVarDev['data_compra'],
                $arrVarDev['produto'],
                $arrVarDev['vencimento'],
                1,
            )
        );

    }

    #inserção novo registro de dívida pessoal
    public function insertRegPersonalFin($arrVarPerson) 
    {
        $this->insertDB(
            "personal_finance",
            "?,?,?,?,?,?",
            array(
                0,
                $arrVarPerson['numero_parcela'],
                $arrVarPerson['valor_parcela'],
                $arrVarPerson['cartao'],
                $arrVarPerson['produto'],
                $arrVarPerson['data_compra']
            )
        );

    }

    

    public function insConfirmation($arrVar) {
        $this->insertDB( "confirmation", "?,?,?", 
                array( 0, $arrVar['email'], $arrVar['token']
                ) 
            );
    }

    public function confirmationSenha($email, $token, $hashSenha){
            
        $b=$this->selectDB( "*", "confirmation", "where email=? and token=?", array( $email, $token ) );

        $r=$b->rowCount();

        if($r >0){

            $this->deleteDB( "confirmation", "email=?", array( $email ) );

            $this->updateDB( "account", "senha=?", "email=?", array( $hashSenha, $email ) );
        
            return true;
        
        } else {  
            return false;   
        }
    }

    #Veriricar se já existe o mesmo email cadastro no db
    public function getIssetEmail($email){

        $b=$this->selectDB( "*", "account", "where email=?", array( $email ) );

        return $r=$b->rowCount();
        
    }


    #Verificar a confirmação de cadastro pelo email        
    public function confirmationReg($email, $token){

        $b=$this->selectDB( "*", "confirmation", "where email=? and token=?", array( $email, $token ) );
        $r=$b->rowCount();

        if($r >0){

            $this->deleteDB( "confirmation", "email=?", array( $email ) );

            $this->updateDB( "account", "status=?", "email=?", array( "active", $email ) );
            return true;

        } else {  
            return false;    
        }

    }
}