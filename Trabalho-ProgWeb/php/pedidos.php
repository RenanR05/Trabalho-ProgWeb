<?php 
ob_start(); ?>
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
<div>
</div>
<?php
include("conexao.php");

$query_venda = "SELECT idVenda, venda.idFuncionario, venda.idClientes, dataVenda
from venda
INNER JOIN cliente ON cliente.idClientes = venda.idClientes
INNER JOIN funcionario ON funcionario.idFuncionario = venda.idFuncionario ";

$query_funcionario = "SELECT idFuncionario, nomeFuncionario
    from funcionario";

$query_cliente = "SELECT idClientes, nomeCliente
    from cliente";

$query_venda = mysqli_query($conexao, $query_venda);
$query_funcionario  = mysqli_query($conexao, $query_funcionario);
$query_cliente = mysqli_query($conexao, $query_cliente);

?>


<div class="container">
    <div class="jumbotron">
        <h2> Iniciar Venda</h2>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="idVenda" value='<?php echo $row["idVenda"] ?>'>
            <form action="" method="post">
                 <div class="form-group">
                    <label for=""> Data da venda</label>
                    <input type="date" name="dataCompra" 
                    id = "dataCompra" class="form-control" placeholder="Data da Compra"
                    value="<?php echo date('Y-m-d'); ?>" required>
                           
                        </script><br>
                
                <div class="form-group">
                    <label for=""> Cliente </label>
                    <select name="idClientes">
                        <?php
                        while ($cliente = mysqli_fetch_array(
                            $query_cliente, MYSQLI_ASSOC)):
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
                <button type="submit" name="insert" class="btn btn-primary"> INICIAR</button>
                <a href="mercadinho.php" class="btn btn-danger"> Cancelar </a>
            </form>
    </div>
</div>


<?php

include("conexao.php");
session_start();
if (isset($_POST['insert'])) {
    
    $id = "SELECT idFuncionario FROM funcionario WHERE nomeFuncionario = '{$_SESSION['usuario_usuario']}'";
    $id_run = mysqli_query($conexao, $id);
    $res = mysqli_fetch_assoc($id_run);
   // var_dump($res);
    
    $idFuncionario = $res["idFuncionario"];
    
    $idClientes = $_POST['idClientes'];
    $dataVenda = $_POST['dataCompra'];
    $query = "INSERT INTO venda   
(idFuncionario, idClientes, dataVenda) VALUES ('$idFuncionario','$idClientes','$dataVenda')";
    $query_run = mysqli_query($conexao, $query);  
       
    $id_Venda = mysqli_insert_id($conexao);
    $_SESSION["idVenda"] = $id_Venda; 

    if ($query_run) {  
    header('location:mercadinho.php');
    } else {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>
<?php include("dep_query.php"); ?>
</body>
</html><?php ob_end_flush(); ?>