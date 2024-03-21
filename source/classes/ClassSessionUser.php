<?php
    namespace Classes;

    class ClassSessionUser{

        #Área Restrita: Somente Usuário Logado
        public static function setHeadRestrito($permition) 
        {
            $session=new ClassSession();
            $session->verifyInsideSession($permition);
        }
    }