<?php require_once '../../../Model/Gerente/Produto/modelProduto.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Produtos</title>
</head>
<body>
	<header>
		<h1>Lista de Produtos do mês</h1>

	</header>

	<a href="cadPedidoProduto.php">Ingresar nuevo</a>
	<a href="../../logout.php">logout</a>
	

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do Produto</th>
				<th>Nome</th>
				<th>Qtd Total</th>
				<th>Qtd Utilizada</th>
				<th>Valor Total</th>
				<th>Data de cadastro</th>
				<th>Fornecedor</th>
				<th colspan="2">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlProduto::listarProdutosMes() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[5] ?></td>
					<td><?= $fila[6] ?></td>
					<td><?= $fila[4] ?></td>
					<td><?= $fila[3] ?></td>
					<td><?= $fila[7] ?></td>
					<td>
						<a href="editPedidoProduto.php?idEstoque=<?=base64_encode($fila[0])?>"><img width="20px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Produto/controlProduto.php?a=excluir&idEstoque=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="20px" src="../../../img/excluir.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>