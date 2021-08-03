<?php
	require_once '../../Model/Garcon/modelGarcon.php';
	$rol = controlGarcon::buscarPorId(base64_decode($_GET['idPedidos']));
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
		<input name="nomeDoCliente"  value="<?= $rol[2] ?>" type="hidden" />
		<textarea name="descricao" rows="10" cols="30"><?=$rol[3] ?></textarea>
		<input name="observacao" placeholder="Observação" value="<?= $rol[4] ?>"  required autofocus />
		<input name="preco" placeholder="Preço" value="<?= $rol[5] ?>"  required autofocus />
		<select name="formaDePagamento" >
					<option value="Crédito" <?php if ($rol[6] == "Crédito"){ echo 'selected="selected"';}?>>Crédito</option>
					<option value="Débito" <?php if ($rol[6] == "Débito"){ echo 'selected="selected"';}?>>Débito</option>
					<option value="Pix" <?php if ($rol[6] == "Pix"){ echo 'selected="selected"';}?>>Pix</option>
		</select>
		<select name="formaDeEntrega" required >
					<option value="Delivery" <?php if ($rol[6] == "Delivery"){ echo 'selected="selected"';}?>>Delivery</option>
					<option value="Balcão" <?php if ($rol[6] == "Balcão"){ echo 'selected="selected"';}?>>Balcão</option>
					<option value="Localmente" <?php if ($rol[6] == "Localmente"){ echo 'selected="selected"';}?>>Localmente</option>
		</select>
		<input name="endereco" placeholder="Endereço" value="<?= $rol[8] ?>"  required autofocus />
		<input name="bairro" placeholder="Bairro" value="<?= $rol[9] ?>"  required autofocus />
		<input name="numero" placeholder="Número" value="<?= $rol[10] ?>"  required autofocus />
		<input name="complemento" placeholder="Complemento" value="<?= $rol[11] ?>"  required autofocus />
		<input name="pontoDeReferencia" placeholder="Ponto de referência" value="<?= $rol[12] ?>"  required autofocus />
		<input name="estado" placeholder="Estado" value="<?= $rol[13] ?>"  required autofocus />
		<input name="cidade" placeholder="Cidade" value="<?= $rol[14] ?>"  required autofocus />
		<input name="telefone" placeholder="Telefone" value="<?= $rol[15] ?>"  required autofocus />
		<input name="data"  value="<?= $rol[16] ?>" type="hidden" />
		<input name="status"  value="<?= $rol[17] ?>" type="hidden" />
		<input name="a" type="submit" value="EditarPedido" />
	</form>
</body>
</html>