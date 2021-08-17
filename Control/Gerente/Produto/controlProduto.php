<?php
//session_start();
// if ($_SESSION['autenticado'] != true){
//    header('Location: ../../View/Login/homeLogin.php');
//    }

require_once '../../../Model/Gerente/Produto/modelProduto.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlProduto();
	switch ($accion) {
		case 'Adicionar':
			$rol->idEmpresa = $_SESSION['idEmpresa'];
            $rol->nome = $_POST['nome'];
            $rol->quantidadeTotal = $_POST['quantidadeTotal'];
            $rol->quantidadeUtilizada = $_POST['quantidadeUtilizada'];
            $rol->valorTotal = $_POST['valorTotal'];
            $rol->fornecedor = $_POST['fornecedor'];
            $rol->cadastrar();
			break;
        case 'Editar Produto':
            $rol->idEstoque = base64_decode($_POST['idEstoque']);
            $rol->nome = $_POST['nome'];
            $rol->quantidadeTotal = $_POST['quantidadeTotal'];
            $rol->quantidadeUtilizada = $_POST['quantidadeUtilizada'];
            $rol->valorTotal = $_POST['valorTotal'];
            $rol->fornecedor = $_POST['fornecedor'];
            $rol->editarProduto();
            break;
		case 'excluir':
			$rol->idEstoque = base64_decode($_GET['idEstoque']);
			$rol->excluir();
			break;
	}
}

header('Location: ../../../View/Gerente/Produto/homeProduto.php');



