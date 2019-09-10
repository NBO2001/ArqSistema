<?php
session_start();
if($_SESSION['msg']==""){
  header("Location:index.php");
}
include_once "ConAL.php";
$nomepes = $_SESSION['v_pesquisa_n_duplicado'];

if ($nomepes==""){
  header("Location:pg_pesquisa_nome.php");
}else{
  $result_usuario = "SELECT * FROM Alunos WHERE Num_mat LIKE '".$nomepes."%'";
  $resultado_usuario = mysqli_query($conn, $result_usuario);

}
?>
<!DOCTYPE html>
<html lang=pt-br>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">

<title>Inserir</title>
</head>
<body class="pes_nome_body">
  <div style="width: 1400px;" id = "logo">
  <h1 id="itu" >------  Arquivo acadêmico - PROEG  --------</h1>
  </div>

    <nav>
    		<ul>

        <li><a href="pg_ini1.php">Inicio</a></li>
    		<li><a href="pg_pesquisa.php">Pesquisa por matrícula</a></li>
        <li><a href="pg_pesquisa_nome.php">Pesquisa por nome</a></li>
        <li><a href="sair.php">Sair</a></li>
    		</ul>
    </nav>
<div id="tabn">
<table id='minhaTabela'>
   <thead>
        <tr>
             <th>Id</th>
             <th>Matrícula</th>
             <th>Nome</th>
             <th>Curso</th>
        <tr>
   </thead>
   <tbody>
     <?php

     while($row_usuario = mysqli_fetch_array($resultado_usuario)){
       if ($row_usuario['id']==""){
         header("Location:pg_pesquisa_nome.php");
       }
     ?>
        <tr>
            <td> <?php echo  $row_usuario['id']; ?></td>
             <td> <?php echo  $row_usuario['Num_mat']; ?></td>
             <td><?php echo $row_usuario['Nome_civil']; ?></td>
             <td><?php echo $row_usuario['Cod_cur']."--".$row_usuario['Nome_cur']; ?></td>
             </tr>
           <?php } ?>

   </tbody>
</table>

</div>

<form method="POST" action="pg_res_pes_mat.php">
  <input id="bv" type="text" name="nume_dupli">
  <input id= "sana" name="sand" type="submit" value="Abrir detalhes">
</form>

<script type="text/javascript">
  var tabela = document.getElementById("minhaTabela");
var linhas = tabela.getElementsByTagName("tr");
for(var i = 0; i < linhas.length; i++){
var linha = linhas[i];
linha.addEventListener("click", function(){
//Adicionar ao atual
selLinha(this, false);
});
}
/**
Caso passe true, você pode selecionar multiplas linhas.
Caso passe false, você só pode selecionar uma linha por vez.
**/
function selLinha(linha, multiplos){
if(!multiplos){
var linhas = linha.parentElement.getElementsByTagName("tr");
for(var i = 0; i < linhas.length; i++){
  var linha_ = linhas[i];
  linha_.classList.remove("selecionado");
}
}
linha.classList.toggle("selecionado");
}
/**
Exemplo de como capturar os dados
**/
//var btnVisualizar = document.getElementById("visualizarDados");
tabela.addEventListener("click", function(){
var selecionados = tabela.getElementsByClassName("selecionado");
//Verificar se eestá selecionado
if(selecionados.length < 1){
alert("Selecione pelo menos uma linha");
return false;
}
var dados = "";
for(var i = 0; i < selecionados.length; i++){
var selecionado = selecionados[i];
selecionado = selecionado.getElementsByTagName("td");
dados += "ID: " + selecionado[0].innerHTML + " - Nome: " + selecionado[1].innerHTML + " - Idade: " + selecionado[2].innerHTML + "\n";
var d = selecionado[0].innerHTML;
}
//alert(dados);
document.getElementById("bv").value = d;
});
</script>
</body>
</html>
