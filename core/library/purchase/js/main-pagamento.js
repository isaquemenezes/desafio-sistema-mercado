    /*==============================================*/
    /*          Retorno do root                     */ 
    function getRoot(){
        if (window.location.hostname == "localhost") {
            var root = window.location.protocol+"//"+document.location.hostname+"/gitlab/manager-card/source/";
        } else {
            var root = window.location.protocol+"//"+document.location.hostname+"/source/";
        }
                
        return root;
    }
    
    /*==============================================*/
    /*      Ajax do formulário de cadastro          */ 
    $("#formPag").on("submit", function(event) {
        event.preventDefault();
        var dados=$(this).serialize();

        $.ajax({
        url: getRoot()+'controllers/purchase/controllerPagamento',
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
                    
                    window.history.go(-1);
                    
                }
            }
        });
    });


   