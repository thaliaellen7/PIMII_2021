<?php
session_start();
require_once '../../Model/conexao.php';

class controlCliente {
	public $idEmpresa;
	public $nomeCliente;
	public $descricaoPedido;
	public $observacao;
	public $preco;
	public $formaDeEntrega;
	public $formaDePagamento;
    public $nome;
    public $descricao;
    public $endereco;
    public $bairro;
    public $numero;
    public $complemento;
    public $pontoDeReferencia;
    public $estado;
    public $cidade;
    public $telefone;
    public $logo;
	private $conexao;

	public function __construct () {
		$this->idEmpresa = 0;
		$this->nomeCliente = '';
		$this->descricaoPedido = '';
		$this->observacao = '';
		$this->preco = 0.0;
		$this->formaDeEntrega = '';
		$this->formaDePagamento = '';
		$this->nome = '';
		$this->descricao = '';
		$this->endereco = '';
		$this->bairro = '';
		$this->numero = '';
		$this->complemento = '';
		$this->pontoDeReferencia = '';
		$this->estado = '';
		$this->cidade = '';
		$this->telefone = '';
		$this->logo = '';
		$this->conexao = new Conexao();
	}

	public static function listarEmpresas () {
		$conexao = new Conexao ();
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('d/m/Y'));
		$listado = $conexao->consultar("SELECT * FROM empresa WHERE estado = 'CE' ");
		// '".$dataAtual."%'
        $conexao->encerrar();
		return $listado;
	}

	public function cadastrarPedido () {
		unset($_SESSION['carrinho']);
		unset($_SESSION['nomeEmpresaUtilizada']);
		unset($_SESSION['empresaUtilizada']);
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('d/m/Y - H:i'));
	
			$s = "INSERT INTO `pedidos`(`idEmpresa`, `nomeDoCliente`, `descricao`, `observacao`, `preco`, `formaDePagamento`, `formaDeEntrega`, `endereco`,`numero`, `bairro`,`complemento`,`pontoDeReferencia`, `estado`, `cidade`,`telefone`, `data`, `status`) 
			VALUES ($this->idEmpresa ,'$this->nomeDoCliente','$this->descricaoPedido' ,'$this->observacao' , $this->preco ,'$this->formaDePagamento' , '$this->formaDeEntrega' , '$this->endereco' ,'$this->numero' , '$this->bairro' ,'$this->complemento' ,'$this->pontoDeReferencia' , '$this->estado' , '$this->cidade' , '$this->telefone' ,'$dataAtual', 'Novo')";
			$resultado = $this->conexao->atualizar($s);
			$this->conexao->encerrar();
			return $resultado;
		}

		public static function listarPedidos ($pTelefone) {
			$conexao = new Conexao ();
			$listado = $conexao->consultar("SELECT * FROM pedidos WHERE telefone = '$pTelefone' ORDER BY idPedidos DESC");
			$conexao->encerrar();
			return $listado;
		}

		public static function buscarPorId ($idPedidos) {
			$conexao = new Conexao ();
			$listado = $conexao->consultar("SELECT * FROM pedidos WHERE idPedidos = $idPedidos");
			$conexao->encerrar();
			return $listado[0];
		}

}