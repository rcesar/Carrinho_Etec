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
			<h1>Marcas</h1>
			<div class="form">
				<h3>Cadastrar</h3>
				<form action="dadosMarca.php" method='POST' enctype="multipart/form-data">
					Nome: <input type="text" name="nome" placeholder="Digite aqui o nome"><br><br>
					Imagem:<input type="file" name="img" value="" placeholder="Escolha a sua Imagem">
					<br><br>
					<input type="submit" class="btn btn-primary" value="Cadastrar">
				</form>
			</div>

			<div class="lista">
				<h3>Cadastradas</h3>
				<table>
					<tr><td>ID</td>	<td>Marcas</td></tr>
					<?php 
					require "../conf/conn.php";
					$sql = mysql_query("SELECT * FROM marca");
					while($dados = mysql_fetch_array($sql)){
					 ?>
					<tr><td><?php echo $dados["id"] ?></td> <td><?php echo $dados["nome"]; ?></td></tr>
					<?php } ?>
				</table>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>