<?php
	require_once '../../Model/Cliente/modelCliente.php';
	$rol = controlCliente::buscarPorId(base64_decode($_GET['idPedidos']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Garçons</title>
</head>
<body>
	<header>
		<h1>Local de entrega</h1>
		<h2>Listar</h2>
	</header>

	<table border="1" collapse	>
		<thead>
			<tr>
				<th colspan=2>Rua</th>
				<th>Número</th>
				<th>Bairro</th>
				<th  colspan=2>Complemento</th>
                
			</tr>
		</thead>
		<tbody>
				<tr>
					<td  colspan=2><?= $rol[8] ?></td>
					<td><?=  $rol[9] ?></td>
					<td><?= $rol[10] ?></td>
					<td colspan=2><?= $rol[11] ?></td>
				
				</tr>
		
                <tr>
				<th>Ponto de referência</th>
				<th>Estado</th>
				<th>Cidade</th>
				<th>Telefone</th>
				<!-- colspan="2" -->
			</tr>
			<tr>
				<td><?= $rol[12] ?></td>
				<td><?= $rol[13] ?></td>
				<td><?= $rol[14] ?></td>
				<td><?= $rol[15] ?></td>
				</tr>
		</tbody>
	</table>
</body>
</html>