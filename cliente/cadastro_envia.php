<?php 

include '../conn/connect.php';

if ($_POST) 
{
    $nome_cliente = $_POST['nome_cliente'];
    $senha_cliente = md5($_POST['senha_cliente']);
    $email_cliente = $_POST['email_cliente'];
    $cpf_cliente = $_POST['cpf_cliente'];

    $listaCli = $conn->query("select cpf from tbclientes where cpf = '$cpf_cliente'");
    $rowCli = $listaCli->fetch_assoc();
    $rowsCli = $listaCli->num_rows;
    
     if ($rowsCli > 0) 
    {
        $insereUsuario = "INSERT INTO tbusuarios 
                (login_usuario, senha_usuario, nivel_usuario)
                VALUES 
                ('"  . + substr($cpf_cliente, 0, 3) . "', '$senha_cliente', 'com');
                ";

        $resultado = $conn->query($insereUsuario);
    }

    if ($rowCli == 0)
    {
        $insereUsuario = "INSERT INTO tbusuarios 
                        (login_usuario, senha_usuario, nivel_usuario)
                        VALUES 
                ('"  . + substr($cpf_cliente, 0, 3) . "', '$senha_cliente', 'com');
                ";
        
        $insereCliente = "INSERT INTO tbclientes 
                        (nome, email, cpf)
                        VALUES 
                        ('$nome_cliente', '$email_cliente', '$cpf_cliente');
                        ";

        $resultado = $conn->query($insereUsuario);
        $resultado = $conn->query($insereCliente);
    }
}

header("location: ../index.php");
?>

