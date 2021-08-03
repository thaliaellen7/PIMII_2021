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
		<textarea name="descricao" rows="10" cols="30"></textarea>
		<input name="observacao" placeholder="Observação" required autofocus />
		<input name="preco" placeholder="Preço" value="0.0" required autofocus />
		<select name="formaDePagamento" >
					<option value="Crédito">Crédito</option>
					<option value="Débito">Débito</option>
					<option value="Pix">Pix</option>
		</select>
		<select name="formaDeEntrega" required >
					<option value="Delivery">Delivery</option>
					<option value="Balcão">Balcão</option>
					<option value="Localmente">Localmente</option>
		</select>
		<input name="endereco" placeholder="Rua" required autofocus />
		<input name="numero" placeholder="Numero" required autofocus />
		<input name="bairro" placeholder="Bairro" required autofocus />
		<input name="complemento" placeholder="Complemento" required autofocus />
		<input name="pontoDeReferencia" placeholder="Ponto de referência" required autofocus />
		<input name="estado" placeholder="Estado" required autofocus />
		<input name="cidade" placeholder="Cidade" required autofocus />
		<input name="telefone" placeholder="Telefone" required autofocus />
		<input name="a" type="submit" value="Cadastrar" />
	</form>
</body>
</html>