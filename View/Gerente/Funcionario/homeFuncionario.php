<?php require_once '../../../Model/Gerente/Funcionario/modelFuncionario.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Funcionario</title>
</head>
<body>
	<header>
		<h1>Lista de Funcionários</h1>

	</header>

	<a href="cadFuncionario.php">Ingresar nuevo</a>
	<a href="../../logout.php">logout</a>
	

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do Funcionario</th>
				<th>Nome</th>
				<th>Cargo</th>
				<th>Salário</th>
				<th>Admissão</th>
				<th colspan="4">Ações</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlFuncionario::listarFuncionarioAtivo() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[5] ?></td>
					<td><?= $fila[6] ?></td>
					<td><?= $fila[14] ?></td>
					<td>
						<a href="editFuncionario.php?idFuncionario=<?=base64_encode($fila[0])?>"><img width="20px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Funcionario/controlFuncionario.php?a=excluir&idFuncionario=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="20px" src="../../../img/excluir.png"/></a>
					</td>
					<td>
						<a href="localDeEntrega.php?idFuncionario=<?=base64_encode($fila[0])?>" ><img width="20px" src="../../../img/mapa.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>