<?php

require_once "conexao.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "UPDATE eventos SET
        nome='$usuario->nome', 
        data='$usuario->data', 
        local='$usuario->local'
        categoria='$usuario->categoria'
        WHERE id_evento=$usuario->id_evento";

executarSQL($conexao, $sql);

echo json_encode($usuario);
