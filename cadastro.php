<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/cadastro.css">
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
			<form action="cadastrodados.php" method="post">
			<h1>Cadastro de usuarios</h1>
			<div class="boxdados">
				<h2>Dados Pessoais</h2>
				Nome* 
				<input type="text" name="nome" required="required"><br>
				Cpf* 
				<input type="text" id="cpf" name="cpf" required="required"><br>
				RG* 
				<input type="text" id="rg" name="rg" required="required"><br>
				Telefone 
				<input type="text" id="tel" name="telefone" ><br>
				Celular 
				<input type="text" id="cel" name="celular" ><br>
				
			</div>
				<div class="boxdados">
					<h2>Endereço</h2>

				Cidade* 
				<input type="text" name="cidade" required="required"><br>
				Estado*
				<select name="estado" id="" required="required">
					<option value="AC">AC</option>
					<option value="AL">AL</option>
					<option value="AP">AP</option>
					<option value="AM">AM</option>
					<option value="BA">BA</option>
					<option value="CE">CE</option>
					<option value="DF">DF</option>
					<option value="ES">ES</option>
					<option value="GO">GO</option>
					<option value="MA">MA</option>
					<option value="MT">MT</option>
					<option value="MS">MS</option>
					<option value="MG">MG</option>
					<option value="PA">PA</option>
					<option value="PB">PB</option>
					<option value="PR">PR</option>
					<option value="PE">PE</option>
					<option value="PI">PI</option>
					<option value="RJ">RJ</option>
					<option value="RN">RN</option>
					<option value="RS">RS</option>
					<option value="RO">RO</option>
					<option value="RR">RR</option>
					<option value="SC">SC</option>
					<option value="SP">SP</option>
					<option value="SE">SE</option>
					<option value="TO">TO</option>

				</select><br>
				Endereço* 
				<input type="text" name="endereco" required="required"><br>
				Bairro* 
				<input type="text" name="bairro" required="required"><br>
				CEP* 
				<input type="text" name="cep" id="cep" required="required"><br>
				</div>

				<div class="boxdados" style="border: none;">
					<h2>Dados de login</h2>
				Email* 
				<input type="email" name="email" required="required"><br>
				Senha*
				<input type="password" name="senha" required="required"><br>
				Repita a senha*
				<input type="password" name="re-senha" required="required"><br>
				<input type="submit" class="btn btn-primary" Value="Cadastrar">
				</div>
				
				
				
			</form>
			<br class="clear">
		</div>		
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">
	<script src="js/jquery-1.9.0.min.js"></script>
		<script src="js/mask.js"></script>
	<script>
	jQuery(function($){
   $("#cep").mask("99999-999");
   $("#tel").mask("(99) 9999-9999");
   $("#cel").mask("(99) 9999-9999");
   $("#cpf").mask("999.999.999-99");
   $("#rg").mask("99.999.999-9");

});
</script> 
</body>
</html>