<?php
	require_once '../../../Model/Gerente/Produto/modelProduto.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../../');
		} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../../';
		</SCRIPT>");
		} 
	$rol = controlProduto::buscarPorId(base64_decode($_GET['idEstoque']));
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8" />
	<title>Editar Produto</title>
	<link rel="stylesheet" href="css/styleeditProduto.css">
</head>
<body>
	<div id= "container-a">
		<form action="../../../Control/Gerente/Produto/controlProduto.php" method="post">
			<fieldset>
			<legend><b>Editar Produto</b></legend>
			<br>
			<input type="hidden" name="idEstoque" value="<?= $_GET['idEstoque'] ?>" />
			<div class="inputBox">
				<p>Nome do Produto</p>
				<input id= "inputUser" name="nome" value="<?= $rol[2] ?>" placeholder="Nome do Produto" required autofocus />
			</div>
			<div class="inputBox">
				<p>Qtd Total</p>
				<input id= "inputUser" type="number" name="quantidadeTotal" value="<?= $rol[5] ?>" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Qtd Utilizada</p>
				<input id= "inputUser" type="number" name="quantidadeUtilizada" value="<?= $rol[6] ?>"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Valor Total(R$)</p>
				<input id= "inputUser" name="valorTotal" value="<?= $rol[4] ?>" placeholder="Valor Total"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Fornecedor</p>
				<input id= "inputUser" name="fornecedor" value="<?= $rol[7] ?>" placeholder="Fornecedor"  required autofocus />
			</div>
			<br>
			<div class="inpuBox">
				<input id= "submit" name="a" type="submit" value="Editar Produto"/>
			</div>
		
			</fieldset>
				
	</div><!--CONTAINER-A-->
	<div id= "container-c">

	</div><!--CONTAINER-C-->
	</form>
</body>
</html>