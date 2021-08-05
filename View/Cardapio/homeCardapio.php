<?php
 require_once '../../Model/Cardapio/modelCardapio.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<h1>Carrinho</h1>
	<title>Cardápio</title>
</head>
<body>
	<header>
		<h1>Cardápio</h1>
	</header>
	<table border="1" collapse>
		<tbody>
			<?php foreach (controlCardapio::listarSanduiche($_GET['idEmpresa']) as $fila) { 
				if( $fila != "not found" ) {
					 echo "Sanduíche"; ?>
				<tr>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[4] ?></td>
					
				<td>
						<a href="../../Control/Cardapio/controlCardapio.php?a=EditarStatus&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/adicionar.png"/></a>
					</td>
				</tr>
			<?php } } ?>
		</tbody>
	</table>
	<table border="1" collapse>
		<tbody>
			<?php foreach (controlCardapio::listarSopa($_GET['idEmpresa']) as $fila) { 
				if( $fila != "not found" ) {
					 echo "Sopas"; ?>
				<tr>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[4] ?></td>
					
				<td>
						<a href="../../Control/Cardapio/controlCardapio.php?a=EditarStatus&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/adicionar.png"/></a>
					</td>
				</tr>
			<?php } } ?>
		</tbody>
	</table>
</body>
</html>