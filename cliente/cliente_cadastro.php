<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Cliente</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="fundofixo">
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h1 class="breadcrumb text-info text-center">Faça seu cadastro</h1>
                        <div class="thumbnail">
                            <div class="alert alert-info" role="alert">
                                <form action="cadastro_envia.php" name="cadastro_cliente" id="cadastro_cliente" method="POST" enctype="multipart/form-data">
                                    <label for="nome_cliente">Nome:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu nome">
                                    </p>
                                    <label for="email_cliente">E-mail:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="email_cliente" id="email_cliente" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu e-mail">
                                    </p>
                                    <label for="cpf_cliente">CPF:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="cpf_cliente" id="cpf_cliente" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu CPF">
                                    </p>
                                    <label for="senha_cliente">Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="senha_cliente" id="senha_cliente" class="form-control" autofocus required autocomplete="off" placeholder="Digite sua senha">
                                    </p>
                                    <label for="senha_cliente">Confirmar Senha:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" name="confirmasenha_cliente" id="confirmasenha_cliente" class="form-control" autofocus required autocomplete="off" placeholder="Digite sua senha novamente">
                                    </p>
                                    <p class="text-right">
                                        <input type="submit" value="Cadastrar" class="btn btn-success">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
</body>
</html>