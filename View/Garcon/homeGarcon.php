<?php require_once '../../Model/Garcon/modelGarcon.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Garçons</title>
</head>
<body>
	<header>
		<h1>Roles</h1>
		<h2>Listar</h2>
	</header>

	<a href="cadPedidoGarcon.php">Ingresar nuevo</a>
	

	<table border="1" collapse	>
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
			<?php foreach (controlGarcon::listarPedidosConcluidos() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?=nl2br($fila[3]); ?></td>
					<td><?= $fila[4] ?></td>
					<td><?= $fila[5] ?></td>
					<td><?= $fila[7] ?></td>
					<td><?= $fila[16] ?></td>
					<td>
					<select id="status" >
					<option value="Novo" 
					<?php if ($fila[17] == "Novo"){
					echo 'selected="selected"'; 
					}?>>Novo</option>
					<option value="Pronto" 
					<?php if ($fila[17] == "Pronto"){
					echo 'selected="selected"'; 
					}?>>Pronto</option>
					<option value="Entregue"
					<?php if ($fila[17] == "Entregue"){
					echo 'selected="selected"'; 
					}?>
					>Entregue</option>
					<option value="Concluido"
					<?php if ($fila[17] == "Concluido"){
					echo 'selected="selected"'; 
					}?>
					>Concluído</option>
					</select>
			<? $myvar = document.getElementById("status").value; ?>
				</td>
				<td>
						<a href="../../Control/Garcon/controlGarcon.php?a=EditarStatus&idPedidos=<?=base64_encode($fila[0])?>&status=status" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/atualizar.png"/></a>
					</td>
					<td>
						<a href="editPedidoGarcon.php?idPedidos=<?=base64_encode($fila[0])?>"><img width="20px" src="../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../Control/Garcon/controlGarcon.php?a=excluir&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="20px" src="../../img/excluir.png"/></a>
					</td>
					<td>
						<a href="localDeEntregaGarcon.php?idPedidos=<?=base64_encode($fila[0])?>" ><img width="20px" src="../../img/mapa.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>