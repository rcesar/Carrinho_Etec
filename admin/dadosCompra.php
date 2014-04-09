<?php 
	require "../conf/conn.php";

	$codForn = $_POST["codForn"];
	$codProd = $_POST["codProduto"];
	$qtd = $_POST["qtdProduto"];
	$data = $_POST["dataCompra"];

	$sqlCompra = mysql_query("INSERT INTO compra VALUES('','$codForn','$codProd','$qtd','$data')");
	$sqlProduto = mysql_query("SELECT * FROM produto WHERE codigo='$codProd'");
	$ln = mysql_fetch_assoc($sqlProduto);
	$qtdbd= $ln["qtd"];
	$nqtd = $qtdbd + $qtd;
	$sqlProduto = mysql_query("UPDATE produto SET qtd='$nqtd' WHERE codigo='$codProd'");

	if($sqlCompra && $sqlProduto){
			echo '<script>
		alert ("Cadastrado com sucesso");
		location.href ="cadCompra.php"
		</script>';
	}else{
		echo '<script>
		alert ("Nao foi possivel cadastrar");
		location.href ="cadCompra.php"
		</script>';
	} ?>