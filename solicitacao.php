<?php
session_start();
if($_SESSION['msg'] == ""){
  header("Location:index.php");
}
include_once "ConAL.php";

$soli = filter_input(INPUT_POST,'soli',FILTER_SANITIZE_STRING);
if($soli <> ""){
  $setor = filter_input(INPUT_POST,'setor',FILTER_SANITIZE_STRING);
  $solicitacao = filter_input(INPUT_POST,'solicitacao',FILTER_SANITIZE_STRING);
  $obv = filter_input(INPUT_POST,'obv',FILTER_SANITIZE_STRING);
  $destino = "Arquivo acadêmico";

  $sql = "INSERT INTO mensa (soli,setor,solicitacao,obv,destino,sts,a_nome,msg_d,vr) VALUES ('$soli','$setor','$solicitacao','$obv','$destino','1','','','2')";
  $rs = mysqli_query($conn,$sql);
  header("Location:pg_pesquisa.php");
  $_SESSION['ifon']="<script>alert('Mensagen enviada com sucesso')</script>";
}else{
  header("Location:pg_pesquisa.php");
  $_SESSION['ifon']="<script>alert('falha ao tentar')</script>";

}

 ?>
