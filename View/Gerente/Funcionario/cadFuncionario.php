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
		<form action="../../../Control/Gerente/Funcionario/controlFuncionario.php" method="post">
			<fieldset>
			<legend><b>Adicionar Funcionário</b></legend>
			<br>
			<div class="inputBox">
				<p>Nome Completo</p>
				<input id= "inputUser" name="nome" placeholder="Nome Completo" required autofocus />
			</div>
			<br>
			<p>E-mail</p>
			<div class="inputBox">
				<input id= "inputUser" name="email" placeholder="E-mail" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Senha</p>
				<input id= "inputUser" name="senha" placeholder="Senha"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Cargo</p>
				<select id= "inputUser" name="cargo" >
							<option value="Cozinheiro(a)">Cozinheiro(a)</option>
							<option value="Garçom">Garçom</option>
							<option value="Entregador">Entregador</option>
							<option value="Gerente">Gerente</option>
				</select>
			</div>
			<br>
			<div class="inputBox">
				<p>Salário</p>
				<input id= "inputUser" name="salario" placeholder="Salário" value="0.0" required autofocus />
			</div>
			<br>
			</fieldset>
				
	</div><!--CONTAINER-A-->
	<div id="container-b">
		<fieldset>
			<legend><b>Endereço</b></legend>
			<br>
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
			<input id= "submit" name="a" type="submit" value="Adicionar Funcionário"/>
			</div>
	</div><!--CONTAINER-C-->
	</form>
</body>
</html>