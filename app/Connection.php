<?php

namespace app;

class Connection{

    public static function getDb(){
        try{
            $conn = new \PDO('mysql:host=localhost;dbname=conta_banco;charset=utf8','root','2342');
            return $conn;
        }
        catch(\PDOException $e){

        }

    }
}
