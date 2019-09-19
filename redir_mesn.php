<?php
session_start();
if($_SESSION['msg'] == ""){
  header("Location:index.php");
}
include_once "ConAL.php";
$texto = $_GET["texto"];
$texto = explode('*',$texto);
if(isset($texto[1])){
if(isset($_SESSION['nun_pesquia'])){
  unset ($_SESSION['nun_pesquia']);
}

$_SESSION['nun_pesquia']=$texto[1];
header("Location:pg_res_pes_mat.php");
}else{
  $texto = $_GET["texto"];
  $texto = explode('-',$texto);
  $idmensa = $texto[1];

  $_SESSION['retorno']=$texto[0];
  if($idmensa <> ""){
    $visum = "UPDATE mensa SET vr = 0 WHERE mensa.id =".$idmensa;
    $revisu = mysqli_query($conn, $visum);
  }
  header("Location:pg_res_pes_mat.php");
}
 ?>
