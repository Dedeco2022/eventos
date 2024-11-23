<?php
require_once "conexao.php";
$conexao = conectar();
require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Configurar opções do DOMPDF
$options = new Options();

// Permite usar CSS e fontes externas
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options); 

// HTML inicial
$dados = '
<html>
<head>
<link rel="StyleSheet" type="Text/css" href="estilo.css">
<style>
body
 { font-family: Arial, sans-serif; }

 h1
{
	color: purple;
}
table {
  border-collapse: collapse;
  width: 100%;
}
td,th {
  text-align: left;
  padding: 10px;
}
tr:nth-child(even)
	{background-color: #e0bcdd}
thead 
{
  background-color: #e0bcdd;
  color: black;
}
</style>
</head>
<body>
';

$dados .= "<h1 style='text-align: center;text-decoration: underline;'> Relatorio de eventos </h1> ";

$dados .= "<table>
        <thead>
          <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Lugar</th>
		  <th>Categoria</th>      
          <th> Dia </th>       
          </tr>
        </thead>
        <tbody>";

$sql = "SELECT id_evento, nome,lugar, categoria, dia FROM eventos";
$resultado = mysqli_query($conexao, $sql);
while ($linha = mysqli_fetch_assoc($resultado)) {
    $dados .= "<tr>";
    $dados .= '<td>' . $linha['id_evento'] . '</td>';
    $dados .= '<td>' . $linha['nome'] . '</td>';
    $dados .= '<td>' . $linha['lugar'] . '</td>';
    $dados .= '<td>' . $linha['categoria'] . '</td>';
    $dataNasc = date('d/m/Y', strtotime($linha['dia']));
    $dados .= '<td>' . $dataNasc . '</td>';
    $dados .= "</tr>";
}
$dados .= "</tbody>";
$dados .= "</table>";
$dados .= "</body> </html>";


// Carrega o HTML no DOMPDF
$dompdf->loadHtml($dados);
// Define tamanho e orientação do papel
$dompdf->setPaper('A4', 'portrait');

// Renderizar o PDF
$dompdf->render();

// Enviar o PDF para o navegador
$dompdf->stream("relatorio.pdf", ["Attachment" => true]);
// Attachment false para exibir no navegador
