<?php
session_start();
if($_SESSION['msg'] ==""){
  header("Location:index.php");
}else if($_SESSION['msg'] == 1){
  header("Location:index.php");
}else if($_SESSION['msg'] == 2){
  header("Location:index.php");
}
 ?>
<!DOCTYPE HTML>

<html lang=pt-br>
<head>
<meta charset="utf-8">
<title>Tela inicial</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<?php
  if(isset($_SESSION['ifon'])){
    echo $_SESSION['ifon'];
    unset ($_SESSION['ifon']);
  }
?>
</head>
<body>
  <div style="width: 1400px;" id = "logo">
  <h1 id="itu" >------  Arquivo acadêmico - PROEG  --------</h1>
  </div>
  <nav>
  		<ul>
        <li><a href="pg_ini1.php">Inicio</a></li>
        <li><a href="pg_pesquisa.php">Pesquisa por matrícula</a></li>
        <li><a href="pg_pesquisa_nome.php">Pesquisa por nome</a></li>
        <li><a href='sair.php'>Sair</a></li>
  		</ul>
  </nav>
<div id="Tpesq">
<form id="pesq_fom" method="Post" action="enviar.php" enctype="multipart/form-data">
  <label class="a1">Número de matrícula:</label>
	<input type="text" name ="nume" placeholder="Digite a matrícula" required>
	<input id="pesquisa" name="pesqui" type="submit" value="Pesquisar"><br><br>
</form>
</div>
</body>

</html>
