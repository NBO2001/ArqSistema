<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf=8">
<title>Tela inicial</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" type="text/css" href="css/es.css">
<?php
  if(isset($_SESSION['ifon'])){
    echo $_SESSION['ifon'];
    unset ($_SESSION['ifon']);

  }
?>
<style>

@media (max-width: 1000px) {


}

</style>
</head>
<body class="pes_nome_body">
  <div id="login">
    <form method="Post" action="logina.php" enctype="multipart/form-data">
      <labe class="logintitulos"  >Login:</label><br>
        <input id="logion1"  name="nuso" style="" class="loginfom" type="text" required></input><br>
      <labe class="logintitulos">Senha:</label><br>
        <input class="loginfom" style="" name="senuso" type="password" required></input><br><br>
        <input style="" id="btnlogin" name="btnlo" type="submit" value="Entrar"></input>
        <label> <a id="recuperarsenha" href="alterar_senha.php">Alterar senha</a> </label>
        <label id="copra" style="">&copy;2019 N.B.O<label>
    </form>

  </div>
</body>
</html>
