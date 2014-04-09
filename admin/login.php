<?php 
	require "../conf/conn.php";
 ?>
<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="../css/base.css">
	
	<meta charset="UTF-8">
	<title>Inicio - The Eye Store</title>
</head>
<body>
	<div class="wrap">

			<div class="row">
				<img style="float: left;" src="../imagens/logo.png" height="91" width="178" alt="">
				<h1 style="float: right; margin-right: 400px;">Administração</h3>
				<br class="clear">
				</div>
		<div class="row">
			<h1>Logue para entrar no sistema</h1>
				<div class="form" style="width:250px; margin:0 auto; ">
				<form action="logar.php" method="POST">
					<h2>Login:</h2><input type="text" name="login" size="33"><br>
					<h2>Senha:</h2><input type="password" name="senha">
					<input type="submit" Value="Logar" class="btn btn-secundary">
				</form>
				</div>
			</div>
		
			<br class="clear">
		</div>
	</div> <!-- Fim div Wrap-->
	
<br class="clear">

</body>
</html>