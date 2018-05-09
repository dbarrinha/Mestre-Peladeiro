<?php

class ConexaoDao{
    public static function getConexao(){
        $host='localhost';
        $username ='peladeiro';
        $passwd='123456';
        $dbname='peladeiro';
        
        $con = new mysqli($host, $username, $passwd, $dbname);
        $con->set_charset("utf8");
        return $con;
    }
}

