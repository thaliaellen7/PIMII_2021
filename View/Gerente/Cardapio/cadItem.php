<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Adicionar item</title>
	<link rel="stylesheet" href="css/styleCadItem.css">
</head>
<body>
	
	<div id= "container-a">
		<fieldset>
			<legend><b>Adicionar Item</b></legend>
			<form action="../../../Control/Gerente/Financeiro/controlFinanceiro.php" method="post">
		<p>Nome</p>
		<input id="inputUser"name="nome" placeholder="Nome do Produto"  required autofocus />
		<p>Descrição</p>
		<textarea id="inputUsertext"name="descricao" placeholder="Descrição do produto" rows="10" cols="30"></textarea>
		<p>Preço</p>
		<input id="inputUser" name="preco" placeholder="Preço"  required autofocus />
		<p>Categoria</p>
		 <select id="inputUser" name="categoria" >
					<option value="Espetinhos" >Espetinhos</option>
					<option value="Sopas">Sopas</option>
					<option value="Sanduíches">Sanduíches</option>
		</select> 	
		<input id="submit"name="a" type="submit" value="Adicionar Item" />
	</form>
		</fieldset>
	
	</div>
</body>
</html>