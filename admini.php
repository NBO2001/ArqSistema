<?php
session_start();
if($_SESSION['msg'] <> 4){
  header("Location:index.php");
}
if(isset($_COOKIE["tema"])){
  $tema = $_COOKIE["tema"];
}else{
  setcookie("tema","a", (time() + (500 * 24 * 3600)));
}
 ?>
 <!DOCTYPE>
 <html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/es.css">
<?php
if($_COOKIE["tema"] <> "a"){
  echo "<link rel='stylesheet' type='text/css' href='css/$tema.css'>";
}?>
<title>Ferrametas administrativas</title>
</head>
<body>
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
    <?php
    if($_SESSION['msg']<>1){
      echo "<li><a href='mensa_re.php'>Mensagem</a></li>";
    }else if($_SESSION['msg']==1){
        echo "<li><a href='mensa_visu.php'>Mensagem</a></li>";
    }
    ?>
    <li><a href="sair.php">Sair</a></li>
    </ul>
  </nav>
  </div>
<div id="admini_buttons">
<button onclick="window.location.href='ad_uso.php'">Adicionar usuarios</button><br><br>
<button onclick="window.location.href='rev_uso.php'">Remover usuarios</button><br><br>
<button onclick="window.location.href='alter_uso.php'">Alterar usuarios</button><br><br>
<button onclick="window.location.href='relatorios.php'">Relatórios</button><br><br>
<button onclick="window.location.href='gerador_de_etq.php'">Gerar etiquetas</button><br><br>
<button>Adicionar dados</button><br><br>
<button>Documentos a serem eliminados</button><br><br>
<button onclick="window.location.href='pg_ini1.php'">Voltar</button><br><br>
</div>


</body>
 </html>
