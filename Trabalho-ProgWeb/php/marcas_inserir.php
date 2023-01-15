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
        <h2> Marcas </h2>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="idProduto" value='<?php echo $row["idProduto"] ?>'>
            <form action="" method="post">
                <div class="form-group">
                    <label for=""> Marca </label>
                    <input type="text" name="nomeMarca" class="form-control" placeholder="Marca" required>
                </div>

                <button type="submit" name="insert" class="btn btn-primary"> SALVAR</button>
                <a href="marcas.php" class="btn btn-danger"> Cancelar </a>
            </form>
    </div>
</div>
</body>
</html>
<?php
include("conexao.php");

if (isset($_POST['insert'])) {
    $nomeMarca = $_POST['nomeMarca'];


    $query = "INSERT INTO marca   
(nomeMarca) VALUES ('$nomeMarca')";
    $query_run = mysqli_query($conexao, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); window.location.href = "marcas.php";</script>';

    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>
