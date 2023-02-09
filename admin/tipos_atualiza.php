<?php 
include 'acesso_com.php';
include '../conn/connect.php';
if($_POST){
    $id_tipo = $_POST['id_tipo'];
    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];

    $id = $_POST['id_tipo'];

    $updateSql = "update tbtipos
                    set sigla_tipo = '$sigla_tipo',
                        rotulo_tipo = '$rotulo_tipo'"
}
?>