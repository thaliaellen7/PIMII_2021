<?php

require_once '../../Model/Entregador/modelEntregador.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlEntregador();

	switch ($accion) {
		case 'EditarStatus':
			$rol->idPedidos= base64_decode($_GET['idPedidos']);
			$statusPrevio = base64_decode($_GET['statusPedidos']);
			if($statusPrevio == "Pronto"){
				$statusOficial = "A caminho";
			} else if ($statusPrevio == "A caminho"){
				$statusOficial = "Entregue";
			} else if ($statusPrevio == "Entregue"){
				$statusOficial = "Finalizado";
			}
			$rol->status= $statusOficial;
			$rol->editarStatus();
			break;
		case 'buscarPorId':
			$rol->idPedidos= base64_decode($_GET['idPedidos']);
			$rol->buscarPorId();
			break;
	}
}


header('Location: ../../View/Entregador/homeEntregador.php');