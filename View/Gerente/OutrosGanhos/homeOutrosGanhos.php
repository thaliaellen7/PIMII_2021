<?php require_once '../../../Model/Gerente/OutrosGanhos/modelOutrosGanhos.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Outros Ganhos</title>
</head>
<body>
	<header>
		<h1>Lista de Outros Ganhos</h1>

	</header>

	<a href="cadOutrosGanhos.php">Ingresar nuevo</a>
	<a href="../../logout.php">logout</a>
	

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do Ganho</th>
				<th>Descrição</th>
				<th>Valor(R$)</th>
				<th>Data</th>
				<th colspan="3">Ações</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlOutrosGanhos::listarGanhos() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
					<td><?= $fila[4] ?></td>
					<td>
						<a href="editGanho.php?idGanho=<?=base64_encode($fila[0])?>"><img width="20px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/OutrosGanhos/controlOutrosGanhos.php?a=excluir&idGanho=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="20px" src="../../../img/excluir.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>