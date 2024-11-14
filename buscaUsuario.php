<?php

$id_evento = $_GET ['id_evento'];

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT id_evento, nome, lugar, categoria, dia FROM eventos 
        WHERE id_evento = $id_evento";
$resultado = executarSQL($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
echo json_encode($usuario);
