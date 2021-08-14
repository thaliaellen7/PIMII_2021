<?php
 require_once '../../Model/Cardapio/modelCardapio.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Cardápio</title>
	<link rel="stylesheet" href="css/stylehomeCardapio.css">
</head>
<body>
	<div class="header">
	<img  width="120px" height="140px" src="../../img/logo.png"/>
			<h1>Cardápio  <?= $_GET['nomeEmpresa']?></h1>
					<div class="link_concluir">
					<a href="carrinho.php?nomeEmpresa=<?= $_GET['nomeEmpresa']?>&idEmpresa=<?= $_GET['idEmpresa']?>"> <img src="../../img/adicionar.png" alt="carinho" width= "100px"> <h3>Concluir</h3></a>
					</div>
					<h2>
					<?php $qttItens = 0; 
					if(isset($_SESSION['carrinho'])){
						foreach ($_SESSION['carrinho'] as $key => $value){
							$qttItens += $value['quantidade'];
							}
					} else { $qttItens = 0;}
								echo $qttItens;?>
					</h2>
	</div>
	<br>
	<br>
	<?php foreach (controlCardapio::listarCategorias($_GET['idEmpresa']) as $fila) { 
	echo "<table><div>&nbsp<div><h3>$fila[0]</h3> 
	
		<tr>
			<th>Tipo</th>
			<th>Descrição</th>
			<th>Preço</th>
			<th>ação</th>
		</tr>
	";
	foreach (controlCardapio::listarItem($fila[0], $_GET['idEmpresa']) as $fila) { ?>	
               
					<tbody>
						<tr>
							<td id="td_1"><?= $fila[1] ?></td>
							<td id="td_2"><?=nl2br($fila[2]); ?></td>
							<td id="td_3"><?= $fila[3] ?></td>
							<td id="td_4">
								<a href="../../Model/Cardapio/carrinho.php?acaoItem=adicionar&idItem=<?=base64_encode($fila[0])?>&nomeItem=<?=base64_encode($fila[1])?>&precoItem=<?=base64_encode($fila[3])?>&idEmpresa=<?=base64_encode($fila[4])?>&local=cardapio&nomeEmpresa=<?=base64_encode($_GET['nomeEmpresa'])?>" onclick="return confirm('Deseja adicionar este item ao carrinho?')"><img width="30px" src="../../img/adicionar.png"/></a>
							</td>
						</tr>

					
				<br>	
		<?php	}} ?>
		</tbody>		
        		</table>
</body>
</html>