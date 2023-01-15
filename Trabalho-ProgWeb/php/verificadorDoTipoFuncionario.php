<?php
include("conexao.php");
session_start();

$usuario = $_SESSION['usuario_usuario'] ?? '';
$senha = $_SESSION['senha_usuario'] ?? '';

$sql = mysqli_query($conexao, "SELECT * FROM funcionario where nomeFuncionario ='$usuario' and senhaFuncionario='$senha'");

$row = mysqli_fetch_array($sql);

if(mysqli_num_rows($sql) == 0 || $row['tipoFuncionario'] != 1){
    echo '<script> alert("Voce Não tem Permissão"); window.location.href = "mercadinho.php";</script>';
}
?>