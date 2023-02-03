<?php 
include 'conn/connect.php';
$lista = $conn->query("select * from vw_tbprodutos where destaque_produto = 'Sim';");
$row_destalhes =  $lista->fetch_assoc();
$num_linhas = $lista->num_rows;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
</head>
<body class="fundofixo">
    <?php include "menu_publico.php"?>
    <div class="container">
            <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="produto_detalhes.php?id_produto=<?php echo $row_detalhes ['id_produto']?>">
                                <img src="images/<?php echo $row_detalhes ['imagem_produto']?>" class="img-responsive img-rounded">
                            </a>
                            <div class="caption text-right">
                                <h3 class="text-danger">
                                    <strong><?php echo $row_detalhes ['descri_produto']?></strong>
                                </h3>
                                <p class="text-warning">
                                    <strong><?php echo $row_detalhes ['rotulo_tipo']?></strong>
                                </p>
                                <p class="text-left">
                                    <?php echo mb_strimwidth($row_detalhes ['resumo_produto'],0,42,'...');?>
                                </p>
                                <p>
                                    <button class="btn btn-default disable" role="button" style="cursor: default">
                                        <?php echo "R$ ".number_format($row_detalhes['valor_produto'],2,",",".");?>
                                    </button>
                                    <a href="produto_detalhes.php?id_produto=<?php echo $row_detalhes['id_produto']?>">
                                        <span class="hidden-xs">Saiba Mais...</span>
                                        <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                
            </div>

    </div>  
</body>
</html>