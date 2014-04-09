<?php 
	require "conf/conn.php";
	$idCat = $_GET["cat"];
 ?>
<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/nivo-slider.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/dark/dark.css">
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
			$sqlCat = mysql_query("SELECT * FROM categoria WHERE codigo='$idCat'");
			$ln = mysql_fetch_assoc($sqlCat);
			 ?>
			<h1><?php echo $ln["categoria"]; ?></h1>

			<?php 
			$sqlProduto = mysql_query("SELECT * FROM produto WHERE categoria_codigo='$idCat'");
			if (mysql_num_rows($sqlProduto) > 0) {
			while($lnProduto = mysql_fetch_array($sqlProduto)){
			 ?>
			<div class="produto">
				<img src="<?php echo $lnProduto["foto1"]; ?>" width="182" alt="">
				<h2><?php echo $lnProduto["nome"]; ?></h2>
				<h3>R$ <?php $preco = number_format($lnProduto["preco"],2,",","."); echo $preco; ?></h3>
				<a href="produto.php?id=<?php echo $lnProduto["codigo"]; ?>" class="btn btn-primary">MAIS DETALHES</a>
			</div>
<?php }
		}else{
			echo "<h2>Sem produtos cadastrados nessa categoria</h2>";
		}
 ?>

			<br class="clear">
		</div>
		<br class="clear">
		
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">
	<script src="js/jquery-1.9.0.min.js"></script>
	<script src="js/jquery.nivo.slider.js"></script>
	<script type="text/javascript">
    jQuery(window).load(function() {
    jQuery('#slider').nivoSlider({
        effect: 'fold', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 1000 // Slide transition speed
    });
});
    </script>

</body>
</html>