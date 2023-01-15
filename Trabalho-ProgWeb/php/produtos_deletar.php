<? include("verificadorDoTipoFuncionario.php"); ?>
<?php
include("conexao.php");


if (isset($_POST['delete'])) {
    $idProduto = $_POST['idProduto'];

    $query = "DELETE FROM produto WHERE (idProduto = '$idProduto')";
    $query_run = mysqli_query($conexao, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted")</script>';
        header("location:produtos.php");
    } else {
        echo '<script> alert("Consulta falhou, parar aqui")</script>';
    }

}
?>