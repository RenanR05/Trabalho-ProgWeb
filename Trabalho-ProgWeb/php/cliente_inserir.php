<? include("verificadorDoTipoFuncionario.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadinho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h2> Cadastrar </h2>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for=""> Nome </label>
                <input type="text" name="nomeCliente" class="form-control" placeholder="Nome do Cliente" required>
            </div>
            <div class="form-group">
                <label for=""> CPF </label>
                <input type="text" name="cpfCliente" class="form-control" placeholder="CPF" required>
            </div>


            <button type="submit" name="insert" class="btn btn-primary"> SALVAR</button>

            <a href="clientes.php" class="btn btn-danger"> Cancelar </a>
        </form>
    </div>
</div>
</body>
</html>

<?php
include("conexao.php");



if (isset($_POST['insert'])) {
    $nomeCliente = $_POST['nomeCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $query = "INSERT INTO `cliente`(`nomeCliente`, `cpfCliente`) 
        VALUES ('$nomeCliente','$cpfCliente')";
    $query_run = mysqli_query($conexao, $query);
    if ($query_run) {
        
        echo '<script> alert("Data Saved"); window.location.href = "clientes.php";</script>';
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
