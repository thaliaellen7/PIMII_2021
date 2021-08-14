<?php
	require_once '../../../Model/Gerente/Funcionario/modelFuncionario.php';
	if ($_SESSION['autenticado'] != true){
		header('Location: ../../../');
		} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
			session_destroy();
			echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Você não tem permissão para acessar esta página!');
		window.location.href='../../../';
		</SCRIPT>");
		} 
	$rol = controlFuncionario::buscarPorId(base64_decode($_GET['idFuncionario']));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8" />
	<title>Roles</title>
	<link rel="stylesheet" href="css/styleeditFuncionario.css">
</head>
<body>
	<div id= "container-a">
		<form action="../../../Control/Gerente/Funcionario/controlFuncionario.php" method="post">
			<fieldset>
			<legend><b>Editar Funcionário</b></legend>
			<br>
			<input type="hidden" name="idFuncionario" value="<?= $_GET['idFuncionario'] ?>" />
			<div class="inputBox">
				<p>Nome Completo</p>
				<input id= "inputUser" name="nome" placeholder="Nome Completo" value="<?= $rol['2'] ?>" required autofocus />
			</div>
			<br>
			<p>E-mail</p>
			<div class="inputBox">
				<input id= "inputUser" name="email" placeholder="E-mail" value="<?= $rol['3'] ?>" required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Senha</p>
				<input id= "inputUser" name="senha" placeholder="Senha" value="<?= $rol['4'] ?>"  required autofocus />
			</div>
			<br>
			<div class="inputBox">
				<p>Cargo</p>
				<select id= "inputUser" name="cargo" required autofocus >
							<option value="Cozinheiro(a)" <?php if ($rol[5] == "Cozinheiro(a)"){ echo 'selected="selected"';}?>>Cozinheiro(a)</option>
							<option value="Garcom" <?php if ($rol[5] == "Garcom"){ echo 'selected="selected"';}?>>Garçom</option>
							<option value="Entregador" <?php if ($rol[5] == "Entregador"){ echo 'selected="selected"';}?>>Entregador</option>
							<option value="Gerente" <?php if ($rol[5] == "Gerente"){ echo 'selected="selected"';}?>>Gerente</option>
				</select>
			</div>
			<br>
			<div class="inputBox">
				<p>Salário</p>
				<input id= "inputUser" name="salario" placeholder="Salário" value="<?= $rol['6'] ?>" required autofocus />
			</div>
			<br>
			<p>Endereço</p>
			<div class="inputBox">
				<input id= "inputUser" name="endereco" value="<?= $rol['7'] ?>" placeholder="Rua" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="numero" value="<?= $rol['8'] ?>" placeholder="Numero" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="bairro" value="<?= $rol['9'] ?>" placeholder="Bairro" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="complemento" value="<?= $rol['10'] ?>" placeholder="Complemento" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="pontoDeReferencia" value="<?= $rol['11'] ?>" placeholder="Ponto de referência" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="estado" value="<?= $rol['12'] ?>" placeholder="Estado" required autofocus />
			</div>
			<div class="inputBox">
				<input id= "inputUser" name="cidade" value="<?= $rol['13'] ?>" placeholder="Cidade" required autofocus />
			</div>
			<br>
			<p>Contato</p>
			<div class="">
				<input id= "inputUser" name="telefone" value="<?= $rol['16'] ?>" placeholder="Telefone" required autofocus />
			</div>
			<div class="inpuBox">
			<input id= "submit" name="a" type="submit" value="Editar Funcionário"/>
			</div>
			</fieldset>
	</form>
</body>
</html>