<?php
$hostname = "localhost";
$user = "root";
$password = "12345";
$database = "mercadinho";
$conexao = mysqli_connect($hostname, $user, $password, $database);

if (!$conexao) {
    print "Falha na Conexão com o Banco de Dados";
}
?>


