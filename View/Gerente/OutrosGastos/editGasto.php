<?php
	require_once '../../../Model/Gerente/OutrosGastos/modelOutrosGastos.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../../');
		} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../../';
		</SCRIPT>");
		} 

	$rol = controlOutrosGastos::buscarPorId(base64_decode($_GET['idGasto']));
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8" />
	<title>Roles</title>
	<link rel="stylesheet" href="css/styleeditOutrosGastos.css">
</head>
<body>
	<div id= "container-a">
		<form action="../../../Control/Gerente/OutrosGastos/controlOutrosGastos.php" method="post">
        <fieldset>
			<legend><b>Adicionar Gasto</b></legend>
			<input type="hidden" name="idGasto" value="<?= $_GET['idGasto'] ?>" />
			<br>
			<div class="inputBox">
				<p>Descrição</p>
                <input id= "inputUser" name="descricao" placeholder="descricao do gasto" value="<?= $rol[2] ?>" required autofocus />
			</div>
			<br>
			<p></p>
				<p>Valor (R$)</p>
			<div class="inputBox">
				<input id= "inputUser" name="preco" placeholder="0.00" value="<?= $rol[3] ?>" required autofocus />
			</div>
			<br>
			<div id= "container-c">
	<div class="inpuBox">
			<input id= "submit" name="a" type="submit" value="Editar Gasto"/>
			<br>
			<br>
			</div>
	</div><!--CONTAINER-C-->
			</fieldset>
				
	</div><!--CONTAINER-A-->
	
	
	</form>
</body>
</html>