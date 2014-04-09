<?php 
	require "conf/conn.php";

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
	$telefone = $_POST['telefone'];
	$celular = $_POST['celular'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cep = $_POST['cep'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$resenha = $_POST['re-senha'];

	if($senha == $resenha){
		$sql = mysql_query("INSERT INTO cliente VALUES('$cpf','$nome','$endereco','$cidade','$estado','$bairro','$rg','$telefone','$celular','$senha','$email','$cep')");
		if($sql){
			echo "<script>alert('Parabens você foi cadastrado com sucesso, acesse sua conta.');location.href='login.php';</script>";
		}else{
			echo "erro".mysql_error();
		}
	}else{
		echo "<script>alert('As senhas nao conferem tente novamente');window.history.go(-1);</script>";
	}
 ?>