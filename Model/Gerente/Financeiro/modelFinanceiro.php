<?php
session_start();
require_once '../../../Model/conexao.php';

class controlFuncionario {
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
	private $conexao;

	public function __construct () {
        $this->idFuncionario = 0;
        $this->idEmpresa = 0;
        $this->nomeFuncionario = '';
        $this->cargo = '';
        $this->salario = 0;
        $this->idPedidos = 0;
        $this->descricao = '';
        $this->preco = 0;
        $this->idEstoque = 0;
        $this->nomeEstoque = '';
        $this->quantidadeTotal = 0;
        $this->valorTotal = 0;
		$this->conexao = new Conexao();
	}

	public static function listarFuncionarios ($data1, $data2) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `idFuncionario`, `nome`, `cargo`, `salario`,`dataDeAdmissao` FROM funcionario WHERE STR_TO_DATE(dataDeAdmissao, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$data1."', '%d/%m/%Y') AND STR_TO_DATE('".$data2."', '%d/%m/%Y') AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idFuncionario DESC");
		$conexao->encerrar();
		return $listado;
	}
	public static function listarProdutos ($data1, $data2) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `idEstoque`, `nome`, `quantidadeTotal`,`quantidadeUtilizada`, `valorTotal`, `data` FROM produtonoestoque WHERE STR_TO_DATE(data, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$data1."', '%d/%m/%Y') AND STR_TO_DATE('".$data2."', '%d/%m/%Y') AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idEstoque DESC");
		$conexao->encerrar();
		return $listado;
	}
	public static function listarPedidos ($data1, $data2) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `idPedidos`, `descricao`, `preco`, `data` FROM pedidos WHERE STR_TO_DATE(data, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$data1."', '%d/%m/%Y') AND STR_TO_DATE('".$data2."', '%d/%m/%Y') AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idPedidos DESC");
		$conexao->encerrar();
		return $listado;
	}
	public static function listarOutros ($data1, $data2) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `idGasto`, `descricao`, `preco`, `data` FROM OutrosGastos WHERE STR_TO_DATE(data, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$data1."', '%d/%m/%Y') AND STR_TO_DATE('".$data2."', '%d/%m/%Y') AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idGasto DESC");
		$conexao->encerrar();
		return $listado;
	}
	public static function listarOutrosGanhos ($data1, $data2) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `idGanho`, `descricao`, `preco`, `data` FROM OutrosGanhos WHERE STR_TO_DATE(data, '%d/%m/%Y') BETWEEN STR_TO_DATE('".$data1."', '%d/%m/%Y') AND STR_TO_DATE('".$data2."', '%d/%m/%Y') AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idGanho DESC");
		$conexao->encerrar();
		return $listado;
	}

}