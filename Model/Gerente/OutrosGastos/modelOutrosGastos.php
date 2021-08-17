<?php
session_start();
require_once '../../../Model/conexao.php';

class controlOutrosGastos {
	public $idGasto;
	public $descricao;
	public $preco;
	private $conexao;

	public function __construct () {
		$this->idGasto = 0;
		$this->descricao = '';
		$this->preco = 0.0;
		$this->conexao = new Conexao();
	}

	public static function listarGastos () {
		$conexao = new Conexao ();
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('m/Y'));
		$listado = $conexao->consultar("SELECT * FROM outrosGastos WHERE data LIKE '___".$dataAtual."%' AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idGasto DESC");
		$conexao->encerrar();
		return $listado;
	}
 	public static function buscarPorId ($idGasto) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM outrosGastos WHERE idGasto = $idGasto");
		$conexao->encerrar();
		return $listado[0];
	} 

	public function cadastrar () {

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = strval(date('d/m/Y - H:i'));

		$s = "INSERT INTO outrosGastos(`idEmpresa`, `descricao`, `preco`, `data`) 
        VALUES ($this->idEmpresa ,'$this->descricao', $this->preco, '$dataAtual')";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

	public function excluir () {
		$s = "DELETE FROM outrosGastos WHERE idGasto = $this->idGasto";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

    public function editarGasto () {
		$s = "UPDATE outrosGastos SET `descricao`= '$this->descricao', `preco`= $this->preco WHERE idGasto = $this->idGasto";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
}