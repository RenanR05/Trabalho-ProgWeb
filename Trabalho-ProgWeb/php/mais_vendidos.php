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
    
?>
</div>
<br>
<div class="container">
    <div class="jumbotron">
        <h2>Relatorio por Data</h2>
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
                                       class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                       <br>
                                       <button type="submit" name="pesquisar" class="btn btn-primary" defer>CONSULTAR</button>
                                  <a href="index.php" class="btn btn-danger"> CANCELAR </a>
                            </div>
                        </th>
                       
                </tr>
                </form>
               
            
                </tbody> 
                
    </div></div>
</div>

<?php
    include("conexao.php");

    if (isset($_POST['pesquisar'])) {
        $dataInicial = $_POST['dataInicial'];
        
        $query = "SELECT DATE_FORMAT(dataVenda, '%d/%m/%Y')as dataV, count(dataVenda) as dataVenda 
        FROM mercadinho.venda
        where dataVenda = '$dataInicial'";
        $query_run = mysqli_query($conexao, $query);
    }
                ?>
<div class="container">
    <div class="jumbotron">
                <table class="table table-bordered" style="background-color: white;">
                    <thead class="table-dark">
                    <tr>
                        <th>Data</th>
                        <th>Total de Vendas</th>
                    </tr>
                    </thead>
                    <?php

                    if ($query_run) {
                        while ($row = mysqli_fetch_array($query_run)) {
                            ?>
                            <tbody>
                            <tr>
                                <th> <?php echo $row['dataV']; ?></th>
                           
                                <th> <?php echo $row['dataVenda']; ?></th>
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