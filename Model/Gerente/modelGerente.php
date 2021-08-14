<?php
session_start();
require_once '../../Model/conexao.php';

class controlGerente {
	public $idEmpresa;
	private $conexao;

	public function __construct () {
		$this->idEmpresa = 0;
		$this->conexao = new Conexao();
	}


	public static function buscarEmpresaPorId ($idEmpresa) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT nome FROM empresa WHERE idEmpresa = $idEmpresa");
		$conexao->encerrar();
		return $listado[0];
	} 
	
}