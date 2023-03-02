<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if ($_POST){

    $id_usuario = $_POST['id_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $nivel_usuario = $_POST['resumo_produto'];

    $insereUser = "INSERT INTO tbusuarios
                   (id_usuario, login_usuario, senha_usuario, nivel_usuario)
                   VALUES
                   ('$id_usuario','$login_usuario','$senha_usuario','$senha_usuario','$nivel_usuario');";
    $resultado = $conn->query($insereUser);
    
}
// após a gravação bem sucedida do produto, volta (atualiza) lista
    if(mysqli_insert_id($conn)){
        header('location: usuarios_lista.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Usuários - Insere</title>
</head>
<body >
<?php include "menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                <h2 class="breadcrumb text-danger">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Usuários
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="usuarios_insere.php" method="post" 
                        name="form_usuario_insere" enctype="multipart/form-data"
                        id="form_usuario_insere">
                            <label for="login_usuario">Login:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="login_usuario" id="login_usuario" 
                                class="form-control" placeholder="Digite o Login do usuario"
                                maxlength="100" required>
                            </div>
                            <label for="nivel_usuario">Nível:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="nivel_usuario" id="nivel_usuario" 
                                class="form-control" placeholder="Digite o Nível do usuario"
                                maxlength="100" required>
                            </div>
                            <br>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</script>
</body>
</html>