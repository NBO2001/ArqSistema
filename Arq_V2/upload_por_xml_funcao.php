<?php
session_start();
if($_SESSION['acesso']<>4){
header("Location:index.php");
die;
}
set_time_limit(0);

if(!empty($_FILES['up_xml']['tmp_name'])){
  $proc = new DomDocument('utf-8');
  $proc->load($_FILES['up_xml']['tmp_name']);
  $linhas = $proc->getElementsByTagName('Row');
  $cabecalho = true;
  $cont = 0;
  $encoding = 'UTF-8';
  foreach ($linhas as $linha) {
    if($cabecalho == false){
      $curso = isset($linha->getElementsByTagname('Data')->item(0)->nodeValue)
      ?$linha->getElementsByTagname('Data') -> item(0)->nodeValue : "null";

      $matricula = isset($linha->getElementsByTagname('Data') -> item(1)->nodeValue)
      ?$linha->getElementsByTagname('Data')->item(1)->nodeValue : "null";

      $nome = isset($linha->getElementsByTagname('Data')->item(2)->nodeValue)
      ?$linha->getElementsByTagname('Data')->item(2)->nodeValue : "null";

      $forma_ingresso = isset($linha->getElementsByTagname('Data')->item(3)->nodeValue)
      ?$linha -> getElementsByTagname('Data') -> item(3)->nodeValue : "null";

      $forma_evasao = isset($linha->getElementsByTagname('Data')->item(4)->nodeValue)
      ?$linha->getElementsByTagname('Data')->item(4)->nodeValue : "null";

      $nome_curso = isset($linha->getElementsByTagname('Data')->item(5)->nodeValue)
      ?$linha->getElementsByTagname('Data')->item(5)->nodeValue : "null";

      $periodo_ingesso = isset($linha->getElementsByTagname('Data')->item(6)->nodeValue)
      ?$linha->getElementsByTagname('Data') -> item(6)->nodeValue : "null";

      $periodo_evasao = isset($linha->getElementsByTagname('Data')->item(7)->nodeValue)
      ?$linha->getElementsByTagname('Data')->item(7)->nodeValue : "null";

      $sistema = isset($linha->getElementsByTagname('Data')->item(8)->nodeValue)
      ?$linha->getElementsByTagname('Data')->item(8)->nodeValue : "null";

      $nome_social = isset($linha->getElementsByTagname('Data')->item(9)->nodeValue)
      ?$linha->getElementsByTagname('Data')->item(9)->nodeValue : "null";

      $pdo = new PDO( 'mysql:host=localhost;dbname=Al', 'root', '' );
      $pdo -> query("SET NAMES UTF8");
      $stmt = $pdo->prepare
      ("SELECT COUNT(*) FROM Alunos WHERE Num_mat LIKE '$matricula'");

      $stmt->execute(array('COUNT(*)'));

      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach($resultado as $valor_dupli){
        $valor_duplis = $valor_dupli['COUNT(*)'];
      }
      if($valor_duplis <> 0){
        $valor_fin[$cont] = $curso."_".$matricula."_".$nome."_".$forma_ingresso.
        "_".$forma_evasao."_".$nome_curso."_".$periodo_ingesso."_".$periodo_evasao
        ."_".$sistema."_".$nome_social;
        $cont++;
      }else{
         // ou ISO-8859-1...
        $curso=mb_convert_case($curso, MB_CASE_UPPER, $encoding);
        $matricula=mb_convert_case($matricula, MB_CASE_UPPER, $encoding);
        $nome=mb_convert_case($nome, MB_CASE_UPPER, $encoding);
        $nome_curso=mb_convert_case($nome_curso, MB_CASE_UPPER, $encoding);
        $forma_ingresso=mb_convert_case($forma_ingresso, MB_CASE_UPPER, $encoding);
        $forma_evasao=mb_convert_case($forma_evasao, MB_CASE_UPPER, $encoding);
        $periodo_ingesso=mb_convert_case($periodo_ingesso, MB_CASE_UPPER, $encoding);
        $periodo_evasao=mb_convert_case($periodo_evasao, MB_CASE_UPPER, $encoding);
        $sistema=mb_convert_case($sistema, MB_CASE_UPPER, $encoding);
        $nome_social=mb_convert_case($nome_social, MB_CASE_UPPER, $encoding);

        $is = $pdo->prepare("INSERT INTO Alunos SET Cod_cur='$curso',
          Num_mat='$matricula', Nome_civil='$nome',Nome_cur='$nome_curso',
          Fin='$forma_ingresso',Fev='$forma_evasao',Ain='$periodo_ingesso',
          Aev='$periodo_evasao',sistema='$sistema',Nome_social='$nome_social'");
        $is->execute();
      }
    }else{
      $cabecalho = false;
    }

  }
if(isset($valor_fin[0])){
$dadosXls  = "";
$dadosXls .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><table border='1' >";
$dadosXls .= "          <tr>";
$dadosXls .= "          <th>Sigla_curso</th>";
$dadosXls .= "          <th>Numero_matricula</th>";
$dadosXls .= "          <th>Nome_civil</th>";
$dadosXls .= "          <th>Nome_social</th>";
$dadosXls .= "          <th>Curso</th>";
$dadosXls .= "          <th>Forma_ingresso</th>";
$dadosXls .= "          <th>Forma_evassao</th>";
$dadosXls .= "          <th>Ano_ingresso</th>";
$dadosXls .= "          <th>Ano_evassao</th>";
$dadosXls .= "          <th>sistema</th>";
$dadosXls .= "      </tr>";
for($a=0;$a < $cont;$a++){
  $prem = explode('_',$valor_fin[$a]);
    $dadosXls .= "      <tr>";
    $dadosXls .= "          <td>".mb_convert_case($prem[0], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[1], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[2], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[9], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[5], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[3], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[4], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[6], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[7], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "          <td>".mb_convert_case($prem[8], MB_CASE_UPPER, $encoding)."</td>";
    $dadosXls .= "      </tr>";
  }
    $dadosXls .= "<tr><td>Os dados aqui preste não forão inseridos no banco de dados
    por já haver uma matrícula vinculada a esse nome.</td> </tr>";
$dadosXls .= "  </table>";
    $arquivo = "Erro de envio.xls";
    header('Content-Type: application/vnd.ms-excel; charset=uft-8');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    echo $dadosXls;
    exit;
}else{
  header('Location:tela_inicial.php');
  $_SESSION['ifon'] = "<script>alert('Todos os dados alterados com sucesso!!')</script>";
}
}else{
  echo "arquivo inexistente";
}
?>
