<?php require_once '../../Model/Garcon/modelGarcon.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new controlGarcon();

	switch ($accion) {
		case 'Cadastrar':
			$rol->idEmpresa = 0;
            $rol->nomeDoCliente = $_POST['nomeDoCliente'];
            $rol->descricao = $_POST['descricao'];
            $rol->observacao = $_POST['observacao'];
            $rol->preco = $_POST['preco'];
            $rol->formaDePagamento = $_POST['formaDePagamento'];
            $rol->formaDeEntrega = $_POST['formaDeEntrega'];
            $rol->endereco = $_POST['endereco'];
            $rol->estado = $_POST['estado'];
            $rol->cidade = $_POST['cidade'];
            $rol->status = "Novo";
			$rol->cadastrar();
			break;
		case 'EditarStatus':
            print "asfasdfasfasfas";
			$rol->idPedidos= base64_decode($_GET['idPedidos']);
			$rol->status = base64_decode($_GET['status']);
			$rol->editarStatus();
			break;
        case 'EditarPedido':
            $rol->idPedidos= base64_decode($_POST['idPedidos']);
            $rol->idEmpresa = $_POST['idEmpresa'];
            $rol->nomeDoCliente = $_POST['nomedoCliente'];
            $rol->descricao = $_POST['descricao'];
            $rol->observacao = $_POST['observacao'];
            $rol->preco = $_POST['preco'];
            $rol->formaDePagamento = $_POST['formaDePagamento'];
            $rol->formaDeEntrega = $_POST['formaDeEntrega'];
            $rol->endereco = $_POST['endereco'];
            $rol->estado = $_POST['estado'];
            $rol->cidade = $_POST['cidade'];
            $rol->data = $_POST['data'];
            $rol->status = $_POST['status'];
            $rol->editarPedido();
            break;
		case 'excluir':
			$rol->idPedidos = base64_decode($_GET['idPedidos']);
			$rol->excluir();
			break;
	}
}


header('Location: ../../View/Garcon/homeGarcon.php');