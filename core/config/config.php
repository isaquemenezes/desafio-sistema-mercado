<?php
    #Caminhos absolutos
    if ($_SERVER["HTTP_HOST"] == "127.0.0.1" || $_SERVER["HTTP_HOST"] == "localhost"){
        $pastaInterna="projects/manager-card/";
        $protocolo =  "http";

        define('USER',"root");
        define('PASSWORD',"");
    
    } else {
        $pastaInterna="";
        $protocolo =  "https";       
       
        define('USER',"isaquedev");
        define('PASSWORD',"isaque*Dev3");
    
    }

    
    define('DIRPAGE',"{$protocolo}://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");
    (substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$barra="":$barra="/";
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

    #Atalhos
    define('DIRCSS', DIRPAGE.'core/library/css/');
    define('DIRIMG', DIRPAGE.'core/library/images/');
    define('DIRJS', DIRPAGE.'core/library/js/');
    define('DIRLIB', DIRPAGE.'core/library/');

    #Acesso ao db
    define('HOST',"localhost");
    define('DATABASE',"manager_financial");
   

    #Outros
    define("DOMAIN",$_SERVER["HTTP_HOST"]);