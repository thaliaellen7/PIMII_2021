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
			<div class="inputBox">
				<p>Pedido</p>
				<textarea name="descricao" rows="10" cols="30"></textarea>
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="observacao" placeholder="Observação" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Valor</p>
				<input id= "inputUser" name="preco" placeholder="Preço" value="0.0" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Forma de pagamento</p>
				<select id= "inputUser" name="formaDePagamento" >
							<option value="Crédito">Crédito</option>
							<option value="Débito">Débito</option>
							<option value="Pix">Pix</option>
				</select>
			</div>
			<br>
			<div class="inputBox">
				<p>Forma de entrega</p>
				<select id= "inputUser" name="formaDeEntrega" required >
							<option value="Delivery">Delivery</option>
							<option value="Balcão">Balcão</option>
							<option value="Localmente">Mesa</option>
				</select>
				<br/>
				<br>
			</div>
			
				
		
				
			</fieldset>
				
	</div><!--CONTAINER-A-->
	<div id="container-b">
		<fieldset>
			<legend><b>Cliente</b></legend>
			<br>
			<div class="inputBox">
				<input id= "inputUser" name="nomeDoCliente" placeholder="Nome Completo" required autofocus />
			</div>
			<br>
			<p>Endereço</p>
			<div class="inputBox">
				<input id= "inputUser" name="endereco" placeholder="Rua" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="numero" placeholder="Numero" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="bairro" placeholder="Bairro" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="complemento" placeholder="Complemento" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="pontoDeReferencia" placeholder="Ponto de referência" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="estado" placeholder="Estado" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="cidade" placeholder="Cidade" required autofocus />
			</div>
			<br>
			<p>Contato</p>
			<div class="inpuBox">
				<input id= "inputUser" name="telefone" placeholder="Telefone" required autofocus />
			</div>
			
		</fieldset>
		
	</div><!--CONTAINER-B-->
	<div id= "container-c">
	<div class="inpuBox">
			<input id= "submit" name="a" type="submit" value="Adicionar"/>
			</div>
	</div><!--CONTAINER-C-->
	</form>
</body>
</html>