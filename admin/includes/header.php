<?php 
if(session_id()==''){
session_start();
}
	if(!isset($_SESSION["loginadm"]["nome"])){
		header("Location: login.php");
	}
 ?>
<header>
	<a href="index.php"><div class="logo">
		<img src="../imagens/logo.png" height="91" width="178" alt="">
	</div></a>
	<div class="busca">
		<h3>Bem vindo, <?php echo $_SESSION["loginadm"]["nome"] ?></h3>
		<a href="../index.php" target="_blank"><h2>Visualizar o site</h2></a>
	</div>
	<nav>
		<ul class="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="cadCategoria.php">Categoria</a></li>
			<li><a href="cadForn.php">Fornecedor</a></li>
			<li><a href="cadMarcas.php">Marcas</a></li>
			<li><a href="cadProduto.php">Produto</a></li>
			<li><a href="cadCompra.php">Compras</a></li>
			<li><a href="vendas.php">Vendas</a></li>
		</ul>
	</nav>

</header>
<br class="clear">