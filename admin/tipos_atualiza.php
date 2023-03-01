<?php 
include 'acesso_com.php';
include '../conn/connect.php';
if($_POST){
    $id_tipo = $_POST['id_tipo'];
    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];

    $id = $_POST['id_tipo'];

    $updateSql = "update tbtipos set 
                    id_tipo = '$id_tipo',
                    sigla_tipo = '$sigla_tipo',
                    rotulo_tipo = '$rotulo_tipo'
                    where
                    id_tipo = $id;";
    $resultado = $conn->query($updateSql);
    if($resultado){
        header('location: tipos_lista.php');
    } 
}
if ($_GET){
    $id_form = $_GET['id_tipo'];
}else{
    $id_form = 0;
}
$lista = $conn->query("select * from tbtipos where id_tipo = $id_form");
$row = $lista->fetch_assoc();
$numRows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Tipos - Insere</title>
</head>
<body>
    <?php include 'menu_adm.php'?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                <h2 class="breadcrumb text-danger">
                        <a href="tipos_lista.php">
                            <button class="btn btn-danger">
                                <span class="glyphicon-glyphicon-chevron-left"></span>
                            </button>
                        </a>
                        Inserindo Tipos
                    </h2>
                    <div class="thumbnail">
                        <div class="alert alert-danger" role="alert">
                            <form action="tipos_atualiza.php" method="post" name="form_tipos_insere" enctype="multipart/form-data" id="form_tipos_insere">
                            <input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $row['id_tipo'];?>">
                            <label for="sigla_tipo">Sigla: </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="sigla_tipo" id="sigla_tipo" 
                                class="form-control" placeholder="Digite a sigla do tipo" maxlength="100" value="<?php echo $row['sigla_tipo'];?>">
                            </div>
                            <label for="rotulo_tipo">Rótulo: </label>
                            <div>
                                
                            </div>
                            </form> 
                        </div>
                    </div>
            </div>
        </div>
    </main>   
</body>
</html>