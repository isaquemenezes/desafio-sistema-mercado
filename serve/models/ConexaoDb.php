<?php

require_once __DIR__ . '/../config/config.php';

abstract class ConexaoDb
{

    protected function conectaDB()
    {

        try {

            $con = new \PDO("mysql:host=" . HOST . ";dbname=" . DATABASE . "; charset=utf8", "" . USER . "", "" . PASSWORD . "");

            return $con;

        } catch (\PDOException $erro) {

            return $erro->getMessage();

        }
    }
}