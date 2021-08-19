<?php 
require_once '../../Model/Garcon/modelGarcon.php';
if ($_SESSION['autenticado'] != true){
	header('Location: ../../');
	} else if (($_SESSION['cargoFuncionario'] != "Gerente") && ($_SESSION['autenticado'] == true)){
		session_destroy();
		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Você não tem permissão para acessar esta página!');
	window.location.href='../../';
	</SCRIPT>");
	} 
?>