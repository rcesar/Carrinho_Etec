<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/nivo-slider.css">
	<link rel="stylesheet" href="css/produto.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/dark/dark.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/jquery.jqzoom.css">
	<link rel="stylesheet" href="css/header.css">
	<script src="js/jquery-1.6.js"></script>
<script src="js/jquery.jqzoom-core.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'innerzoom',
            preloadImages: false,
            alwaysOn:false
        });
});


</script>
	<meta charset="UTF-8">
	<title>Inicio - The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ?>
		<br class="clear">
		<div class="row">
	<div class="foto">	
		<?php  
		$id = $_GET["id"];
		require "conf/conn.php";
		$sql = mysql_query("SELECT * FROM produto WHERE codigo='$id'");
		$ln = mysql_fetch_assoc($sql);
			?>
        <a href="<?php echo $ln["foto1"]  ?>" class="jqzoom" rel='gal1'  title="" >
            <img src="<?php echo $ln["foto1"]  ?>"  title="" width="560"  style="border: 1px solid #666;">
        </a>
	<br class="clear">
<ul id="thumblist" class="clearfix" >
		<li>
        <a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './<?php echo $ln["foto1"]  ?>',largeimage: './<?php echo $ln["foto1"]  ?>'}">
        <img src='<?php echo $ln["foto1"]  ?>'  width="138"></a>
    </li>
		<li>
        <a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './<?php echo $ln["foto2"]  ?>',largeimage: './<?php echo $ln["foto2"]  ?>'}">
        <img src='<?php echo $ln["foto2"]  ?>'  width="138"></a>
    </li>
    <li>
        <a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './<?php echo $ln["foto3"]  ?>',largeimage: './<?php echo $ln["foto3"]  ?>'}">
        <img src='<?php echo $ln["foto3"]  ?>'  width="138"></a>
    </li>
		<li><a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './<?php echo $ln["foto4"]  ?>',largeimage: './<?php echo $ln["foto4"]  ?>'}"><img src='<?php echo $ln["foto4"]  ?>'  width="138"></a></li>
		<br class="clear">
	</ul>
	</div>

	<div class="dados">
		<center>
		<h1><?php echo $ln["nome"] ?></h1>
		<h3>R$ <?php $preco = number_format($ln["preco"],2,",","."); echo $preco; ?></h3>
		<p><?php $parc = $ln["preco"]/10; $parc = number_format($parc,2,",","."); ?>Em até 10x de <?php echo $parc ?> sem juros</p>
		<?php 
		$marca = $ln["marca"];
		$sqlM = mysql_query("SELECT * FROM marca WHERE id='$marca'");
		$lnM = mysql_fetch_assoc($sqlM);
		 ?>
		<p>Marca: <?php echo $lnM["nome"]; ?><br>Vendidos:<?php echo $ln["vendidos"]; ?></p>
		<a href="acao.php?acao=add&id=<?php echo $ln["codigo"]; ?>" class="btn btn-primary">ADICIONAR AO CARRINHO</a>
</center>
	</div>
		<br class="clear">
		<hr>
		<h2>DETALHES DO PRODUTO</h2>
		<p><?php echo $ln["descricao"]; ?></p>
		</div>
		<br class="clear">
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">

</body>
</html>