<?php
session_start();
 if ($_SESSION['autenticado'] != true){
    header('Location: ../../View/Login/homeLogin.php');
    }

require_once '../../Model/Garcon/modelGarcon.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlGarcon();
	switch ($accion) {
		case 'Adicionar':
			$rol->idEmpresa = $_SESSION['idEmpresa'];
            $rol->nomeDoCliente = $_POST['nomeDoCliente'];
            $descricao_text = $_POST['descricao'];
            $rol->descricao = htmlspecialchars($descricao_text, ENT_QUOTES);
            $rol->observacao = $_POST['observacao'];
            $rol->preco = $_POST['preco'];
            $rol->formaDePagamento = $_POST['formaDePagamento'];
            $rol->formaDeEntrega = $_POST['formaDeEntrega'];
            $rol->endereco = $_POST['endereco'];
            $rol->numero = $_POST['numero'];
            $rol->bairro = $_POST['bairro'];
            $rol->complemento = $_POST['complemento'];
            $rol->pontoDeReferencia = $_POST['pontoDeReferencia'];
            $rol->estado = $_POST['estado'];
            $rol->cidade = $_POST['cidade'];
            $rol->telefone = $_POST['telefone'];
            $rol->status = "Novo";
			$rol->cadastrar();
			break;
        case 'Editar Pedido':
           print $rol->idPedidos= base64_decode($_POST['idPedidos']);
           print $descricao_text = $_POST['descricao'];
           print$rol->descricao = htmlspecialchars($descricao_text, ENT_QUOTES);
           print$rol->observacao = $_POST['observacao'];
           print$rol->preco = $_POST['preco'];
           print $rol->formaDePagamento = $_POST['formaDePagamento'];
           print  $rol->formaDeEntrega = $_POST['formaDeEntrega'];
           print $rol->endereco = $_POST['endereco'];
           print $rol->numero = $_POST['numero'];
           print $rol->bairro = $_POST['bairro'];
           print $rol->complemento = $_POST['complemento'];
           print $rol->pontoDeReferencia = $_POST['pontoDeReferencia'];
           print $rol->estado = $_POST['estado'];
           print $rol->cidade = $_POST['cidade'];
           print $rol->telefone = $_POST['telefone'];
           print $rol->status = $_POST['status'];
            $rol->editarPedido();
            break;
		case 'excluir':
			$rol->idPedidos = base64_decode($_GET['idPedidos']);
			$rol->excluir();
			break;
	}
}


header('Location: ../../View/Garcon/homeGarcon.php');