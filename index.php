<?php 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Chuleta Quente Churrascaria</title>
</head>
<body class="fundofixo">

    <!-- ÍNICIO ÁREA DE MENU -->
    <?php include 'menu_publico.php';?>
    <a name="home">&nbsp;</a>
    <main class="container">
        
        <!-- ÍNICIO ÁREA DE CAROUSEL -->
        <?php include 'carousel.php';?>
        <!-- FIM ÁREA DE CAROUSEL -->

        <!-- ÍNICIO ÁREA DE DESTAQUE -->
        <a name="destaques">&nbsp;</a>
        <?php include 'produtos_destaque.php';?>    
        <!-- FIM ÁREA DE DESTAQUE -->

        <!-- INÍCIO ÁREA GERAL DE PRODUTOS -->
        <a name="produtos">$nbsp;</a>
        <?php include 'produtos_geral.php';?>
        <!-- FIM ÁREA GERAL DE PRODUTOS -->

        <!-- INÍCIO RODAPÉ -->
           <footer class="panel-footer" style="background: none;">
                <?php include 'rodape.php';?>
                <a name="contato"></a>
           </footer> 
        <!-- FIM RODAPÉ -->
    </main>
    <!-- FIM ÁREA DE MENU -->
</body>
</html>