<?php
session_start();
require_once '../../Model/conexao.php';

class controlCardapio {
	public $idEmpresa;
    public $nomeDoProduto;
    public $descricao;
    public $categoria;
    public $preco;
    public $disponibilidade;
	private $conexao;

	public function __construct () {
		$this->idEmpresa = 0;
		$this->nomeDoProduto = '';
		$this->descricao = '';
		$this->categoria = '';
		$this->preco = 0.0;
		$this->disponibilidade = '';
		$this->conexao = new Conexao();
	}

	public static function listarSanduiche ($idEmpresa) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM cardapio WHERE categoria = 'sanduíche' AND idEmpresa = $idEmpresa ");
		$resultado = $conexao->resultado("SELECT * FROM cardapio WHERE categoria = 'sanduíche' AND idEmpresa = $idEmpresa ");
		if ($resultado > 0) {
			$conexao->encerrar();
			return $listado;
		} else {
			$array = array(
				"0" => "not found",
			);
			return $array;
		}
		// '".$dataAtual."%'
       
	}

	public static function listarSopa ($idEmpresa) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM cardapio WHERE categoria = 'sopa' AND idEmpresa = $idEmpresa ");
		$resultado = $conexao->resultado("SELECT * FROM cardapio WHERE categoria = 'sopa' AND idEmpresa = $idEmpresa ");
		if ($resultado > 0) {
			$conexao->encerrar();
			return $listado;
		} else {
			$array = array(
				"0" => "not found",
			);
			return $array;
		}
		// '".$dataAtual."%'
       
	}

	
}