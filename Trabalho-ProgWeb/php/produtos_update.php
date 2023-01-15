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


$idProduto = $_POST['idProduto'];

$query = "SELECT *
    FROM produto
    INNER JOIN marca ON produto.idMarca = marca.idMarca
    INNER JOIN categoria ON produto.idCategoria = categoria.idCategoria
    WHERE idProduto ='$idProduto'";

$query2 = "SELECT idMarca, nomeMarca
    from marca ";

$query3 = "SELECT idCategoria, nomeCategoria
    from categoria";

$query_run = mysqli_query($conexao, $query);
$query2_run = mysqli_query($conexao, $query2);
$query3_run = mysqli_query($conexao, $query3);

if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {
        ?>
        <div class="container">
            <div class="jumbotron">
                <h2> Editar </h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="idProduto" value='<?php echo $row["idProduto"] ?>'>

                    <div class="form-group">
                        <label for=""> Nome </label>
                        <input type="text" name="nomeProduto" class="form-control"
                               value="<?php echo $row['nomeProduto'] ?>" placeholder="Produto" required>
                    </div>

                    <div class="form-group">
                        <label for=""> Valor </label>
                        <input type="text" name="valorProduto" class="form-control"
                               value="<?php echo $row['valorProduto'] ?>" placeholder="Preço" required>
                    </div>

                    <div class="form-group">
                        <label for=""> Marca </label>
                        <select name="idMarca">
                            <?php
                            // use a while loop to fetch data
                            // from the $all_categories variable
                            // and individually display as an option
                            while ($marca = mysqli_fetch_array(
                                $query2_run, MYSQLI_ASSOC)):
                                ?>
                                <option value="<?php echo $marca["idMarca"];
                                // The value we usually set is the primary key
                                ?>">
                                    <?php echo $marca["nomeMarca"];
                                    // To show the category name to the user
                                    ?>
                                </option>
                            <?php
                            endwhile;
                            // While loop must be terminated
                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for=""> Categoria </label>
                        <select name="idCategoria">
                            <?php
                            // use a while loop to fetch data
                            // from the $all_categories variable
                            // and individually display as an option
                            while ($categoria = mysqli_fetch_array(
                                $query3_run, MYSQLI_ASSOC)):
                                ?>
                                <option value="<?php echo $categoria["idCategoria"];
                                // The value we usually set is the primary key
                                ?>">
                                    <?php echo $categoria["nomeCategoria"];
                                    // To show the category name to the user
                                    ?>
                                </option>
                            <?php
                            endwhile;
                            // While loop must be terminated
                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for=""> Quantidade </label>
                        <input type="text" name="quantidadeProduto" class="form-control"
                               value="<?php echo $row['quantidadeProduto'] ?>" placeholder="Quantidade" required>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary"> Editar</button>

                    <a href="produtos.php" class="btn btn-danger"> Cancelar </a>
                </form>


            </div>
        </div>
        <?php

        if (isset($_POST['update'])) {
            $nomeProduto = $_POST['nomeProduto'];
            $valorProduto = $_POST['valorProduto'];
            $marca = $_POST['idMarca'];
            $categoria = $_POST['idCategoria'];
            $quantidadeProduto = $_POST['quantidadeProduto'];


            $query = "UPDATE produto SET  
    nomeProduto = '$nomeProduto', 
    valorProduto = '$valorProduto', 
    idMarca = '$marca', 
    idCategoria = '$categoria', 
    quantidadeProduto = '$quantidadeProduto'
    WHERE(idProduto = '$idProduto') ";


            $query_run = mysqli_query($conexao, $query);

            if ($query_run) {
                
                echo '<script> alert("Data Saved"); window.location.href = "produtos.php";</script>';

            } else {
                echo '<script> alert("Data Not Saved"); </script>';
            }

        }
    }
}

?>

</body>
</html>