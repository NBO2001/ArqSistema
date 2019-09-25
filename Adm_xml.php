<?php
session_start();
if($_SESSION['msg']<>4){
  header("Location:index.php");
}
$pdo = new PDO( 'mysql:host=localhost;dbname=Al', 'root', '' );
$pdo -> query("SET NAMES UTF8");

$stmt = $pdo->prepare("show tables");
$stmt->execute(array('Tables_in_Al'));
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8"/>
<title>Adm</title>
<style>
#ditable{
  overflow: auto;
   width: 1000px;
    height: 200px;
}
table{
border-collapse:collapse;
border:1px solid black;
}
tr{
  border: 1px solid black;
}
td{
    border: 1px solid black;
}
</style>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
        <label>Ver tabelas</label>
    <SELECT name="tabelasres">
      <?php foreach($resultado as $item){
      echo "<option>".$item['Tables_in_Al']."</option>";
    } ?>
    </select>
    <?php
    if(isset($_SESSION['cm'])){
      echo "<span>".$_SESSION['cm']."</span>";
    }
    ?>
    <input type="submit" name='ver_estru' value="Abrir estrutura">
  </form>
  <form method="POST" enctype="multipart/form-data">
        <label>Ver tabelas</label>
    <SELECT name="tabelas">
      <?php foreach($resultado as $item){
      echo "<option>".$item['Tables_in_Al']."</option>";
    } ?>
    </select>
    <input type="text" name="querya"><br><br>
    <input type="submit" name='brmva' value="Abrir">
  </form>
  <form method="POST" action="xml_funq.php" enctype="multipart/form-data">
    <label>Query</label>
    <input type="text" name="query"><br><br>
    <input type="submit" value="Importar">
  </form>
<form method="POST" action="Adm_analise_fun.php" enctype="multipart/form-data">
  <label>Analise</label>
  <input type="file" name="arquivo"><br><br>
  <input type="submit" value="Importar">
</form>
<form method="POST" action="apagar_fun.php" enctype="multipart/form-data">
  <label>Apaga</label>
  <input type="file" name="arquivo"><br><br>
  <input type="submit" value="Importar">
</form>
<div id="ditable">
<table style="border:1px solid black;">
<tbody>
  <?php
  $msg = "";
  if(isset($_SESSION['final'])){
    if(isset($_SESSION['colunas'])){
      $conlun = $_SESSION['colunas'];
      $conlun = explode(",",$conlun);
      $tnt = 0;
      $msg .= "<thead><tr>";
      while (isset($conlun[$tnt]) AND $conlun[$tnt]<>"") {
        $msg .="<td>".$conlun[$tnt]."</td>";
        $tnt++;
      }$msg .="</tr></thead>";
      unset ($_SESSION['colunas']);
    }



    $final = $_SESSION['final'];
    unset ($_SESSION['final']);
    $final = explode("|",$final);
    $con = 0;
    while (isset($final[$con]) AND $final[$con]<>"") {
      $msd = $final[$con];
      $msg.="<tr>";
      $msd = explode(",",$msd);
      $cot = 0;
      while (isset($msd[$cot])) {
        $cot++;
      }
      $cotfina = $cot;
      $cotfina--;
      $cot =0;
      while ($cot < $cotfina) {
        $msg.= "<td>".$msd[$cot]."</td>";
        $cot++;
      }

      $msg.= "</tr>";
      $con++;
    }echo $msg;
  }
  ?>

</tbody>
</table>
</div>
</body>
</html>
<?php
if(isset($_POST['ver_estru'])){
  $tabela2 = $_POST['tabelasres'];
  $stmtcm = $pdo->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tabela2'");
  $stmtcm->execute(array('COLUMN_NAME'));
  $resultadocm = $stmtcm->fetchAll(PDO::FETCH_ASSOC);
  $Nome_tabelas ="";

  foreach($resultadocm as $itemcm){
  $Nome_tabelas .= $itemcm['COLUMN_NAME']."<br>";
}$_SESSION['cm']= $Nome_tabelas;

}
if(isset($_POST['brmva'])){
  $tabela = $_POST['tabelas'];
  $complento = $_POST['querya'];
  $stmtap = $pdo->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tabela'");
  $stmtap->execute(array('COLUMN_NAME'));
  $resultadoap = $stmtap->fetchAll(PDO::FETCH_ASSOC);
$campos ="";
$campos2="";
  foreach($resultadoap as $itemap){
  $campos .= "'".$itemap['COLUMN_NAME']."',";
  $campos2.=$itemap['COLUMN_NAME'].",";
  }$_SESSION['colunas']= $campos2;

  $stmtped = $pdo->prepare("SELECT * FROM $tabela $complento");
  $stmtped->execute(array($campos));

$campos2 = explode(',',$campos2);
$cont = 0;

while (isset($campos2[$cont]) AND $campos2[$cont]<>"") {

$cont++;
}
$ap = 0;
$final = "";
  $resultadoped = $stmtped->fetchAll(PDO::FETCH_ASSOC);
  foreach($resultadoped as $itemped){

    while ($ap<$cont) {
      $cpmpi = $campos2[$ap];
      $final.= $itemped[$cpmpi].",";

      $ap++;
    }
    $final.="|";
    $ap = 0;

  }

  $_SESSION['final'] = $final;
echo "<script>window.open('Adm_xml.php','_top');</script>";
}

?>
