<?php
require_once '../../../Model/Gerente/Pedido/modelPedido.php';

 if ($_SESSION['autenticado'] != true){
    header('Location: ../../View/Login/homeLogin.php');
    }

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlPedido();
	switch ($accion) {
		case 'Finalizar Pedido':
            $rol->nomedoCliente = $_POST['nomeDoCliente'];
            $rol->idEmpresa = $_POST['idEmpresa'];
            $descricao_text = $_POST['descricao'];
            $rol->descricao = htmlspecialchars($descricao_text, ENT_QUOTES);
            if($_POST['observacao'] == ''){
                $rol->observacao = "Sem observação";
            } else {
                $rol->observacao = $_POST['observacao'];
                
            }
            $rol->preco = $_POST['preco'];
            $rol->troco = $_POST['troco'];
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
			$rol->cadastrar();
			break;
		case 'EditarStatus':
            print "asfasdfasfasfas";
			$rol->idPedidos= base64_decode($_GET['idPedidos']);
			$rol->status = base64_decode($_GET['status']);
			$rol->editarStatus();
			break;
        case 'Editar Pedido':
            $rol->idPedidos= base64_decode($_POST['idPedidos']);
            $descricao_text = $_POST['descricao'];
            $rol->descricao = htmlspecialchars($descricao_text, ENT_QUOTES);
            if($_POST['observacao'] == ''){
                $rol->observacao = "Sem observação";
            } else {
                $rol->observacao = $_POST['observacao'];
                
            }
            $rol->preco = $_POST['preco'];
            $rol->troco = $_POST['troco'];
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
			$rol->status = $_POST['status'];
            $rol->editarPedido();
            break;
		case 'excluir':
			$rol->idPedidos = base64_decode($_GET['idPedidos']);
			$rol->excluir();
			break;
	}
}


 header('Location: ../../../View/Gerente/Pedido/homePedido.php');