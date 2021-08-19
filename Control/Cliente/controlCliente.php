<?php


require_once '../../Model/Cliente/modelCliente.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlCliente();

	switch ($accion) {
		case 'Finalizar Pedido':
            $rol->nomeDoCliente = $_POST['nomeDoCliente'];
            $rol->idEmpresa = $_POST['idEmpresa'];
            $rol->descricaoPedido = htmlspecialchars($_POST['descricao'], ENT_QUOTES);
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
			$rol->cadastrarPedido();
			break;
            case 'listarPedidos':
                $rol->idEmpresa = $_SESSION['empresaUtilizada'];
                $rol->nomeDoCliente = $_POST['nomeDoCliente'];
                $rol->descricaoPedido = htmlspecialchars($_POST['descricao'], ENT_QUOTES);
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

header('Location: ../../View/Cardapio/acompanharPedido.php?pTelefone');