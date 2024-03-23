<?php

    include("../core/config/config.php");
    
    abstract class ConexaoDb{

        // protected function conectaDB(){
        //     try {
        //         // Use parâmetros de configuração do arquivo config.php
        //         $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=utf8";
        //         $con = new \PDO($dsn, USER, PASSWORD);
    
        //         // Configure o PDO para lançar exceções em caso de erro
        //         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //         return $con;
        //     } catch (\PDOException $erro) {
        //         // Trate exceções de forma mais específica
        //         // Você pode querer registrar o erro em um arquivo de log e retornar uma mensagem de erro mais amigável
        //         return "Erro ao conectar ao banco de dados: " . $erro->getMessage();
        //     }
        // }

        protected function conectaDB(){

            try{

                $con=new \PDO("mysql:host=".HOST.";dbname=".DATABASE."; charset=utf8","".USER."","".PASSWORD."");
                
                return $con;

            }catch (\PDOException $erro){

                return $erro->getMessage();

            }
        }
    }