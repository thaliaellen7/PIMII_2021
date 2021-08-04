<?php
	if ($_SESSION['autenticado'] != true){
	header('Location: ../../View/Login/homeLogin.php');
	}

require_once '../../Model/Entregador/modelEntregador.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlEntregador();

	switch ($accion) {
		case 'EditarStatus':
			$rol->idPedidos= base64_decode($_GET['idPedidos']);
			$rol->editarStatus();
			break;
	}
}


header('Location: ../../View/Entregador/homeEntregador.php');