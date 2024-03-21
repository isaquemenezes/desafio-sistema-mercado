<?php
    $validate=new Classes\ClassValidate();
    $confirmation=new Models\ModelRegister();

        if($validate->validateConfirmacaoSenha($senha, $senhaConfirmacao)){

            if($confirmation->confirmationSenha($email, $token, $hashSenha)){
                
                    echo "<script> 
                            alert('Sucesso!');
                         </script>
                        ";
            } else {
                     echo "<script> 
                             alert('Não foi possível verificar seus dados!');
                          </script>
                        ";
                   
            }
        } else {
            echo "<script>
                    alert('Senha diferente de confirmação de senha!');
                  </script>
                ";
        }
        
     echo "<script> 
              window.location.href='".DIRPAGE."sign-in';
           </script>
         ";