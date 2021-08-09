<?php require_once '../../../Model/Gerente/Pedido/modelPedido.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Garçons</title>
</head>
<body>
	<header>
		<h1>Lista de Pedidos</h1>

	</header>

	<a href="cadPedidoGerente.php">Ingresar nuevo</a>
	<a href="../../logout.php">logout</a>
	

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do pedido</th>
				<th>Nome do cliente</th>
				<th >Descrição</th>
				<th>Observação</th>
				<th>Preço</th>
				<th>Forma de entrega</th>
				<th>Data</th>
				<th>Status</th>
				<th colspan="4">Ações</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlPedido::listarPedidosConcluidos() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?=nl2br($fila[3]); ?></td>
					<td><?= $fila[4] ?></td>
					<td><?= $fila[5] ?></td>
					<td><?= $fila[7] ?></td>
					<td><?= $fila[16] ?></td>
					<td><?= $fila[17] ?></td>
					<td>
						<a href="editPedidoGerente.php?idPedidos=<?=base64_encode($fila[0])?>"><img width="20px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Pedido/controlPedido.php?a=excluir&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="20px" src="../../../img/excluir.png"/></a>
					</td>
					<td>
						<a href="localDeEntregaGerente.php?idPedidos=<?=base64_encode($fila[0])?>" ><img width="20px" src="../../../img/mapa.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>