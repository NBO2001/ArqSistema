<?php
session_start();
if($_SESSION['msg']==""){
  header("Location:index.php");
}
 ?>
<!DOCTYPE HTML>

<html lang=pt-br>
<head>
<meta charset="utf-8">
<title>Tela inicial</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
  <div style="width: 1400px;" id = "logo">
  <h1 id="itu" >------  Arquivo acadêmico - PROEG  --------</h1>
  </div>
  <nav>
  		<ul>
        <li><a href="pg_ini1.php">Inicio</a></li>
  		<li><a href="pg_pesquisa.php">Pesquisa por matrícula</a></li>
  		<li><a href="sair.php">Sair</a></li>
  		</ul>
  </nav>
<div id="Tpesq">
<form id="pesq_fom" method="Post" action="psq_nome.php" enctype="multipart/form-data">
  <label style="color:white;position:absolute;top:110px;width:400px;" class="a1">Digite o nome do aluno:</label>
	<input style="position:absolute;top:110px;left:400px; font-size: 30px;color:black;border: 1px solid black;border-radius: 15px;width:400px;" class="camp" type="text" name="nomeaa" placeholder="Digite o nome do aluno" required>
	<input style="position:absolute;background-color:white;top:170px;left:400px; font-size: 30px;color:black;border: 1px solid black;border-radius: 15px;width:400px;" id="pesquisa" name="pesqui" type="submit" value="Pesquisar"><br><br>
</form>
</div>
</body>

</html>
