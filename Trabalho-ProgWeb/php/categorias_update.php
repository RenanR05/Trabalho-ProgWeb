<? include("verificadorDoTipoFuncionario.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<?php
include("conexao.php");


$idCategoria = $_POST['idCategoria'];

$query = "SELECT * FROM categoria WHERE idCategoria = '$idCategoria'";
$query_run = mysqli_query($conexao, $query);
if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {
        ?>
        <div class="container">
            <div class="jumbotron">
                <h2> Editar </h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="idCategoria" value='<?php echo $row["idCategoria"] ?>'>

                    <div class="form-group">
                        <label for=""> Nome </label>
                        <input type="text" name="nomeCategoria" class="form-control"
                               value="<?php echo $row['nomeCategoria'] ?>" placeholder="CATEGORIA" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary"> Editar</button>

                    <a href="categorias.php" class="btn btn-danger"> Cancelar </a>
                </form>


            </div>
        </div>
        <?php

        if (isset($_POST['update'])) {
            $nomeCategoria = $_POST['nomeCategoria'];
            $query = "UPDATE categoria SET   
    nomeCategoria = '$nomeCategoria'    
    WHERE(idCategoria = '$idCategoria') ";


            $query_run = mysqli_query($conexao, $query);

            if ($query_run) {
                
                echo '<script> alert("Data Saved"); window.location.href = "categorias.php";</script>';

            } else {
                echo '<script> alert("Data Not Saved"); </script>';
            }

        }
    }
}

?>

</body>
</html>