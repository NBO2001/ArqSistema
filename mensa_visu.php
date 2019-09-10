<?php
session_start();
if($_SESSION['msg'] == ""){
  header("Location:index.php");
}
include_once "ConAL.php";
$nomeus = $_SESSION['usuarioname'];
$result_usuario = "SELECT * FROM mensa WHERE soli LIKE '$nomeus' AND vr = 1";
$resultado_usuario = mysqli_query($conn, $result_usuario);

?>

<!DOCTYPE>
<html lang=pt-br>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">

<title>Usuarios</title>
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
<div>
<?php while($row_usuario = mysqli_fetch_array($resultado_usuario)){
$a_id= $row_usuario['id'];
$a_nome= $row_usuario['a_nome'];
$solicitacao= $row_usuario['solicitacao'];
$msg_d= $row_usuario['msg_d'];
echo "<p style='font-size:20px;color:white;border: 1px solid black;'>De: $a_nome <br>A respeito da solicitação: $solicitacao <br>$msg_d</p>";
$visum = "UPDATE mensa SET vr = 0 WHERE mensa.id =".$a_id;
$revisu = mysqli_query($conn, $visum);

}
$fun = "window.location.href='pg_ini1.php'";
echo "<button style='position:relative;top:50px;left:450px; font-size: 20px;color:white;background-color: black;border: 1px solid black;border-radius: 15px;width:400px;height:10%; 'onclick=".$fun.">Voltar</button>";?>


</div>




</body>
</html>
