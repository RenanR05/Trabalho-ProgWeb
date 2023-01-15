<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mercadinho</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/reset.css">
	<link rel="stylesheet" href="../css/flexbox.css">
</head>
<body>

	<header class="cabecalhoPrincipal">
		<div class="container">
			<h1 class="cabecalhoPrincipal-titulo">
				<a href="funcionarios.php">Mercadinho</a>
			</h1>

			<nav class="cabecalhoPrincipal-nav">
				<a class="cabecalhoPrincipal-nav-link cabecalhoPrincipal-nav-link-app" href="carrinho.php">Carrinho</a>
				<a class="cabecalhoPrincipal-nav-link cabecalhoPrincipal-nav-link-app" href="destruirSessao.php">Sair</a>

			</nav>
		</div>
	</header>

	<main class="conteudoPrincipal">
		<div class="container">
			<h2 class="subtitulo">Produtos</h2>

			<nav>
				<ul class="conteudoPrincipal-cursos">
						<?php
						$conexao = new PDO('mysql:host=localhost;dbname=mercadinho',"root","12345");
						$select = $conexao->prepare("SELECT * FROM produto inner join marca on produto.idMarca = marca.idMarca");
						$select->execute();
						$fetch = $select->fetchAll();
						foreach($fetch as $produto){
						
							echo '<li class="conteudoPrincipal-cursos-link">'.$produto['nomeProduto'].'
							<p>Marca: '.$produto['nomeMarca'].'
							<p>Preço: '.number_format($produto['valorProduto'],2,",",".").'
							<p>Disponivel: '.$produto['quantidadeProduto'].' 
							<a href="carrinho.php?add=carrinho&id='.$produto['idProduto'].'"> Adicionar ao Carrinho </a></li>';
						}
						?>
				</ul>
			</nav>
		</div>
	</main>
</body>
</html>