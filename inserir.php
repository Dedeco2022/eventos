<?php

require_once "conexao.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO eventos 
        (nome, lugar, categoria, dia)
        VALUES 
        ('$usuario->nome', 
        '$usuario->lugar',
        '$usuario->categoria',
        '$usuario->dia')";

executarSQL($conexao, $sql);

$usuario->id_evento = mysqli_insert_id($conexao);
echo json_encode($usuario);
