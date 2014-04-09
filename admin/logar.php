<?php 
	require("../conf/conn.php");

	$login = $_POST["login"];
	$senha = $_POST["senha"];

	$sqlLogin = mysql_query("SELECT * FROM admuser WHERE login='$login'");
	$countLogin = mysql_num_rows($sqlLogin);
	// echo $countLogin;
	if($countLogin){
		$ln = mysql_fetch_assoc($sqlLogin);
		if(!strcmp($senha, $ln["senha"])){
			session_start();
			$_SESSION["loginadm"];
			$_SESSION["loginadm"]["id"] = $ln["id"];
			$_SESSION["loginadm"]["nome"] = $ln["nome"];
			header("Location: index.php");

		}else{
			echo "<script>alert('A senha esta incorreta verifique-a');location.href='login.php';</script>";
		}
	}else{
			echo "<script>alert('O login esta incorreto verifique-o');location.href='login.php';</script>";

	}

 ?>