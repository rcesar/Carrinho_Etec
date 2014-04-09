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
			<h1>Compra</h1>
			<div class="form">
				<h3>Cadastrar</h3>
				<form action="dadosCompra.php" method='POST' enctype="multipart/form-data">
					Fornecedor: <select name="codForn" id="">
					<?php 
					require "../conf/conn.php";
						$sqlforn = mysql_query("SELECT * FROM fornecedor");
						while($lnForn = mysql_fetch_array($sqlforn)){
					 ?>
						<option value="<?php echo $lnForn["codigo"]; ?>"><?php echo $lnForn["nome"]; ?></option>
						<?php } ?>
					</select><br><br>
					Codigo do produto: <input type="text" name="codProduto" required="required" placeholder="Digite o codigo do produto comprado"><br>
					Quantidade: <input type="text" name="qtdProduto" required="required" placeholder="Digite a quantidade comprada"><br>
					Data da compra: <input type="date" name="dataCompra" required="required"> 
					<br><br>
					<input type="submit" class="btn btn-primary" value="Cadastrar">
				</form>
			</div>

			<div class="lista">
				<h3>Ultimas Compras</h3>
				<table>
					<tr><td>ID</td>	<td>Produto comprado</td></tr>
					<?php 
					require "../conf/conn.php";
					$sql = mysql_query("SELECT * FROM compra");
					while($dados = mysql_fetch_array($sql)){
						$idProd = $dados["produto_codigo"];
						$sqlprod = mysql_query("SELECT * FROM produto WHERE codigo='$idProd'");
						$ln = mysql_fetch_assoc($sqlprod);

					 ?>

					<tr><td><?php echo $dados["codigo"] ?></td> <td><?php echo $ln["nome"] ?></td></tr>
					<?php } ?>
				</table>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>