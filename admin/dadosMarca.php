<?php 
	require "../conf/conn.php";

	$nome = $_POST["nome"];
	$foto = $_FILES["img"];

	$nomearquivo = $foto["name"];
	$ext = strrchr($nomearquivo, '.');
	$nome_imagem = md5(uniqid(time())) . $ext;
	$caminho_foto = "../imagens/marcas/".$nome_imagem;
	$end_foto = "imagens/marcas/".$nome_imagem;
	move_uploaded_file($foto["tmp_name"], $caminho_foto);


	$sql = mysql_query("INSERT INTO marca VALUES ('', '".$nome."', '".$end_foto."')");

	if($sql){
			echo '<script>
		alert ("Cadastrado com sucesso");
		location.href ="cadMarcas.php"
		</script>';
	}else{
		echo '<script>
		alert ("Nao foi possivel cadastrar");
		location.href ="cadMarcas.php"
		</script>';
	}
 ?>