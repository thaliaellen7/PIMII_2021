<?php
	require_once '../../../Model/Gerente/Pedido/modelPedido.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../../');
		} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../../';
		</SCRIPT>");
		} 
	$rol = controlPedido::buscarPorId(base64_decode($_GET['idPedidos']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Garçons</title>
	<link rel="stylesheet" href="css/stylelocalDeEntregaGerente.css">
</head>
<body>
	<header>
		<div class="link">
				<a id= "link" href="homePedido.php"> <b><img width="100px" src="../../../img/back.png"/> <br>Voltar</b></a>
		</div>
		<div id="link_logout">
			<a href="../../logout.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/logout.png"/>
			<br> sair</a>
		</div>
		<h1>Endereço</h1>		
	</header>
	<br>
	<br>
	

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