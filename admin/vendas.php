<!doctype html>
<html lang="pt-BR">
<head>
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="../css/carrinho.css">
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
			<h1>Vendas</h1>
			<table class="prod">
				<tr class="primaria">
					<td>Codigo da Venda</td>
					<td>Cliente</td>
					<td>Data da Venda</td>
					<td>Valor Total</td>
					<td>Situação</td>
					<td>Altera Situacao</td>
					<td>Mais detalhes</td>
				</tr>
			<?php 
			require "../conf/conn.php";
				$sql = mysql_query("SELECT * FROM vendas ORDER BY cod_venda DESC");
				$num = mysql_num_rows($sql);
				if($num){
					while($ln = mysql_fetch_array($sql)){

						?>
			
				<tr class="sec">
					<td><?php echo $ln["cod_venda"] ?></td>
					
					<td><?php  
						$cpf = $ln["cliente_cpf"];
						$sqlC = mysql_query("SELECT * FROM cliente WHERE cpf='$cpf'");
						$numC = mysql_num_rows($sqlC);
						if($num){
							$lnC = mysql_fetch_assoc($sqlC);
							echo $lnC["nome"];
						}
						?></td>
					
					<td><?php echo date("m-d-Y",strtotime($ln["data_venda"])) ?></td>
					<td><?php echo "R$ " . $valor = number_format($ln["valor_total"],2,",",".") ?></td>
					<?php 
						$ids = $ln["id_situacao"];
						$sqlS = mysql_query("SELECT * FROM situacao WHERE id='$ids'");
						$lnS = mysql_fetch_assoc($sqlS);
					 ?>
					
						<td><?php echo $lnS["situacao"] ?></td>
						<td><select data-val="<?php echo $ln["id_situacao"] ?>" data-id="<?php echo $ln["cod_venda"] ?>" name="situacao" class="situacao">
						<?php  
						$situacao = $ln["id_situacao"];
						$sqlS = mysql_query("SELECT * FROM situacao");
						$numS = mysql_num_rows($sqlS);
						if($num){
							while ($lnS = mysql_fetch_array($sqlS)) {
							
							?>
							
							<option  value="<?php echo $lnS['id'] ?>"><?php echo $lnS["situacao"] ?></option>	

							
							<?php
							}
						}
						?>
						</select></td>
						<td><a id="maisDetalhes" href="detPedidos.php?id=<?php echo $ln["cod_venda"] ?>">Mais detalhes</a></td>
					</tr>
					
					
					
				
							
						<?php
					}
				}

			 ?>
			 </table>
		
			<div class="clear"></div>
		</div>
	</div>
	<script src="../js/jquery-1.9.0.min.js"></script>
	<script>
		
		$(".situacao").change(function() {
			if(confirm("Deseja mesmo alterar a situação desse pedido ?")){
			id = $(this).attr('data-id');
			idS = $(this).val();
			link = "?id="+id+"&idS="+idS;
			location.href=link;
		}
		});
	</script>

	<?php 
		if(isset($_GET["id"])){
			$id=$_GET["id"];
			$idS = $_GET["idS"];

			require "../conf/conn.php";

			$sql = mysql_query("UPDATE vendas SET id_situacao='$idS' WHERE cod_venda='$id'");
			if($sql){
				echo "<script>alert('Situação alterada com sucesso'); location.href='vendas.php';</script>";
			}else{
				echo mysql_error();
			}
			
		}
	 ?>


</body>
</html>