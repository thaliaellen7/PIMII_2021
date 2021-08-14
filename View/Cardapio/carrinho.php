<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Carrinho</title>
	<link rel="stylesheet" href="css/stylecarrinho.css">
	<style>
		#carrinho{
			display: block;
    margin-left: auto;
    margin-right: auto;
		}
		#texto{
			text-align: center;
		}
		</style>
</head>
<body>
	<header>
		<img  width="120px" height="140px" src="../../img/logo.png"/>
		<h1>Carrinho de Compras</h1>
		<div class="link_continuar">
			<a href="homeCardapio.php?idEmpresa=<?= $_GET['idEmpresa']?>&acaoItem=continuarComprando&nomeEmpresa=<?=$_GET['nomeEmpresa']?>"><img width="50px" src="../../img/produtos.png"/><h3>Continuar Comprando</h3></a>
		</div>
		<div class="link_continuar">
			<a href="cancelarCompra.php"><img width="50px" src="../../img/produtos.png"/><h3>Cancelar Compra</h3></a>
		</div>
	</header>
	<br>
	<table border="0" collapse>
		
		<tbody>
			<?php $total = 0; if(isset($_SESSION['carrinho'])){ echo"<thead>
			<tr>
				<th>pedido</th>
				<th>Quantidade</th>
				<th>Preço</th>
				<th>ação</th>
			</tr>
		</thead>"; foreach ($_SESSION['carrinho'] as $key => $value){ $total+= $value['quantidade'] * $value['preco']; ?>
				<tr>
					<td><?= $value['nome'] ?></td>
					<td> <?= $value['quantidade'] ?></td>
					<td><?= $value['preco'] ?></td>
					<td>
					<a href="../../Model/Cardapio/carrinho.php?acaoItem=remover&local=carrinho&idItem=<?=base64_encode($value['idProduto'])?>&nomeItem=<?=base64_encode($value['nome'])?>&precoItem=<?=base64_encode($value['preco'])?>&idEmpresa=<?=base64_encode($_GET['idEmpresa'])?>&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Retirar um item do carrinho?')"><img width="30px" src="../../img/menos.png"/></a>					
					<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&local=carrinho&idItem=<?=base64_encode($value['idProduto'])?>&nomeItem=<?=base64_encode($value['nome'])?>&precoItem=<?=base64_encode($value['preco'])?>&idEmpresa=<?=base64_encode($_GET['idEmpresa'])?>&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Adicionar um item ao carrinho?')"><img width="30px" src="../../img/mais.png"/></a>
					</td>
				</tr>
			<?php }} else{ echo'<img id="carrinho" width="10%" src="../../img/carrinho-vazio.png" /><br><h4 id="texto">Seu carrinho está vazio!</h4>';}?>
		</tbody>
	</table>
	<?php if(isset($_SESSION['carrinho'])){ echo"<h3>Valor Total R$ $total reais</h3>";} ?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php if(isset($_SESSION['carrinho'])){ echo'<div class="link_local">
		<a href="enderecoDeEntrega.php"> <img id="img" src="../../img/point.png" alt="point" width=	"50px" > <h3>Adicionar endereço para Concluir</h3> </a>
	</div>'; }?>
</body>
</html>