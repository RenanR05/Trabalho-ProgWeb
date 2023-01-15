<? include("verificadorDoTipoFuncionario.php"); ?>
<?php
include("conexao.php");


if (isset($_POST['delete'])) {
    $idFuncionario = $_POST['idFuncionario'];

    $query = "DELETE FROM funcionario WHERE idFuncionario = '$idFuncionario'";
    $query_run = mysqli_query($conexao, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted")</script>';
        echo '<script> alert("Data Saved"); window.location.href = "funcionarios.php";</script>';
    } else {
        echo '<script> alert("Data Deleted")</script>';

    }

}
?>