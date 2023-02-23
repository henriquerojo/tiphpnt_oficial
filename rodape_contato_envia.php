<?php 
$nome = $_POST['nome_contato'];
$email = $_POST['email_contato'];
$comentario = $_POST['comentario_contato'];

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

// Configurações do servidor de email
$mail->Host = 'smtp.office365.com';
$mail->Port = '587';
$mail->SMTPSecure = 'STARTTLS';
$mail->SMTPAuth = 'true';
$mail->Username = 'henriqueti93@outlook.com';
$mail->Password = 'henrique1';

// Configuração de mensagem
$mail->setFrom($mail->Username, "Seu Nome");
$mail->addAddress('henriqueti93@outlook.com');
$mail->Subject = "Fale Conosco e VAI CORINTHIANS";

$conteudo_email = "
Voce recebeu uma mensagem de $nome ($email):
<br>
Mensagem: <br>
$comentario
";
$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if ($mail->send())
{
    echo "E-mail enviado com sucesso!";
}
else
{
    echo "Falha ao enviar o e-mail " . $mail->ErrorInfo;
}
?>