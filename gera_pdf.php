<?php
session_start();
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	// Carrega seu HTML
	//$dompdf->load_html('<p>Natana '.$teste.' <br> '.$setor.' <br> '.$solicitante.'</p>');
$dompdf->load_html(' <!DOCTYPE html>
 <html lang="pt-br">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="css/es.css">
     <title>Modelo</title>
   </head>
   <body id ="Modelo_body">
	 <table>
		 <tbody>
		 <tr style="height:46.50pt;mso-height-source:userset;mso-height-alt:930;">
				 <td class="xl72 ">AT02</td>
				 <td class="xl73" >Alunos em trânsito</td>
				 <td class="xl72 ">AT01</td>
				 <td class="xl73" >Alunos em trânsito</td>
			 </tr>
			 </tbody>
			 </table>
   </body>
 </html>');
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
