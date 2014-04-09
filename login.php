<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/header.css">
	<meta charset="UTF-8">
	<title>Inicio - The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ?>
		<br class="clear">
		<div class="row">
			<h1>Logar no sistema</h1>
			<div class="cent">
				<div class="boxinf" style="border-right: 1px solid #eee;">
					<h2>Não é cadastrado ?</h2>
					<p>Cadastre-se agora, é rapido e facil</p>
					<a href="cadastro.php" class="btn btn-secundary">Cadastrar</a>
					<br><br><br><br><br><br>
				</div>

				<div class="boxinf">
					<h2>Faça o login</h2>
					<form action="logindados.php" method="post">
						Email: <input type="text" name='login' required="required"><br>
						Senha: <input type="password" name="senha" required="required"><br>
						<input type="submit" value="Acessar minha conta" class="btn btn-primary">
					</form>
				</div>
				<br class="clear">
			</div>
		</div>
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">
	<script src="js/jquery-1.9.0.min.js"></script>
</body>
</html>