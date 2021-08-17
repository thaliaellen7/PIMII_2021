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
?>
<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/stylecadPedidoGarcon.css">
	<title>Adicionar Pedido</title>
</head>
<body>
	
	<div id= "container-a">
		<form id= "form" action="../../Control/Garcon/controlGarcon.php" method="post">
			<fieldset>
			<legend><b>Adicionar Pedido</b></legend>
			<br>
			<div class="inputBox" >
				<p id= "required">Pedido</p> 
				<textarea id= "inputUsertext" name="descricao" rows="15" cols="40" required></textarea>
			</div>
			<br>
			<div class="inputBox">
				<p>Observação</p>
				<input id= "inputUser" name="observacao" placeholder="Observação"/>
			</div>
			<br>
			<p id= "required">Valor</p>
			<div class="inputBox" >
				<input id= "inputUser" name="preco" placeholder="Preço" value="0.0" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p id= "required">Forma de pagamento</p>
				<select id= "inputUser" name="formaDePagamento" required>
					<option value="Crédito/Débito">Crédito/Débito</option>
					<option value="Dinheiro Físico">Dinheiro Físico</option>
					<option value="Pix">Pix</option>
				</select>
			</div>
			<br>
			<div class="inputBox">
				<p id= "required" >Forma de entrega</p>
				<select id= "inputUser" name="formaDeEntrega" required >
							<option value="Delivery">Delivery</option>
							<option value="Balcão">Balcão</option>
							<option value="Mesa">Mesa</option>
				</select>
			</div>
			<br>		
		</fieldset> <!--PEDIDO-->
		<br>
		<fieldset>
			<legend><b>Cliente</b></legend>
			<br>
			<p id= "required">Nome</p>
			<div class="inputBox" >
				<input id= "inputUser" name="nomeDoCliente" placeholder="Nome Completo" required autofocus />
			</div>
			<br>
			<p>Endereço</p>
			<div class="inputBox">
				<input id= "inputUser" name="endereco" placeholder="Rua"  />
			</div>
			<p>N°</p>
			<div class="inputBox">
				<input id= "inputUser" name="numero" placeholder="Numero"  />
			</div>
			<p>Bairro</p>
			<div class="inputBox">
				<input id= "inputUser" name="bairro" placeholder="Bairro"  />
			</div>
			<p>Complemento</p>
			<div class="inputBox">
				<input id= "inputUser" name="complemento" placeholder="Complemento"  />
			</div>
			<p>Ponto de Referência</p>
			<div class="inputBox">
				<input id= "inputUser" name="pontoDeReferencia" placeholder="Ponto de referência"  />
			</div>
			<p>Estado</p>
			<div class="inputBox">
				<input id= "inputUser" name="estado" placeholder="Estado"  />
			</div>
			<p>Cidade</p>
			<div class="inputBox">
				<input id= "inputUser" name="cidade" placeholder="Cidade"  />
			</div>
			<br>
			<p id= "required">Telefone para contato</p>
				<label for="telefone"></label>
				<input id= "telefone" name="telefone" placeholder="Ex.: (00) 00000-0000" required autofocus maxlength="15"/>
				<input id= "submit" name="a" type="submit" value="Adicionar"/>
			</div>

			<br>
			<br>
			</div>
	</fieldset>
	</div><!--CONTAINER-A-->
	</form>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
</body>
</html>