<?php

$id_evento = $_GET['id_evento'];

require_once "conexao.php";
$conexao = conectar();
$sql = "DELETE FROM eventos WHERE id_evento = $id_evento";
$retorno = executarSQL($conexao, $sql);
echo json_encode($retorno);