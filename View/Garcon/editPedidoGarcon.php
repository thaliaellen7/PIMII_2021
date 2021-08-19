<?php
	require_once '../../Model/Garcon/modelGarcon.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../');
		} else if (($_SESSION['cargoFuncionario'] != "Garcom") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../';
		</SCRIPT>");
		} 
	$rol = controlGarcon::buscarPorId(base64_decode($_GET['idPedidos']));
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/styleeditPedidoGarcon.css">
	<title>Editar Pedido</title>
</head>

<body>
<div class="conteiner-a">
	<form action="../../Control/Garcon/controlGarcon.php" method="post">
		<fieldset>
			<legend> <b>Editar Pedido</b> </legend>
			<br>
			<br>
			<div >
				<input type="hidden" name="idPedidos" value="<?= $_GET['idPedidos'] ?>" />
			</div>
			<p id = "required">Pedido</p>
			<div >
			<textarea id= "inputUsertext" name="descricao" rows="15" cols="30" required><?=$rol[3] ?></textarea>
			</div>
			<div>
			<p>Observação</p>
			<input id= "inputUser" name="observacao" placeholder="Observação" value="<?= $rol[4] ?>" />
			</div>
			<br>
			<p id= "required">Valor</p>
			<div >
			<input id= "inputUser" name="preco" placeholder="Preço" value="<?= $rol[5] ?>"  required autofocus />
			</div>
			<br>
			<p id= "required" >Forma de pagamento</p>
			<div>
			<select id= "pagamento" name="formaDePagamento" required >
						<option value="Crédito/Débito" <?php if ($rol[7] == "Crédito/Débito"){ echo 'selected="selected"';}?>>Crédito/Débito</option>
						<option value="Dinheiro" <?php if ($rol[7] == "Dinheiro"){ echo 'selected="selected"';}?>>Dinheiro Físico</option>
						<option value="Pix" <?php if ($rol[7] == "Pix"){ echo 'selected="selected"';}?>>Pix</option>
			</select>
			</div>
			<div id="troco">
				<label for="troco"></label>
				<input id="inputUser" name="troco" value="<?= $rol[6] ?>" type="text" placeholder="Troco para quanto?">
			</div>
			<br>
			<p id= "required">Forma de entrega</p>
			<div>
			<select id= "entrega" name="formaDeEntrega" required >
						<option value="Balcão" <?php if ($rol[8] == "Balcão"){ echo 'selected="selected"';}?>>Balcão</option>			
						<option value="Delivery" <?php if ($rol[8] == "Delivery"){ echo 'selected="selected"';}?>>Delivery</option>
						<option value="Mesa" <?php if ($rol[8] == "Mesa"){ echo 'selected="selected"';}?>>Mesa</option>
			</select>
			</div>
			<br>
			<p id= "required">Status do Pedido</p>
			<div>
			<select id= "inputUser" name="status" required >
						<option value="Novo" <?php if ($rol[18] == "Novo"){ echo 'selected="selected"';}?>>Novo</option>
						<option value="Pronto" <?php if ($rol[18] == "Pronto"){ echo 'selected="selected"';}?>>Pronto</option>
						<option value="A caminho" <?php if ($rol[18] == "A caminho"){ echo 'selected="selected"';}?>>A caminho</option>
						<option value="Entregue" <?php if ($rol[18] == "Entregue"){ echo 'selected="selected"';}?>>Entregue</option>
						<option value="Finalizado" <?php if ($rol[18] == "Finalizado"){ echo 'selected="selected"';}?>>Finalizado</option>
			</select>
			</div>
			<br>
			<p id= "required">Telefone para contato</p>
			<label for="telefone"></label>
			<input id= "telefone" name="telefone" placeholder="Telefone" value="<?= $rol[16] ?>" required autofocus maxlength="15" />
			</div>
			<div id="submit01">
			<input  id="submit0" name="a" type="submit" value="Editar Pedido"/>
			</div>
			</fieldset>	
			<div id="endereço">
				<fieldset>
					<legend>Endereço</legend>
					<div>
			<input id= "inputUser" name="endereco" placeholder="Endereço" value="<?= $rol[9] ?>"  />
			</div>
			<p>Bairro</p>
			<div>
			<input id= "inputUser" name="bairro" placeholder="Bairro" value="<?= $rol[11] ?>"  />
			</div>
			<p>N°</p>
			<div>
			<input id= "inputUser" name="numero" placeholder="Número" value="<?= $rol[10] ?>"  />
			</div>
			<p>Complemento</p>
			<div>
			<input id= "inputUser"name="complemento" placeholder="Complemento" value="<?= $rol[12] ?>"   />
			</div>
			<p>Ponto de Referência</p>
			<div>
			<input id= "inputUser" name="pontoDeReferencia" placeholder="Ponto de referência" value="<?= $rol[13] ?>"   />
			</div>
			<p>Estado</p>
			<div>
			<input id= "inputUser" name="estado" placeholder="Estado" value="<?= $rol[14] ?>"   />
			</div>
			<p>Cidade</p>
			<div>
			<input id= "inputUser" name="cidade" placeholder="Cidade" value="<?= $rol[15] ?>"  />
			</div>
			<div>
			<div>
			<input id= "inputUser" name="data"  value="<?= $rol[16] ?>" type="hidden" />
			</div>
			<br>
			<div>
			<input id= "submit02" name="a" type="submit" value="Editar Pedido"/>
			<br>			<br>
			<br>
			</div>
				</fieldset>
	
			</div>

		
	</form>
</div>
<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
	<script type= "text/javascript" src= "js/mostrartroco.js"></script>
	<script type= "text/javascript" src= "js/mostrarendereço.js"></script>
</body>
</html>