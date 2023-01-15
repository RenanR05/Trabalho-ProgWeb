<?php

$usuario = $_POST['c_usuario'];
$senha = $_POST['c_senha'];

include("conexao.php");

mysqli_select_db($conexao, "mercadinho");

$query = "SELECT tipoFuncionario FROM funcionario where nomeFuncionario ='$usuario'";
$query_run = mysqli_query($conexao, $query);
$row = mysqli_fetch_array($query_run);

$sql = mysqli_query($conexao, "SELECT * FROM funcionario where nomeFuncionario ='$usuario' and senhaFuncionario='$senha'")
or die(mysqli_error());
$cont = mysqli_num_rows($sql);
if($row['tipoFuncionario'] == 1){
        if ($cont > 0) {
                session_start();
                $_SESSION['usuario_usuario'] = $usuario;
                $_SESSION['senha_usuario'] = $senha;
                include("verificadorDoTipoUsuario.php");
                header("Location:funcionarios.php");
            } else {
                header("Location:index.html");
            }
            
            mysqli_close($conexao);   
}else if($row['tipoFuncionario'] == 2){
        if ($cont > 0) {
                session_start();
                $_SESSION['usuario_usuario'] = $usuario;
                $_SESSION['senha_usuario'] = $senha;
                include("verificadorDoTipoUsuario.php");
                header("Location:pedidos.php");
            } else {
                header("Location:index.html");
            }
            
            mysqli_close($conexao);   
}else{
    echo '<script> alert("Usuario Incorreto"); window.location.href = "index.html";</script>';
}

?>

