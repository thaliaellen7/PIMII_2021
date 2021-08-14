<?php
	require_once '../../../Model/Gerente/Pedido/modelPedido.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../../');
		} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../../';
		</SCRIPT>");
		} 
	$rol = controlPedido::buscarPorId(base64_decode($_GET['idPedidos']));
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8" />
	<title>Pedidos</title>
	<link rel="stylesheet" href="css/styleeditPedidoGerente.css">
</head>
<body>
	<form action="../../../Control/Gerente/Pedido/controlPedido.php" method="post">
		<fieldset>
			<legend> <b>Editar Pedido</b> </legend>
			<br>
			<br>
			<div >
				<input type="hidden" name="idPedidos" value="<?= $_GET['idPedidos'] ?>" />
			</div>
			<div>
			<input name="nomeDoCliente"  value="<?= $rol[2] ?>" type="hidden" />
			</div>
			<p id = "required">Pedido</p>
			<div>
			<textarea id= "inputUsertext" name="descricao" rows="15" cols="40" required><?=$rol[3] ?></textarea>
			</div>
			<div>
			<input id= "inputUser" name="observacao" placeholder="Observação" value="<?= $rol[4] ?>" />
			</div>
			<br>
			<p id= "required">Valor</p>
			<div >
			<input id= "inputUser" name="preco" placeholder="Preço" value="<?= $rol[5] ?>"  required autofocus />
			</div>
			<br>
			<p id = "required">Forma de pagamento</p>
			<div >
			<select id= "inputUser" name="formaDePagamento" required >
						<option value="Crédito/Débito" <?php if ($rol[6] == "Crédito/Débito"){ echo 'selected="selected"';}?>>Crédito/Débito</option>
						<option value="Dinheiro Físico" <?php if ($rol[6] == "Dinheiro Físico"){ echo 'selected="selected"';}?>>Dinheiro Físico</option>
						<option value="Pix" <?php if ($rol[6] == "Pix"){ echo 'selected="selected"';}?>>Pix</option>
			</select>
			</div>
			<br>
			<p id = "required">Forma de entrega</p>
			<div >
			<select id= "inputUser" name="formaDeEntrega" required >
						<option value="Delivery" <?php if ($rol[7] == "Delivery"){ echo 'selected="selected"';}?>>Delivery</option>
						<option value="Balcão" <?php if ($rol[7] == "Balcão"){ echo 'selected="selected"';}?>>Balcão</option>
						<option value="Mesa" <?php if ($rol[7] == "Mesa"){ echo 'selected="selected"';}?>>Mesa</option>
			</select>
			</div>
			<br>
			<p id= "required">Status do Pedido</p>
			<div>
			<select id= "inputUser" name="status" required >
						<option value="Novo" <?php if ($rol[17] == "Novo"){ echo 'selected="selected"';}?>>Novo</option>
						<option value="Pronto" <?php if ($rol[17] == "Pronto"){ echo 'selected="selected"';}?>>Pronto</option>
						<option value="A caminho" <?php if ($rol[17] == "A caminho"){ echo 'selected="selected"';}?>>A caminho</option>
						<option value="Entregue" <?php if ($rol[17] == "Entregue"){ echo 'selected="selected"';}?>>Entregue</option>
						<option value="Finalizado" <?php if ($rol[17] == "Finalizado"){ echo 'selected="selected"';}?>>Finalizado</option>
			</select>
			</div>
			<br>
			<p>Endereço</p>
			<div>
			<input id= "inputUser" name="endereco" placeholder="Endereço" value="<?= $rol[8] ?>"  />
			</div>
			<div>
			<input id= "inputUser" name="bairro" placeholder="Bairro" value="<?= $rol[9] ?>"  />
			</div>
			<div>
			<input id= "inputUser" name="numero" placeholder="Número" value="<?= $rol[10] ?>"  />
			</div>
			<div>
			<input id= "inputUser"name="complemento" placeholder="Complemento" value="<?= $rol[11] ?>"   />
			</div>
			<div>
			<input id= "inputUser" name="pontoDeReferencia" placeholder="Ponto de referência" value="<?= $rol[12] ?>"   />
			</div>
			<div >
			<input id= "inputUser" name="estado" placeholder="Estado" value="<?= $rol[13] ?>"   />
			</div>
			<div>
			<input id= "inputUser" name="cidade" placeholder="Cidade" value="<?= $rol[14] ?>"  />
			</div>
			<div >
			<p id="required">Contato</p>
			<label for="telefone"></label>
			<input id= "telefone" name="telefone" placeholder="Telefone" value="<?= $rol[15] ?>" required autofocus maxlength="15"   />
			</div>
			<div>
			<input id= "inputUser" name="data"  value="<?= $rol[16] ?>" type="hidden" />
			</div>
			<div>
			<input id= "submit" name="a" type="submit" value="Editar Pedido" />
			<br>
			<br>
			</div>	
		</fieldset>	
	</form>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
</body>
</html>