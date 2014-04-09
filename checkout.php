<?php 
	if(session_id()==''){
session_start();
}
	require "verificalogin.php";
	require "conf/conn.php";
	
 ?>	
<!doctype html>
<html lang="pt-BR">
<head>
	<link href="imagens/favcon.png" rel="icon" />
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/checkout.css">
	<link rel="stylesheet" href="css/header.css">
	<meta charset="UTF-8">
	<title>Inicio - The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ?>
		<br class="clear">
		
		<div class="row">
			<div class="condicoes">

			<h3>Confirmação</h3>
			<h2>Endereço</h2>
			<?php 
			$cpf = $_SESSION["login"]["cpf"];
			$sql = mysql_query("SELECT * FROM cliente WHERE cpf='$cpf'");
			if(mysql_num_rows($sql)){
				$ln = mysql_fetch_assoc($sql);
			}
			 ?>
			<p><address>
				Receptor: <?php echo $ln["nome"] ?> <br>
				Rua: <?php echo $ln["endereco"] ?> <br>
				Bairro: <?php echo $ln["bairro"] ?> <br>
				Cidade: <?php echo $ln["cidade"] ?> - <?php echo $ln["estado"] ?> <br>
				CEP: <?php echo $ln["cep"] ?> <br>
			</address></p>
			<!-- acao.php?acao=fechar&id= -->
			<form action="acao.php?acao=fechar&id=" id="form" method="POST">
			<h2>Forma de Envio</h2>
			<p>
				<input type="radio" id="frete" name="frete" value="sedex" checked>SEDEX - 1 á 3 dias Uteis - GRATIS
			</p>
			<h2>Forma de Pagamento</h2> 
			<input type="radio" id="pagamento" name="pagamento" value="visa">Visa  <br>
			<input type="radio" id="pagamento" name="pagamento" value="boleto">Boleto Bancario <br>
			<input type="radio" id="pagamento" name="pagamento" value="master">Master Card <br>
			<input type="radio" id="pagamento" name="pagamento" value="pagseguro">Pagseguro <br>

			<p>
				<div id="cc">
					<h3>Dados do Cartao</h3>
					Nome no cartão: <small>Nome impresso no cartão</small><br><input type="text" class="cmpInvalido" id="nomeCartao" name="nome" value=""> <br> 
					Numero do Cartao: <small>Somente numeros</small> <br><input type="text"  class="cmpInvalido" name="numero" id="nc" value=""> <br> 
					<div class="status"></div><br>
					Ano Vencimento: <br><select name="vencimento" id="">
										<option value="2013">2013</option>
										<option value="2014">2014</option>
										<option value="2015">2015</option>
										<option value="2016">2016</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
					</select> <br><br>
					Parcelas: <br><select name="parcelas" id="">
										<option value="1">1 Parcela</option>
										<option value="2">2 Parcelas</option>
										<option value="3">3 Parcelas</option>
										<option value="4">4 Parcelas</option>
										<option value="5">5 Parcelas</option>
										<option value="6">6 Parcelas</option>
										<option value="7">7 Parcelas</option>
										<option value="8">8 Parcelas</option>
										<option value="9">9 Parcelas</option>
										<option value="10">10 Parcelas</option>
										<option value="11">11 Parcelas</option>
										<option value="12">12 Parcelas</option>				
					</select><br>
					Codigo de seguraça: <small>Codigos de 3 digitos impresso atras do cartao</small> <br><input invalid="invalid" class="cmpInvalido" type="text" id="codSeg" name="codSeg" size="10"> <br> 
 				</div>
			</p>

			</div>

			<div class="resumo">
				<?php 
				 $total = 0;
	 			 ;
				if(!isset($_SESSION["carrinho"])){
				 			header("Location: carrinho.php");
				 	}else{
			 		if(count($_SESSION["carrinho"])==0){
				 			header("Location: carrinho.php");

			 		}else{
	 				
	 				 foreach($_SESSION['carrinho'] as $id => $qtd){

                              $sql   = "SELECT *  FROM produto WHERE codigo= '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $lnP    = mysql_fetch_assoc($qr);
                               
                              $total += $lnP['preco'] * $qtd;


					}}
				}
				 ?>
				<h3>Resumo do pedido</h3>
				<p>
					Subtotal: R$ <?php echo number_format($total,2,',','.'); ?> <br>
					Total: R$ <?php echo number_format($total, 2,',','.'); ?> <br>
					<br>

					<input type="submit" Value="Finalizar Compra" id="sub" class="btn btn-primary">
				</p>
			</div>
			</form>
			<br class="clear">
		</div>

	</div> <!-- Fim div Wrap-->
	
<?php include "includes/footer.php" ?>
<br class="clear">
	<script src="js/jquery-1.6.js"></script>
	<script src="js/verifica.js"></script>
	<?php 
	$total = base64_encode($total);?>
	<script>
		function boleto(){
			total = "<?php echo $total ?>";
			pedido = <?php echo rand(1345, 1876) ?>;
			nome = "<?php echo $ln["nome"] ?>";
			endereco = "<?php echo $ln["endereco"] ?>";
			localidade = "<?php echo $ln["cidade"] ?> - <?php echo $ln["estado"] ?> - <?php echo $ln["cep"] ?>";
			window.open('boleto/boleto.php?total='+total+'&pedido='+pedido+'&nome='+nome+'&endereco='+endereco+'&localidade='+localidade,'_blank');
		}
	</script>
</body>
</html>