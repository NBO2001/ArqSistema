<?php
 require("PHPMailer.php");
 require("SMTP.php");
 require("Exception.php");
 function enviar_email($emaile,$corpo){
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP(); 

 $mail->CharSet="UTF-8";
 $mail->Host = "smtp.gmail.com";
 $mail->SMTPDebug = 0; 
 $mail->Port = 465 ; //465 or 587

$mail->SMTPSecure = 'ssl';  
$mail->SMTPAuth = true; 
$mail->IsHTML(true);

$conf = fopen('conf.txt','r');
$conf = fgets($conf, 1024);

if (file_exists($conf.'/ml.txt')) {
$arq = fopen($conf .'/ml.txt','r');
$linha[] = '';
while(!feof($arq)){
  $linha[] .= fgets($arq, 1024); 
}
$local  = $linha[1];
$senha = $linha[2]; 
}
$mail->Username = $local;
$mail->Password = $senha;
$mail->SetFrom($local);
$mail->AddAddress("$emaile");
$mail->Subject = "Arquivo Acâdemico";
$mail->AddEmbeddedImage('ufam.png','logo','logo');
$mail->Body = $corpo;
$mail->Send();
 }
?>