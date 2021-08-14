<?php require_once '../../../Model/Gerente/Produto/modelProduto.php';
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
	<title>Produtos</title>
	<link rel="stylesheet" href="css/stylehomeProduto.css">
</head>
<body>
	<header>
		<img title= "Atualizar Pedido" width="60px" height="70px" src="../../../img/logo.png"/>
		<h1>Lista de Produtos do mês</h1>
		<div id="link_logout">
		<a href="../../logout.php"><img title= "Sair do sistema" width="50px" src="../../../img/logout.png"/>
          <br> sair</a>
        </div>
	</header>

	<div class="link_cadpedido">
		<a href="cadPedidoProduto.php"><img title= "Atualizar Pedido" width="40px" src="../../../img/produtos+.png"/> <br> Cadastrar Produto</a>
	</div>

	<div class="link_inicio">
		<a  href="../homeGerente.php"><img title= "Atualizar Pedido" width="40px" src="../../../img/home.png"/> <br> Início</a>
	</div>	

	<table border="1" collapse>
		<thead>
			<tr>
				<th>Id do Produto</th>
				<th>Nome</th>
				<th>Qtd Total</th>
				<th>Qtd Utilizada</th>
				<th>Valor Total</th>
				<th>Data de cadastro</th>
				<th>Fornecedor</th>
				<th colspan="2">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlProduto::listarProdutosMes() as $fila) { ?>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[5] ?></td>
					<td><?= $fila[6] ?></td>
					<td><?= $fila[4] ?></td>
					<td><?= $fila[3] ?></td>
					<td><?= $fila[7] ?></td>
					<td>
						<a href="editPedidoProduto.php?idEstoque=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Produto/controlProduto.php?a=excluir&idEstoque=<?=base64_encode($fila[0])?>" onclick="return confirm('Deletar produto?')"><img width="30px" src="../../../img/excluir.png"/></a>
					</td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>