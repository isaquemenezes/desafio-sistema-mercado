<?php
    #Caminhos absolutos
    $pastaInterna="kvik-com/";
    define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
    (substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$barra="":$barra="/";
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

    #Atalhos
    define('DIRCSS', DIRPAGE.'assets/css/');
    define('DIRIMG', DIRPAGE.'assets/images/');
    define('DIRJS', DIRPAGE.'assets/js/');

    #Acesso ao db
    define('HOST',"localhost");
    define('DATABASE',"conexaoacara_sistema");
    define('USER',"root");
    define('PASSWORD',"");

    #Informações do servidor de email
    define("HOST_MAIL","smtp.umbler.com");
    define("USER_MAIL","equipe@kvik.top");
    define("PASSWORD_MAIL","NARUTO37*kvik");
    //parte da segunda opcao OFF
    define ("MAIL",[
        "from_name" => "Equipe Kvik",
        "from_email" => "equipe@kvik.top"
    ]);



    #Outros
    define("DOMAIN",$_SERVER["HTTP_HOST"]);