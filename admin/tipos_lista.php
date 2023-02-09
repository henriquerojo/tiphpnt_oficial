<?php 
include 'acesso_com.php';
include '../conn/connect.php';
$lista = $conn->query('select * from tbtipos;');
$row = $lista->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tipos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    
</body>
</html>