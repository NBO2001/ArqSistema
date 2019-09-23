<?php
/*
include_once 'ConAL.php';
$style = "#Modelo_body{
	background-color: inherit;
}
#Modelo_body table{
width:741.95pt;
border-collapse:collapse;
table-layout:fixed;
border:1px solid black;
}
#Modelo_body .xl72{
font-weight: bold;
font-size: 50px;
height:46.50pt;
width:155.90pt;
border:1px solid black;
}
#Modelo_body .xl73{
font-size: 20px;
	width:155.35pt;
	border:1px solid black;
}
#Modelo_body td{

	border-right:.5pt solid black;
	border-bottom:.5pt solid black;
	border-bottom-style:hairline;
}
#Modelo_body .xl74{
	font-weight: bold;
	font-size: 40px;
height:31.50pt;

}
#Modelo_body .xl76{
	font-weight: bold;
height:25.50pt;
}
#Modelo_body .xl78{
height:24.00pt;

}
#Modelo_body .xl80{
height:15.00pt;
}
";
     // Montamos nosso HTML no PHP, da forma que quisermos
     // \t é o tab, \n a quebra de linha
     $html  = "<html>\n";
     $html .= "\t<head><meta charset='utf-8'><style>$style</style>\n";
     $html .= "\t\t<title>Etiquetas</title>\n";
     $html .= "\t</head>\n";
     $html .= "\t<body id ='Modelo_body'>\n";
     $html .= "";
     $html .= "\t</body>\n";
     $html .= "</html>\n";

     //... e vai montando o arquivo com variáveis etc
     // e depois salva
     $arquivo = "Etiquetas.html";
     // Configurações header para forçar o download
     header('Content-Disposition: attachment;filename="'.$arquivo.'"');
     header('Cache-Control: max-age=0');
     // Se for o IE9, isso talvez seja necessário
     header('Cache-Control: max-age=1');

     // Envia o conteúdo do arquivo
     echo $html;
     exit;

/*try {
  $pdo = new PDO( 'mysql:host=localhost;dbname=Al', 'root', '' );
  $pdo -> query("SET NAMES UTF8");
  $stmt = $pdo->prepare("SELECT * FROM Alunos");

    //Esse código precisa de tratamento pois pode gerar alguma exceção
    if($stmt->execute(array('id','Cod_cur','Num_mat','Nome_civil','Fin','Fev','Ain','Aev','sistema'))){

    }else{
    throw new \Exception('Erro ao tentar');
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
*/

/*
$sql = "CREATE TABLE chat (
  id int(220) NOT NULL,
  uso varchar(220) DEFAULT NULL,
  msg varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  ALTER TABLE chat
  ADD PRIMARY KEY (id);
  ALTER TABLE `chat` CHANGE `id` `id` INT(220) NOT NULL AUTO_INCREMENT;
  TRUNCATE chat";

$rexea = mysqli_query($conn, $sql) or die(mysqli_error($conn));



*/
//header("Location:/home/naatan/'Área de Trabalho'/In/pdf/teste.php");

//$sre = shell_exec("sudo ./home/naatan/'Área de Trabalho'/test.sh");
//echo $sre;

/*
echo "<script>window.open('gera_pdf.php','_blank');</script>";
*/










/*
$nume_dupli = filter_input(INPUT_POST,'nume_dupli',FILTER_SANITIZE_STRING);
$nume_dupli = preg_replace("/\s+/","",$nume_dupli);
if($nume_dupli<>""){
  echo $nume_dupli;
  $result_usuario = "SELECT * FROM Alunos WHERE id LIKE '$nume_dupli'";
  $resultado_usuario = mysqli_query($conn, $result_usuario);
  $row_usuario = mysqli_fetch_array($resultado_usuario);
  echo $row_usuario['Nome_civil'];
  echo $row_usuario['Num_mat'];
  echo $row_usuario['Cod_cur'];
  echo $row_usuario['Nome_cur'];
  echo $row_usuario['Fin'];
  echo $row_usuario['Fev'];
  echo $row_usuario['Ain'];
  echo $row_usuario['Aev'];

}

*/





/*
$result_usuario = "SELECT * FROM Ife WHERE cod LIKE '124'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_array($resultado_usuario);


$tipo_doc = $row_usuario['cod']." -- ".$row_usuario['nome_doc'];
$fase_con =$row_usuario['fase_con'];
$fase_con =explode(' ',$fase_con);
$ano_va = $fase_con[0];
$fase_in = $row_usuario['fase_in'];
$fase_in = explode(' ',$fase_in);
$ano_vb = $fase_in[0];
if ($ano_va > 0){
  if ($ano_vb>0){
    $ano_ex = $ano_va+$ano_vb;
    $fase_con =$row_usuario['fase_con'];
    $fase_in = $row_usuario['fase_in'];
  }else{
    $ano_ex = $ano_va;
    $fase_con =$row_usuario['fase_con'];
    $fase_in = $row_usuario['fase_in'];

  }
}else {
  if ($ano_vb>0){
    $ano_ex = $ano_vb;
    $fase_con =$row_usuario['fase_con'];
    $fase_in = $row_usuario['fase_in'];

  }else{
    $ano_ex ="";
    $fase_con =$row_usuario['fase_con'];
    $fase_in = $row_usuario['fase_in'];
  }
}*/
/*


 }else{


 }*/







/*$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST,'ano',FILTER_SANITIZE_STRING);
$tipo_doc=filter_input(INPUT_POST,'assunto',FILTER_SANITIZE_STRING);
$nome_arq =  $_FILES['pdf']['name'];
$nome_arq  = explode('.',$nome_arq);
if($nome_arq[1] == "pdf"){
  echo "ok";
}else{
  echo "tomar no cú";
}
$data=date('Y-m-d-H:i:s');
echo $data;*/
/*date_default_timezone_set('America/Sao_Paulo');
$dataLocal = date('d-m-Y', time());
$data=date('H:i:s');
$data=explode(':',$data);
$horari = $data[0]-1;
$horari = $dataLocal." -- ".$horari.":".$data[1].":".$data[2]."<br>";
echo $horari;

*/
/*
$nun = "2 anos";
$nun = explode(' ',$nun);
$ann = 2017;
$data=date('Y-m-d');
$par = explode('-',$data);


if($nun[0] > 0){

  $rus = $par[0] - $ann;
  if($nun[0] <= $rus){
    echo "é maior";
  }
  //echo $rus;
//echo "é maior";
}*/
 ?>
