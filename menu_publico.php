<?php 
include "conn/connect.php";
$lista_tipos =  $conn->query("select * from tbtipos order by rotulo_tipo;");
$rows_tipos = $lista_tipos->fetch_all();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Menu Público</title>
</head>
<body>
    <!-- INÍCIO ABRE A BARRA DE NAVEGAÇÃO -->
        <nav class="fixed navbar-fixed-top navbar-light navbar-inverse bg-light">
            <div class="container-fluid">
                <!-- INÍCIO AGRUPAMENTO MOBILE -->
                    <div class="navbar-header">
                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-targed="#menupublico" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="index.php" class="navbar-brand">
                            <img src="images/logotipo32.png" alt="Logotipo da Churrascaria Henrique Rojo">
                        </a>
                    </div>
                <!-- FIM AGRUPAMENTO MOBILE -->
                <!-- INÍCIO NAV DIREITA -->
                    <div class="collapse navbar-collapse" id="menupublico">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <button type="button" class="btn btn-danger navbar-btn" data-toggle="modal" data-target="#modalReserva">
                                    FAÇA SUA RESERVA
                                </button>
                            </li>

                            <li class="active">
                                <a href="index.php">
                                    <span class="glyphicon glyphicon-home">
                                    </span>
                                </a>
                            </li>
                            <li><a href="index.php#destaques">DESTAQUES</a></li>
                            <li><a href="index.php#produtos">PRODUTOS</a></li>
                            <!-- INÍCIO DROP DOWM -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    TIPOS
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($rows_tipos as $row){?>
                                        <li><a href="produtos_por_tipo.php?id_tipo=<?php echo $row[0]?>"><?php echo $row[2]?></a></li>
                                    <?php };?>
                                </ul>
                            </li>
                            <!-- FIM DROP DOWN -->
                            <li><a href="index.php#contato">CONTATO</a></li>
                            <!-- INÍCIO FORMULÁRIO DE BUSCA -->
                            <form action="produtos_busca.php" method="get" name="form-busca" 
                            id="form-busca" class="navbar-form navbar-left" role="search">
                                <div class="input-group">
                                    <input type="search" name="buscar" id="search" size="10" class="form-control"
                                    aria-label="search" placeholder="Buscar produto" required>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- FIM FORMULÁRIO DE BUSCA -->
                            <li class="active">
                                <a href="admin/index.php">
                                    <span class="glyphicon glyphicon-user">&nbsp;ADMIN/CLIENTE</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                <!-- FIM NAV DIREITA -->
            </div>
        </nav>
    <!-- FIM ABRE A BARRA DE NAVEGAÇÃO -->

                                <!-- INÍCIO DO MODAL PARA FAZER RESERVA -->
                                <div class="modal fade" id="modalReserva" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Regras da Reserva</h4>
                                            <button class="close" data-dismiss="modal" type="button" aria-label="Fechar">
                                                &times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                            - Só uma pessoa é responsável por ser o titular da reserva;
                                            <br>
                                            - O titular da reserva e todos os demais acompanhantes terão 10% de desconto em bebidas;
                                            <br>
                                            - O número máximo de pessoas por mesa é de 8 pessoas;
                                            <br>
                                            - O número máximo de mesas por reserva são 2;,
                                            <br>
                                            - Somente um pedido de reserva por dia por CPF;
                                            <br>
                                            </p>
                                            <h4><span class="nome text-danger"></span></h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="index.php">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancelar
                                            </button>
                                            </a>
                                            
                                            <a href="pedido.php">
                                            <button class="btn btn-primary" type="button">
                                                Confirmar
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM DO MODAL PARA FAZER RESERVA -->
</body>
</html>