<?php
	if ($_SESSION['autenticado'] != true){
	header('Location: ../../View/Login/homeLogin.php');
	}

require_once '../../Model/Cozinha/modelCozinha.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlCozinha();

	switch ($accion) {
		case 'EditarStatus':
			$rol->idPedidos= base64_decode($_GET['idPedidos']);
			$rol->editarStatus();
			break;
	}
}


header('Location: ../../View/Cozinha/homeCozinha.php');