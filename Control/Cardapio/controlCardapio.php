<?php

require_once '../../Model/Cardapio/modelCardapio.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlCardapio();

	switch ($accion) {
		case 'Finalizar Pedido':
            print $_SESSION['empresaUtilizada'];
            $rol->nomeDoCliente = $_POST['nomeDoCliente'];
            $rol->descricao = htmlspecialchars($_POST['descricao'], ENT_QUOTES);
            $rol->observacao = $_POST['observacao'];
            $rol->preco = $_POST['preco'];
            $rol->formaDePagamento = $_POST['formaDePagamento'];
            $rol->formaDeEntrega = $_POST['formaDeEntrega'];
            $rol->numero= $_POST['numero'];
            $rol->endereco = $_POST['endereco'];
            $rol->bairro = $_POST['bairro'];
            $rol->complemento = $_POST['complemento'];
            $rol->pontoDeReferencia = $_POST['pontoDeReferencia'];
            $rol->estado = $_POST['estado'];
            $rol->cidade = $_POST['cidade'];
            $rol->telefone = $_POST['telefone'];
			$rol->cadastrarPedido();
			break;
	}
}

 header('Location: ../../View/Cliente/homeCliente.php');