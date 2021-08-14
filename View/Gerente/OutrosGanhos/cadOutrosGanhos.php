<?php
	require_once '../../../Model/Gerente/OutrosGanhos/modelOutrosGanhos.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../../');
		} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../../';
		</SCRIPT>");
		} 
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/stylecadOutrosGanhos.css">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
		<form action="../../../Control/Gerente/OutrosGanhos/controlOutrosGanhos.php" method="post">
			<fieldset>
			<legend><b>Adicionar Ganho</b></legend>
			<br>
			<div class="inputBox">
				<p>Descrição</p>
				<input id= "inputUser" name="descricao" placeholder="descricao do Ganho" required autofocus />
			</div>
			<br>
			<p></p>
				<p>Valor (R$)</p>
			<div class="inputBox">
				<input id= "inputUser" name="preco" placeholder="0.00" required autofocus />
			</div>
			<br>
			<div id= "container-c">
	<div class="inpuBox">
			<input id= "submit" name="a" type="submit" value="Adicionar Ganho"/>
			</div>
	</div><!--CONTAINER-C-->
	<br>
			</fieldset>
				
	</div><!--CONTAINER-A-->
	
	
	</form>
</body>
</html>