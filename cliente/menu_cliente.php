<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Área Cliente</title>
    <meta charset="UTF-8">
</head>
<body>
    <nav class="nav navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar" aria-expanded="false">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <img src="../imagens/logotipochurrascaria.png" alt="">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="defaultNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button type="button" class="btn btn-danger navbar-btn disabled">
                        Olá, <?php echo($_SESSION['login_usuario']);?>
                    </button>
                </li>
                <li class="active"><a href="index.php">CLIENTE</a></li>
                <li><a href="produtos_lista.php">RESERVAS</a></li>
                <li><a href="tipos_lista.php">PERFIL</a></li>
                <li class="active">
                    <a href="../index.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
</body>
</html>