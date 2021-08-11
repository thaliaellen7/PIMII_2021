<?php
	require_once '../../../Model/Gerente/Cardapio/modelCardapio.php';
	$rol = controlFinanceiro::buscarPorId(base64_decode($_GET['idItem']));
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
	<form action="../../../Control/Gerente/Financeiro/controlFinanceiro.php" method="post">
		<input type="hidden" name="idItem" value="<?= $_GET['idItem'] ?>" />
		<input name="nome"  value="<?= $rol[2] ?>" />
		<textarea name="descricao" rows="10" cols="30"><?=$rol[3] ?></textarea>
		<input name="preco" placeholder="Preço" value="<?= $rol[5] ?>"  required autofocus />
		 <select name="categoria" >
					<option value="Espetinhos" <?php if ($rol[4] == "Espetinhos"){ echo 'selected="selected"';}?>>Espetinhos</option>
					<option value="Sopas" <?php if ($rol[4] == "Sopas"){ echo 'selected="selected"';}?>>Sopas</option>
					<option value="Sanduíches" <?php if ($rol[4] == "Sanduíches"){ echo 'selected="selected"';}?>>Sanduíches</option>
		</select> 
		
		<input name="a" type="submit" value="Editar Item" />
	</form>
</body>
</html>