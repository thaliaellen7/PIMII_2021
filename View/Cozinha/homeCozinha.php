<?php
session_start();

if ($_SESSION['autenticado'] != true){
header('Location: ../../View/Login/homeLogin.php');
}
require_once '../../Model/Cozinha/modelCozinha.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Cozinha</title>
</head>
<body>
	<header>
		<h1>Cozinha</h1>
		<h2>Pedidos</h2>
	</header>
	<table border="1" collapse	>
		<thead>
			<tr>
				<th>N° do pedido</th>
				<th >Pedido</th>
				<th>Observação</th>
				<th>Horário</th>
				<th>Pedido pronto</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlCozinha::listarPedidosNovos() as $fila) { $data = explode('-', $fila[16], 2);  ?>
				
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?=nl2br($fila[3]); ?></td>
					<td><?= $fila[4] ?></td>
					<td><?= $data[1] ?></td>
					<td>
					<a href="../../Control/Cozinha/controlCozinha.php?a=EditarStatus&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deseja concluir o pedido?')"><img width="20px" src="../../img/tarefas-concluidas.png"/></a>
                    </td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>