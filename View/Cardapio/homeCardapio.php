<?php
 require_once '../../Model/Cardapio/modelCardapio.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<h1>Carrinho
	<?php $qttItens = 0 ; 
		if(isset($_SESSION['carrinho'])){
			foreach ($_SESSION['carrinho'] as $key => $value){
				$qttItens += $value['quantidade'];
				}
		} else { $qttItens = 0;}
		 echo $qttItens;?>
	</h1>
	<title>Cardápio</title>
</head>
<body>
	<header>
		<h1>Cardápio  <?= $_GET['nomeEmpresa']?></h1>
		<a href="carrinho.php?nomeEmpresa=<?= $_GET['nomeEmpresa']?>&idEmpresa=<?= $_GET['idEmpresa']?>"><h1>Carrrinho</h1></a>
	</header>
	<table border="1" collapse>
		<tbody>
			<?php $titulo = 0; foreach (controlCardapio::listarSanduiche($_GET['idEmpresa']) as $fila) {
				if( $fila != "not found" ) { $titulo++; if($titulo == 1){ echo "<br>Sanduíche";}?>
				<tr>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
					<td><?= $fila[5] ?></td>
					
				<td>
						<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&idItem=<?=base64_encode($fila[0])?>&nomeItem=<?=base64_encode($fila[2])?>&precoItem=<?=base64_encode($fila[5])?>&idEmpresa=<?=base64_encode($fila[1])?>&local=cardapio&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/adicionar.png"/></a>
					</td>
				</tr>
			<?php } } ?>
		</tbody>
	</table>
	<table border="1" collapse>
		<tbody>
			<?php $titulo = 0; foreach (controlCardapio::listarSopa($_GET['idEmpresa']) as $fila) { 
				if( $fila != "not found" ) { $titulo++; if($titulo == 1){ echo "<br>Sopas";}?>
				<tr>
					<td><?= $fila[1] ?></td>
					<td><?= $fila[2] ?></td>
					<td><?= $fila[3] ?></td>
					<td><?= $fila[5] ?></td>
					
				<td>
				<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&idItem=<?=base64_encode($fila[0])?>&nomeItem=<?=base64_encode($fila[2])?>&precoItem=<?=base64_encode($fila[5])?>&idEmpresa=<?=base64_encode($fila[1])?>&local=cardapio&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/adicionar.png"/></a>
					</td>
				</tr>
			<?php } } ?>
		</tbody>
	</table>
</body>
</html>