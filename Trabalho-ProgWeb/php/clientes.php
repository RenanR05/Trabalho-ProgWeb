<? include("verificadorDoTipoFuncionario.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div>
    <?php include("menu.php"); ?>
</div>
<br>
<div class="container">
    <div class="jumbotron">
        <h2>Clientes</h2>
        <hr>
        <div class="row">
            <a href="cliente_inserir.php" class="btn btn-success" style="margin-left:80%;"> Cadastrar Clientes </a>
        </div>

        <br>

        <?php

        include("conexao.php");


        $query = "SELECT * FROM cliente ORDER BY nomeCliente";
        $query_run = mysqli_query($conexao, $query);
        ?>

        <table class="table table-bordered" style="background-color: white;">
            <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Editar</th>
                <th>EXCLUIR</th>
            </tr>

            </thead>

            <?php

            if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
                    ?>
                    <tbody>
                    <tr>
                        <th> <?php echo $row['nomeCliente']; ?></th>
                        <th> <?php echo $row['cpfCliente']; ?></th>
                        <form action="cliente_update.php" method="post">
                            <input type="hidden" name="idClientes" value="<?php echo $row['idClientes'] ?>">
                            <th><input type="submit" name="edit" class="btn btn-success" value="EDITAR"></th>
                        </form>
                        <form action="cliente_deletar.php" method="post">
                            <input type="hidden" name="idClientes" value="<?php echo $row['idClientes'] ?>">
                            <th><input type="submit" name="delete" class="btn btn-danger" value="EXCLUIR"></th>
                        </form>
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