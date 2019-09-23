<?php
session_start();
include_once "Conec_PDO.php";



$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

//ler todo o arquivo para um array
$dados = file($arquivo_tmp);

foreach($dados as $linha){
	$linha = trim($linha);
	$valor = explode(' ', $linha);
	$valorparapes = $valor[0];
  $stmt = $pdo->prepare("DELETE FROM Alunos WHERE Alunos.id = $valorparapes");
  $stmt->execute();

}



header("Location: Adm_xml.php");
