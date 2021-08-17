<?php
session_start();
 if ($_SESSION['autenticado'] != true){
    header('Location: ../../View/Login/homeLogin.php');
    }

require_once '../../../Model/Gerente/Funcionario/modelFuncionario.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlFuncionario();
	switch ($accion) {
		case 'Adicionar Funcionário':
			$rol->idEmpresa = $_SESSION['idEmpresa'];
            $rol->nome = $_POST['nome'];
            $rol->email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $rol->senha = $senha;
            $rol->cargo = $_POST['cargo'];
            $rol->salario = $_POST['salario'];
            $rol->endereco = $_POST['endereco'];
            $rol->numero = $_POST['numero'];
            $rol->bairro = $_POST['bairro'];
            $rol->complemento = $_POST['complemento'];
            $rol->pontoDeReferencia = $_POST['pontoDeReferencia'];
            $rol->estado = $_POST['estado'];
            $rol->cidade = $_POST['cidade'];
            $rol->telefone = $_POST['telefone'];
			$rol->cadastrar();
			break;
		case 'EditarStatus':
            print "asfasdfasfasfas";
			$rol->idPedidos= base64_decode($_GET['idPedidos']);
			$rol->status = base64_decode($_GET['status']);
			$rol->editarStatus();
			break;
        case 'Editar Funcionário':
            $rol->idFuncionario = base64_decode($_POST['idFuncionario']);
            $rol->nome = $_POST['nome'];
            $rol->email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $rol->senha = $senha; 
            $rol->cargo = $_POST['cargo'];
            $rol->salario = $_POST['salario'];
            $rol->endereco = $_POST['endereco'];
            $rol->numero = $_POST['numero'];
            $rol->bairro = $_POST['bairro'];
            $rol->complemento = $_POST['complemento'];
            $rol->pontoDeReferencia = $_POST['pontoDeReferencia'];
            $rol->estado = $_POST['estado'];
            $rol->cidade = $_POST['cidade'];
            $rol->telefone = $_POST['telefone'];
            $rol->editarFuncionario();
            break;
		case 'excluir':
			$rol->idFuncionario = base64_decode($_GET['idFuncionario']);
			$rol->excluir();
			break;
	}
}


header('Location: ../../../View/Gerente/Funcionario/homeFuncionario.php');