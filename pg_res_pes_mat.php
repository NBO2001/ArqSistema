<?php
session_start();
if($_SESSION['msg']==""){
 header("Location:index.php");
}
if(isset($_SESSION['ifon'])){
  echo $_SESSION['ifon'];
  unset ($_SESSION['ifon']);

}
include_once "ConAL.php";
$nun = filter_input(INPUT_POST,'nume',FILTER_SANITIZE_STRING);
$nun = preg_replace("/\s+/","",$nun);
$nume_dupli = filter_input(INPUT_POST,'nume_dupli',FILTER_SANITIZE_STRING);
$nume_dupli = preg_replace("/\s+/","",$nume_dupli);

if(isset($_SESSION['nun_pesquia'])){
  unset ($_SESSION['retorno']);
  $nun = $_SESSION['nun_pesquia'];
  unset ($_SESSION['nun_pesquia']);
}
if ($nume_dupli <> ""){
$result_usuario = "SELECT * FROM Alunos WHERE id LIKE '$nume_dupli'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_array($resultado_usuario);

$result_usuarioa = "SELECT * FROM Ko WHERE imagem LIKE '$nume_dupli' ORDER BY ano_doc ASC";
$resultado_usuarioa = mysqli_query($conn, $result_usuarioa);


}else if(isset($_SESSION['retorno'])){
    $nume_dupli = $_SESSION['retorno'];
    unset ($_SESSION['retorno']);
     if (isset($_SESSION['ref'])){
       echo $_SESSION['ref'];
       unset ($_SESSION['ref']);
     }
    $result_usuario = "SELECT * FROM Alunos WHERE id LIKE '$nume_dupli'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_array($resultado_usuario);

    $result_usuarioa = "SELECT * FROM Ko WHERE imagem LIKE '$nume_dupli' ORDER BY ano_doc ASC";
    $resultado_usuarioa = mysqli_query($conn, $result_usuarioa);



  }else{
    if($nun==""){
      header("Location:pg_ini1.php");
      $_SESSION['ifon'] = "<script>alert('Ocorreu um erro')</script>";
    }else{
          $vregistroduplos = "SELECT count(*) FROM Alunos WHERE Num_mat LIKE '$nun%'";
          $resultado_resgr = mysqli_query($conn, $vregistroduplos);
          $row_usuariob = mysqli_fetch_array($resultado_resgr);
          if ($row_usuariob['count(*)']>1) {
            header("Location:nun_mat_duli.php");
            $_SESSION['v_pesquisa_n_duplicado'] = $nun;
          }else{

            $result_usuario = "SELECT * FROM Alunos WHERE Num_mat LIKE '$nun%'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            $row_usuario = mysqli_fetch_array($resultado_usuario);
            if($row_usuario['id'] == ""){
              header("Location:pg_pesquisa.php");
              $_SESSION['ifon'] = "<script>alert('Nenhum registro encontrado')</script>";
            }else{
            $_SESSION['id'] = $row_usuario['id'];
            $result_usuarioa = "SELECT * FROM Ko WHERE imagem LIKE '".$_SESSION['id']."' ORDER BY ano_doc ASC";
            $resultado_usuarioa = mysqli_query($conn, $result_usuarioa);

            }
            }
    }
  }
?>
<!DOCTYPE html>
<html lang=pt-br>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/es.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<?php
if(isset($_COOKIE["tema"])){
  $tema = $_COOKIE["tema"];
}else{
  setcookie("tema","a", (time() + (500 * 24 * 3600)));
}
if($_COOKIE["tema"] <> "a"){
  echo "<link rel='stylesheet' type='text/css' href='css/$tema.css'>";
}
?>
<title>Inserir</title>
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
    		<li><a href="pg_pesquisa.php">Pesquisa por matrícula</a></li>
        <li><a href="pg_pesquisa_nome.php">Pesquisa por nome</a></li>


    		<?php
        if($_SESSION['msg']==1){
          echo "<li><a href='soli_pas.php'>Solicitar pasta</a></li>";
          echo "<li><a href='mensa_visu.php'>Mensagem</a></li>";
         echo "<li><a href='sair.php'>Sair</a></li>";
       }else if($_SESSION['msg']==2){
          echo "<li><a href='etq_uni.php'>Gerar etiqueta</a></li>";
           echo "<li><a href='mensa_re.php'>Mensagem</a></li>";
         echo "<li><a href='sair.php'>Sair</a></li>";
       }else if($_SESSION['msg']== 3 or 4){
         echo "<li><a href='etq_uni.php'>Gerar etiqueta</a></li>";
         echo "<li><a href='enviar.php'>Inserir documento</a></li>";
         echo "<li><a href='alter_registro.php'>Altera registro</a></li>";
         echo "<li><a href='mensa_re.php'>Mensagem</a></li>";
         echo "<li><a href='sair.php'>Sair</a></li>";}

       ?>

    		</ul>
    </nav>
  </div>
