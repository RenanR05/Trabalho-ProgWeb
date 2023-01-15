<? include("verificadorDoTipoFuncionario.php"); ?>
<?php
include("conexao.php");



if (isset($_POST['delete'])) {
    $idCategoria = $_POST['idCategoria'];

    $query = "DELETE FROM categoria WHERE (idCategoria = '$idCategoria')";
    $query_run = mysqli_query($conexao, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted")</script>';
        echo '<script> alert("Data Saved"); window.location.href = "categorias.php";</script>';
    } else {
        echo '<script> alert("Consulta falhou, parar aqui")</script>';
    }

}
?>