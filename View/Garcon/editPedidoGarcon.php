<?php
	require_once '../../Model/Garcon/modelGarcon.php';
	$rol = controlGarcon::buscarPorId(base64_decode($_GET['idPedidos']));
	print $rol[2];
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8" />
	<title>Roles</title>
</head>
<body>
	<header>
		<h1>Roles</h1>
		<h2>Editar</h2>
	</header>
	<form action="../../Control/Garcon/controlGarcon.php" method="post">
		<input type="hidden" name="idPedidos" value="<?= $_GET['idPedidos'] ?>" />
        <input name="nomeDoCliente" placeholder="Nome do cliente" value="<?= $rol[3] ?>" required autofocus />
		<input name="descricao" placeholder="Descrição" value="<?= $rol[4] ?>"  required autofocus />
		<input name="observacao" placeholder="Observação" value="<?= $rol[5] ?>"  required autofocus />
		<input name="preco" placeholder="Preço" value="<?= $rol[6] ?>"  required autofocus />
		<input name="formaDePagamento" placeholder="Forma de Pagamento" value="<?= $rol[7] ?>"  required autofocus />
		<input name="formaDeEntrega" placeholder="Forma de Entrega" value="<?= $rol[8] ?>"  required autofocus />
		<input name="endereco" placeholder="Endereço" value="<?= $rol[9] ?>"  required autofocus />
		<input name="estado" placeholder="Estado" value="<?= $rol[10] ?>"  required autofocus />
		<input name="cidade" placeholder="Cidade" value="<?= $rol[11] ?>"  required autofocus />
		<input name="a" type="submit" value="EditarPedido" />
	</form>
</body>
</html>