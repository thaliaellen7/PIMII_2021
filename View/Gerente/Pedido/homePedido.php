<?php 
require_once '../../../Model/Gerente/Pedido/modelPedido.php';
header("refresh: 50;");
if ($_SESSION['autenticado'] != true){
	header('Location: ../../../');
	} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../../';
	</SCRIPT>");
	}  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Garçons</title>
	<link rel="stylesheet" href="css/stylehomePedido.css">
</head>

<body>

<header>
		<img  width="60px" height="70px" src="../../../img/logo.png"/>
		<h1>Lista de Pedidos</h1>
		<div id="link_logout">
          <a href="../../logout.php"><img title= "Sair do sistema" width="50px" src="../../../img/logout.png"/>
          <br> sair</a>
        </div>
</header>

	<div class="link_cadpedido">
		<a href="cadPedidoGerente.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/pedidos.png"/> <br> Adicionar Pedido</a>
	</div>

	<div class="link_inicio">
		<a href="../homeGerente.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/home.png"/> <br> Inicio</a>
	</div>

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do pedido</th>
				<th>Nome do cliente</th>
				<th >Descrição</th>
				<th>Observação</th>
				<th>Preço</th>
				<th>Forma de entrega</th>
				<th>Forma de Pagamento</th>
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
					<td><?= $fila[6] ?></td>
					<td><?= $fila[16] ?></td>
					<td><?= $fila[17] ?></td>
					<td>
						<a href="editPedidoGerente.php?idPedidos=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Pedido/controlPedido.php?a=excluir&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar pedido?')"><img width="30px" src="../../../img/excluir.png"/></a>
					</td>
					<td>
						<a href="localDeEntregaGerente.php?idPedidos=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../../img/mapa.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>