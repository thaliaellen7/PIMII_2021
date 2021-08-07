<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Carrinho</title>
</head>
<body>
	<header>
	<a href="homeCardapio.php?idEmpresa=<?= $_GET['idEmpresa']?>&acaoItem=continuarComprando&nomeEmpresa=<?=$_GET['nomeEmpresa']?>"><h1>Continuar comprando</h1></a>
		<h1>Carrinho</h1>
	</header>
	<table border="0" collapse>
		<tbody>
		
			<?php $total = 0; foreach ($_SESSION['carrinho'] as $key => $value){ $total+= $value['quantidade'] * $value['preco']; ?>
				<tr>
					<td colspan="2">Item: <?= $value['nome'] ?></td>
				<td>
				<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&local=carrinho&idItem=<?=base64_encode($value['idProduto'])?>&nomeItem=<?=base64_encode($value['nome'])?>&precoItem=<?=base64_encode($value['preco'])?>&idEmpresa=<?=base64_encode($_GET['idEmpresa'])?>&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/adicionar.png"/></a>
						
					</td>
				</tr>
				<td>Quantidade: <?= $value['quantidade'] ?></td>
					<td>Preço: <?= $value['preco'] ?></td>
					<td>
					<a href="../../Model/Cardapio/carrinho.php?acaoItem=remover&local=carrinho&idItem=<?=base64_encode($value['idProduto'])?>&nomeItem=<?=base64_encode($value['nome'])?>&precoItem=<?=base64_encode($value['preco'])?>&idEmpresa=<?=base64_encode($_GET['idEmpresa'])?>&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/menos.png"/></a>
					</td>
					<tr></tr>
				<tr>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<h3>Valor Total R$ <?= $total ?> reais</h3>
	<a href="enderecoDeEntrega.php"><h1>adicionar endereço de entrega</h1></a>
</body>
</html>