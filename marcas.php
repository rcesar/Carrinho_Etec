<?php 
	require "conf/conn.php";
 ?>
<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/marca.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/header.css">
	<meta charset="UTF-8">
	<title>Inicio - The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ?>
		<br class="clear">
		
		<!-- Slide Nivo -->
		<div class="row">
			<?php 
				if (isset($_GET["cat"])) {
					$id = $_GET["cat"];
					$sqlMarca = mysql_query("SELECT * FROM marca WHERE id='$id'");
					$lnMarca = mysql_fetch_assoc($sqlMarca);
					?>
					<h1>Produtos da Marca <?php echo $lnMarca["nome"]; ?></h1>
					<?php 
					$sqlProduto = mysql_query("SELECT * FROM produto WHERE marca='$id'");
					if (mysql_num_rows($sqlProduto) > 0) {
					while($lnProduto = mysql_fetch_array($sqlProduto)){
					 ?>
				<div class="produto">
				<img src="<?php echo $lnProduto["foto1"]; ?>" width="182" alt="">
				<h2><?php echo $lnProduto["nome"]; ?></h2>
				<h3>R$ <?php $preco = number_format($lnProduto["preco"],2,",","."); echo $preco; ?></h3>
				<a href="produto.php?id=<?php echo $lnProduto["codigo"]; ?>" class="btn btn-primary">MAIS DETALHES</a>
			</div>
			<?php }}else{
				echo "<h2>Não temos produtos desta Marca cadastrado no sistema</h2>";
			}}else{
				?>
				<h1>Nossas Marcas</h1>
				<?php
				$sqlMarca = mysql_query("SELECT * FROM marca");
				while($lnMarca = mysql_fetch_array($sqlMarca)){
				?>
				
				<div class="marca" style="height:100px; margin:10px; border:none;">
					<a href="marcas.php?cat=<?php echo $lnMarca["id"]; ?>"><img src="<?php echo $lnMarca["img"]; ?>" alt="" width="150"></a>
					<br>
				</div>

			<?php }} ?>
				
			 
			<br class="clear">
		</div>
		<br class="clear">
		
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">

</body>
</html>