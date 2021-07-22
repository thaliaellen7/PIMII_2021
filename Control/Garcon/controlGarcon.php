<?php require_once '../../Model/Garcon/modelGarcon.php';

$accion = $_POST['a'] ?? $_GET['a'] ?? '';

if ($accion != '') {
	$rol = new Rol();

	switch ($accion) {
		case 'Cadastrar':
			$rol->idEmpresa = $_POST['idEmpresa'];
            $rol->nomedoCliente = $_POST['nomedoCliente'];
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
			$rol->cadastrar();
			break;
		case 'EditarStatus':
			$rol->idPedido= base64_decode($_POST['idPedido']);
			$rol->status = $_POST['status'];
			$rol->editarStatus();
			break;
        case 'EditarPedido':
            $rol->idPedido= base64_decode($_POST['idPedido']);
            $rol->idEmpresa = $_POST['idEmpresa'];
            $rol->nomedoCliente = $_POST['nomedoCliente'];
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
			$rol->id = base64_decode($_GET['id']);
			$rol->eliminar();
			break;
	}
}

header('Location: ../../View/Garcon');