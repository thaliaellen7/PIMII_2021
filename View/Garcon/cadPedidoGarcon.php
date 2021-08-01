<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8" />
	<title>Roles</title>
</head>
<body>
	<header>
		<h1>Roles</h1>
		<h2>Cadastrar</h2>
	</header>

	<form action="../../Control/Garcon/controlGarcon.php" method="post">
		<input name="nomeDoCliente" placeholder="Nome do cliente" required autofocus />
		<input name="descricao" placeholder="Descrição" required autofocus />
		<input name="observacao" placeholder="Observação" required autofocus />
		<input name="preco" placeholder="Preço" required autofocus />
		<input name="formaDePagamento" placeholder="Forma de Pagamento" required autofocus />
		<input name="formaDeEntrega" placeholder="Forma de Entrega" required autofocus />
		<input name="endereco" placeholder="Endereço" required autofocus />
		<input name="estado" placeholder="Estado" required autofocus />
		<input name="cidade" placeholder="Cidade" required autofocus />
		<input name="a" type="submit" value="Cadastrar" />
	</form>
</body>
</html>