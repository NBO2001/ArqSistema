<?php
session_start();
if($_SESSION['msg']==""){
  header("Location:index.php");
}
include_once 'ConAL.php';
$hid = $_SESSION['id'];
$_SESSION['retorno'] = $_SESSION['id'];
$usuarioname=$_SESSION['usuarioname'];
$dataLocal = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang=pt-br>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">

<title>Inserir</title>
</head>
<body class="pes_nome_body">
  <div style="width: 1400px;" id = "logo">
  <h1 id="itu" >------  Arquivo acadêmico - PROEG  --------</h1>
  </div>
<div>
<form method="POST" >
  <label style="position:absolute;top:150px;left:400px; font-size: 30px;color:white;">Setor:</label>
  <input style="position:absolute;top:150px;left:500px; font-size: 30px;color:black;border: 1px solid black;border-radius: 15px;width:200px;" type="text" name="setor" required><br><br>
  <label style="position:absolute;top:200px;left:320px; font-size: 30px;color:white;">Solicitante:</label>
  <input style="position:absolute;top:200px;left:500px; font-size: 30px;color:black;border: 1px solid black;border-radius: 15px;width:400px;" type="text" name="solicitante" required>
  <input style="position:absolute;top:250px;left:500px; font-size: 30px;color:black;border: 1px solid black;border-radius: 15px;width:400px;" type="submit" value="Enviar">
</form>
</div>
</body>
</html>
<?php
$setor = filter_input(INPUT_POST,"setor",FILTER_SANITIZE_STRING);
$setor =strtoupper($setor);
if ($setor <> ""){
$solicitante = filter_input(INPUT_POST,"solicitante",FILTER_SANITIZE_STRING);
$solicitante = strtoupper($solicitante);
$isere_emp="INSERT INTO emp (id_al,solicitante,setor,arq_res,data_emp,sta,dev_data,dev_res) VALUES ('$hid', '$solicitante', '$setor', '$usuarioname', '$dataLocal', '1',NULL,'')";
$resu = mysqli_query($conn, $isere_emp);
$up_alu ="UPDATE Alunos SET STS = '1' WHERE Alunos.id =".$hid;
$resual = mysqli_query($conn, $up_alu);
$_SESSION['t1']= $setor;
$_SESSION['t2']= $solicitante;
$_SESSION['t3']= $usuarioname;
  echo "<script>window.open('gera_pdf.php','_blank');</script>";
  echo "<script>window.open('pg_res_pes_mat.php','_top');</script>";
}
?>
