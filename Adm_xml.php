<!DOCTYPE>
<html>
<head>
<meta charset="utf-8"/>
<title>Adm</title>
</head>
<body>
<label>Colunas:<br></label>
<label>id<br>
Cod_cur<br>
Num_mat<br>
Nome_civil<br>
Fin<br>
Fev<br>
Ain<br>
Aev<br>
sistema<br></label>
<form method="POST" action="xml_funq.php">
<input name="query" type="tex">
<input type="submit">
</form>
<form method="POST" action="Adm_analise_fun.php" enctype="multipart/form-data">
  <label>Arquivo</label>
  <input type="file" name="arquivo"><br><br>

  <input type="submit" value="Importar">
</form>
</body>
</html>
