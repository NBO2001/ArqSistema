<?php
session_start();
if($_SESSION['msg'] <> 4){
  header("Location:index.php");
}
include_once "ConAL.php";
?>
<!DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>Adcionar usuarios</title>
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

 <form method="POST">
 <input class="formataurd" id="username" style="left:200px;top:50;" type="text" name="username" required>
<input class="formataurd" type="submit" style="left:600px;top:50;font-size:30px;" value="Verificar dispolibilidade" >

 </form>
 <form action="admini.php">
<input class="formataurd" type="submit" style="left:200px;top:550;font-size:30px;" value="Voltar" >
 </form>
 <?php $nun = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
 if($nun <> ""){
     $vl ="SELECT * FROM log WHERE ursu LIKE '".$nun."'";
     $rvl = mysqli_query($conn, $vl);
     $linha = mysqli_fetch_assoc($rvl);
     if ($linha['id']<>""){
       echo "<script>alert('Usuario já existe!!')</script>";
     }else{
       echo " <form method='POST' action='ad_uso_fun.php'>
       <label class='formataurd' style='left:200px;top:150;font-size:40px;'>Nome de usuario:</label>
        <input class='formataurd' style='left:600px;top:150;' type='text' name='usernome' value='$nun' readonly><br><br>
        <label class='formataurd' style='left:200px;top:250;font-size:40px;'>Setor:</label>
        <select class='formataurd' style='left:600px;top:250;font-size:30px;' id='cli' name='cli'>
          <option>Arquivo acadêmico</option>
          <option>CRC</option>
          <option>CRD</option>
          <option>CM</option>
        </select><br><br>
        <label style='left:200px;top:350;' class='formataurd'>Digite a senha:</label>
        <input class='formataurd' style='left:600px;top:350;' type='text' name='senhauso' required><br><br>
        <label class='formataurd' style='left:200px;top:450;'>Nivel de acesso</label>
        <input class='formataurd' style='left:600px;top:450;' type='number' min='1' max='3' name='acesso' required><br><br>
       <input class='formataurd' style='left:600px;top:550;' type='submit' value='Cadastrar'>
        </form>";
     }
}
 ?>
</body>
</html>
