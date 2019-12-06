<?php
require_once 'Conec_PDO.php';
include_once 'envia_email/en_email.php';
session_start();
if(isset($_SESSION['usuarioname'])){
    $usoario = $_SESSION['usuarioname'];
    $senha = $_SESSION['senha_verir'];
    $pqs = $pdo->prepare("SELECT * FROM log WHERE ursu LIKE '$usoario' AND senha LIKE '$senha'");
    $pqs->execute();
    $pqsa = $pqs->fetchALL(PDO::FETCH_ASSOC);
    if(isset($pqsa[0])){
        $id = $pqsa[0]['id'];
        $uso =  strtoupper($pqsa[0]['ursu']);
        $setor = $pqsa[0]['setor'];
    }else{
    $_SESSION['ifon']="<script>alert('Login ou senha inválidos')</script>";
    header("Location:index.php");
    die;
    }
    
}else{
    $_SESSION['ifon']="<script>alert('Vazios')</script>";
    header("Location:index.php");
    die;
}
?>
<!DOCTYPE html>
 <html lang="pt-br">
 <head>
   <meta charset="utf=8">
   <title>Cadastros</title>
   <link rel="stylesheet" type="text/css" href="css/es.css">
<link type='image/x-icon' rel='shortcut icon' href='ufamicon.ico'>
 </head>
<body>
 <div id='cd_novos'>
<form method='POST'>
<label>NOME: <?php echo $uso;?></label><br><br>
<label>SETOR: <?php echo $setor;?></label><br><br>
<span>Devido a uma atualização em nossas metodólogias <br> será necesário atualizar alguns dados.</span><br><br>

<label>E-mail: </label><input type='email' name='email_uso'  required><br><br>
<label>SENHA: </label><input type='text' name='nova_senha'   maxlength='8' minlength='3' placeholder='Máximo 8 caracteres' required><br><br>

<input type='submit' name='btn_envia' value='Enviar'></input>
</form> 
</div>
 </body>
 <footer>
 <label id="copra">&copy;2019 N.B.O Suporte: arquivo_proeg@ufam.edu.br<label>
</footer> 
 </html>
<?php
if(isset($_POST['btn_envia'])){
    $email = $_POST['email_uso'];
    $senhaci = md5($_POST['nova_senha']);
    if(isset($email) && isset($senhaci)){
        $up = $pdo->prepare("UPDATE log SET email = '$email', senha = '$senhaci' WHERE log.id=$id");
        $up->execute();
        $mail->SetFrom($local);
        $mail->AddAddress("$email");
        $mail->Subject = "Arquivo Acâdemico";
        $mail->Body = "Olá $uso, seus dados foram atualizados com sucesso.";
    
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo "foi enviada";
         }
        $_SESSION['ifon']="<script>alert('Dados atualizados com sucesso')</script>";
        header("Location:index.php");
        die;
    }else{
        $_SESSION['ifon']="<script>alert('Vazios')</script>";
        header("Location:index.php");
        die;
    }
    
}

?>