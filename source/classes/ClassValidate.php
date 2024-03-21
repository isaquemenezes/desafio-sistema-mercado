<?php
    namespace Classes;

    use Models\ModelRegister;

    class ClassValidate{ 

        private array $erro=[];
        private $register_card;
        private $register_devedor;
      
        public function __construct() 
        {
            $this->register_card=new ModelRegister();
            $this->register_devedor=new ModelRegister();
            $this->register_personal_fin = new ModelRegister();
           
           
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
        public function validateFinalRegCard($arrVarCard)
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

                $this->register_card->insertRegCard($arrVarCard);
            }
            
            return json_encode($arrResponse);
            
        }

        #Validação final do Registro Devedor
        public function validateFinalRegDevedor($arrVarDev)
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

                $this->register_devedor->insertRegDevedor($arrVarDev);
            }
            
            return json_encode($arrResponse);
            
        }

         #Validação final do Registro Dívida Pessoal
         public function  validateFinalRegPersonalFin($arrVarPerson)
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
 
                 $this->register_personal_fin->insertRegPersonalFin($arrVarPerson);
             }
             
             return   "<script>
                            alert('Sucesso!');
                            window.location.href='".DIRPAGE."';      
                        </script>
                        ";
             
         }

    }