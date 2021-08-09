<?php
session_start();
require_once '../../../Model/conexao.php';

class controlProduto {
	public $idEstoque;
	public $idEmpresa;
    public $nome;
    public $data;
    public $valorTotal;
    public $quantidadeTotal;
    public $quantidadeUtilizada;
    public $fornecedor;
	private $conexao;

	public function __construct () {
        $this->idEstoque = 0;
        $this->idEmpresa = 0;
        $this->nome = '';
        $this->data = '';
        $this->valorTotal= 0;
        $this->quantidadeTotal= 0;
        $this->quantidadeUtilizada= 0;
        $this->fornecedor = '';
		$this->conexao = new Conexao();
	}

	public static function listarProdutosMes () {
		$conexao = new Conexao ();
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('m/Y'));
		$listado = $conexao->consultar("SELECT * FROM produtonoestoque WHERE data LIKE '___".$dataAtual."%' AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idEstoque DESC");
		$conexao->encerrar();
		return $listado;
	}
 
 	public static function buscarPorId ($idEstoque) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM produtonoestoque WHERE idEstoque = $idEstoque");
		$conexao->encerrar();
		return $listado[0];
	} 

	public function cadastrar () {
	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = strval(date('d/m/Y - H:i'));
		$s = "INSERT INTO `produtonoestoque`(`idEmpresa`, `nome`, `data`, `valorTotal`, `quantidadeTotal`, `quantidadeUtilizada`, `fornecedor`) 
        VALUES ($this->idEmpresa ,'$this->nome','$dataAtual' ,$this->valorTotal, $this->quantidadeTotal , $this->quantidadeUtilizada ,'$this->fornecedor')";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

	public function excluir () {
		$s = "DELETE FROM produtonoestoque WHERE idEstoque = $this->idEstoque";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

    public function editarProduto () {
		$s = "UPDATE produtonoestoque SET `nome`= '$this->nome', `valorTotal`= $this->valorTotal, `quantidadeTotal`= $this->quantidadeTotal, `quantidadeUtilizada`= $this->quantidadeUtilizada, `fornecedor`= '$this->fornecedor'";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	} 
}