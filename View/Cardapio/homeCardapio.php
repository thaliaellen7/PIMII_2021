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
	<?php foreach (controlCardapio::listarCategorias($_GET['idEmpresa']) as $fila) { 
				echo "<h3>$fila[0]</h3>";
                foreach (controlCardapio::listarItem($fila[0], $_GET['idEmpresa']) as $fila) { ?>
				
                <table>
             <tr>
					<td>Nome: <?= $fila[1] ?></td>
					<td>Descricao: <?=nl2br($fila[2]); ?></td>
					<td>Preço: <?= $fila[3] ?></td>
					<td>
						<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&idItem=<?=base64_encode($fila[0])?>&nomeItem=<?=base64_encode($fila[1])?>&precoItem=<?=base64_encode($fila[3])?>&idEmpresa=<?=base64_encode($fila[4])?>&local=cardapio&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../img/adicionar.png"/></a>
					</td>
					
        </tr>
        </table>
				
		<?php	}} ?>
</body>
</html>