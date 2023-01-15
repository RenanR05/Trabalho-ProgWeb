<? include("verificadorDoTipoFuncionario.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h2> Adicionar </h2>
        <hr>
        <form action="" method="post">

            <div class="form-group">
                <label for=""> Nome </label>
                <input type="text" name="nomeFuncionario" class="form-control" placeholder="SEU NOME" required>
            </div>
            <div class="form-group">
                <label for=""> Senha </label>
                <input type="text" name="senhaFuncionario" class="form-control" placeholder="SUA SENHA" required>
            </div>
            <div class="form-group">
                <label for=""> Tipo </label>
                <input type="text" name="tipoFuncionario" class="form-control" placeholder="1 adm 2 caixa" required>
            </div>

            <button type="submit" name="insert" class="btn btn-primary"> Salvar</button>

            <a href="funcionarios.php" class="btn btn-danger"> Cancelar </a>
        </form>
    </div>
</div>
</body>
</html>

<?php
include("conexao.php");


if (isset($_POST['insert'])) {
    $nomeFuncionario = $_POST['nomeFuncionario'];
    $senhaFuncionario = $_POST['senhaFuncionario'];
    $tipoFuncionario = $_POST['tipoFuncionario'];


    $query = "INSERT INTO `funcionario`(`nomeFuncionario`,`senhaFuncionario`,`tipoFuncionario`) 
    VALUES ('$nomeFuncionario','$senhaFuncionario','$tipoFuncionario')";
    $query_run = mysqli_query($conexao, $query);


    if ($query_run) {
        
        echo '<script> alert("Data Saved"); window.location.href = "funcionarios.php";</script>';
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>
