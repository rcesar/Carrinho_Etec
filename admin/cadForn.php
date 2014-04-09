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
			<h1>Fornecedores</h1>
			<div class="form">
				<h3>Cadastrar</h3>
				<form action="dadosForn.php" method='POST'>
					Nome: <input type="text" name="nome"><br><br>
					Telefone: <input id="tel" type="text" name="telefone"><br><br>
					Site: <input type="text" name="site" value="http://"><br><br>
					Email: <input type="text" name="email"><br><br>
					Endereço: <input type="text" name="endereco"><br><br>
					Cidade: <input type="text" name="cidade"><br><br>
					Estado: <input type="text" name="estado"><br><br>
					Cep: <input id="cep" type="text" name="cep"><br><br>
					<br>
					<input type="submit" class="btn btn-primary" value="Cadastrar">
				</form>
			</div>

			<div class="lista">
				<h3>Cadastradas</h3>
				<table>
					<tr><td>ID</td>	<td>Categoria</td><td>Telefone</td></tr>
					<?php 
					require "../conf/conn.php";
					$sql = mysql_query("SELECT * FROM fornecedor");
					while($dados = mysql_fetch_array($sql)){
					 ?>
					<tr><td><?php echo $dados["codigo"] ?></td> <td><?php echo $dados["nome"]; ?></td><td><?php echo $dados["telefone"]; ?></td></tr>
					<?php } ?>
				</table>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<script src="../js/jquery-1.6.js"></script>
	<script src="../js/mask.js"></script>
	<script>
	jQuery(function($){
   $("#cep").mask("99999-999");
   $("#tel").mask("(99) 9999-9999");
});
</script> 
</body>
</html>