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
                            <label for="destaque_produto">Destaque:</label>
                            <div class="input-group">
                                <label for="destaque_produto_s" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Sim">Sim
                                </label>
                                <label for="destaque_produto_n" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" checked>Não
                                </label>
                            </div>
                            <label for="descri_produto">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="descri_produto" id="descri_produto" 
                                class="form-control" placeholder="Digite a descrição do Produto"
                                maxlength="100" required>
                            </div>

                            <label for="resumo_produto">Resumo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-out" aria-hidden="true"></span>
                                </span>
                                <textarea name="resumo_produto" id="resumo_produto"
                                cols="30" rows="8"
                                class="form-control" placeholder="Digite os detalhes do Produto"
                                required></textarea>
                            </div>

                            <label for="valor_produto">Valor:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="valor_produto" id="valor_produto" 
                                class="form-control" required min="0" step="0.01">
                            </div>
                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-pictures" aria-hidden="true"></span>
                                </span>
                                <img src="" name="imagem" id="imagem" alt="" class="img-responsive">
                                <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="image/*">
                            </div>
                            <br>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!-- SCRIPT PARA IMAGEM -->
<script>
    document.getElementById("imagem_produto").onchange = function(){
        var reader = new FileReader();
        if(this.files[0].size>528385){
            alert("A imagem deve ter no no máximo 500 KB");
            $("#imagem").attr("src", "blank");
            $("#imagem").hide();
            $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
            $("#imagem_produto").unwrap;
            return false
        }
        if(this.files[0].type.indexOf("image") == -1){
            alert("Formato Inválido, Escolha Uma Imagem!");
            $("#imagem").attr("src", "blank");
            $("#imagem").hide();
            $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
            $("#imagem_produto").unwrap;
            return false
        }
        reader.onload = function(e){
            document.getElementById("imagem").src = e.target.result
            $("#imagem").show();
        }
        reader.readAsDataURL(this.files[0])
    }
</script>
</body>
</html>