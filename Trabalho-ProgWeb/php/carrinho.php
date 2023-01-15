<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/styleCarrinho.css">
</head>
<body>
<div>
</div>
<br>
<div class="container">
    <div class="jumbotron">
        <h2>Carrinho</h2>
        <hr>
        
        <br>
        <?php
        include("conexao.php");
        ?>

        <table class="table table-bordered" style="background-color: white;">
            <thead class="table-dark">
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Remover</th>
            </tr>
            </thead>
            <?php
            session_start();
            echo '<a href="finalizar.php" class="btn btn-success" id="finalizar">Finalizar Pedido</a><br>';
                echo '<br><a href="mercadinho.php" class="btn btn-success" id="continuar">Continuar Comprando</a><br>';
            if(!isset($_SESSION['itens']))
            {
                $_SESSION['itens'] = array();

            }

            if(isset($_GET['add']) && $_GET['add'] == 'carrinho')
            {
                $idProduto = $_GET['id'];
                if(!isset($_SESSION['itens'][$idProduto]))
                {
                    $_SESSION['itens'][$idProduto] = 1;
                }else {
                    $_SESSION['itens'][$idProduto] += 1;
                }
            }

                if(count($_SESSION['itens']) == 0){
                    echo '<p class="vazio">Carrinho Vazio</p>
                     <br> <a id="adicionar" class="btn btn-primary"href="mercadinho.php">Adicionar Itens</a>';
                    
                }else{

                    $_SESSION['dados'] = array();
                    foreach($_SESSION['itens'] as $idProduto => $quantidade){
                    $conexao = new PDO('mysql:host=localhost;dbname=mercadinho',"root","12345");
                    $select = $conexao->prepare("SELECT * FROM produto where idProduto = ?");
                    $select->bindParam(1,$idProduto);
                    $select->execute();
                    $produtos = $select->fetchAll();
                    $total = $quantidade * $produtos[0]["valorProduto"];

                    echo '<tr><th>'.$produtos[0]["nomeProduto"].'</th>';
                    echo '<th>'. number_format($produtos[0]["valorProduto"],2,",",".").'</th>';
                    echo '<th>'.$quantidade.'</th>';
                    echo '<th>'. number_format($total,2,",",".").'</th>';
                    echo '<th><a class="btn btn-danger" href="remover.php?remover=carrinho&id='.$idProduto.'">Remover</a></th></tr>';
                    
                    array_push($_SESSION['dados'],
                        array(
                            'id_Produto'=> $idProduto,
                            'quantidade'=> $quantidade,
                            'preco'=> $produtos[0]['valorProduto'],
                            'total'=> $total
                        )
                    ); 
                    }

                }
    ?>
        </table>
    </div>
</div>
</body>
</html>
