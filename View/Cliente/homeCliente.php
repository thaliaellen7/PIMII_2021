<?php require_once '../../Model/Cliente/modelCliente.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Clientes</title>
</head>
<body>
	<header>
		<h1>Carrinho</h1>
		<h1>Lista de Empresas</h1>
	</header>
	<table border="1" collapse>
		<thead>
			<tr>
				<th>Logo</th>
				<th>Nome da Empresa</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlCliente::listarEmpresas() as $fila) { ?>
				<tr>
					<td><?= $fila[11] ?></td>
					<td><a href = "../Cardapio/homeCardapio.php?idEmpresa=<?=$fila[0]?>" ><?= $fila[1] ?></a></td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>