<?php
    namespace Classes;

    use Models\ModelRegisterPagamento;

    class ClassValidatePagamento{ 

        private array $erro=[];
       
      
        public function __construct() 
        {
            $this->register_pag=new ModelRegisterPagamento();
           
        
        }

        public function getErro(){   
            return $this->erro;  
        }

        public function setErro($erro){  
            array_push($this->erro,$erro);  
        }

        public function validateFields($par){
            
            $i=0;

            foreach ($par as $key => $value)
            {
                if(empty($value))
                { 
                    $i++;  
                }
            }

            if($i==0){  
                return true;  
            } else { 
                $this->setErro("Preencha todos os dados!"); 
                return false;  
            }

        }     
      
        #Validação final do Registro
        public function validateFinalPagamento($arrVarPag)
        {
            if(count($this->getErro()) > 0)
            {
                $arrResponse=[
                    "retorno"=>"erro",
                    "erros"=>$this->getErro()
                ];
            } else {

                $arrResponse=[
                    "retorno"=>"success",
                    "erros"=>null
                ];

                $this->register_pag->insertDbPagamento($arrVarPag);
            }
            
            return json_encode($arrResponse);
            
        }

       

        

    }