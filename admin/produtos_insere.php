<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if ($_POST){
    if(isset($_POST['enviar'])){
        $nome_img = $_FILES['imagem_produto']['name'];
        $tmp_img = $_FILES['imagem_produto']['tmp_name'];
        $dir_img = "../images/".$nome_img;
        move_uploaded_file($tmp_img, $dir_img);
    }
    $id_tipo = $_POST['id_tipo_produto'];
    $destaque = $_POST['destaque_produto'];
    $descri = $_POST['descri_produto'];
    $resumo = $_POST['resumo_produto'];
    $valor = $_POST['valor_produto'];
    $imagem = $_POST['imagem_produto']['name'];

    $insereProd = "INSERT INTO tbprodutos
                   (id_tipo_produto, destaque_produto, descri_produto, resumo_produto, valor_produto, imagem_produto)
                   VALUES
                   ('$id_tipo','$destaque','$descri','$resumo','$valor','$imagem'); 
                    ";
    $resultado = $conn->query($insereProd);
    // após a gravação bem sucedida do produto, volta (atualiza) lista
    if(mysqli_insert_id($conn)){
        header('location: produtos_lista.php');
    }

    //selecionar os dados de chave estrangeira (lista de tipos de produtos)
    $consulta_fk = "select * from tbtipos order by rotulo_tipo asc";
    $lista_fk = $conn->query($consulta_fk);
    $row_fk = $lista_fk->fetch_assoc();
    $nlinhas = $lista_fk->num_rows;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Produto - Insere</title>
</head>
<body >
<?php include "menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                <h2 class="breadcrumb text-danger">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon-glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Produtos
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="produtos_insere.php" method="post" 
                        name="form_produto_insere" enctype="multipart/form-data"
                        id="form_produto_insere">
                            <label for="id_tipo_produto">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                    <?php do {?>
                                        <option value="<?php echo $row_fk['id_tipo']?>">
                                            <?php echo $row_fk['rotulo_tipo']?>
                                        </option>
                                    <?php } while ($row_fk = $lista_fk -> fetch_assoc());?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>