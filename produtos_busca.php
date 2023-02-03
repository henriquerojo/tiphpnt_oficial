<?php 
include "conn/connect.php";
$busca = $_GET['buscar'];
$lista = $conn->query("select * from vw_tbprodutos where descri_produto like '%busca%';");
$row_produto = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Busca Por Palavra</title>
</head>
<body class="fundofixo">
<?php include "menu_publico.php";?>
    <div class="container">
    <!-- INÍCIO MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
    <?php if($num_linhas == 0){?>
                <h2 class="breadcrumb alert-danger">
                    Não há produtos Cadastrados
                </h2>
            <?php }?>
        <!-- FIM MOSTRAR SE A CONSULTA RETORNAR VAZIO -->
        <!-- INÍCIO SE A CONSULTA NÃO RETORNAR VAZIO -->
        <?php if($num_linhas > 0){?>
            <h2 class="breadcrumb alert-danger">
                    <strong>Produtos geral</strong>
                </h2>  
        <?php }?>
        <div class="row">
            <?php do{?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="produtos/detalhes.php?id_produto=<?php echo $row_produto['id_produto']?>">
                            <img src="images/<?php echo $row_produto['imagem_produto']?>" class="img-responsive img-rounded">
                        </a>
                        <div class="caption text-right">
                            <h3 class="text-danger">
                                <strong><?php echo $row_produto['descri_produto']?></strong>
                            </h3>
                            <p class="text-warning">
                                <strong><?php echo $row_produto['rotulo_tipo']?></strong>
                            </p>
                            <p class="text-left">
                                <?php echo mb_strimwidth($row_produto['resumo_produto'],0,42,'...');?>
                            </p>
                            <p>
                                <button class="btn btn-default disabled" role="button" style="cursor:default;"> 
                                    <?php echo "R$ ".number_format($row_produto['valor_produto'], 2, ',', '.');?>
                                </button>
                                <a href="produtos/detalhes.php?id_produto=<?php echo $row_produto['id_produto'];?>">
                                    <span class="hidden-xs">Saiba Mais...</span>
                                    <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php }while ($row_produto = $lista->fetch_assoc())?>
    </div>
</body>
</html>