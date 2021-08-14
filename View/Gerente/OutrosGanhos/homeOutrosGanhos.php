<?php require_once '../../../Model/Gerente/OutrosGanhos/modelOutrosGanhos.php';
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
	<title>Outros Ganhos</title>
	<link rel="stylesheet" href="css/stylehomeOutrosGanhos.css">
</head>
<body>
<header>
		<img  width="60px" height="70px" src="../../../img/logo.png"/>
		<h1>Ganhos Extras</h1>
		<div id="link_logout">
          <a href="../../logout.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/logout.png"/>
          <br> sair</a>
        </div>
</header>

	<a href="cadOutrosGanhos.php">Ingresar nuevo</a>
	<a href="../../logout.php">logout</a>
	
	<div class="link_inicio">
			<a  href="../homeGerente.php"> <img src="../../../img/home.png" alt="logout" width="50px"> <br><b>Inicio</b></a>
	</div>
	<div class="link_cadpedido">
		<a href="cadOutrosGanhos.php"><img width="50px" src="../../../img/ganhos.png"/> <br>  <b>Adicionar Ganhos</b> </a>
	</div>

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do Ganho</th>
				<th>Descrição</th>
				<th>Valor(R$)</th>
				<th>Data</th>
				<th colspan="3">Ações</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlOutrosGanhos::listarGanhos() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
					<td><?= $fila[4] ?></td>
					<td>
						<a href="editGanho.php?idGanho=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/OutrosGanhos/controlOutrosGanhos.php?a=excluir&idGanho=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar Ganho?')"><img width="30px" src="../../../img/excluir.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>