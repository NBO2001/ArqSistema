<?php
session_start();
if($_SESSION['msg']==""){
  header("Location:index.php");
}
  if(isset($_SESSION['ifon'])){
    echo $_SESSION['ifon'];
    unset ($_SESSION['ifon']);

  }
if(isset($_COOKIE["tema"])){
  $tema = $_COOKIE["tema"];
}else{
  setcookie("tema","a", (time() + (500 * 24 * 3600)));
}


include_once 'ConAL.php';
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf=8">
<meta http-equiv="refresh" content="30">
<title>Tela inicial</title>

<link rel="stylesheet" type="text/css" href="css/es.css">
<?php
if($_COOKIE["tema"] <> "a"){
  echo "<link rel='stylesheet' type='text/css' href='css/$tema.css'>";
}

?>
</head>
<body id="pgini1">

<?php if($_SESSION['setor']=="Arquivo acadêmico"){
  $result_usuarioa = "SELECT sts,count(sts) FROM mensa WHERE sts LIKE '1' GROUP BY sts";
  $resultado_usuarioa = mysqli_query($conn, $result_usuarioa);
  $row_usuarioa = mysqli_fetch_assoc($resultado_usuarioa);
  $nun_msg = $row_usuarioa['count(sts)'];
  if ($nun_msg == ""){
    $nun_msg = 0;
  }

}else{
  $usuario = $_SESSION['usuarioname'];
  $result_usuarioa = "SELECT vr,count(vr) FROM mensa WHERE soli LIKE '$usuario' AND vr = 1 ORDER BY vr";
  $resultado_usuarioa = mysqli_query($conn, $result_usuarioa);
  $row_usuarioa = mysqli_fetch_assoc($resultado_usuarioa);
  $nun_msg = $row_usuarioa['count(vr)'];
  if ($nun_msg == ""){
    $nun_msg = 0;
  }

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
      <li><a href="#">Alterar senha</a></li>
    <li><a href="altera_tema.php">Alterar tema</a></li>
    <?php
   if ($_SESSION['msg']==4){
     echo "<li><a href='multup.php'>Adicionar documentos</a></li>";
   }
   ?>
    <li><a href="sair.php">Sair</a></li>
    </ul>
</nav>
</div>

<div id="tela_inicial_tes" >
<form  action="pg_pesquisa.php">
  <button class="bntv1" id="btntest">Pesquisa por matrícula</button>
</form><br>
<form  action="pg_pesquisa_nome.php">
  <button class="bntv1" id="btntest1">Pesquisa por nome</button>
</form><br>
<?php
if($_SESSION['msg']==1){
  echo"<form  action='mensa_visu.php'>
   <button class='bntv1' id='btntest4'>Mensagem[$nun_msg]</button>
  </form><br>";

}else if ($_SESSION['msg']==2){


if($_SESSION['setor']=="Arquivo acadêmico"){
  echo"<form  action='mensa_re.php'>
   <button class='bntv1'  id='btntest4'>Mensagem[$nun_msg]</button>
  </form><br>";

}else{

}

}else if ($_SESSION['msg']==3){

if($_SESSION['setor']=="Arquivo acadêmico"){
  echo"<form  action='mensa_re.php'>
   <button class='bntv1'  id='btntest4'>Mensagem[$nun_msg]</button>
  </form><br>";

}else{

}
}else if ($_SESSION['msg']==4){


if($_SESSION['setor']=="Arquivo acadêmico"){
  echo"<form  action='mensa_re.php'>
   <button class='bntv1'  id='btntest4'>Mensagem[$nun_msg]</button>
  </form><br>";
  echo"<form  action='admini.php'>
   <button class='bntv1' id='btntest3'>Ferramentas administrativas</button>
  </form><br>";

}else{
echo"<form  action='admini.php'>
 <button class='bntv1' id='btntest3'>Ferramentas administrativas</button>
</form><br>";

}
}
?>


</div>
<label id="copra" style="">&copy;2019 N.B.O<label>
</body>
</html>
