//Arquivos js
    /*==============================================*/
    /*          Retorno do root                     */ 
    function getRoot(){
        if (window.location.hostname == "localhost") {
            var root = window.location.protocol+"//"+document.location.hostname+"/projects/manager-card/source/";
        } else {
            var root = window.location.protocol+"//"+document.location.hostname+"/source/";
        }
                
        return root;
    }
    
    /*==============================================*/
    /*      Ajax do formulário de cadastro          */ 
    $("#formCard").on("submit",function(event){
        event.preventDefault();
        var dados=$(this).serialize();

        $.ajax({
        url: getRoot()+'controllers/controllerCard',
            type: 'post',
            dataType: 'json',
            data: dados,
            success: function (response) {
                
                $('.retornoCard').empty();

                if(response.retorno == 'erro'){

                    $.each(response.erros,function(key,value){
                    
                        $('.retornoCard').append(value+'');
                    
                    });

                } else {
                    
                    $('.retornoCard').append('Cadastro Realizado Com Sucesso!\n');
                    
                    //Limpa os inputs
                    $('#formCard input').each(function(){
                       
                        $(this).val('');
                    
                    });
                }
            }
        });
    });

    /*==============================================*/
    /*      Ajax do formulário de devedor          */ 
    $("#formDev").on("submit",function(event){
        event.preventDefault();
        var dados=$(this).serialize();

        $.ajax({
        url: getRoot()+'controllers/purchase/controllerDevedor',
            type: 'post',
            dataType: 'json',
            data: dados,
            success: function (response) {
                
                $('.retornoCard').empty();

                if(response.retorno == 'erro'){

                    $.each(response.erros,function(key,value){
                    
                        $('.retornoCard').append(value+'');
                    
                    });

                } else {
                    window.location.href = getRoot()+"views/index";
                }
            }
        });
    });

   

   