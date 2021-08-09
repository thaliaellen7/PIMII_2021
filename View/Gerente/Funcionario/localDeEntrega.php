<?php
	require_once '../../../Model/Gerente/Funcionario/modelFuncionario.php';
	$rol = controlFuncionario::buscarPorId(base64_decode($_GET['idFuncionario']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Funcionario</title>
</head>
<body>
	<header>
		<h1>Endereço</h1>
	</header>

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
					<td><?= $rol[7] ?></td>
					<td><?=  $rol[8] ?></td>
					<td><?= $rol[9] ?></td>
					<td><?= $rol[10] ?></td>
					<td><?= $rol[11] ?></td>
					<td><?= $rol[12] ?></td>
					<td><?= $rol[13] ?></td>
					<td><?= $rol[16] ?></td>
				
				
				</tr>
		
			
			
		</tbody>
	</table>
</body>
</html>