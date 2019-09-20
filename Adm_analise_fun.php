<?php
session_start();

//Incluir a conexao com BD

//Receber os dados do formulário
//$arquivo = $_FILES['arquivo'];
//var_dump($arquivo);
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

//ler todo o arquivo para um array
$dados = file($arquivo_tmp);
$xml = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<natan>';
foreach($dados as $linha){
	$linha = trim($linha);
	$valor = explode(' ', $linha);


	$valorparapes = $valor[0];

	$pdo = new PDO( 'mysql:host=localhost;dbname=Al', 'root', '' );
	$pdo -> query("SET NAMES UTF8");
	$stmt = $pdo->prepare("SELECT * FROM Alunos WHERE Num_mat LIKE $valorparapes");
  $stmt->execute(array('id','Cod_cur','Num_mat','Nome_civil','Nome_cur','Fin','Fev','Ain','Aev','sistema'));
  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach($resultado as $item){
    $xml .= '<table>';
    $xml .= '<Id>'.$item['id'].'</Id>';
    $xml .= '<Sigla_curso>'.$item['Cod_cur'].'</Sigla_curso>';
    $xml .= '<Numero_matricula>'.$item['Num_mat'].'</Numero_matricula>';
    $xml .= '<Nome_civil>'.$item['Nome_civil'].'</Nome_civil>';
    $xml .= '<Curso>'.$item['Nome_cur'].'</Curso>';
    $xml .= '<Forma_ingresso>'.$item['Fin'].'</Forma_ingresso>';
    $xml .= '<Forma_evassao>'.$item['Fev'].'</Forma_evassao>';
    $xml .= '<Ano_ingresso>'.$item['Ain'].'</Ano_ingresso>';
    $xml .= '<Ano_evassao>'.$item['Aev'].'</Ano_evassao>';
    $xml .= '<sistema>'.$item['sistema'].'</sistema>';
    $xml .= '</table>';

  }
}
$xml .= '</natan>';

$fp = fopen('querysu.xml', 'w+');
fwrite($fp, $xml);
fclose($fp);
set_time_limit(0);
$aquivoNome = 'querysu.xml';
$arquivoLocal = '/opt/lampp/htdocs/ArqSistema/'.$aquivoNome;

if (!file_exists($arquivoLocal)) {


exit;
}
$novoNome = 'resultado.xml';
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$novoNome.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($aquivoNome));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
    readfile($aquivoNome);

$_SESSION['msg'] = "<p style='color: green;'>Carregado os dados com sucesso!</p>";
//header("Location: Adm_analise.php");
