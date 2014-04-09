<?php 
	require "conf/conn.php";
	session_start();

	$acao = $_GET["acao"];
	$id = $_GET["id"];

	if(!isset($_SESSION["carrinho"])){
			$_SESSION["carrinho"] = array();
		}

	if($acao == 'add'){
		if(!isset($_SESSION["carrinho"][$id])){
			$_SESSION["carrinho"][$id] = 1;
		}else{
			$_SESSION["carrinho"][$id] += 1;
		}
		header("Location: carrinho.php");
	}

	if($acao == 'del'){
		unset($_SESSION["carrinho"][$id]);
	}

	if($acao == 'fechar'){
		$cpf_cli = $_SESSION["login"]["cpf"];
		$parc = $_POST["parcelas"];
		$situacao = 1;
		$fPag = $_POST["pagamento"];
		$data = date("Y-m-d");
		$total = 0;

		
		

		foreach ($_SESSION["carrinho"] as $id => $qtd) {
			$sql   = "SELECT *  FROM produto WHERE codigo= '$id'";
          	$qr    = mysql_query($sql) or die(mysql_error());
			$ln = mysql_fetch_assoc($qr);
			$total += $ln['preco'] * $qtd;
			$vendb = $ln["vendidos"];
			$nVendidos = $vendb + $qtd;
			$qtdb = $ln["qtd"];
			$novaqtd = $qtdb - $qtd;

			$upd = mysql_query("UPDATE produto SET qtd='$novaqtd', vendidos='$nVendidos' WHERE codigo='$id'");

			 
		}



		$sqlvenda = mysql_query("INSERT INTO vendas VALUES('','$cpf_cli','$data','$total','$fPag','$situacao','$parc')") or die(mysql_error());
		$selVenda = mysql_query("SELECT * FROM vendas ORDER BY cod_venda DESC LIMIT 1 ");
		$lnVenda = mysql_fetch_assoc($selVenda) or die (mysql_error());
		$codVenda = $lnVenda["cod_venda"];


			echo 'fechar';

		foreach ($_SESSION["carrinho"] as $id => $qtd) {
			$sql   = "SELECT *  FROM produto WHERE codigo= '$id'";
          	$qr    = mysql_query($sql) or die(mysql_error());
			$ln = mysql_fetch_assoc($qr);
			$total += $ln['preco'] * $qtd;
			$vendb = $ln["vendidos"];
			$nVendidos = $vendb + $qtd;
			$qtdb = $ln["qtd"];
			$novaqtd = $qtdb - $qtd;

			$inserPV = mysql_query("INSERT INTO produtos_venda VALUES ('$id','$codVenda','$qtd')");
				}

			if($upd && $sqlvenda && $inserPV){
				unset($_SESSION["carrinho"]);
				echo "<script>alert(\"Compra finalizada com sucesso \"); location.href=\"index.php\";</script>";
			}else{
				echo mysql_error();
			}
	}

	if($acao == 'altera'){
	  			$id = $_GET['id'];
	  			$qtd = $_GET['qtd'];
	  			$_SESSION["carrinho"][$id]=$qtd;
	  			
	  			header("Location: carrinho.php");
	  		}

 ?>