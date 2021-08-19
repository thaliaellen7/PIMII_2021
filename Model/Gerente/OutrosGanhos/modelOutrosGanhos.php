<?php
session_start();
require_once '../../../Model/conexao.php';

class controlOutrosGanhos {
	public $idGanho;
	public $descricao;
	public $preco;
	private $conexao;

	public function __construct () {
		$this->idGanho = 0;
		$this->descricao = '';
		$this->preco = 0.0;
		$this->conexao = new Conexao();
	}

	public static function listarGanhos () {
		$conexao = new Conexao ();
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('m/Y'));
		$listado = $conexao->consultar("SELECT * FROM outrosganhos WHERE data LIKE '___".$dataAtual."%' AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idGanho DESC");
		$conexao->encerrar();
		return $listado;
	}
 	public static function buscarPorId ($idGanho) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM outrosganhos WHERE idGanho = $idGanho");
		$conexao->encerrar();
		return $listado[0];
	} 

	public function cadastrar () {

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = strval(date('d/m/Y - H:i'));

		$s = "INSERT INTO outrosganhos(`idEmpresa`, `descricao`, `preco`, `data`) 
        VALUES ($this->idEmpresa ,'$this->descricao', $this->preco, '$dataAtual')";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

	public function excluir () {
		$s = "DELETE FROM outrosganhos WHERE idGanho = $this->idGanho";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

    public function editarGanho () {
		$s = "UPDATE outrosganhos SET `descricao`= '$this->descricao', `preco`= $this->preco WHERE idGanho = $this->idGanho";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
}