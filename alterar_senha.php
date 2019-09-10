<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf=8">
<title>Tela inicial</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" type="text/css" href="css/es.css">
<style>

#alterarsenha{
  position: absolute;
  background-color: #808080;
  left:40%;
  top:20%;
}
.labelaterarsenha{
  position: absolute;
  width: 100%;
  height:5%;
  font-size: 20px;
  text-align: center;

}
.campotabelasenn{
  border-radius: 15px;
  border: 1px solid black;
}
#btnaltersenha{
  position: absolute;
  left: 25%;
  width: 50%;
  border-radius: 15px;
  border: 1px solid black;
}
#alterarsenha{
  position: absolute;
  background-color: #808080;
  left:40%;
  top:20%;
}
.labelaterarsenha{
  position: absolute;
  width: 100%;
  height:5%;
  font-size: 20px;
  text-align: center;

}
.campotabelasenn{
  border-radius: 15px;
  border: 1px solid black;
}
#btnaltersenha{
  position: absolute;
  left: 25%;
  width: 50%;
  border-radius: 15px;
  border: 1px solid black;
}
@media (max-width: 1000px) {


}

</style>
</head>
<body>
  <div>
    <form method="Post" action="" id="alterarsenha" enctype="multipart/form-data">
      <label class="labelaterarsenha">Login:</label><br>
        <input class="campotabelasenn" name="nuso" type="text" required></input><br>
      <label class="labelaterarsenha">Senha antiga:</label><br>
        <input class="campotabelasenn" name="senuso" type="password" required></input><br><br>
        <label class="labelaterarsenha">Nova senha:</label><br>
          <input class="campotabelasenn" name="senuso" type="password" required></input><br><br>
          <label class="labelaterarsenha">Digite novamente a senha:</label><br>
            <input class="campotabelasenn" name="senuso" type="password" required></input><br><br>
        <input name="btnlo" id="btnaltersenha" type="submit" value="Alterar"></input><br><br><br><br><br><br>
        <label>&copy;2019 N.B.O<label>
    </form>

  </div>
</body>
</html>
