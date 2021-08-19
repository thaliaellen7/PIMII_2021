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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

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
		<form action="../../Control/Garcon/controlGarcon.php" method="post">
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
				<p id= "required">Forma de pagamento</p>
				<select id= "pagamento" name="formaDePagamento" required>
					<option value="Crédito/Débito">Crédito/Débito</option>
					<option value="Dinheiro">Dinheiro</option>
					<option value="Pix">Pix</option>
				</select>
			</div>
			<div id="troco">
				<label for="troco"></label>
				<input id="inputUser" name="troco" type="text" value="0" placeholder="Troco para quanto?">
			</div>
			<br>
			<div class="inputBox" >
				<p id= "required">Forma de entrega</p>
				<select id= "entrega" name="formaDeEntrega" required >
							<option value="Balcão">Balcão</option>
							<option value="Delivery">Delivery</option>
							<option value="Mesa">Mesa</option>
				</select>
			</div>
			<p id= "required">Nome</p>
			<div class="inputBox" >
				<input id= "inputUser" name="nomeDoCliente" placeholder="Nome Completo" required autofocus />
			</div>
			<br>
			<p id="required">Telefone para Contato</p>
			<div >
				<label for="telefone"></label>
			<input id= "telefone" placeholder= "Insira seu N° de telefone" name="telefone" required autofocus maxlength="15" >
				
			</div>

			<div id="submit01">
			<input  id="submit0" name="a" type="submit" value="Adicionar"/>
			</div>
			<br>
			<div id="endereço">
		<fieldset>
			<legend><b>Endereço</b></legend>
			<br>
			<p>Endereço</p>
			<div class="inputBox">
				<input id= "inputUser" name="endereco" placeholder="Rua" />
			</div>
			<p >N°</p>
			<div class="inputBox">
				<input id= "inputUser" name="numero" placeholder="Numero"  />
			</div>
			<p >Bairro</p>
			<div class="inputBox">
				<input id= "inputUser" name="bairro" placeholder="Bairro"  />
			</div>
			<p >Complemento</p>
			<div class="inputBox">
				<input id= "inputUser" name="complemento" placeholder="Complemento"  />
			</div>
			<p >Ponto de Referência</p>
			<div class="inputBox">
				<input id= "inputUser" name="pontoDeReferencia" placeholder="Ponto de referência"  />
			</div>
			<p >Estado</p>
			<div class="inputBox">
				<input id= "inputUser" id="estado" value="CE" name="estado" placeholder="Estado"  />
			</div>
			<p >Cidade</p>
			<div class="inputBox">
				<input id= "inputUser" id="cidade" value="Canindé" name="cidade" placeholder="Cidade"  />
			</div>
			<br>
			
			<input id= "submit02" name="a" type="submit" value="Adicionar"/>
			<br>
			<br>
			</div>
	</fieldset>
	</div>
			<br>
	</form>
	<script type= "text/javascript" src= "js/mascaraTelefone.js"></script>
	<script type= "text/javascript" src= "js/mostrartroco.js"></script>
	<script type= "text/javascript" src= "js/mostrarendereço.js"></script>
</body>
</html>