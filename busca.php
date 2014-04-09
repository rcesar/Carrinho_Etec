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
		<div class="row">

		<h1>Resultados da Busca</h1>
			 <?php 
			 require "conf/conn.php";
			 $q = $_GET["q"];
			$sql = mysql_query("SELECT * FROM produto WHERE nome LIKE '%" .$q. "%' OR descricao LIKE '%" .$q. "%' ORDER BY codigo");
			 $num = mysql_num_rows($sql);
			 if($num){
			 	while($lnProduto = mysql_fetch_array($sql)){
			 		?>
	 		<div class="produto">
				<img src="<?php echo $lnProduto["foto1"]; ?>" width="182" alt="">
				<h2><?php echo $lnProduto["nome"]; ?></h2>
				<h3>R$ <?php $preco = number_format($lnProduto["preco"],2,",","."); echo $preco; ?></h3>
				<a href="produto.php?id=<?php echo $lnProduto["codigo"]; ?>" class="btn btn-primary">MAIS DETALHES</a>
			</div>
			 		<?php
			 	}
			 }else{
			 	echo "Nenhum resultado encontrado...";
			 }
			  ?>
			<br class="clear">
		</div>
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">

</body>
</html>