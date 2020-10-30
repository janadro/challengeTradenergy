<?php

include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$opcao = (isset($_POST['opcao'])) ? $_POST['opcao'] : '';
$id    = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcao){
    case 1:
        $consulta = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "SELECT id, nome, email, senha FROM usuarios ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
        
    case 2:
        $consulta = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE id='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "SELECT id, nome, email, senha FROM usuarios WHERE id = '$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    break; 
        
    case 3:
        $consulta = "DELETE FROM usuarios WHERE id = '$id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
            
    break;    
}

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;

