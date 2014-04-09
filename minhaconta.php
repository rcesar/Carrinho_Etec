<?php include "verificalogin.php" ?>
<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/minhaconta.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/carrinho.css">

	<meta charset="UTF-8">
	<script src="js/jquery-1.9.0.min.js"></script>

	<title>Inicio - The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ;
		
		?>
		<br class="clear">
		<div class="row">
			<h1>Minha conta</h1>
			<div class="sidebar">
				<a href="?acao=dados" class="btn btn-secundary" id="meusdados">Meus dados</a><br><br>
				<a href="?acao=pedidos" class="btn btn-secundary">Meus Pedidos</a>
			</div>
			<div class="dados">

				<?php 
				include "conf/conn.php";
				if(isset($_GET["acao"])){
					$acao = $_GET["acao"];

					$cpf = $_SESSION["login"]['cpf'];
					if($acao == "dados"){
						$sql = mysql_query("SELECT * FROM cliente WHERE cpf='$cpf'");
						$ln=mysql_fetch_assoc($sql);
						?>
						<form id="formDados" action="atualizaDados.php" method="POST">
					<a href="" class="btdados"><h3>Dados Pessoais</h3></a>
					<div class="dadosSub">
				Nome
				<input type="text" value="<?php echo $ln["nome"] ?>" name="nome" required="required"><br>
				<input type="hidden" value="<?php echo $ln["cpf"] ?>" name="cpf">
				Cpf: 
				<?php echo $ln["cpf"] ?><br><br>
				RG
				<input type="text" value="<?php echo $ln["rg"] ?>" id="rg" name="rg" required="required"><br>
				Telefone 
				<input type="text" value="<?php echo $ln["telefone"] ?>" id="tel" name="telefone" ><br>
				Celular 
				<input type="text" value="<?php echo $ln["celular"] ?>" id="cel" name="celular" ><br></div>

					<a href="" class="btdados"><h3>Endereço</h3></a>
					<div class="dadosSub">
				Cidade
				<input type="text" value="<?php echo $ln["cidade"] ?>" name="cidade" required="required"><br>
				Estado
				<select name="estado" id="estado" required="required">
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

				Endereço
				<input type="text" value="<?php echo $ln["endereco"] ?>" name="endereco" size="40" required="required"><br>
				Bairro 
				<input type="text" value="<?php echo $ln["bairro"] ?>" name="bairro" required="required"><br>
				CEP
				<input type="text" value="<?php echo $ln["cep"] ?>" name="cep" id="cepmc" required="required"><br></div>

					<input type="submit" value="Atualizar dados" class="btn btn-primary">
					</form>
					<?php
				} }
				 ?>

				<?php 
					if(isset($_GET["acao"])){
						$acao  = $_GET["acao"];
						if($acao == "pedidos"){
							echo "<h3>Meus Pedidos</h3>";
							$cpf = $_SESSION["login"]["cpf"];
						$sql = mysql_query("SELECT * FROM vendas WHERE cliente_cpf='$cpf' ORDER BY cod_venda DESC ");
						$num = mysql_num_rows($sql);

						if($num){
						while($ln = mysql_fetch_array($sql)){

							?>
							Numero do Pedido: <?php echo $ln["cod_venda"]; ?><br><br>
							Data Venda: <?php echo date("d-m-Y", strtotime($ln["data_venda"])); ?><br><br>
							Valor da Compra: R$ <?php $valor = number_format($ln["valor_total"],2,",","."); echo $valor ?><br><br>
							Situação: <?php
							$situacao = $ln["id_situacao"];
								$sqlS = mysql_query("SELECT * FROM situacao WHERE id='$situacao'");
								$lnS = mysql_fetch_assoc($sqlS);

							 echo $lnS["situacao"] ?><br>
							<br><a href="" class="verProd">Ver Produtos</a>
							<div class="prods">
								<?php 
									$cod_venda = $ln["cod_venda"];
									$sqlProd = mysql_query("SELECT * FROM produtos_venda WHERE vendas_cod_venda='$cod_venda'");
									$numProd = mysql_num_rows($sqlProd);

									if($numProd){
										?>
										<table class="prod">
											<tr class="primaria">
												<td>Produto</td>
												<td width="400">Nome</td>
												<td>Preço</td>
												<td>Quantidade</td>
											</tr>
										<?php
										while($lnProd = mysql_fetch_array($sqlProd)){
											$codProd = $lnProd["produto_codigo"];

											$sqlP = mysql_query("SELECT * FROM produto WHERE codigo='$codProd'");
											$lnP = mysql_fetch_assoc($sqlP);


											?>
					<tr class="sec">
						<td><img src="<?php echo $lnP["foto1"] ?>" width="160"  alt=""></td>
						<td><?php echo $lnP["nome"] ?></td>
						<td>R$ <?php $valorP = number_format($lnP["preco"],2,",","."); echo $valorP ?></td>
						<td><?php echo $lnProd["qtd"] ?></td>
					</tr>
			
											<?php
										}
									}
								 ?>
								 </table>
							</div>
							<hr>
							<?php
						}
						}
						}
					}
				 ?>
				
			</div>
<br class="clear">
<br>
		</div>
	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">
	<script>
	$(window).load(function() {
		contop = 0;
		$(".prods").hide();
		ids = 0;
		idestado = 0;
		estado = "<?php echo $ln["estado"]; ?>";
	$('#estado option').each(function() {
		$(this).attr('id', idestado);
		if($(this).val() == estado){
			ids = $(this).attr('id');
		}
		idestado++;
	});

	
		seleciona(ids);
		$(".dadosSub").hide();

	});
	</script>

	<script>

	 $(".btdados").click(function(event) {
	 	event.preventDefault();
	 	if($(this).next(".dadosSub").is(':visible')){
	 		$(this).next(".dadosSub").slideUp();
	 	}else{
	 		$(".dadosSub").slideUp();
	 		$(this).next(".dadosSub").slideToggle();
	 	}
	 });
	 	

			function seleciona(ids){
			document.getElementById("estado").options[ids].selected = true;
		} 
	</script>
	

	<script>
		 $(".verProd").click(function(event) {
	 	event.preventDefault();
	 	if($(this).next(".prods").is(':visible')){
	 		$(this).next(".prods").slideUp();
	 	}else{
	 		$(".prods").slideUp();
	 		$(this).next(".prods").slideToggle();
	 	}
	 });
	</script>

	<script src="js/mask.js"></script>
	<script>
	jQuery(function($){
   $("#cepmc").mask("99999-999");
   $("#tel").mask("(99) 9999-9999");
   $("#cel").mask("(99) 9999-9999");
   $("#rg").mask("99.999.999-9");
});
</script> 


</body>
</html>