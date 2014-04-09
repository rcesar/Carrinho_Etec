<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/carrinho.css">
	<meta charset="UTF-8">
	<title>Inicio - The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ?>
		<br class="clear">
		<div class="row">
			<h3>MEU CARRINHO</h3>
				<table class="prod">
					<tr class="primaria">
						<td>Produto</td>
						<td width="400">Descrição</td>
						<td>Preço Unitario</td>
						<td>Quantidade</td>
						<td>Preço Total</td>
					</tr>

					<?php 
					$total = 0;
					require "conf/conn.php";
					if(session_id()==''){
session_start();
}

				 	if(!isset($_SESSION["carrinho"])){
				 			echo "<h2>Não temos produtos cadastrados ainda</h2>";
				 	}else{
			 		if(count($_SESSION["carrinho"])==0){
			 			echo "<h2>Não temos produtos cadastrados ainda</h2>";
			 		}else{
	 				 
	 				 foreach($_SESSION['carrinho'] as $id => $qtd){

                              $sql   = "SELECT *  FROM produto WHERE codigo= '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $ln    = mysql_fetch_assoc($qr);
                               
                              $nome  = $ln['nome'];
                              $img = $ln['foto1'];
                              $preco = number_format($ln['preco'], 2, ',', '.');
                              $sub   = number_format($ln['preco'] * $qtd, 2, ',', '.');

                              $total += $ln['preco'] * $qtd;


					 ?>

					<tr class="sec">
						<td><img src="<?php echo $img; ?>" width="160"  alt=""></td>
						<td><?php echo $nome; ?></td>
						<td>R$ <?php echo $preco; ?></td>
						<td><?php echo '<input style="text-align:center;" id="qtd'.$id.'" onChange="altera('.$id.')" type="text" size="3" data-id="'.$id.'" name="prod['.$id.']" value="'.$qtd.'" />'; ?>X</td>
						<td>R$ <?php echo $sub; ?></td>
					</tr>
					<?php } } } ?>
				</table>
			<div class="finalizar">
			<h3>FINALIZAR COMPRAS</h3>
			<h2>SUB TOTAL:</h2>
			<h3>R$ <?php echo number_format($total, 2, ',', '.'); ?></h3> 			
			<a href="checkout.php" class="btn btn-primary">Finalizar Compra</a>
	
			</div>
			<br class="clear">
			<br>
		</div>

		
		
		
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">
<script src="js/jquery-1.6.js"></script>
<script src="js/mask.js"></script>
  <script>
	  function altera(id){
	  	qtd = document.getElementById('qtd'+id).value;
	  	location.href = "acao.php?acao=altera&id="+id+"&qtd="+qtd;
	  }
	  </script>
</body>
</html>