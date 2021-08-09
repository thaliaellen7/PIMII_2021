<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/stylecadPedidoProduto.css">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
		<form action="../../../Control/Gerente/Produto/controlProduto.php" method="post">
			<fieldset>
			<legend><b>Adicionar Produto</b></legend>
			<br>
			<div class="inputBox">
				<p>Nome do Produto</p>
				<input id= "inputUser" name="nome" placeholder="Nome do Produto" required autofocus />
			</div>
			<div class="inputBox">
				<p>Qtd Total</p>
				<input id= "inputUser" type="number" name="quantidadeTotal" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Qtd Utilizada</p>
				<input id= "inputUser" type="number" name="quantidadeUtilizada"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Valor Total</p>
				<input id= "inputUser" name="valorTotal" placeholder="Valor Total"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Fornecedor</p>
				<input id= "inputUser" name="fornecedor" placeholder="Fornecedor"  required autofocus />
			</div>
			<br>
			</fieldset>
				
	</div><!--CONTAINER-A-->
	<div id= "container-c">
	<div class="inpuBox">
			<input id= "submit" name="a" type="submit" value="Adicionar"/>
			</div>
	</div><!--CONTAINER-C-->
	</form>
</body>
</html>