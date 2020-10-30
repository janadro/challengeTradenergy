<?php
class Conexion{
    public static function Conectar(){
        define('servidor', 'localhost');
        define('nome_bd','crud_2020');
        define('usuario', 'root');
        define('password','');
        
        $opcao = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nome_bd, usuario, password,$opcao);
            return $conexion;
        }catch(Exception $e){
            die("Erro na conexão". $e->getMessage());
        }
    }
}