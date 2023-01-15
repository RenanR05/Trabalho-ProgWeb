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

$idMarca = $_POST['idMarca'];

$query = "SELECT * FROM marca
     WHERE idMarca ='$idMarca'";
$query_run = mysqli_query($conexao, $query);
if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {
        ?>
        <div class="container">
            <div class="jumbotron">
                <h2> Editar </h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name='idMarca' value='<?php echo $row['idMarca'] ?>'>

                    <div class="form-group">
                        <label for=""> Marca </label>
                        <input type="text" name="nomeMarca" class="form-control"
                               value="<?php echo $row['nomeMarca'] ?>" placeholder="Marca" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary"> OK</button>
                    <a href="marcas.php" class="btn btn-danger"> Cancelar </a>
                </form>
            </div>
        </div>
        <?php

        if (isset($_POST['update'])) {
            $nomeMarca = $_POST['nomeMarca'];
            $query = "UPDATE marca SET  
    nomeMarca = '$nomeMarca' 
    WHERE (idMarca = $idMarca) ";


            $query_run = mysqli_query($conexao, $query);

            if ($query_run) {
                
                echo '<script> alert("Data Saved"); window.location.href = "marcas.php";</script>';

            } else {
                echo '<script> alert("Data Not Saved"); </script>';

            }

        }
    }
}

?>

</body>
</html>