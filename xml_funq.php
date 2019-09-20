<?php
$query = $_POST['query'];
if($query <> ""){
  $pdo = new PDO( 'mysql:host=localhost;dbname=Al', 'root', '' );
  $pdo -> query("SET NAMES UTF8");
  $stmt = $pdo->prepare("$query");
  $stmt->execute(array('id','Cod_cur','Num_mat','Nome_civil','Fin','Fev','Ain','Aev','sistema'));

  $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $xml = '<?xml version="1.0" encoding="utf-8"?>';
  $xml .= '<natan>';
  foreach($resultado as $item){

  	$xml .= '<table>';
  	$xml .= '<Id>'.$item['id'].'</Id>';
  	$xml .= '<Sigla_curso>'.$item['Cod_cur'].'</Sigla_curso>';
  	$xml .= '<Numero_matricula>'.$item['Num_mat'].'</Numero_matricula>';
  	$xml .= '<Nome_civil>'.$item['Nome_civil'].'</Nome_civil>';
  	$xml .= '<Forma_ingresso>'.$item['Fin'].'</Forma_ingresso>';
  	$xml .= '<Forma_evassao>'.$item['Fev'].'</Forma_evassao>';
  	$xml .= '<Ano_ingresso>'.$item['Ain'].'</Ano_ingresso>';
  	$xml .= '<Ano_evassao>'.$item['Aev'].'</Ano_evassao>';
  	$xml .= '<sistema>'.$item['sistema'].'</sistema>';
  	$xml .= '</table>';
  }

  $xml .= '</natan>';

  $fp = fopen('meus_links.xml', 'w+');
  fwrite($fp, $xml);
  fclose($fp);




      // Define o tempo máximo de execução em 0 para as conexões lentas
      set_time_limit(0);
      $aquivoNome = 'meus_links.xml';
      $arquivoLocal = '/opt/lampp/htdocs/ArqSistema/'.$aquivoNome;

      if (!file_exists($arquivoLocal)) {


      exit;
      }
      $novoNome = 'me.xml';
      header('Content-Description: File Transfer');
      header('Content-Disposition: attachment; filename="'.$novoNome.'"');
      header('Content-Type: application/octet-stream');
      header('Content-Transfer-Encoding: binary');
      header('Content-Length: ' . filesize($aquivoNome));
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
      header('Expires: 0');
      // Envia o arquivo para o cliente
      readfile($aquivoNome);
}
?>
