<? include("verificadorDoTipoFuncionario.php"); ?>
<?php
include("conexao.php");


if (isset($_POST['delete'])) {
    $idMarca = $_POST['idMarca'];

    $query = "DELETE FROM marca WHERE (idMarca = '$idMarca')";
    $query_run = mysqli_query($conexao, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted")</script>';
        echo '<script> alert("Data Saved"); window.location.href = "marcas.php";</script>';
    } else {
        echo '<script> alert("Consulta falhou, parar aqui")</script>';
    }

}
?>