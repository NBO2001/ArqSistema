<?php
session_start();
include_once 'ConAL.php';
  $codcur = filter_input(INPUT_POST,"Num_mat",FILTER_SANITIZE_STRING);

?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>Enviar msg</title>
</head>
<body>
 <div style="width: 1400px;" id = "logo">
 <h1 id="itu" >------  Arquivo acadêmico - PROEG  --------</h1>
 </div>
<form method="POST" action="solicitacao.php">
<label>Solicitante:<label>
<input type="text" name="soli" value="<?php echo $_SESSION['usuarioname']; ?>" readonly><br><br>
<label>Setor:<label>
<input type="text" name="setor" value="<?php echo $_SESSION['setor']; ?>" readonly><br><br>
<label>Alunos solicitado:<label>
<input type="text" name="solicitacao" value="<?php echo $codcur; ?>" readonly><br><br>
<label>Observação:<label>
<input name="obv" type="text"><br><br>
<input type="submit" value="Enviar">
</form>
</body>
</html>
