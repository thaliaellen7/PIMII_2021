<?php
session_start();
 if ($_SESSION['autenticado'] != true){
    header('Location: ../../View/Login/homeLogin.php');
    }

require_once '../../../Model/Gerente/OutrosGanhos/modelOutrosGanhos.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlOutrosGanhos();
	switch ($accion) {
		case 'Adicionar Ganho':
			$rol->idEmpresa = $_SESSION['idEmpresa'];
            $rol->descricao = $_POST['descricao'];
            $rol->preco = $_POST['preco'];
			$rol->cadastrar();
			break;
        case 'Editar Ganho':
            $rol->idGanho = base64_decode($_POST['idGanho']);
            $rol->descricao = $_POST['descricao'];
            $rol->preco = $_POST['preco'];
            $rol->editarGanho();
            break;
		case 'excluir':
            $rol->idGanho = base64_decode($_GET['idGanho']);
			$rol->excluir();
			break;
	}
}


header('Location: ../../../View/Gerente/OutrosGanhos/homeOutrosGanhos.php');