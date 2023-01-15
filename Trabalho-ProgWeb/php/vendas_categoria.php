<? include("verificadorDoTipoFuncionario.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div>
    <?php
    include("menu.php");
    include('conexao.php');


$query = "SELECT idCategoria, nomeCategoria
    from categoria";

$query_run = mysqli_query($conexao, $query);

?>


</div>
<br>
<div class="container">
    <div class="jumbotron">
        <h2> Vendas por Categoria </h2>
        <hr>
        
            <form action="" method="post">
                
                <div class="form-group">
                    <label for=""> Selecione a categoria </label>
                    <select name="Categoria">
                        <?php
                        while ($categoria = mysqli_fetch_array(
                            $query_run, MYSQLI_ASSOC)):
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
                <button type="submit" name="insert" class="btn btn-primary">CONSULTAR</button>
                <a href="index.php" class="btn btn-danger"> CANCELAR </a>
            </form>
    </div>
</div>

<?php
    include("conexao.php");
    if (isset($_POST["insert"])) {
        $idCategoria = $_POST['Categoria'];
        
        
        $query = "SELECT nomeCategoria as Nome, count(venda.idVenda) as Vendas
        FROM venda
        INNER JOIN itens_pedido ON itens_pedido.idVenda = venda.idVenda
        INNER JOIN produto ON produto.idProduto = itens_pedido.idProduto
        INNER JOIN categoria ON produto.IdCategoria = categoria.idCategoria
        WHERE categoria.idCategoria = $idCategoria";
        $query_run = mysqli_query($conexao, $query);
    } 
                ?>
<div class="container">
    <div class="jumbotron">
                <table class="table table-bordered" style="background-color: white;">
                    <thead class="table-dark">
                    <tr>
                        <th>Categoria</th>
                        <th>Total de Vendas</th>
                    </tr>
                    </thead>
                    <?php

                    if ($query_run) {
                        while ($row = mysqli_fetch_array($query_run)) {
                            ?>
                            <tbody>
                            <tr>
                                <th> <?php echo $row['Nome']; ?></th>
                           
                                <th> <?php echo $row['Vendas']; ?></th>
                            </tr>
                            </tbody>
                        </div></div>
                            <?php
                        }
                    } else {
                        echo "Nada foi encontrado";
                    }

                    ?>
                </table>
        </div>
    </div>
    <?php include("dep_query.php"); ?>
</body>
</html>