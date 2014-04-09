<?php 
	require "../conf/conn.php";
	$codigo = $_POST["codigo"];
	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$preco = $_POST["preco"];

	$sql = mysql_query("UPDATE produto SET nome='$nome', descricao= '$descricao', preco='$preco' WHERE codigo='$codigo'");
	if($sql ){
		echo "<script>alert('Alterado com Sucesso'); location.href='index.php';</script>";
	}else{
		echo mysql_error();
	}
 ?>