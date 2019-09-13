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
<link rel="stylesheet" type="text/css" href="css/es.css">
<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
<body>

  <?php
    if(isset($_SESSION['ifon'])){
      echo $_SESSION['ifon'];
      unset ($_SESSION['ifon']);

    }
    if(isset($_SESSION['retorno'])){
      unset ($_SESSION['retorno']);

    }
  ?>

  <div id="logoufam" >

  <label for="chec">
  <img width="100px" height="90px" src="ufam.png"/>
</label>
  <label id="insti">Universidade Federal do Amazonas<br>
  Pró-Reitoria de Ensino de Graduação<br>
  Departamento de Registro Acadêmico<br>
  Arquivo Acadêmico<br>
  </label>
  </div>
<div>
  <input type="checkbox" id="chec">
  <nav id="nave" >
  		<ul>
      <li><a href="pg_ini1.php">Inicio</a></li>
  		<li><a href="pg_pesquisa_nome.php">Pesquisa por nome</a></li>
  		<li><a href="sair.php">Sair</a></li>
  		</ul>
  </nav>
</div>
<div class="pesq" id="Tpesq">
<form id="pesq_mt" method="Post" action="pg_res_pes_mat.php" enctype="multipart/form-datan">
  <label class="a1" style="position:absolute;top:50px;left:50px;color:white;">Número de matrícula:</label>
	<input id="digta_valor"style="position:absolute;top:100px;left:50px;background-color:#666;border-radius: 10px;" minlength="8" maxlength="9" type="text" name ="nume" placeholder="Digite a matrícula" required>
	<input id="pesquisa" style="position:absolute;top:150px;left:150px;border-radius: 10px;" name="pesqui" type="submit" value="Pesquisar"><br><br>
</form>
</div>
</body>

</html>
