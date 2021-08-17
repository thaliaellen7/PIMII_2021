<?php
	require_once '../../../Model/Gerente/Cardapio/modelCardapio.php';
	$rol = controlFinanceiro::buscarPorId(base64_decode($_GET['idItem']));
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8" />
	<title>Editar item</title>
	<link rel="stylesheet" href="css/styleeditItem.css">
</head>
<body>
	<div class="container-a">
		<fieldset>
			<legend><b>Editar Item</b></legend>

		<form action="../../../Control/Gerente/Financeiro/controlFinanceiro.php" method="post">
			<input type="hidden" name="idItem" value="<?= $_GET['idItem'] ?>" />
			<p>Nome</p>
			<input id="inputUser"name="nome"  value="<?= $rol[2] ?>" />
			<p>Descrição</p>
			<textarea id="inputUsertext"name="descricao" rows="10" cols="30"><?=$rol[3] ?></textarea>
			<p>Preço</p>
			<input id="inputUser" name="preco" placeholder="Preço" value="<?= $rol[5] ?>"  required autofocus />
			<p>Categoria</p>
			<select id="inputUser" name="categoria" >
						<option value="Espetinhos" <?php if ($rol[4] == "Espetinhos"){ echo 'selected="selected"';}?>>Espetinhos</option>
						<option value="Sopas" <?php if ($rol[4] == "Sopas"){ echo 'selected="selected"';}?>>Sopas</option>
						<option value="Sanduíches" <?php if ($rol[4] == "Sanduíches"){ echo 'selected="selected"';}?>>Sanduíches</option>
			</select> 
			
			<input id="submit"name="a" type="submit" value="Editar Item" />
		</form>
		</fieldset>
	</div>
</body>
</html>