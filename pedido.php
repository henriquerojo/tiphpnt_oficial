<?php 
include 'conn/connect.php';
if ($_POST)
{
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $cpf_cliente = $_POST['cpf_cliente'];
    $data_reserva = $_POST['data_reserva'];
    $numero_pessoas = $_POST['numero_pessoas'];
}

// header("location: index.php")
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Reserva</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="fundofixo">
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h1 class="breadcrumb text-danger text-center">Pedido de Reserva</h1>
                        <div class="thumbnail">
                            <div class="alert alert-danger" role="alert">
                                <form action="pedido.php" name="pedido_reserva" id="pedido_reserva" method="POST" enctype="multipart/form-data">
                                    <label for="nome_cliente">Nome Completo:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-danger" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="nome_cliente" id="nome_cliente" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu nome">
                                    </p>
                                    <label for="email_cliente">E-mail:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope text-danger" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="email_cliente" id="email_cliente" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu e-mail">
                                    </p>
                                    <label for="cpf_cliente">CPF:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-book text-danger" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="cpf_cliente" id="cpf_cliente" class="form-control" autofocus required autocomplete="off" maxlength="14" placeholder="Digite seu CPF" onkeyup="mascara(this)">
                                    </p>
                                    <label for="data_reserva">Data da Reserva</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-book text-danger" aria-hidden="true"></span>
                                        </span>
                                        <input type="datetime-local" name="data_reserva" id="data_reserva" class="form-control" autofocus required autocomplete="off" placeholder="Informe a data da sua reserva">
                                    </p>
                                    <label for="numero_pessoas">Número Pessoas</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-book text-danger" aria-hidden="true"></span>
                                        </span>
                                        <input type="number" name="numero_pessoas" id="numero_pessoas" class="form-control" autofocus required autocomplete="off" min="0" max="4" placeholder="Informe a data da sua reserva">
                                    </p>
                                    <p class="text-right">
                                        <input type="submit" value="Fazer pedido de reserva" class="btn btn-success btn-block">
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