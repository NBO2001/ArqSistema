<!DOCTYPE>
<html>
<head>
<meta charset="utf-8"/>
<title>Adm</title>
</head>
<body>

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
</body>
</html>
