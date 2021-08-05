<?php

require_once '../../Model/conexao.php';

class controlCliente {
	public $idEmpresa;
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

}