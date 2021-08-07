<?php require_once '../../Model/Cliente/modelCliente.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Clientes </title>
</head>
<body>
	<header>
	<form action="pesquisarPedido.php" method="post">
  <label for="fname">Pesquisar seu Pedido:</label><br>
  <input type="text" id="fname" placeholder="Insira seu N° de telefone" name="pTelefone" ><br>
  <input type="submit" value="pesquisar">
</form> 
		<h1>Carrinho 
		<?php $qttItens = 0 ; 
		if(isset($_SESSION['carrinho'])){
			foreach ($_SESSION['carrinho'] as $key => $value){
				$qttItens += $value['quantidade'];
				}
		} else { $qttItens = 0;}
		 echo $qttItens;?>
			 </h1>
		<h1>Lista de Empresas</h1>
	</header>
	<table border="1" collapse>
		<thead>
			<tr>
				<th>Logo</th>
				<th>Nome da Empresa</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach (controlCliente::listarEmpresas() as $fila) { $_SESSION['nomeEmpresaUtilizada']=$fila[1]; ?>
				<tr>
					<td><?= $fila[11] ?></td>
					<td><a href = "../Cardapio/homeCardapio.php?idEmpresa=<?=$fila[0]?>&nomeEmpresa=<?=$fila[1]?>" ><?= $fila[1] ?></a></td>
				</tr>
			<?php } ?>
			
			
		</tbody>
	</table>
</body>
</html>