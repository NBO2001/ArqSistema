<?php
include_once 'ConAL.php';


echo "<script>window.open('gera_pdf.php','_blank');</script>";













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
