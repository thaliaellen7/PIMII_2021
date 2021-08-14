<?php
session_start();
require_once '../../Model/conexao.php';

class controlCozinha {
	public $idPedidos;
	public $idEmpresa;
    public $nomedoCliente;
    public $descricao;
    public $observacao;
    public $preco;
    public $formaDePagamento;
    public $formaDeEntrega;
    public $endereco;
    public $bairro;
    public $numero;
    public $complemento;
    public $pontoDeReferencia;
    public $estado;
    public $cidade;
    public $telefone;
    public $data;
    public $status;
	private $conexao;

	public function __construct () {
		$this->idPedidos = 0;
		$this->idEmpresa = 0;
		$this->nomedoCliente = '';
		$this->nomedaEmpresa = '';
		$this->descricao = '';
		$this->preco = 0.0;
		$this->formaDePagamento = '';
		$this->formaDeEntrega = '';
		$this->endereco = '';
		$this->bairro = '';
		$this->numero = '';
		$this->complemento = '';
		$this->pontoDeReferencia = '';
		$this->estado = '';
		$this->cidade = '';
		$this->telefone = '';
		$this->data = '';
		$this->status = '';
		$this->conexao = new Conexao();
	}

	public static function listarPedidosNovos () {
		$conexao = new Conexao ();
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('d/m/Y'));
		$listado = $conexao->consultar("SELECT * FROM pedidos WHERE data LIKE '".$dataAtual."%' AND status LIKE 'Novo%' AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idPedidos DESC");
		$conexao->encerrar();
		return $listado;
	}

	public static function buscarEmpresaPorId ($idEmpresa) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT nome FROM empresa WHERE idEmpresa = $idEmpresa");
		$conexao->encerrar();
		return $listado[0];
	} 

    public function editarStatus () {
		$s = "UPDATE pedidos SET status = 'Pronto' WHERE idPedidos = $this->idPedidos";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

}