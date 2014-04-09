<div id="top"></div>
<header>
	<a href="index.php"><div class="logo">
		<img src="imagens/logo.png" height="91" width="178" alt="">
	</div></a>
	
	<div class="options">
	<a href="carrinho.php"><img src="imagens/bg/meu-carrinho.png" height="61" width="86" alt=""></a>
	<a href="minhaconta.php"><img src="imagens/bg/minha-conta.png" height="61" width="86" alt=""></a>
	</div>
	<div class="user">
		<?php 
		if(session_id()==''){
session_start();
}
		if(isset($_SESSION["login"])){
				echo '<p> Olá '.$_SESSION["login"]["nome"].', <a href="logout.php" title="">Logout</a></p>';
			}else{
				echo "<p>Olá visitante, <a href=\"cadastro.php\">Cadastre-se</a></p>";
			}
		 ?>
	</div>
	<form action="busca.php" method="GET">
	<div class="busca">

			<input type="search" name="q" placeholder="Digite aqui sua busca">
			<input type="submit" Value="" class="bt-busca">
			
	</div>
	</form>
	<br class="clear">
	<nav>
		<ul class="menu">
			<li><a href="index.php">home</a></li>
			<li><a href="#">masculino</a>
				<ul>
					<a href="categoria.php?cat=2"><li>Oculos de Grau</li></a>
					<a href="categoria.php?cat=8"><li>Oculos de sol</li></a>
				</ul>
			</li>
			<li><a href="#">feminino</a>
				<ul>
					<a href="categoria.php?cat=3"><li>Oculos de Grau</li></a>
					<a href="categoria.php?cat=4"><li>Oculos de sol</li></a>
				</ul>
			</li>
			<li><a href="#">Infantil</a>
				<ul>
					<a href="categoria.php?cat=5"><li>Oculos de Grau</li></a>
					<a href="categoria.php?cat=6"><li>Oculos de sol</li></a>
				</ul>
			</li>
			<li><a style="border:0px;" href="marcas.php">marcas</a></li>
			
		</ul>
	</nav>
	<br class="clear">
</header>