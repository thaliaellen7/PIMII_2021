<?php require_once '../../../Model/Gerente/OutrosGastos/modelOutrosGastos.php';
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
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title>Outros Gastos</title>
	<link rel="stylesheet" href="css/stylehomeOutrosGastos.css">
</head>
<body>
<header>
		<img  width="60px" height="70px" src="../../../img/logo.png"/>
		<h1>Gastos Extras</h1>
		<div id="link_logout">
          <a href="../../logout.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/logout.png"/>
          <br> sair</a>
        </div>
</header>

	
	<div class="link_inicio">
			<a  href="../homeGerente.php"> <img src="../../../img/home.png" alt="logout" width="50px"> <br> <b>Inicio</b></a>
		</div>
		<div class="link_cadpedido">
			<a href="cadOutrosGastos.php"><img width="60px" src="../../../img/gastos.png"/> <br>  <b>Adicionar Gasto</b> </a>
		</div>
	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do Gasto</th>
				<th>Descrição</th>
				<th>Valor(R$)</th>
				<th>Data</th>
				<th colspan="3">Ações</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlOutrosGastos::listarGastos() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
					<td><?= $fila[4] ?></td>
					<td>
						<a href="editGasto.php?idGasto=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/OutrosGastos/controlOutrosGastos.php?a=excluir&idGasto=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="30px" src="../../../img/excluir.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>