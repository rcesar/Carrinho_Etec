<!doctype html>
<html lang="pt-BR">
<head>
	<script src="../js/jquery-1.6.js"></script>
	<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<meta charset="UTF-8">
	<title>Administração The Eye Store</title>
</head>
<body>
	<div class="wrap">
		<?php include "includes/header.php" ?>
		<br class="clear">
		<div class="row">
			<h1>Alteração do Produto</h1>
			<div class="form">
				<h3>Cadastrar</h3>
				<?php 
					require "../conf/conn.php";
					$id = $_GET["id"];
					$sql = mysql_query("SELECT * FROM produto WHERE codigo='$id'");
					$ln = mysql_fetch_assoc($sql);
				 ?>
				<form action="altDadosProduto.php" method='POST' enctype="multipart/form-data">
					<input type="hidden" value="<?php echo $ln["codigo"] ?>" name="codigo">
					Categoria: <select name="codcat" id="">
					<?php 
					// require "../conf/conn.php";
						$sqlcat = mysql_query("SELECT * FROM categoria");
						while($lnCat = mysql_fetch_array($sqlcat)){
					 ?>
						<option value="<?php echo $lnCat["codigo"]; ?>"><?php echo $lnCat["categoria"]; ?></option>
						<?php } ?>
					</select><br><br>
					Nome: <input type="text" name="nome" value="<?php echo $ln["nome"] ?>"><br><br>
					Descrição:<br><textarea name="descricao" id="" value="" cols="30"  height="600" value=""><?php echo $ln["descricao"] ?></textarea><br><br>
					Marca: <select name="marca" id="">
					<?php 
						$sqlmarca = mysql_query("SELECT * FROM marca");
						while($lnMarca = mysql_fetch_array($sqlmarca)){
					 ?>
						<option value="<?php echo $lnMarca["id"]; ?>"><?php echo $lnMarca["nome"]; ?></option>
						<?php } ?>
					</select><br><br>
					Preço: R$<input type="text" value="<?php echo $ln["preco"] ?>" name="preco"><br><br>
					Foto 1: <input type="file" name="foto1"><br><br>
					Foto 2: <input type="file" name="foto2"><br><br>
					Foto 3: <input type="file" name="foto3"><br><br>
					Foto 4: <input type="file" name="foto4"><br>
					<br>
					<input type="submit" class="btn btn-primary" value="Cadastrar">
				</form>
			</div>

			<div class="lista">
				<h3>Ultimos Produtos</h3>
				<table>
					<tr><td>ID</td>	<td>Nome</td></tr>
					<?php 
					require "../conf/conn.php";
					$sql = mysql_query("SELECT * FROM produto");
					while($dados = mysql_fetch_array($sql)){
					 ?>
					<tr><td><?php echo $dados["codigo"] ?></td> <td><?php echo $dados["nome"]; ?></td></tr>
					<?php } ?>
				</table>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
</body>
</html>