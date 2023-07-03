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
<body class="fundofixo">
    <header>
        <?php include "menu_publico.php";?>
    </header>
    <div class="container">
        <h2 class="breadcrumb alert-danger">
            <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>                
            Detalhes do Produto
        </h2>
    </div>
    <div class="card mb-3 breadcrumb">
            <div class="row g-0">
                <!-- imagem do produto -->
                <div class="col-md-7">
                    <img src="images/<?php echo $row_detalhe['imagem_produto'] ?>" class="img-fluid img-thumbnail rounded-start" alt="<?php ?>">
                </div>
                <!-- descrição do produto -->
                <div class="col-md-5">
                    <div class="card-body">
                        <h3 class="text-danger text-center text-uppercase"> 
                            <strong><?php echo $row_detalhe['descri_produto'] ?></strong>
                        </h3>

                        <p class="fs-3">
                            <strong><?php echo $row_detalhe['rotulo_tipo'];?></strong>
                        </p>

                        <p class="">
                            <?php echo $row_detalhe['resumo_produto'];?>
                        </p>
                        
                        <div class="d-flex justify-content-end">
                            <p><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Formas de pagamento</a></p>

                            <button class="btn btn-default disabled" role="button" style="cursor: default;">
                                <?php echo "R$ ".number_format($row_detalhe['valor_produto'], 2, ',', '.');?>    
                            </button>

                            <button class="btn btn-default btn-danger text-white text-uppercase" role="button">
                                Comprar
                            </button>
                        </div>
                        <!-- modal pagamentos -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <?php include "rodape.php";?>
        </footer>
</body>
</html>