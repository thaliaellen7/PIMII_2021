<?php require_once '../../../Model/Gerente/Cardapio/modelCardapio.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Cardapio</title>
	<link rel="stylesheet" href="css/stylehomeCardapio.css">
</head>
<body>
	<header>
		<img title= "Atualizar Pedido" width="60px" height="70px" src="../../../img/logo.png"/>
		<h1>Cardápio</h1>
		<div id="link_logout">
          <a href="../logout.php"><img title= "Atualizar Pedido" width="50px" src="../../../img/logout.png"/>
          <br> sair</a>
        </div>
	</header>
	<div class="link_cadproduto">
		<a href="cadItem.php"><img title= "Atualizar Pedido" width="40px" src="../../../img/produtos+.png"/> <br> Cadastrar Item</a>
	</div>

	<div class="link_inicio">
		<a  href="../homeGerente.php"><img title= "Atualizar Pedido" width="40px" src="../../../img/home.png"/> <br> Início</a>
	</div>
	
		<table>			
				<tr>
					<th colspan="9">
					<?php foreach (controlFinanceiro::listarCategorias() as $fila) { 
					echo "
					<tr>
					<th colspan='9'>$fila[0]</th>
					<tr>
					<tr>
					<th>ID</th>
					<th>nome</th>
					<th>descrição</th>
					<th>preço</th>
					<th>disponibilidade</th>
					<th>Tornar Disponível</th>
					<th>Tornar Indiponível</th>
					<th>editar</th>
					<th>deletar</th>
				</tr>
					";
					foreach (controlFinanceiro::listarItem($fila[0]) as $fila) { ?>
					</th>
				</tr>
			<tbody>
				<tr>
					<td><?= $fila[0] ?></td>
					<td><?= $fila[1] ?></td>
					<td><?=nl2br($fila[2]); ?></td>
					<td><?= $fila[3] ?></td>
					<td>
						<?php if($fila[4] == 1){echo"disponível";}else{echo"indisponível";} ?>
					</td>
					<td>
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=Disponivel&idItem=<?=base64_encode($fila[0])?>"><img width="40px" src="../../../img/comendo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=Indisponivel&idItem=<?=base64_encode($fila[0])?>" ><img width="30px" src="../../../img/sem-comida.png"/></a>
					</td>
					<td>
						<a href="editItem.php?idItem=<?=base64_encode($fila[0])?>"><img width="30px" src="../../../img/editar-arquivo.png"/></a>
					</td>
					<td>
						<a href="../../../Control/Gerente/Financeiro/controlFinanceiro.php?a=excluir&idItem=<?=base64_encode($fila[0])?>" onclick="return confirm('Apagar Item')"><img width="30px" src="../../../img/excluir.png"/></a>
					</td>
				</tr>
			</tbody>	
		<?php	}echo"<tr>&nbsp</tr>";} ?>
	</table>
</body>
</html>