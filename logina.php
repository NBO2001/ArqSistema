<?php
session_start();
include_once 'ConAL.php';
  $s = filter_input(INPUT_POST,"btnlo",FILTER_SANITIZE_STRING);
  $ursuario = filter_input(INPUT_POST,'nuso',FILTER_SANITIZE_STRING);
  $ursuario = strtoupper($ursuario);
  $senursuario = filter_input(INPUT_POST,'senuso',FILTER_SANITIZE_STRING);
  $senursuario = strtoupper($senursuario);
if($ursuario==""){
  header("Location:index.php");
  $_SESSION['ifon'] = "<script>alert('Campo vazio!!')</script>";
}else if ($senursuario=="") {
  header("Location:index.php");
  $_SESSION['ifon'] = "<script>alert('Campo vazio!!')</script>";
}else{
  $ursuario = strtoupper($ursuario);
  $result_usuarioa = "SELECT * FROM log WHERE ursu LIKE '".$ursuario."' AND senha LIKE '".$senursuario."'";
  $resultado_usuarioa = mysqli_query($conn, $result_usuarioa);
  $row_usuarioa = mysqli_fetch_assoc($resultado_usuarioa);
  $ln = $row_usuarioa['id'];
  $lns = $row_usuarioa['ursu'];
  $lns = strtoupper($lns);
  $lnss = $row_usuarioa['senha'];
  $lnss= strtoupper($lnss);


  if($ln == ""){
    header("Location:index.php");
    $_SESSION['ifon'] = "<script>alert('Senha ou login invalida!!')</script>";
  }else if ($lns <> $ursuario ) {
    header("Location:index.php");
    $_SESSION['ifon'] = "<script>alert('Senha ou login invalida!!')</script>";
  }else if ($lnss <> $senursuario) {
    header("Location:index.php");
    $_SESSION['ifon'] = "<script>alert('Senha ou login invalida!!')</script>";
  }else{
    $acesso_nivel = $row_usuarioa['acesso'];
    $usuarioname = $row_usuarioa['ursu'];
    $setoruso= $row_usuarioa['setor'];
    $_SESSION['usuarioname'] = $usuarioname;
    $_SESSION['msg'] = $acesso_nivel;
    $_SESSION['setor']=$setoruso;
    if($_SESSION['msg']==3){
    header("Location:pg_ini1.php");
  }else if ($_SESSION['msg']==1){
    header("Location:pg_ini1.php");
  }else if($_SESSION['msg']==2){
    header("Location:pg_ini1.php");
  }else if($_SESSION['msg']==4){
    header("Location:pg_ini1.php");
  }


  }

}

?>
