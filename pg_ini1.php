<?php
session_start();
if($_SESSION['msg']==""){
  header("Location:index.php");
}
  if(isset($_SESSION['ifon'])){
    echo $_SESSION['ifon'];
    unset ($_SESSION['ifon']);

  }
include_once 'ConAL.php';
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf=8">
<meta http-equiv="refresh" content="30">
<title>Tela inicial</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<style>
@media (max-width: 1000px) {
  .bntv1{
    position:static;
  	border: 1px solid black;
  	font-size: 600%;
  	left: 0%;
  	background-color: #032490;
  	color:white;
  	height: 20%;
  	width: 100%;
    padding:20px 10px;
    border: 1px solid white;
    border-radius: 20px;

  }


}


}
</style>
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
<div id = "logo">
<h1 id="itu">------  Arquivo acadêmico - PROEG  --------</h1>
</div>

<div id="tela_inicial_tes" >
<form  action="pg_pesquisa.php">
  <button class="bntv1" id="btntest">Pesquisa por matrícula</button>
</form>
<form  action="pg_pesquisa_nome.php">
  <button class="bntv1" id="btntest1">Pesquisa por nome</button>
</form>
<?php
if($_SESSION['msg']==1){
  echo"<form  action='mensa_visu.php'>
   <button style='top:48%;' class='bntv1' id='btntest4'>Mensagem[$nun_msg]</button>
  </form>";
  echo"<form  action='sair.php'>
    <button style='top:65%;' class='bntv1' id='btntest2'>Sair</button>
  </form>";
}else if ($_SESSION['msg']==2){
 echo"<form  action='#'>
  <button class='bntv1' style='top:300px' id='btntest3'>Emprestimo de pasta</button>
</form>";

if($_SESSION['setor']=="Arquivo acadêmico"){
  echo"<form  action='mensa_re.php'>
   <button class='bntv1' style='top:400px' id='btntest4'>Mensagem[$nun_msg]</button>
  </form>";
  echo"<form  action='sair.php'>
    <button style='top:500px' class='bntv1' id='btntest2'>Sair</button>
  </form>";
}else{
  echo"<form  action='sair.php'>
    <button style='top:400px' class='bntv1' id='btntest2'>Sair</button>
  </form>";
}

}else if ($_SESSION['msg']==3){
 echo"<form  action='#'>
  <button class='bntv1' style='top:300px' id='btntest3'>Emprestimo de pasta</button>
</form>";
echo"<form  action='Pesquisa.php'>
 <button class='bntv1' style='top:400px' id='btntest3'>Inserir documento</button>
</form>";
if($_SESSION['setor']=="Arquivo acadêmico"){
  echo"<form  action='mensa_re.php'>
   <button class='bntv1' style='top:500px' id='btntest4'>Mensagem[$nun_msg]</button>
  </form>";
  echo"<form  action='sair.php'>
    <button style='top:600px' class='bntv1' id='btntest2'>Sair</button>
  </form>";
}else{
  echo"<form  action='sair.php'>
    <button style='top:500px' class='bntv1' id='btntest2'>Sair</button>
  </form>";
}
}else if ($_SESSION['msg']==4){
 echo"<form  action='#'>
  <button class='bntv1' style='top:300px' id='btntest3'>Emprestimo de pasta</button>
</form>";
echo"<form  action='Pesquisa.php'>
 <button class='bntv1' style='top:400px' id='btntest3'>Inserir documento</button>
</form>";

if($_SESSION['setor']=="Arquivo acadêmico"){
  echo"<form  action='mensa_re.php'>
   <button class='bntv1' style='top:500px' id='btntest4'>Mensagem[$nun_msg]</button>
  </form>";
  echo"<form  action='admini.php'>
   <button class='bntv1' style='top:600px' id='btntest3'>Ferramentas administrativas</button>
  </form>";
  echo"<form  action='sair.php'>
    <button style='top:700px' class='bntv1' id='btntest2'>Sair</button>
  </form>";
}else{
echo"<form  action='admini.php'>
 <button class='bntv1' style='top:500px' id='btntest3'>Ferramentas administrativas</button>
</form>";
echo"<form  action='sair.php'>
  <button style='top:600px' class='bntv1' id='btntest2'>Sair</button>
</form>";
}
}
?>


</div>
</body>
</html>
