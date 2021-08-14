<?php
session_start();
 if ($_SESSION['autenticado'] != true){
    header('Location: ../../View/Login/homeLogin.php');
    }

require_once '../../../Model/Gerente/OutrosGastos/modelOutrosGastos.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlOutrosGastos();
	switch ($accion) {
		case 'Adicionar Gasto':
			$rol->idEmpresa = $_SESSION['idEmpresa'];
            $rol->descricao = $_POST['descricao'];
            $rol->preco = $_POST['preco'];
			$rol->cadastrar();
			break;
        case 'Editar Gasto':
            $rol->idGasto = base64_decode($_POST['idGasto']);
            $rol->descricao = $_POST['descricao'];
            $rol->preco = $_POST['preco'];
            $rol->editarGasto();
            break;
		case 'excluir':
            $rol->idGasto = base64_decode($_GET['idGasto']);
			$rol->excluir();
			break;
	}
}


header('Location: ../../../View/Gerente/OutrosGastos/homeOutrosGastos.php');