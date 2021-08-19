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
			<option value="Pizzas - P" <?php if ($rol[4] == "Pizzas - P"){ echo 'selected="selected"';}?> >Pizzas - P</option>
					<option value="Pizzas - M" <?php if ($rol[4] == "Pizzas - M"){ echo 'selected="selected"';}?> >Pizzas - M</option>
					<option value="Pizzas - G" <?php if ($rol[4] == "Pizzas - G"){ echo 'selected="selected"';}?> >Pizzas - G</option>
					<option value="Pizzas - F" <?php if ($rol[4] == "Pizzas - F"){ echo 'selected="selected"';}?> >Pizzas - F</option>
					<option value="Pizzas doces - P" <?php if ($rol[4] == "Pizzas doces - P"){ echo 'selected="selected"';}?>>Pizzas Doces - P</option>
					<option value="Pizzas doces - M" <?php if ($rol[4] == "Pizzas doces - M"){ echo 'selected="selected"';}?>>Pizzas Doces - M</option>
					<option value="Pizzas doces - G" <?php if ($rol[4] == "Pizzas doces - G"){ echo 'selected="selected"';}?>>Pizzas Doces - G</option>
					<option value="Pizzas doces - F" <?php if ($rol[4] == "Pizzas doces - F"){ echo 'selected="selected"';}?>>Pizzas Doces - F</option>
					<option value="Refrigerantes" <?php if ($rol[4] == "Refrigerantes"){ echo 'selected="selected"';}?>>Refrigerantes</option>
					<option value="Bordas" <?php if ($rol[4] == "Bordas"){ echo 'selected="selected"';}?>>Bordas</option>
					<option value="Pasteis" <?php if ($rol[4] == "Pasteis"){ echo 'selected="selected"';}?>>Pastéis</option>
					<option value="Salgados" <?php if ($rol[4] == "Slagados"){ echo 'selected="selected"';}?>>Salgados</option>
			</select> 
			
			<input id="submit"name="a" type="submit" value="Editar Item" />
		</form>
		</fieldset>
	</div>
</body>
</html>