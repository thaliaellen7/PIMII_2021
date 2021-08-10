<?php
	require_once '../../../Model/Gerente/OutrosGanhos/modelOutrosGanhos.php';
	$rol = controlOutrosGanhos::buscarPorId(base64_decode($_GET['idGanho']));
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8" />
	<title>Roles</title>
</head>
<body>
	<header>
		<h1>Roles</h1>
		<h2>Editar</h2>
	</header>
	<div id= "container-a">
		<form action="../../../Control/Gerente/OutrosGanhos/controlOutrosGanhos.php" method="post">
        <fieldset>
			<legend><b>Adicionar Ganho</b></legend>
			<input type="hidden" name="idGanho" value="<?= $_GET['idGanho'] ?>" />
			<br>
			<div class="inputBox">
				<p>Descrição</p>
                <input id= "inputUser" name="descricao" placeholder="descricao do Ganho" value="<?= $rol[2] ?>" required autofocus />
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
			<input id= "submit" name="a" type="submit" value="Editar Ganho"/>
			</div>
	</div><!--CONTAINER-C-->
			</fieldset>
				
	</div><!--CONTAINER-A-->
	
	
	</form>
</body>
</html>