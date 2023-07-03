<?php 
include 'conn/connect.php';
$busca_detalhe = $_GET['id_produto'];
$produto_detalhe = $conn->query("select * from vw_tbprodutos where id_produto = '$busca_detalhe';");
$row_detalhe = $produto_detalhe->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<style>
    .center-column 
    {
        margin-left: auto;
        margin-right: auto;
        float: none !important;
    }
</style>
<body class="fundofixo">
    <!-- INÍCIO MENU PÚBLICO -->
    <header>
        <?php include "menu_publico.php";?>
    </header>
    <!-- FIM MENU PÚBLICO -->
    <div class="container">
        <!-- Top para voltar -->
        <h2 class="breadcrumb alert-danger">
            <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>                
            Detalhes do Produto
        </h2>
        <!-- Detalhe produtos -->
        <div class="card mb-3 breadcrumb">
            <div class="row g-0 text-center">
                <!-- INÍCIO IMAGEM DO PRODUTO -->
                <div class="col-md-7 center-column">
                    <img src="images/<?php echo $row_detalhe['imagem_produto'] ?>" class="img-fluid img-thumbnail rounded-start" alt="<?php ?>">
                </div>
                <!-- FIM IMAGEM DO PRODUTO -->
                <div class="col-md-7 center-column">
                    <div class="card-body">
                        <!-- INÍCIO NOME PRODUTO -->
                        <h3 class="text-danger text-center text-uppercase"> 
                            <strong><?php echo $row_detalhe['descri_produto'] ?></strong>
                        </h3>
                        <!-- FIM NOME PRODUTO -->
                        <!-- INÍCIO TIPO DO PRODUTO -->
                        <p class="fs-3 text-center">
                            <strong><?php echo $row_detalhe['rotulo_tipo'];?></strong>
                        </p>
                        <!-- FIM TIPO DO PRODUTO -->
                        <!-- INÍCIO RESUMO PRODUTO -->
                        <p class="">
                            <?php echo $row_detalhe['resumo_produto'];?>
                        </p>
                        <!-- FIM RESUMO PRODUTO -->
                        <div class="d-flex justify-content-end text-center">

                            <button class="btn btn-default disabled" role="button" style="cursor: default;">
                                <?php echo "R$ ".number_format($row_detalhe['valor_produto'], 2, ',', '.');?>    
                            </button>

                            <button class="btn btn-default btn-success text-white text-uppercase" role="button">
                                Comprar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- INÍCIO RODAPÉ -->
        <footer class="panel-footer" style="background: none;">
            <?php include 'rodape.php'; ?>
            <a name="contato"></a>
        </footer>
        <!-- FIM RODAPÉ -->
    </div>
</body>
</html>