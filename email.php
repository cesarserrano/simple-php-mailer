<?php
if($_GET['acao'] == 'enviar'){
 $nome 	    = $_POST['nome'];
 //$assunto   = $_POST['assunto'];
 $email   = $_POST['email'];
 $mensagem  = $_POST['mensagem'];
 $arquivo   = $_FILES["arquivo"];
 $tipo		= $_POST['tipo'];
 $area	= $_POST['area'];
 $telefone	= $_POST['telefone'];	
 $site		= $_POST['site'];
 $social	= $_POST['social'];

$corpoMSG = "Ola,";
$corpoMSG = $corpoMSG . "<br><br>";
$corpoMSG = $corpoMSG . "Esta e uma mensagem automatica enviada pelo site meudominio.com";

 // chamada da classe		
 require_once('class.phpmailer.php');
 // instanciando a classe
 $mail   = new PHPMailer();
 // email do remetente
 //$mail->SetFrom('remetente@dominio.com.br', 'remetente');

$mail->Host = '###'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
$mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
$mail->Port       = 587; //  Usar 587 porta SMTP
$mail->Username = '###'; // Usuário do servidor SMTP (endereço de email)
$mail->Password = '###'; // Senha do servidor SMTP (senha do email usado)
//Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
$mail->SetFrom($email, $nome); //Seu e-mail

//$mail->AddReplyTo('email@dominio.com', 'Adm do dominio'); //Seu e-mail

 // assunto da mensagem
 $assunto = "Enviado pelo site";
 $mail->Subject = $assunto;
 
 // email do destinatario
 $address = "destino@dominio.com";
  $mail->AddAddress($address, "destinatario");
 
 // corpo da mensagem
 $mail->MsgHTML($corpoMSG);
 // anexar arquivo
 

$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );

 if(!$mail->Send()) {
   echo "Erro: " . $mail->ErrorInfo;
  } else {
   echo "Mensagem enviada com sucesso!";
  }
}
?>
