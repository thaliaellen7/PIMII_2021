<?php 
require_once '../../../Model/Gerente/Funcionario/modelFuncionario.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../');
	} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
        session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../';
	</SCRIPT>");
	} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Funcionario</title>
	<link rel="stylesheet" href="css/stylehomeFuncionario.css">
</head>
<body>
	<header>
		<img  width="60px" height="70px" src="../../../img/logo.png"/>
		<h1>Lista de Funcionários</h1>
		<div id="link_logout">
		<a href="../../logout.php"><img title= "Sair do sistema" width="50px" src="../../../img/logout.png"/>
          <br> sair</a>
        </div>
	</header>


	<div class="link_cadfuncionario">
		<a href="cadFuncionario.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/funcionário.png"/> <br> Cadastrar Funcionário</a>
	</div>

	<div class="link_inicio">
		<a href="../homeGerente.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/home.png"/> <br> Inicio</a>
	</div>
	

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do Funcionario</th>
				<th>Nome</th>
				<th>Cargo</th>
				<th>Salário</th>
				<th>Admissão</th>
				<th colspan="4">Ações</th>
				<!-- colspan="2" -->
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlFuncionario::listarFuncionarioAtivo() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[5] ?></td>
					<td><?= $fila[6] ?></td>
					<td><?= $fila[14] ?></td>
					<td>
						<a href="editFuncionario.php?idFuncionario=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Funcionario/controlFuncionario.php?a=excluir&idFuncionario=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar Funcionário?')"><img width="30px" src="../../../img/excluir.png"/></a>
					</td>
					<td>
						<a href="localDeEntrega.php?idFuncionario=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../../img/mapa.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>