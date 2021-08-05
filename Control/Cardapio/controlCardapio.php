<?php
session_start();
 if ($_SESSION['autenticado'] != true){
    header('Location: ../../View/Login/homeLogin.php');
    }

require_once '../../Model/Cardapio/modelCardapio.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlCardapio();

	switch ($accion) {
		case 'ListarCardapio':
            $rol->nomeDoCliente = $_GET['idEmpresa'];
			$rol->listarCardapio();
			break;
	}
}


header('Location: ../../View/Cardapio/homeCardapio.php');