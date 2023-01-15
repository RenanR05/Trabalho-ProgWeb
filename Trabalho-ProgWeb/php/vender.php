<? include("verificadorDoTipoFuncionario.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<?php include("menu.php"); ?>
<?php
$conexao = new PDO('mysql:host=localhost;dbname=mercadinho',"root","12345");


$select = $conexao->prepare("SELECT * FROM produto inner join marca on produto.idMarca = marca.idMarca");
$select->execute();
$fetch = $select->fetchAll();
foreach($fetch as $produto){

    echo 'Produto:  '.$produto['nomeProduto'].' &nbsp; 
    Marca: '.$produto['nomeMarca'].' &nbsp;
    Preço: '.number_format($produto['valorProduto'],2,",",".").' &nbsp;
    Disponivel: '.$produto['quantidadeProduto'].' &nbsp;
    <a href="carrinho.php?add=carrinho&id='.$produto['idProduto'].'"> Adicionar ao Carrinho </a>
    <br/>';
}




?>
<?php include("dep_query.php"); ?>
</body>
</html>