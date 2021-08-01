<?php
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
    public $estado;
    public $cidade;
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
		$this->estado = '';
		$this->cidade = '';
		$this->data = '';
		$this->status = '';
		$this->conexao = new Conexao();
	}

	public static function listarPedidosConcluidos () {
		$conexao = new Conexao ();
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('d/m/Y'));
		$listado = $conexao->consultar("SELECT * FROM pedidos WHERE formaDeEntrega LIKE 'balcao%' AND data LIKE '".$dataAtual."%' ORDER BY idPedidos DESC");
		$conexao->encerrar();
		return $listado;
	}

	/* WHERE status LIKE '%CONCLUIDO%' AND data LIKE '%"15/02/2003"%'  */

 	public static function buscarPorId ($idPedidos) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM pedidos WHERE idPedidos = $idPedidos");
		$conexao->encerrar();
		return $listado[0];
	} 

	public function cadastrar () {

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = strval(date('d/m/Y - H:i'));

		$s = "INSERT INTO `pedidos`(`idEmpresa`, `nomeDoCliente`, `descricao`, `observacao`, `preco`, `formaDePagamento`, `formaDeEntrega`, `endereco`, `estado`, `cidade`, `data`, `status`) 
        VALUES ($this->idEmpresa,'$this->nomeDoCliente','$this->descricao' ,'$this->observacao' , $this->preco ,'$this->formaDePagamento' , '$this->formaDeEntrega' , '$this->endereco' , '$this->estado' , '$this->cidade' ,'$dataAtual', '$this->status')";
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

	public function editarStatus () {
		print "asfasdfasfasfas";
		$s = "UPDATE pedidos SET status = '$this->status' WHERE idPedidos = $this->idPedidos";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

    public function editarPedido () {
		$s = "UPDATE pedidos SET `nomeDoCliente`= '$this->nomeDoCliente', `descricao`= '$this->descricao', `observacao`= '$this->observacao', `preco`= '$this->preco', `formaDePagamento`= '$this->formaDePagamento', `formaDeEntrega`= '$this->formaDeEntrega',`endereco`= '$this->endereco',`estado`= '$this->estado',`cidade`= '$this->cidade',`data`= '$this->data',`status`= '$this->status' WHERE idPedidos = $this->idPedidos";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
}