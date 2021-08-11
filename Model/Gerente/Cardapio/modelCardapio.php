<?php
session_start();
require_once '../../../Model/conexao.php';

class controlFinanceiro {
	public $idFuncionario;
	public $idEmpresa;
    public $nomeFuncionario;
    public $cargo;
    public $salario;
    public $idPedidos;
    public $descricao;
    public $preco;
    public $idEstoque;
    public $nomeEstoque;
    public $quantidadeTotal;
    public $valorTotal;
    public $categoria;
    public $idItem;
	private $conexao;

	public function __construct () {
        $this->idFuncionario = 0;
        $this->idEmpresa = 0;
        $this->nomeFuncionario = '';
        $this->cargo = '';
        $this->categoria = '';
        $this->salario = 0;
        $this->idPedidos = 0;
        $this->descricao = '';
        $this->preco = 0;
        $this->idEstoque = 0;
        $this->idItem = 0;
        $this->nomeEstoque = '';
        $this->quantidadeTotal = 0;
        $this->valorTotal = 0;
		$this->conexao = new Conexao();
	}

	public static function listarCategorias () {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `categoria` FROM cardapio WHERE disponibilidade = 1 AND idEmpresa = '".$_SESSION['idEmpresa']."' GROUP BY categoria");
		$conexao->encerrar();
		return $listado;
	}
	public static function listarItem ($categoria) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `idItem`, `nomeDoProduto`, `descricao`, `preco`, `disponibilidade` FROM cardapio WHERE categoria = '$categoria' AND idEmpresa = '".$_SESSION['idEmpresa']."' ");
		//$listado = $conexao->consultar("SELECT `idItem`, `nomeDoProduto`, `descricao`, `preco` FROM cardapio WHERE categoria = '$categoria' AND idEmpresa = '".$_SESSION['idEmpresa']."' AND disponibilidade = 1 ");
		$conexao->encerrar();
		return $listado; 
	}
	public function editarItem () {
		$s = "UPDATE cardapio SET nomeDoProduto = '$this->nome', descricao = '$this->descricao', preco = $this->preco, categoria = '$this->categoria' WHERE idItem = $this->idItem";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
    public function disponivel () {
		$s = "UPDATE cardapio SET disponibilidade = 1 WHERE idItem = $this->idItem";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
    public function indisponivel () {
		$s = "UPDATE cardapio SET disponibilidade = 0 WHERE idItem = $this->idItem";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
    public function excluir () {
		$s = "DELETE FROM cardapio WHERE idItem = $this->idItem";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
    public static function buscarPorId ($idItem) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM cardapio WHERE idItem = $idItem");
		$conexao->encerrar();
		return $listado[0];
	} 
	public function adicionarItem () {
			$s = "INSERT INTO `cardapio`(`idEmpresa`, `nomeDoProduto`, `descricao`,`categoria`, `preco`, `disponibilidade` ) 
			VALUES ('".$_SESSION['idEmpresa']."' ,'$this->nome', '$this->descricao' , '$this->categoria', $this->preco, 1)";
			$resultado = $this->conexao->atualizar($s);
			$this->conexao->encerrar();
			return $resultado;
		}
}