<!-- Responsavel pela pesquisa-->
<div id="dadosal" >
<label style="color:#FE642E;" >Nome civil: &nbsp</label>
<label><?php echo $row_usuario['Nome_civil'];?></label><br>
<label style="color:#FE642E;" >Nome social: &nbsp</label>
<label><?php echo $row_usuario['Nome_social']; ?></label><br>
<label style="color:#FE642E;" >Matrícula: &nbsp</label>
<label><?php echo $row_usuario['Num_mat']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp</label>
<label style="color:#FE642E;">Curso: &nbsp</label>
<label><?php echo $row_usuario['Cod_cur']; ?> -- &nbsp </label>
<label><?php echo $row_usuario['Nome_cur']; ?></label><br>
<label style="color:#FE642E;">Forma de ingresso: &nbsp</label>
<label ><?php echo $row_usuario['Fin']; ?> &nbsp&nbsp | &nbsp</label>
<label style="color:#FE642E;">Ano de ingresso: &nbsp</label>
<label ><?php echo $row_usuario['Ain']; $_SESSION['id']=$row_usuario['id']; ?></label><br>

<label style="color:#FE642E;">Forma de evasão: &nbsp</label>
<label><?php echo $row_usuario['Fev']; ?>&nbsp&nbsp | &nbsp</label>
<label style="color:#FE642E;" >Ano de evsão: &nbsp</label>
<label><?php if($row_usuario['Aev']==""){echo "Sem evasão";}else{ echo $row_usuario['Aev'];} ?>&nbsp&nbsp | &nbsp</label>
<label style="color:#FE642E;">Dados retirados do: &nbsp</label>
<label><?php echo $row_usuario['sistema']; ?></label><br>
<?php
$cod = $row_usuario['Cod_cur']." - ".$row_usuario['Num_mat'];
$_SESSION['lesa'] = $cod;
if($_SESSION['msg']==1){
  $cod = $row_usuario['Cod_cur']." - ".$row_usuario['Num_mat'].".".$row_usuario['id'];
  $_SESSION['Num_mat'] = $cod;
}
?>




<form method="POST" action="pdf_visu.php" target="_blank">
  <input  id="bv" type="text" name="nome">
  <input id= "san" name="sand" type="submit" value="Visualizar">
</form>
<?php
if($_SESSION['msg']==4){
echo "<form method='POST'>
  <input style='display:none;' id='bva' type='text' name='bvaa'>
  <input id='btnalterdoc' name='valoralter' type='submit' value='Alterar documento'>
</form>";
}
?>
</div>
<div  id="tab" class="tabelapgmat">
<table  id='minhaTabela' class="tabfom">
   <thead class="cabecalj">
        <tr>
             <th>ID</th>
             <th>Classificação do <br> documento</th>
             <th>Tipo de <br> documento</th>
             <th>Descrição</th>
             <th>Ano do documento</th>
             <th>Inserido em:</th>

        <tr>
   </thead>
   <tbody>
     <?php
     while($row_usuarioa = mysqli_fetch_array($resultado_usuarioa)){
     ?>
        <tr>
              <?php
              $resudata = $row_usuarioa['data_inserido'];
              $resudata = explode('-',$resudata);
              $resudata = $resudata[2]."-".$resudata[1]."-".$resudata[0];
              ?>
             <td><?php echo $row_usuarioa['id'];?></td>
             <td style="font-size:15px;"><?php echo $row_usuarioa['tipo_doc']; ?></td>
             <td style="font-size:17px;"><?php echo $row_usuarioa['class_doc']; ?></td>
             <td style="font-size:17px;"><?php echo $row_usuarioa['nome']; ?></td>
             <td><?php echo $row_usuarioa['ano_doc']; ?></td>
             <td><?php echo $resudata; ?></td>

             </tr>
           <?php } ?>

   </tbody>
