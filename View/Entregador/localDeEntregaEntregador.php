<?php
	require_once '../../Model/Entregador/modelEntregador.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../');
	} else if (($_SESSION['cargoFuncionario'] != "Entregador") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../';
	</SCRIPT>");
	} 
	$rol = controlEntregador::buscarPorId(base64_decode($_GET['idPedidos']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Entregador</title>
	<link rel="stylesheet" href="css/stylelocalDeEntregaEntregador.css">
</head>
<body>
	<header>
		<h1>Local de entrega</h1>
	</header>
	<div class="link">
		<a href="homeEntregador.php"><img width="88px" src="../../img/home.png"/>Início</a>
	</div>
	<table border="1" collapse	>
		<thead>
			<tr>
				<th>Rua</th>
				<th>Número</th>
				<th>Bairro</th>
				<th>Complemento</th>
				<th>Ponto de referência</th>
				<th>Estado</th>
				<th>Cidade</th>
				<th>Telefone</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
				<tr>
					<td><?= $rol[8] ?></td>
					<td><?=  $rol[9] ?></td>
					<td><?= $rol[10] ?></td>
					<td><?= $rol[11] ?></td>
					<td><?= $rol[12] ?></td>
					<td><?= $rol[13] ?></td>
					<td><?= $rol[14] ?></td>
					<td><?= $rol[15] ?></td>
				
				
				</tr>
		
			
			
		</tbody>
	</table>
</body>
</html>