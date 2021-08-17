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
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/stylecadPedidoGerente.css">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
		<form action="../../../Control/Gerente/Pedido/controlPedido.php" method="post">
			<fieldset>
			<legend><b>Adicionar Pedido</b></legend>
			<br>
			<div class="inputBox" >
				<p id = "required">Pedido</p>
				<textarea id="inputUsertext"name="descricao" rows="10" cols="40" required></textarea>
				<br>
			</div>
			<div class="inputBox">
			<p>Observação</p>

				<input id= "inputUser" name="observacao" placeholder="Observação" />
			</div>
			<br>
			<div class="inputBox" >
				<p id = "required">Valor</p>
				<input id= "inputUser" name="preco" placeholder="Preço" value="0.0" required autofocus />
			</div>
			<br>
			<div class="inputBox" >
				<p id = "required">Forma de pagamento</p>
				<select id= "inputUser" name="formaDePagamento" required >
							<option value="Crédito/Débito">Crédito/Débito</option>
							<option value="Dinheiro Físico">Dinheiro Físico</option>
							<option value="Pix">Pix</option>
				</select>
			</div>
			<br>
			<div class="inputBox" >
				<p id = "required">Forma de entrega</p>
				<select id= "inputUser" name="formaDeEntrega" required >
							<option value="Delivery">Delivery</option>
							<option value="Balcão">Balcão</option>
							<option value="Mesa">Mesa</option>
				</select>
				
			</div><br/>
		
			<p>Cliente</p>
			<br>
			<p id = "required">Nome</p>
			<div class="inputBox">
				<input id= "inputUser" name="nomeDoCliente" placeholder="Nome Completo" required autofocus />
			</div>
			<br>
			<p>Endereço</p>
			<div class="inputBox">
				<input id= "inputUser" name="endereco" placeholder="Rua"  autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="numero" placeholder="Numero"  autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="bairro" placeholder="Bairro"  autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="complemento" placeholder="Complemento"  autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="pontoDeReferencia" placeholder="Ponto de referência"  autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="estado" placeholder="Estado"  autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="cidade" placeholder="Cidade"  autofocus />
			</div>
			<br>
			<p id = "required">Contato</p>
			<label for="telefone"></label>
			<div class="inpuBox" >
				<input id= "telefone" name="telefone" placeholder="Telefone" required autofocus maxlength="15"  />
			</div>
			<div class="inpuBox">
				<input id= "submit" name="a" type="submit" value="Adicionar"/>
			</div>
			<br>
			</fieldset>
			<br>
	</form>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
</body>
</html>