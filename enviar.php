<?php
session_start();
if($_SESSION['msg']== 1 or $_SESSION['msg']== 2 or $_SESSION['msg']== "" ) {
  header("Location:index.php");
}
 ?>
 <?php
   if(isset($_SESSION['ifon'])){
     echo $_SESSION['ifon'];
     unset ($_SESSION['ifon']);
   }
 ?>
<?php

//header("Content-Type: text/html; charset=UTF-8");
 //ini_set('default_charset','UTF-8');
 include_once "ConAL.php";
 $nun = filter_input(INPUT_POST,'nume',FILTER_SANITIZE_STRING);
 if($nun==""){
   header("Location:Pesquisa.php");
 }
 $result_usuario = "SELECT * FROM Alunos WHERE Num_mat LIKE '".$nun."'";
 $resultado_usuario = mysqli_query($conn, $result_usuario);
 $row_usuario = mysqli_fetch_assoc($resultado_usuario);
 if ($row_usuario['id'] == ""){
header("Location:Pesquisa.php");
$_SESSION['ifon'] = "<script>alert('Nenhum registro localizado!!')</script>";
 }else{
 $_SESSION['id'] = $row_usuario['id'];
}
?>
<!DOCTYPE html>
<html lang=pt-br>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">

<title>Inserir</title>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body>

  <body>
    <nav>
    		<ul>
        <li><a href="pg_ini1.php">Inicio</a></li>
    		<li><a href="pg_pesquisa.php">Pesquisa por matrícula</a></li>
        <li><a href="pg_pesquisa_nome.php">Pesquisa por nome</a></li>
        <li><a href='Pesquisa.php'>Inseir documento</a></li>
        <li><a href='sair.php'>Sair</a></li>
    		</ul>
    </nav>
<!-- Responsavel pela pesquisa-->
<div id="hu">
  <h1 id="tituhu">Informações do aluno:</h1>
  <label class="infaluno">Nome: &nbsp</label>
  <label class="infaluno"><?php echo $row_usuario['Nome_civil']; ?></label><br>
  <label class="infaluno">Matrícula: &nbsp</label>
  <label class="infaluno"><?php echo $row_usuario['Num_mat']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp</label>
  <label class="infaluno">Curso: &nbsp</label>
  <label class="infaluno"><?php echo $row_usuario['Cod_cur']; ?> -- &nbsp </label>
  <label class="infaluno"><?php echo $row_usuario['Nome_cur']; ?></label><br>
  <label class="infaluno">Forma de ingresso: &nbsp</label>
  <label class="infaluno"><?php echo $row_usuario['Fin']; ?></label><br>
  <label class="infaluno">Forma de evasão: &nbsp</label>
  <label class="infaluno"><?php echo $row_usuario['Fev']; ?></label><br>
  <label class="infaluno">Ano de ingresso: &nbsp</label>
  <label class="infaluno"><?php echo $row_usuario['Ain']; ?></label><br>
  <label class="infaluno">Ano de evsão: &nbsp</label>
  <label class="infaluno"><?php echo $row_usuario['Aev']; ?></label><br>
</div>

<div id="fo">

<form method="Post" action="envia_banco.php"  enctype="multipart/form-data">
  <label>Descrição*: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
  <input type="text" name="nome" placeholder="Descreva a modificação" required><br><br>
  <label>Selecione o arquivo:</label>
  <input id="arq" type="file" name="pdf" required><br><br>
<label>Qual o tipo de documento:&nbsp;</label>
<input type="text" name="assunto" id="assunto" placeholder="Pesquisar tipo de documento" required><br><br>
<label>Ano do documento:&nbsp;</label>

<input id="ano" name="ano" value="<?php $data=date('Y-m-d');$par = explode('-',$data); echo $par[0]; ?>" type="number" min="1900" max="<?php $data=date('Y-m-d');$par = explode('-',$data); echo $par[0]; ?>" required>

<input id= "san" name="sand" type="submit" value="Cadastrar">

</form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(function () {
        $("#assunto").autocomplete({
            source: 'proc_pesq_msg.php'
        });
    });
</script>
</body>
</html>
