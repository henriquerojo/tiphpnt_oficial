<?php 
$nome = $_POST['nome_contato'];
$email = $_POST['email_contato'];
$comentario = $_POST['comentario_contato'];

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

// Configurações do servidor de email
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = 'true';
$mail->Username = 'henriquerojo10@gmail.com';
$mail->Password = 'af5jk540';

// Configuração de mensagem
$mail->setFrom($mail->Username, "Seu Nome");
$mail->addAddress('henriquerojo10@gmail.com');
$mail->Subject = "Fale Conosco e VAI CORINTHIANS";

$conteudo_email = "
Você recebeu uma mensagem de $nome ($email):
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