</table>

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
<script type="text/javascript">
  var tabela = document.getElementById("minhaTabela");
var linhas = tabela.getElementsByTagName("tr");

for(var i = 0; i < linhas.length; i++){
var linha = linhas[i];
linha.addEventListener("click", function(){
//Adicionar ao atual
selLinha(this, false);


//Selecione apenas um
//selLinha(this, true); //Selecione quantos quiser

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
document.getElementById("bva").value = d;
//document.getElementById("confirmacao").innerHTML ="Deseja visualizar o arquivo de id:" + d +"?";

});

</script>
<?php
$valor_pesquisa = filter_input(INPUT_POST,'bvaa',FILTER_SANITIZE_STRING);
$_SESSION['apaga_id_doc'] = $valor_pesquisa;
$_SESSION['retorno'] = $row_usuario['id'];
if($valor_pesquisa<>""){
  $alterdoc = "SELECT * FROM Ko WHERE id LIKE '".$valor_pesquisa."'";
  $res_alter_doc = mysqli_query($conn, $alterdoc);
  $linhaa= mysqli_fetch_array($res_alter_doc);
  $iad = $linhaa['imagem'];
  $data=date('Y-m-d');
  $par = explode('-',$data);
  if($linhaa['class_doc']=="TCE"){
    $va1 = 'selected';
    $va2 = "";
    $va3 = "";
    $va4 = "";
  }else if($linhaa['class_doc']=="REQUERIMENTO"){
    $va1 = "";
    $va2 = 'selected';
    $va3 = "";
    $va4 = "";
  }else if($linhaa['class_doc']=="PROCESSO"){
    $va1 = "";
    $va2 = "";
    $va3 = 'selected';
    $va4 = "";
  }else if($linhaa['class_doc']=="HISTóRICO ESCOLAR"){
    $va1 = "";
    $va2 = "";
    $va3 = '';
    $va4 = "selected";
  }else{
    $va1 = "";
    $va2 = "";
    $va3 = "";
    $va4 = "";
  }
  $clasfi = $linhaa['tipo_doc'];
  $decricao= $linhaa['nome'];
  $anodic= $linhaa['ano_doc'];

  echo "<div id='alter-doc'>
    <form method='POST'  action='alterar_documento.php'>
    <input type='text' name='idrecurera' style='display:none;' value='$valor_pesquisa' readonly>
      <label>Classificação do documento:&nbsp;</label>
      <input type='text' name='classfi' id='assunto' placeholder='Pesquisar tipo de documento' value='$clasfi' required><br><br>
      <label>Tipo de documento</label>
      <select name='sele'>
        <option>Ficha Cadastral </option>
        <option $va3>Processo</option>
        <option $va2>Requerimento</option>
        <option $va1>TCE</option>
        <option $va4>Histórico Escolar</option>
      </select><br><br>
      <label>Descrição: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input type='text' name='descricao' value='$decricao' placeholder='Descreva a modificação'><br><br>
      <label>Ano do documento:&nbsp;</label>
      <input id='ano' name='ano' value='$anodic' type='number' min='1900' max='$par[0]' required>
      <input  type='submit' id='vol' value='Salvar'>
    </form>
    <button onclick='funcao1()'>Apagar documento</button>
    <form method='POST' >
    <input id='btnvoltaralte' type='submit' value='voltar' >
    </form>

  </div>";
}
echo "<script>
function funcao1()
{
var x;
var r=confirm('Deseja realmente excluí esse documento?' );
if (r==true)
  {
  var x='S';
  }
else
  {
  var x='N';
  }
  window.location.href='apagar_documento.php?nome='+x;
}
</script>";
?>
</body>
</html>
