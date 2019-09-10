<?php
session_start();
if($_SESSION['msg']==""){
  header("Location:index.php");
}
include_once 'ConAL.php';
$hid = $_SESSION['id'];
$_SESSION['retorno'] = $hid;
$pesquisa ="SELECT * FROM emp WHERE id_al = '$hid' AND sta = 1";

$resu = mysqli_query($conn, $pesquisa);
$row = mysqli_fetch_array($resu);
$dif= $row['id'];
$usuarioname=$_SESSION['usuarioname'];
$dataLocal = date('Y-m-d');
$up_empre = "UPDATE emp SET sta = '0', dev_data = '$dataLocal', dev_res = '$usuarioname' WHERE emp.id =".$dif;

$rra = mysqli_query($conn, $up_empre);
$up_alunos="UPDATE Alunos SET STS = '0' WHERE Alunos.id =".$hid;
$rrab = mysqli_query($conn, $up_alunos);
$_SESSION['ifon'] = "<script>alert('Sucesso ao devolver')</script>";
echo "<script>window.open('pg_res_pes_mat.php','_top');</script>";

?>
