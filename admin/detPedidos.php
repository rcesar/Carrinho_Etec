<?php 
	require "../conf/conn.php";
	if(isset($_GET["id"])){
	$id = $_GET["id"];
	$sql = mysql_query("SELECT * FROM vendas WHERE cod_venda='$id'");
	$ln = mysql_fetch_assoc($sql);
	$cpf = $ln["cliente_cpf"];
	$sqlC = mysql_query("SELECT * FROM cliente WHERE cpf='$cpf'");
	$lnC = mysql_fetch_assoc($sqlC);
	$id_situacao = $ln["id_situacao"];
	$sqlS = mysql_query("SELECT * FROM situacao WHERE id='$id_situacao'");
	$lnS = mysql_fetch_assoc($sqlS);
	$sqlP = mysql_query("SELECT * FROM produtos_venda WHERE vendas_cod_venda='$id'");
	


}else{
	header("Location:vendas.php");
}
 ?>

<!doctype html>
<html lang="pt-BR">
<head>
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="../css/footer.css">

	<meta charset="UTF-8">
	<title>Administração The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ?>
		<br class="clear">
		<div class="row">
			<h1>Pedido numero <?php echo $_GET["id"] ?></h1>
			Nome do Cliente : <?php echo $lnC["nome"] ?><br>
			Data da Venda : <?php echo date("d-m-Y", strtotime($ln["data_venda"])) ?><br>
			Forma de Pagamento: <?php echo $ln["forma_pag"] ?><br>
			Parcelas : <?php echo $ln["parcelas"] ?><br>
			Situacao : <?php echo $lnS["situacao"] ?><br>
			<h2>Total do pedido</h2>
			R$ <?php echo number_format($ln["valor_total"],2,',','.'); ?>
			<h3>Items do Pedido</h3>
			<table class="prod" style="text-align:center">
				<tr class="primaria">
					<td>Produto</td>
					<td>Nome</td>
					<td>Preço</td>
					<td>Quantidade</td>
				</tr>
				
					<?php 
						while($lnP = mysql_fetch_array($sqlP)){
							$codProd = $lnP["produto_codigo"];
							$sqlPr = mysql_query("SELECT * FROM produto WHERE codigo='$codProd'");
							$lnPr = mysql_fetch_assoc($sqlPr);
						
					 ?>
				<tr class="sec">
					<td><img src="../<?php echo $lnPr["foto1"] ?>" width="160" alt=""></td>
					<td><?php echo $lnPr["nome"] ?></td>
					<td><?php echo number_format($lnPr["preco"],2,',','.')  ?></td>
					<td><?php echo $lnP["qtd"] ?></td>
				</tr>
				<?php } ?>
			</table>
			
			<div class="clear"></div>
		</div>
	</div>
	<script src="../js/jquery-1.9.0.min.js"></script>
</body>
</html>