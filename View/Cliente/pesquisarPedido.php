<?php require_once '../../Model/Cliente/modelCliente.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Pesquisar</title>
</head>
<body>
	<header>
		<h1>Lista de Pedidos</h1>

	</header>

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do pedido</th>
				<th>Nome do cliente</th>
				<th>Descrição</th>
				<th>Observação</th>
				<th>Preço</th>
				<th>Forma de Entrega</th>
				<th>Data</th>
				<th>Status</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlCliente::listarPedidos($_POST['pTelefone']) as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?=nl2br($fila[3]); ?></td>
					<td><?= $fila[4] ?></td>
					<td><?= $fila[5] ?></td>
					<td><?= $fila[6] ?></td>
					<td><?= $fila[16] ?></td>
					<td><?= $fila[17] ?></td>
				</tr>
				<tr>
					<td colspan="8">Endereço</td>
				</tr>
				<tr>
				<th colspan=2>Rua</th>
				<th>Número</th>
				<th>Bairro</th>
				<th  colspan=2>Complemento</th>
				<th  colspan=2>Forma de Pagamento</th>
			</tr>
			<tr>
					<td  colspan=2><?= $fila[8] ?></td>
					<td><?=  $fila[9] ?></td>
					<td><?= $fila[10] ?></td>
					<td colspan=2><?= $fila[11] ?></td>
					<td colspan=2><?= $fila[7] ?></td>
				
				</tr>
				<tr>
				<th colspan=3>Ponto de referência</th>
				<th>Estado</th>
				<th colspan=2>Cidade</th>
				<th colspan=2>Telefone</th>
			</tr>
			<tr>
					<td colspan=3><?= $fila[12] ?></td>
					<td><?= $fila[13] ?></td>
					<td colspan=2><?= $fila[14] ?></td>
					<td colspan=2><?= $fila[15] ?></td>
					
				</tr>
			<?php } ?>
			
			
		</tbody>
		
	</table>
	
</body>
</html>