<?php
    // serve/config/config.php
    #Caminhos absolutos  
    // define('USER',"root");
    // define('PASSWORD',"");   
    // define('HOST',"localhost");
    // define('DATABASE',"sql_conexao");

    // Docker    
    define('USER',"root");
    define('PASSWORD',"root_password"); 
    define('HOST', 'db'); // Nome do serviço no Docker Compose
    define('DATABASE',"my_database");