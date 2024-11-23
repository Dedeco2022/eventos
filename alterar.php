<?php

require_once "conexao.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "UPDATE eventos SET
        nome='$usuario->nome', 
        lugar='$usuario->lugar',
        categoria='$usuario->categoria',
        dia='$usuario->dia'
        WHERE id_evento=$usuario->id_evento";

executarSQL($conexao, $sql); 

echo json_encode($usuario);
