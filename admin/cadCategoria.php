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
			<h1>Categoria</h1>
			<div class="form">
				<h3>Cadastrar</h3>
				<form action="dadosCategoria.php" method='POST'>
					Nome: <input type="text" name="categoria"><br>
					<br>
					<input type="submit" class="btn btn-primary" value="Cadastrar">
				</form>
			</div>

			<div class="lista">
				<h3>Categorias</h3>
				<table>
					<tr><td>ID</td>	<td>Categoria</td></tr>
					<?php 
					require "../conf/conn.php";
					$sql = mysql_query("SELECT * FROM categoria ORDER BY codigo LIMIT 10");
					while($dados = mysql_fetch_array($sql)){
					 ?>
					<tr><td><?php echo $dados["codigo"] ?></td> <td><?php echo $dados["categoria"]; ?></td></tr>
					<?php } ?>
				</table>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>