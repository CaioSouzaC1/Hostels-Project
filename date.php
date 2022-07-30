<?php
include "conexao.php";
require "PHPMailer/Exception.php";
require "PHPMailer/OAuth.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/POP3.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$nome = trim($_POST["nome"]);
$email = trim($_POST["email"]);
$whatsapp = trim($_POST["whatsapp"]);
$data_entrada = trim($_POST["data_entrada"]);
$data_saida = trim($_POST["data_saida"]);

$sql = "INSERT INTO `table_hostel_project`(`nome`,`email`,`whatsapp`,`data_entrada`,`data_saida`) VALUES ('$nome','$email','$whatsapp','$data_entrada','$data_saida')";

if ($conexao->query($sql) === TRUE) {
    $_SESSION = TRUE;
} 

	$mail = new PHPMailer(true);
	try {
            
			//Server settings
			$mail->SMTPDebug = 2;                   //Enable verbose debug output
			$mail->isSMTP();                                         //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'caiodiscordone@gmail.com';             //SMTP username
			$mail->Password   = 'ijqxclxhlyuqtjvc';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('caiodiscordone@gmail.com', 'Yinv Co');
			$mail->addAddress($_POST['email']);     //Add a recipient
			/*$mail->addReplyTo('caiodiscordone@gmail.com', 'Yinv Co');
			$mail->addCC('cc@example.com');
			$mail->addBCC('bcc@example.com'); */

			//Attachments
			/*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name*/

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Obrigado por consultar!';
			$mail->Body    = '<div style="color: #1674d1;"><h1>Castello Montemare</h1></div> <br><br>
            <div><h3>Obrigado por efetuar a consulta de disponibilizadede de reserva em nosso hotel!</h3></div><br>
            <div><h4>Entraremos em contato com você por telefone ou WhatsApp o mais breve possível para finalizarmos
            as tratativas!</h4></div><br>
            <div style="color: #1674d1;"><h5>Made By <a href="https://github.com/CaioSouzaC1">Caio César</a></h5></div>';
			$mail->AltBody = 'Utilize um aplicativo de emails mais atualizado para ler todo o conteúdo enviado pela Yinv Co!';

			$mail->send();
            
	} catch (Exception $e) {
			echo "Não foi possivel enviar este e-mail! <br>";
			echo 'Detalhes do erro: ' . $mail->ErrorInfo;
        } 
      

?>
