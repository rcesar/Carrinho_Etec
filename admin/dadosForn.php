<?php 
	require "../conf/conn.php";

	$nome = $_POST["nome"];
	$telefone = $_POST["telefone"];
	$site = $_POST["site"];
	$email = $_POST["email"];
	$endereco = $_POST["endereco"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$cep = $_POST["cep"];

	$sql = mysql_query("INSERT INTO fornecedor VALUES('','$nome','$telefone','$site','$email','$endereco','$cidade','$estado','$cep')");

	if($sql){
		echo "<script>alert(\"Fornecedor cadastrado com sucesso !\");location.href=\"cadForn.php\";</script>";
	}else{
		echo mysql_error();
	}
 ?>