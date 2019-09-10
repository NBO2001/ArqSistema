<?php
session_start();
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
$codurso = $_SESSION['lesa'];
$setor = $_SESSION['t1'] ;
$solicitante = $_SESSION['t2'] ;
$usuarioname = $_SESSION['t3'] ;
	// Carrega seu HTML
	//$dompdf->load_html('<p>Natana '.$teste.' <br> '.$setor.' <br> '.$solicitante.'</p>');
$dompdf->load_html('<div style="position:absolute;width: 700px;top:0px;left: 0px;height: 80px;">
<h1 style="color:black;">------  Arquivo acadêmico - PROEG  --------</h1>
</div>
<div style="position:absolute;border: 1px solid black;width: 700px;top:100px;font-size:30px;left:0px;">
<label>Solicitação: </label>
<label>'.$codurso.'</label><br><br>
<label>Setor: </label>
<label>'.$setor.'</label><br><br>
<label>Solicitante: </label>
<label>'.$solicitante.'</label><br><br>
<label>&nbsp;_____________________________________________</label>
<label style="font-size:15px;text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(assinatura do Solicitante)</label>
</div>');
	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Termo.pdf",
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
