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
<?php
include("conexao.php");

$query2 = "SELECT idMarca, nomeMarca
    from marca
    ORDER BY nomeMarca";

$query3 = "SELECT idCategoria, nomeCategoria
    from categoria
    ORDER BY nomeCategoria";

$query2_run = mysqli_query($conexao, $query2);
$query3_run = mysqli_query($conexao, $query3);

?>


<div class="container">
    <div class="jumbotron">
        <h2> Produtos </h2>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="idProduto" value='<?php echo $row["idProduto"] ?>'>
            <form action="" method="post">
                <div class="form-group">
                    <label for=""> Produto </label>
                    <input type="text" name="nomeProduto" class="form-control" placeholder="Nome do Produto" required>
                </div>
                <div class="form-group">
                    <label for=""> Preço </label>
                    <input type="text" name="valorProduto" class="form-control" placeholder="Valor do produto" required>
                </div>

                <div class="form-group">
                    <label for=""> Estoque </label>
                    <input type="text" name="quantidadeProduto" class="form-control" placeholder="Produtos em estoque"
                           required>
                </div>
                <div class="form-group">
                    <label for=""> Marca </label>
                    <select name="idMarca">
                        <?php
                        while ($marca = mysqli_fetch_array(
                            $query2_run, MYSQLI_ASSOC)):
                            ?>
                            <option value="<?php echo $marca["idMarca"];
                            ?>">
                                <?php echo $marca["nomeMarca"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""> Categoria </label>
                    <select name="idCategoria">
                        <?php
                        while ($categoria = mysqli_fetch_array(
                            $query3_run, MYSQLI_ASSOC)):
                            ?>
                            <option value="<?php echo $categoria["idCategoria"];
                            ?>">
                                <?php echo $categoria["nomeCategoria"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <button type="submit" name="insert" class="btn btn-primary"> SALVAR</button>
                <a href="produtos.php" class="btn btn-danger"> Cancelar </a>
            </form>
    </div>
</div>
</body>
</html>
<?php
include("conexao.php");
if (isset($_POST['insert'])) {
    $nomeProduto = $_POST['nomeProduto'];
    $valorProduto = $_POST['valorProduto'];
    $idMarca = $_POST['idMarca'];
    $idCategoria = $_POST['idCategoria'];
    $quantidadeProduto = $_POST['quantidadeProduto'];

    $query = "INSERT INTO produto   
(nomeProduto, 
valorProduto, 
idMarca, 
idCategoria, 
quantidadeProduto) VALUES ('$nomeProduto', '$valorProduto','$idMarca','$idCategoria','$quantidadeProduto')";
    $query_run = mysqli_query($conexao, $query);
    if ($query_run) {
        echo '<script> alert("Data Saved"); window.location.href = "produtos.php";</script>';

    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>
