<?php
session_start();
$nome = $_SESSION['usuarioname'];
include_once 'ConAL.php';
$sql = "SELECT * FROM chat ORDER BY chat.id DESC LIMIT 15";
$rexea = mysqli_query($conn, $sql);
while($resubank = mysqli_fetch_array($rexea)){
  if($nome == $resubank['uso'] ){
    $res = $resubank['uso'].":".$resubank['msg']."<br>";

    echo "<label style='color:red;'>$res</label>";
  }else{
  $res = $resubank['uso'].":".$resubank['msg']."<br>";
  echo $res;
  }
}

?>
