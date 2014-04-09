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
			<div class="slider-wrapper theme-dark">
	            <div id="slider" class="nivoSlider">
	                <a href=""><img src="imagens/slide/rayban.jpg"  width="618" data-thumb="" alt="" title="" /></a>
	                <a href=""><img src="imagens/slide/Oakley.jpg"  width="618" data-thumb="" alt="" title="" /></a>
	                <a href=""><img src="imagens/slide/vogue.jpg"  width="618" data-thumb="" alt="" title="" /></a>
	            </div>
        	</div>
        	<span class="clear"></span>
		</div><!-- Fim Row Slide Nivo -->
		<br class="clear">
		
		<div class="row">
			<h1 style="background: #f3f3f3; padding: 5px;">MAIS VENDIDOS</h1>
			<?php 
			require "conf/conn.php";
			$sql = mysql_query("SELECT * FROM produto ORDER BY vendidos DESC LIMIT 4");
			while($ln = mysql_fetch_array($sql)){
			 ?>
			<div class="produto">
				<img src="<?php echo $ln["foto1"]; ?>" width="182" alt="">
				<h2><?php echo $ln["nome"]; ?></h2>
				<h3>R$ <?php $preco = number_format($ln["preco"],2,",","."); echo $preco; ?></h3>
				<a href="produto.php?id=<?php echo $ln["codigo"]; ?>" class="btn btn-primary">MAIS DETALHES</a>
			</div>
			<?php } ?>
			
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

