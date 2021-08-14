<?php
session_start();
require_once '../../Model/conexao.php';

class controlGarcon {
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

	public static function listarPedidosConcluidos () {
		$conexao = new Conexao ();
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('d/m/Y'));
		$listado = $conexao->consultar("SELECT * FROM pedidos WHERE data LIKE '".$dataAtual."%' AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idPedidos DESC");
		$conexao->encerrar();
		return $listado;
	}

	// formaDeEntrega LIKE 'balcao%' AND
	/* WHERE status LIKE '%CONCLUIDO%' AND data LIKE '%"15/02/2003"%'  */

 	public static function buscarPorId ($idPedidos) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM pedidos WHERE idPedidos = $idPedidos");
		$conexao->encerrar();
		return $listado[0];
	} 

	public static function buscarEmpresaPorId ($idEmpresa) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT nome FROM empresa WHERE idEmpresa = $idEmpresa");
		$conexao->encerrar();
		return $listado[0];
	} 
	
	public function cadastrar () {

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = strval(date('d/m/Y - H:i'));

		$s = "INSERT INTO `pedidos`(`idEmpresa`, `nomeDoCliente`, `descricao`, `observacao`, `preco`, `formaDePagamento`, `formaDeEntrega`, `endereco`,`numero`, `bairro`,`complemento`,`pontoDeReferencia`, `estado`, `cidade`,`telefone`, `data`, `status`) 
        VALUES ('".$_SESSION['idEmpresa']."' ,'$this->nomeDoCliente','$this->descricao' ,'$this->observacao' , $this->preco ,'$this->formaDePagamento' , '$this->formaDeEntrega' , '$this->endereco' ,'$this->numero' , '$this->bairro' ,'$this->complemento' ,'$this->pontoDeReferencia' , '$this->estado' , '$this->cidade' , '$this->telefone' ,'$dataAtual', 'Novo')";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

	public function excluir () {
		$s = "DELETE FROM pedidos WHERE idPedidos = $this->idPedidos";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

    public function editarPedido () {
		$s = "UPDATE pedidos SET `descricao`= '$this->descricao', `observacao`= '$this->observacao', `preco`= '$this->preco', `formaDePagamento`= '$this->formaDePagamento', `formaDeEntrega`= '$this->formaDeEntrega',`endereco`= '$this->endereco', `numero`= '$this->numero', `bairro`= '$this->bairro', `complemento`= '$this->complemento', `pontoDeReferencia`= '$this->pontoDeReferencia', `estado`= '$this->estado',`cidade`= '$this->cidade', `telefone`= '$this->telefone', `status`= '$this->status' WHERE idPedidos = $this->idPedidos";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
}