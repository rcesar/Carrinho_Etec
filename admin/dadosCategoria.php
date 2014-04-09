<?php 
	require "../conf/conn.php";

	$categoria = $_POST["categoria"];

	$sql= mysql_query("INSERT INTO categoria VALUES ('','$categoria')");

	if($sql){
		echo "<script>alert(\"Categoria cadastrada com sucesso !\");location.href=\"cadCategoria.php\";</script>";
	}else{
		echo mysql_error();
	}
 ?>