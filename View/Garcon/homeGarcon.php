<?php 
require_once '../../Model/Garcon/modelGarcon.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../');
	} else if (($_SESSION['cargoFuncionario'] != "Garcom") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../';
	</SCRIPT>");
	} 
$rol = controlGarcon::buscarEmpresaPorId($_SESSION['idEmpresa']);
header("refresh: 50;");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
	<link rel="stylesheet" href="css/stylehomeGarson.css">
	<title>Garçons</title>
</head>

<body>

<header>
      <div class="nav">
        <img title= "Atualizar Pedido" width="60px" height="70px" src="../../img/logo.png"/>
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

<div class="pedidos">
	<h1>Pedidos Realizados</h1>
</div>

<div id="link_cadpedido">
	<a href="cadPedidoGarcon.php"><img title= "Atualizar Pedido" width="50px" src="../../img/pedidos.png"/> <br> Adicionar novo Pedido</a>
</div>



	<br>
	
	<table border= "1" collapse>
		<thead>
			<tr>
				<th>Nº do pedido</th>
				<th>Nome do cliente</th>
				<th >Descrição</th>
				<th>Observação</th>
				<th>Preço</th>
				<th>Forma de entrega</th>
				<th>Forma de pagamento</th>
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
					<td><?= $fila[6] ?></td>
					<td><?= $fila[7] ?></td>
					<td><?= $fila[16] ?></td>
					<td><?= $fila[17] ?></td>
					<td>
						<a href="editPedidoGarcon.php?idPedidos=<?=base64_encode($fila[0])?>"><img title= "Editar Pedido" width="30px" src="../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../Control/Garcon/controlGarcon.php?a=excluir&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar Pedido?')"><img title= "Excluir Pedido" width="30px" src="../../img/excluir.png"/></a>
					</td>
					<td>
						<a href="localDeEntregaGarcon.php?idPedidos=<?=base64_encode($fila[0])?>" ><img title= "Local de Entrega" width="30px" src="../../img/mapa.png"/></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
</body>
</html>