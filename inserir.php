<?php

require_once "conexao.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO eventos 
        (nome, data, local, categoria)
        VALUES 
        ('$usuario->nome', 
        '$usuario->data', 
        '$usuario->local',
        '$usuario->categoria')";

executarSQL($conexao, $sql);

$usuario->id_usuario = mysqli_insert_id($conexao);
echo json_encode($usuario);
