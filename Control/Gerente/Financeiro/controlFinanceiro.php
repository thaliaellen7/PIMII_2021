<?php
session_start();
 if ($_SESSION['autenticado'] != true){
    header('Location: ../../View/Login/homeLogin.php');
    }

require_once '../../../Model/Gerente/Cardapio/modelCardapio.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlFinanceiro();
	switch ($accion) {
		case 'Disponivel':
            print base64_decode($_GET['idItem']);
			$rol->idItem= base64_decode($_GET['idItem']);
			$rol->disponivel();
			break;
        case 'Indisponivel':
            print base64_decode($_GET['idItem']);
			$rol->idItem= base64_decode($_GET['idItem']);
			$rol->indisponivel();
			break;
        case 'Editar Item':
            $rol->idItem = base64_decode($_POST['idItem']);
            $rol->nome = $_POST['nome'];
            $rol->descricao = $_POST['descricao'];
            $rol->preco = $_POST['preco'];
            $rol->categoria = $_POST['categoria'];
            $rol->editarItem();
            break;
		case 'Adicionar Item':
            $rol->nome = $_POST['nome'];
			$descricao_text = $_POST['descricao'];
            $rol->descricao = htmlspecialchars($descricao_text, ENT_QUOTES);
            $rol->preco = $_POST['preco'];
            $rol->categoria = $_POST['categoria'];
            $rol->adicionarItem();
            break;
		case 'excluir':
			$rol->idItem = base64_decode($_GET['idItem']);
			$rol->excluir();
			break;
	}
}


header('Location: ../../../View/Gerente/Cardapio/homeCardapio.php');