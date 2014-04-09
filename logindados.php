<?php 
	require "conf/conn.php";

	$login = $_POST["login"];
	$senha = $_POST["senha"];

	$sqlLogin = mysql_query("SELECT * FROM cliente WHERE email='$login'");
	$countLogin = mysql_num_rows($sqlLogin);
	echo $countLogin;
	if($countLogin){
		$ln = mysql_fetch_assoc($sqlLogin);
		if(!strcmp($senha, $ln["senha"])){
			session_start();
			$_SESSION["login"];
			$_SESSION["login"]["cpf"] = $ln["cpf"];
			$_SESSION["login"]["nome"] = $ln["nome"];
			header("Location: carrinho.php");

		}else{
			echo "<script>alert('A senha está incorreta verifique-a');location.href='login.php';</script>";
		}
	}else{
			echo "<script>alert('O login está incorreto verifique-o');location.href='login.php';</script>";

	}
 ?>