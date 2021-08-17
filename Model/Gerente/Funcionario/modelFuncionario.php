<?php
session_start();
require_once '../../../Model/conexao.php';

class controlFuncionario {
	public $idFuncionario;
	public $idEmpresa;
    public $nome;
    public $cargo;
    public $salario;
    public $endereco;
    public $bairro;
    public $numero;
    public $complemento;
    public $pontoDeReferencia;
    public $estado;
    public $cidade;
    public $telefone;
    public $dataDeAdmissao;
    public $dataDeDemissao;
	private $conexao;

	public function __construct () {
        $this->idFuncionario = 0;
        $this->idEmpresa = 0;
        $this->nome = '';
        $this->cargo = '';
        $this->salario = 0;
        $this->endereco = '';
        $this->bairro = '';
        $this->numero = 0;
        $this->complemento = '';
        $this->pontoDeReferencia = '';
        $this->estado = '';
        $this->cidade = '';
        $this->telefone = '';
        $this->dataDeAdmissao = '';
        $this->dataDeDemissao = '';
		$this->conexao = new Conexao();
	}

	public static function listarFuncionarioAtivo () {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM funcionario WHERE dataDeDemissao = '' AND idEmpresa = '".$_SESSION['idEmpresa']."' ORDER BY idFuncionario DESC");
		$conexao->encerrar();
		return $listado;
	}

	// formaDeEntrega LIKE 'balcao%' AND
	/* WHERE status LIKE '%CONCLUIDO%' AND data LIKE '%"15/02/2003"%'  */

 	public static function buscarPorId ($idFuncionario) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT * FROM funcionario WHERE idFuncionario = $idFuncionario");
		$conexao->encerrar();
		return $listado[0];
	} 

	public function cadastrar () {

	date_default_timezone_set('America/Sao_Paulo');
	$dataAtual = strval(date('d/m/Y - H:i'));

		$s = "INSERT INTO `funcionario`(`idEmpresa`, `nome`, `email`, `senha`, `cargo`, `salario`, `endereco`, `numero`, `bairro`, `complemento`, `pontoDeReferencia`, `estado`, `cidade`, `dataDeAdmissao`, `dataDeDemissao`, `telefone`) 
        VALUES ($this->idEmpresa ,'$this->nome','$this->email' ,'$this->senha' , '$this->cargo' ,$this->salario , '$this->endereco' ,'$this->numero' , '$this->bairro' ,'$this->complemento' ,'$this->pontoDeReferencia' , '$this->estado' , '$this->cidade', '$dataAtual' , '' , '$this->telefone')";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}

	public function excluir () {
		$s = "DELETE FROM funcionario WHERE idFuncionario = $this->idFuncionario";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
/* 
	public function editarStatus () {
		print "asfasdfasfasfas";
		$s = "UPDATE pedidos SET status = '$this->status' WHERE idPedidos = $this->idPedidos";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	} */

    public function editarFuncionario () {
		$s = "UPDATE funcionario SET `nome`= '$this->nome', `email`= '$this->email', `senha`= '$this->senha', `cargo`= '$this->cargo', `salario`= $this->salario,`endereco`= '$this->endereco', `numero`= $this->numero, `bairro`= '$this->bairro', `complemento`= '$this->complemento', `pontoDeReferencia`= '$this->pontoDeReferencia', `estado`= '$this->estado',`cidade`= '$this->cidade', `telefone`= '$this->telefone' WHERE idFuncionario = $this->idFuncionario";
		$resultado = $this->conexao->atualizar($s);
		$this->conexao->encerrar();
		return $resultado;
	}
}