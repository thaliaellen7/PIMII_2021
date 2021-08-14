<?php 
header("refresh: 50;");
require_once '../../Model/Entregador/modelEntregador.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../');
	} else if (($_SESSION['cargoFuncionario'] != "Entregador") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../';
	</SCRIPT>");
	} 

$rol = controlEntregador::buscarEmpresaPorId($_SESSION['idEmpresa']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Entregador</title>
	<link rel="stylesheet" href="css/stylehomeEntregador.css">
</head>
<body>

<header>
      <div class="nav">
        <img title= "Atualizar Pedido" width="80px" height="100px" src="../../img/logo.png"/>
        <div class="empresa">
		<p><?=$rol[0]?></p>
        </div>
        <div class="nome">
        <p><?php echo $_SESSION['nomeFuncionario'];?></p>
        </div>
        <div id="link_logout">
          <a href="../logout.php"><img title= "Atualizar Pedido" width="50px" src="../../img/logout.png"/>
          <br> sair</a>
        </div>
      </div>   
</header>

	<table border="1" collapse	>
		<thead>
			<tr>
				<th>N° do pedido</th>
				<th >Pedido</th>
				<th>Observação</th>
				<th>Horário</th>
				<th>Status</th>
				<th>Atualizar<br> Status</th>
				<th>Local de<br> entrega</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlEntregador::listarPedidosProntos() as $fila) { $data = explode('-', $fila[16], 2);  ?>
				
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?=nl2br($fila[3]); ?></td>
					<td><?= $fila[4] ?></td>
					<td><?= $data[1] ?></td>
					<td><?= $fila[17] ?></td>
					<td>
					<a href="../../Control/Entregador/controlEntregador.php?a=EditarStatus&idPedidos=<?=base64_encode($fila[0])?>&statusPedidos=<?=base64_encode($fila[17])?>" onclick="return confirm('Deseja definir o pedido como \'Entregue'?')"><img title = "Marcar pedido como Entregue" width="30px" src="../../img/tarefas-concluidas.png"/></a>
                    </td>
					<td>
						<a href="localDeEntregaEntregador.php?idPedidos=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../img/mapa.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>