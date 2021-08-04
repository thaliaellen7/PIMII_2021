<?php
session_start();
include('conexao.php');
if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select * from funcionario where email = '{$email}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['idFuncionario'] = $usuario_bd['idFuncionario'];
	$_SESSION['idEmpresa'] = $usuario_bd['idEmpresa'];
	$_SESSION['autenticado'] = true;
	if($usuario_bd['cargo'] == "garcom"){
		header('Location: ../../View/Garcon/homeGarcon.php');
	} else if($usuario_bd['cargo'] == "cozinheiro(a)"){
		 header('Location: ../../View/Cozinha/homeCozinha.php');
	} else if($usuario_bd['cargo'] == "entregador"){
		// header('Location: ../../View/Garcon/homeGarcon.php');
	} else if($usuario_bd['cargo'] == "gerente"){
		// header('Location: ../../View/Garcon/homeGarcon.php');
	}
	exit();
} else {
	print "deu ruim";
	$_SESSION['nao_autenticado'] = true;
	echo "<script type='javascript'>alert('O login deu ruim ;-;');";
	// header('Location: index.php');
	exit();
}