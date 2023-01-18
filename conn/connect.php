<?php 

$host = "localhost"; //definindo o host que estara o banco, nesse caso o banco esta local
$database = "ti93phpdb01"; // definindo qual banco de dados vamos usar
$user = "root"; // 
$pass = ""; //
$charset = "utf8"; //padrão de acentuação brasileiro 
$port = "3306"; //porta na qual é usada por padrão pelo sql

// $conn = new mysqli($host,$user,$pass,$database, $port); //fazendo a conexão com o banco
// mysqli_set_charset($conn,$charset); //definindo o charset do banco

try {
    $conn = new mysqli($host,$user,$pass,$database, $port); //fazendo a conexão com o banco
    mysqli_set_charset($conn,$charset); //definindo o charset do banco
}
catch(\Throwable $th) {
    echo "atenção ERRO: ".$th;
}

if ($conn->connect_error){
    echo "ATENÇÃO ERRO; ".$conn->connect_error;
}
?>
