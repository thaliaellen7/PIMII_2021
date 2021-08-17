<?php require_once '../../../Model/Gerente/OutrosGastos/modelOutrosGastos.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../../');
	} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../../';
	</SCRIPT>");
	}  ?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/stylecadOutrosGastos.css">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
		<form action="../../../Control/Gerente/OutrosGastos/controlOutrosGastos.php" method="post">
			<fieldset>
			<legend><b>Adicionar Gasto</b></legend>
			<br>
			<div class="inputBox">
				<p>Descrição</p>
				<input id= "inputUser" name="descricao" placeholder="descricao do gasto" required autofocus />
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
			<input id= "submit" name="a" type="submit" value="Adicionar Gasto"/>
			<br>
			<br>
			</div>
	</div><!--CONTAINER-C-->
			</fieldset>
				
	</div><!--CONTAINER-A-->
	
	
	</form>
</body>
</html>