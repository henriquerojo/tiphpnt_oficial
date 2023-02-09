<?php 
include 'acesso_com.php';
include '../conn/connect.php';
$lista = $conn->query('select * from tbtipos;');
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;
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
<body class="fundofixo">
    <?php include "menu_adm.php"?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">Lista de Tipos</h2>
        <table class="table table-hover table-condensed tb-opacidade bg-danger">
            <thead>
                <th class="hidden">ID</th>
                <th>ROTULO</th>
                <th>SIGLA</th>
                <th>
                    <a href="tipos_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span class="hidden-xs">ADICIONAR</span>
                    </a>
                </th>
            </thead>

            <tbody>
                <?php do{?>
                    <tr>
                        <td class="hidden">
                            <?php echo $row['id_tipo'];?>
                        </td>
                        <td>
                            <?php echo $row['rotulo_tipo'];?>
                            <span class="visible-xs"></span>
                            <span class="hidden-xs"></span>
                        </td>
                        <td>
                            <?php echo $row['sigla_tipo'];?>
                        </td>
                        
                    </tr>
                <?php }while($row = $lista->fetch_assoc());?>
            </tbody>
</body>
</html>