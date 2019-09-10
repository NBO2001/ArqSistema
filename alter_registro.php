<?php
session_start();
if($_SESSION['msg']==""){
  header("Location:index.php");
}
include_once 'ConAL.php';
$hid = $_SESSION['id'];
$usuarioname=$_SESSION['usuarioname'];

$vregistroduplos = "SELECT * FROM Alunos WHERE id LIKE '$hid'";
$resultado_resgr = mysqli_query($conn, $vregistroduplos);
$row_usuariob = mysqli_fetch_array($resultado_resgr);
$a5 = $row_usuariob['id'];
$_SESSION['retorno'] = $a5;
?>
<!DOCTYPE html>
<html lang=pt-br>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/es.css">

<title>Inserir</title>
</head>
<body class="pes_nome_body">
  <div id = "logo">
  <h1 id="itu" >------  Arquivo acadêmico - PROEG  --------</h1>
  </div>
<div>
<form method="POST" id="formalter" style="border: 1px solid black;" >
  <h1 class="titulosform">Dados alteráveis<h1>
  <label class="infaluno">Nome civil: &nbsp</label>
  <input class='infaluno' type='text' name='a1' value='<?php echo $row_usuariob['Nome_civil']; ?>' required><br>
  <label class="infaluno">Nome social: &nbsp</label>
  <input class='infaluno' type='text' name='a2' value='<?php echo $row_usuariob['Nome_social']; ?>'><br>
  <label class="infaluno" >Forma de evasão: &nbsp</label>
  <input name='a3' class="infaluno" required value="<?php echo $row_usuariob['Fev']; ?>"><br>
  <label class="infaluno" >Ano de evsão: &nbsp</label>
  <input name='a4' class="infaluno" value="<?php echo $row_usuariob['Aev']; ?>"><br>
<h1 class="titulosform">Dados não alteráveis<h1>
  <label class="infaluno">Matrícula: &nbsp</label>
  <input class="infaluno"  value="<?php echo $row_usuariob['Num_mat']; ?>" readonly><br>
  <label class="infaluno" >Curso: &nbsp</label>
  <input class="infaluno" readonly value="<?php echo $row_usuariob['Cod_cur']."--".$row_usuariob['Nome_cur']; ?>"><br>
  <label class="infaluno">Forma de ingresso: &nbsp</label>
  <input class="infaluno"readonly value="<?php echo $row_usuariob['Fin']; ?>"><br>

  <label class="infaluno" style='top:250;font-size:25px; border-radius:15px;text-align: center;' >Ano de ingresso: &nbsp</label>
  <input class="infaluno" style='left:310px;top:100;font-size:25px;border-radius:15px;'  readonly value="<?php echo $row_usuariob['Ain']; ?>"><br>

<input type="submit" name="atualizar" id="btnatualizar" value="Atualizar">

</form>

</div>
<?php
$fun = "window.location.href='pg_res_pes_mat.php'";
echo "<button style='position:relative;top:950px;left:0px; font-size: 40px;color:white;background-color: black;border: 1px solid black;border-radius: 15px;width:350px;height:60%; 'onclick=".$fun.">Voltar</button>";

?>
</body>
</html>
<?php

if (isset($_POST["atualizar"])){
$a1 = filter_input(INPUT_POST,'a1',FILTER_SANITIZE_STRING);
$a2 = filter_input(INPUT_POST,'a2',FILTER_SANITIZE_STRING);
$a3 = filter_input(INPUT_POST,'a3',FILTER_SANITIZE_STRING);
$a4 = filter_input(INPUT_POST,'a4',FILTER_SANITIZE_STRING);

/*$a11 = $row_usuariob['Num_mat'];

$a6 = $row_usuariob['Cod_cur'];
$a7 = $row_usuariob['Nome_cur'];
$a8 = $row_usuariob['Fin'];
$a9 = $row_usuariob['Ain'];
$a10 = $row_usuariob['sistema'];
$a12 = $row_usuariob['STS'];*/

$vl ="UPDATE Alunos SET Nome_civil = '$a1', Nome_social = '$a2', Fev = '$a3', Aev = '$a4' WHERE Alunos.id =".$a5;
$rvl = mysqli_query($conn, $vl);

$_SESSION['ifon']="<script>alert('Alterado com sucesso')</script>";
header("Location:pg_res_pes_mat.php");
}
?>
