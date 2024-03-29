<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if ($_POST){
    $id_usuario = $_POST['id_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = md5($_POST['senha_usuario']);
    $nivel_usuario = $_POST['nivel_usuario'];

    $insereUsuarios = "INSERT INTO tbusuarios
                (id_usuario, login_usuario, senha_usuario, nivel_usuario)
                VALUES
                ('$id_usuario','$login_usuario','$senha_usuario', '$nivel_usuario');";
    $resultado = $conn->query($insereUsuarios);
}
    if(mysqli_insert_id($conn)){
        header('location: usuarios_lista.php');
    }
    $consulta_fk = "select * from tbusuarios";
    $lista_fk = $conn->query($consulta_fk);
    $row_fk = $lista_fk->fetch_assoc();
    $nlinhas = $lista_fk->num_rows;
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
    <?php include "menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8">
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
                        name="form_usuarios_insere" enctype="multipart/form-data"
                        id="form_usuarios_insere">
                            <label for="login_usuario">Login:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="login_usuario" class="form-control" placeholder="Digite o login do usuário" required>
                            </div>

                            <label for="senha_usuario">Senha:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </span>
                                <input type="password" name="senha_usuario" class="form-control" placeholder="Digite a senha do usuário" required>
                            </div>
                            

                            <label for="nivel_usuario">Nível do Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="nivel_usuario" id="nivel_usuario" class="form-control" required>
                                    <option value="sup">Superior</option>
                                    <option value="com">Comum</option>
                                </select>
                            </div>

                            <br>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>