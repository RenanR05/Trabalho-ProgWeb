<? include("verificadorDoTipoFuncionario.php"); ?>
<?php
include("conexao.php");


if (isset($_POST['delete'])) {
    $idClientes = $_POST['idClientes'];

    $query = "DELETE FROM cliente WHERE idClientes = '$idClientes'";
    $query_run = mysqli_query($conexao, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted")</script>';
        echo '<script> alert("Data Saved"); window.location.href = "clientes.php";</script>';
    } else {
        echo '<script> alert("Data Deleted")</script>';

    }

}
?>