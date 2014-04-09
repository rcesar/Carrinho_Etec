<?php 
	require "../conf/conn.php";

	$codcat = $_POST["codcat"];
	$nome = $_POST["nome"];
	$desc = $_POST["desc"];
	$marca = $_POST["marca"];
	$preco = $_POST["preco"];
	$foto1 = $_FILES["foto1"];
	$foto2 = $_FILES["foto2"];
	$foto3 = $_FILES["foto3"];
	$foto4 = $_FILES["foto4"];

	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto1["name"], $ext1);
	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto2["name"], $ext2);
	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto3["name"], $ext3);
	preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto4["name"], $ext4);
	
	$nome1 = md5(uniqid(time()))."." . $ext1[1];
	$nome2 = md5(uniqid(time()))."." . $ext2[1];
	$nome3 = md5(uniqid(time()))."." . $ext3[1];
	$nome4 = md5(uniqid(time()))."." . $ext4[1];

	$caminho = "../imagens/Produtos";

	$end1 = "imagens/Produtos/".$nome1;
	$end2 = "imagens/Produtos/".$nome2;
	$end3 = "imagens/Produtos/".$nome3;
	$end4 = "imagens/Produtos/".$nome4;

	move_uploaded_file($foto1["tmp_name"], $caminho."/".$nome1);
	move_uploaded_file($foto2["tmp_name"], $caminho."/".$nome2);
	move_uploaded_file($foto3["tmp_name"], $caminho."/".$nome3);
	move_uploaded_file($foto4["tmp_name"], $caminho."/".$nome4);

	$sql = mysql_query("INSERT INTO produto VALUES ('','$codcat','$nome','$desc','$marca','$preco','','$end1','$end2','$end3','$end4','')");
	if($sql){
			echo '<script>
		alert ("Cadastrado com sucesso");
		location.href ="cadProduto.php"
		</script>';
	}else{
		echo '<script>
		alert ("Nao foi possivel cadastrar");
		location.href ="cadProduto.php"
		</script>';
	}


 ?>