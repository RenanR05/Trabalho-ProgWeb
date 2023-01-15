<? include("verificadorDoTipoFuncionario.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div>
    <?php
    include("menu.php");

    ?>
</div>
<br>
<div class="container">
    <div class="jumbotron">
        <h2>Relatorio</h2>
        <hr>
        <div class="container">

            <table class="table table-bordered" style="background-color: white;">
                <thead class="table-dark">
                <tbody>
                <tr>
                    <form action="" method="post">
                        <th>
                            <div class="form-group">
                                <label for=""> Data Inicial </label>
                                <input type="date" name="dataInicial"
                                       class="form-control" placeholder="Digite a data inicial" required>
                            </div>
                        </th>
                        <th>
                            <div class="form-group">
                                <label for=""> Data Final </label>
                                <input type="date" name="dataFinal"
                                       class="form-control" placeholder="Digite a data Final" required>
                            </div>
                            <button type="submit" name="pesquisar" class="btn btn-primary"> Pesquisar</button>
                        </th>
                </tr>
                </form>
                </tbody>
                <br>
                <?php
                include("conexao.php");

                if (isset($_POST["pesquisar"])) {
                    $dataInicial = $_POST['dataInicial'];
                    $dataFinal = $_POST['dataFinal'];


                    $query = "SELECT idVenda, dataVenda, nomeFuncionario, nomeCliente FROM venda 
        INNER JOIN funcionario ON venda.idFuncionario = funcionario.idFuncionario
        INNER JOIN cliente ON venda.idClientes = cliente.idClientes
        WHERE dataVenda BETWEEN ('$dataInicial') and ('$dataFinal')
        ORDER BY datavenda";
                    $query_run = mysqli_query($conexao, $query);
                } else {
                    $query = "SELECT idVenda, dataVenda, nomeFuncionario, nomeCliente FROM venda 
        INNER JOIN funcionario ON venda.idFuncionario = funcionario.idFuncionario
        INNER JOIN cliente ON venda.idClientes = cliente.idClientes
        ORDER BY datavenda";
                    $query_run = mysqli_query($conexao, $query);
                }
                ?>

                <table class="table table-bordered" style="background-color: white;">
                    <thead class="table-dark">
                    <tr>
                        <th>Id da Venda</th>
                        <th>Data</th>
                        <th>Funcionario</th>
                        <th>Cliente</th>

                    </tr>
                    </thead>
                    <?php

                    if ($query_run) {
                        while ($row = mysqli_fetch_array($query_run)) {
                            ?>
                            <tbody>
                            <tr>
                                <th> <?php echo $row['idVenda']; ?></th>
                                <th> <?php echo $row['dataVenda']; ?></th>
                                <th> <?php echo $row['nomeFuncionario']; ?></th>
                                <th> <?php echo $row['nomeCliente']; ?></th>


                            </tr>
                            </tbody>
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