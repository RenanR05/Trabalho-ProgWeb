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


$query = "SELECT idClientes, nomeCliente
    from cliente";

$query_run = mysqli_query($conexao, $query);

?>


</div>
<br>
<div class="container">
    <div class="jumbotron">
        <h2> Vendas por Cliente </h2>
        <hr>
        
            <form action="" method="post">
                
                <div class="form-group">
                    <label for=""> Selecione o Cliente </label>
                    <select name="Cliente">
                        <?php
                        while ($cliente = mysqli_fetch_array(
                            $query_run, MYSQLI_ASSOC)):
                            ?>
                            <option value="<?php echo $cliente["idClientes"];
                            ?>">
                                <?php echo $cliente["nomeCliente"];
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
</body>
</html>
<?php
    include("conexao.php");
    if (isset($_POST["insert"])) {
        $idClientes = $_POST['Cliente'];
        
        
        $query = "SELECT nomeCliente as Nome, count(venda.idClientes) as Vendas
        FROM venda
        INNER JOIN cliente ON venda.idClientes = cliente.idClientes
        WHERE venda.idClientes = $idClientes";
        $query_run = mysqli_query($conexao, $query);
    } 
                ?>
<div class="container">
    <div class="jumbotron">
                <table class="table table-bordered" style="background-color: white;">
                    <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
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