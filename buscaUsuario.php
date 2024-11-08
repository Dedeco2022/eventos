<?php

$id_eventos = $_GET['id_eventos'];

require_once "conexao.php";
$conexao = conectar();

$sql = "SELECT id_evento, nome, data, local, categoria FROM eventos 
        WHERE id_evento = $id_evento";
$resultado = executarSQL($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
echo json_encode($usuario);
