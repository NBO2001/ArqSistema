<?php
include_once 'ConAL.php';

$assunto = filter_input(INPUT_GET,'term',FILTER_SANITIZE_STRING);

$result_usuario = "SELECT Cod_cur,Nome_cur FROM Alunos WHERE Cod_cur LIKE '%".$assunto."%' OR Nome_cur LIKE '%".$assunto."%' GROUP BY Cod_cur ORDER BY Alunos.Cod_cur";

$resultado_usuario = mysqli_query($conn, $result_usuario);



    while($row_usuario = mysqli_fetch_array($resultado_usuario)){

    $data[] = $row_usuario['Cod_cur']." --> ".$row_usuario['Nome_cur'];


}
echo json_encode($data);

?>
