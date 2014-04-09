<?php 
	require "conf/conn.php";
	$nome = $_POST["nome"];
	$cpf = $_POST["cpf"];
	$rg = $_POST["rg"];
	$tel = $_POST["telefone"];
	$cel = $_POST["celular"];
	$cidade = $_POST["cidade"];
	$estado = $_POST["estado"];
	$endereco = $_POST["endereco"];
	$bairro = $_POST["bairro"];
	$cep = $_POST["cep"];

	$sql = mysql_query("UPDATE cliente SET nome='$nome', rg='$rg', telefone='$tel', celular='$cel', cidade='$cidade', estado='$estado', endereco='$endereco', bairro='$bairro', cep='$cep'   WHERE cpf='$cpf' ");

	if($sql){
		echo "<script>alert('Dados atualizados com Sucesso');location.href='minhaconta.php?acao=dados';</script>";
	}else{
		echo $cpf;
		echo mysql_errno();
	}

 ?>