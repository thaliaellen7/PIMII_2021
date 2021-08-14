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
		} ?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/stylecadProduto.css">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
		<form action="../../../Control/Gerente/Produto/controlProduto.php" method="post">
			<fieldset>
			<legend><b>Adicionar Produto</b></legend>
			<br>
			<div class="inputBox">
				<p>Nome do Produto</p>
				<input id= "inputUser" name="nome" placeholder="Nome do Produto" required autofocus />
			</div>
			<div class="inputBox">
				<p>Qtd Total</p>
				<input id= "inputUser" type="number" name="quantidadeTotal" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Qtd Utilizada</p>
				<input id= "inputUser" type="number" name="quantidadeUtilizada"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Valor Total</p>
				<input id= "inputUser" name="valorTotal" placeholder="Valor Total"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Fornecedor</p>
				<input id= "inputUser" name="fornecedor" placeholder="Fornecedor"  required autofocus />
			</div>
			
			<div class="inpuBox">
			<input id= "submit" name="a" type="submit" value="Adicionar"/>
			</div>
			</fieldset>
			
	</div>	
	</div><!--CONTAINER-A-->
	<div>
	
	</form>
</body>
</html>