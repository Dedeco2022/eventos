<?php

require_once "conexao.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO eventos
        (nome, dia, lugar, categoria)
        VALUES 
        ('$usuario->nome', 
        '$usuario->dia', 
        '$usuario->lugar',
        '$usuario->categoria')";

executarSQL($conexao, $sql);

$usuario->id_evento = mysqli_insert_id($conexao);
echo json_encode($usuario);
