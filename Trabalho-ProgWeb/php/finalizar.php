<?php
session_start();
foreach($_SESSION['dados'] as $produtos){
        $conexao = new PDO('mysql:host=localhost;dbname=mercadinho',"root","12345");
        $insert = $conexao->prepare
        ("INSERT INTO itens_pedido () VALUES (null,?,?,?,?)");
        $insert -> bindParam(1,$_SESSION["idVenda"]);
        $insert -> bindParam(2,$produtos['id_Produto']);
        $insert -> bindParam(3,$produtos['quantidade']);
        $insert -> bindParam(4,$produtos['total']);
        $insert -> execute();

}
$idVenda = $_SESSION['idVenda'];

$total = "SELECT sum(valor_Item) as total
FROM itens_pedido
WHERE idVenda = $idVenda";

$query_run =  $conexao->prepare($total);
$query_run->execute();
$resultado = $query_run->fetch(PDO::FETCH_ASSOC);

$valor_total=$resultado["total"];

$query = "UPDATE venda
SET totalVenda = $valor_total
WHERE idVenda = $idVenda";
include("conexao.php");
$query_run = mysqli_query($conexao, $query);

$id_produto = $produtos['id_Produto'];
$quant_V = $produtos['quantidade'];

$subtrair = "UPDATE produto 
SET quantidadeProduto = quantidadeProduto - $quant_V";
$query_run = mysqli_query($conexao, $subtrair);

session_destroy() ;
echo '<script> alert("Data Saved"); window.location.href = "index.html";</script>';


?>