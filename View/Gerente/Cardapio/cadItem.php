<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
	<form action="../../../Control/Gerente/Financeiro/controlFinanceiro.php" method="post">
		
		<input name="nome" placeholder="Nome do Produto"  required autofocus />
		<textarea name="descricao" placeholder="Descrição do produto" rows="10" cols="30"></textarea>
		<input name="preco" placeholder="Preço"  required autofocus />
		 <select name="categoria" >
					<option value="Espetinhos" >Espetinhos</option>
					<option value="Sopas">Sopas</option>
					<option value="Sanduíches">Sanduíches</option>
		</select> 
		
		<input name="a" type="submit" value="Adicionar Item" />
	</form>
</body>
</html>