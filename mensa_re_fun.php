<?php
session_start();
if($_SESSION['msg'] == ""){
  header("Location:index.php");
}

include_once "ConAL.php";
$nome = $_SESSION['usuarioname'];
$msg = filter_input(INPUT_POST,'msg_ida',FILTER_SANITIZE_STRING);
if ($msg ==""){
$msg = "Pedido aceito por ".$nome.", a pasta será entrege assim que possivel.";
}
$ida = filter_input(INPUT_POST,'ida',FILTER_SANITIZE_STRING);
echo $msg;


$result_usuario = "UPDATE mensa SET sts = '0', a_nome = '$nome', msg_d = '$msg',vr='1' WHERE mensa.id =".$ida;
$resultado_usuario = mysqli_query($conn, $result_usuario);
$_SESSION['ifon']="<script>alert('Enviada com sucesso')</script>";
header("Location:mensa_re.php");



?>
