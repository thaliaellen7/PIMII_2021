<?php
header("refresh: 50;");
require_once '../../Model/Cozinha/modelCozinha.php';
if ($_SESSION['autenticado'] != true){
header('Location: ../../');
} else if (($_SESSION['cargoFuncionario'] != "Cozinheiro(a)") && ($_SESSION['autenticado'] == true)){
	session_destroy();
	echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Você não tem permissão para acessar esta página!');
window.location.href='../../';
</SCRIPT>");
} 
$rol = controlCozinha::buscarEmpresaPorId($_SESSION['idEmpresa']);
 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8" />
	<title>Cozinha</title>
	<link rel="stylesheet" href="css/stylehomeCozinha.css">
</head>

<body>
	<header>
		<h1>Cozinha</h1>
		<p><?=$rol[0]?></p>

	</header>
	<div class="link">
			<a id= "link" href="../logout.php"> <img title= "Atualizar Pedido" width="50px" src="../../img/logout.png"/> Sair</a>
	</div>
	<div class="sub">
		<img width="85px" src="../../img/preparar.png"/>
	</div>

	<table border="1" collapse	>
		<thead>
			<tr>
				<th>N° do pedido</th>
				<th>Pedido</th>
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
					<a href="../../Control/Cozinha/controlCozinha.php?a=EditarStatus&idPedidos=<?=base64_encode($fila[0])?>" onclick="return confirm('Deseja concluir o pedido?')"><img title= "Concluir Pedido" width="30px" src="../../img/tarefas-concluidas.png"/></a>
                    </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>