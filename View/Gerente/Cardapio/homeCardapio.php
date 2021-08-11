<?php require_once '../../../Model/Gerente/Cardapio/modelCardapio.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Cardapio</title>
</head>
<body>
	<header>
		<h1>Cardápio</h1>

	</header>

	<a href="cadItem.php">Ingresar nuevo</a>
	<a href="../../logout.php">logout</a>
	

	<table border="1" collapse>
		<tbody>
			<?php foreach (controlFinanceiro::listarCategorias() as $fila) { 
				echo "<h3>$fila[0]</h3>";
                foreach (controlFinanceiro::listarItem($fila[0]) as $fila) { ?>
				
                <table>
             <tr>
					<td>Id Item: <?= $fila[0] ?></td>
					<td>Nome: <?= $fila[1] ?></td>
					<td>Descricao: <?=nl2br($fila[2]); ?></td>
					<td>Preço: <?= $fila[3] ?></td>
					<td>Preço: <?php if($fila[4] == 1){echo"disponível";}else{echo"indisponível";} ?></td>
					<td>
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=Disponivel&idItem=<?=base64_encode($fila[0])?>" onclick="return confirm('Deseja atualizar o status do pedido?')"><img width="20px" src="../../../img/comendo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=Indisponivel&idItem=<?=base64_encode($fila[0])?>" ><img width="20px" src="../../../img/sem-comida.png"/></a>
					</td>
					<td>
						<a href="editItem.php?idItem=<?=base64_encode($fila[0])?>"><img width="20px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=excluir&idItem=<?=base64_encode($fila[0])?>" onclick="return confirm('¿Desea eliminar?')"><img width="20px" src="../../../img/excluir.png"/></a>
					</td>
					
        </tr>
        </table>
				
		<?php	}} ?>
			
			
		</tbody>
	</table>
</body>
</html>