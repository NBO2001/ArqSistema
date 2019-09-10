<?php
session_start();
if($_SESSION['msg'] <> 4){
  header("Location:index.php");
}
 ?>
 <!DOCTYPE>
 <html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>Ferrametas administrativas</title>
</head>
<body>
  <div style="width: 1400px;" id = "logo">
  <h1 id="itu" >------  Arquivo acadêmico - PROEG  --------</h1>
  </div>
<form action="ad_uso.php">
<button class='bntv1' style="top:50px;left: 10px;height: 130px;width: 30%;">Adicionar usuarios</button>
</form>
<form action="rev_uso.php">
<button class='bntv1' style="top:190px;left: 10px;height: 130px;width: 30%;">Remover usuarios</button>
</form>
<form action="alter_uso.php">
<button class='bntv1' style="top:50px;left: 430px;height: 130px;width: 30%;">Alterar usuarios</button>
</form>
<form action="#">
<button class='bntv1' style="top:190px;left: 430px;height: 130px;width: 30%;">Adicionar dados</button>
</form>
<form action="#">
<button class='bntv1' style="top:50px;left: 850px;height: 130px;width: 30%;">Documentos a serem eliminados</button>
</form>
<form action="pg_ini1.php">
<button class='bntv1' style="top:190px;left: 850px;height: 130px;width: 30%;">Voltar</button>
</form>
</body>
 </html>
