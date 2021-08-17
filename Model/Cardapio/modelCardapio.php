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

	public static function listarCategorias ($idEmpresa) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `categoria` FROM cardapio WHERE disponibilidade = 1 AND idEmpresa = $idEmpresa GROUP BY categoria");
		$conexao->encerrar();
		return $listado;
	}
	public static function listarItem ($categoria, $idEmpresa) {
		$conexao = new Conexao ();
		$listado = $conexao->consultar("SELECT `idItem`, `nomeDoProduto`, `descricao`, `preco`, `idEmpresa` FROM cardapio WHERE categoria = '$categoria' AND idEmpresa = $idEmpresa AND disponibilidade = 1 ");
		$conexao->encerrar();
		return $listado; 
	}
	
	public function cadastrarPedido () {

		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = strval(date('d/m/Y - H:i'));
	
			$s = "INSERT INTO `pedidos`(`idEmpresa`, `nomeDoCliente`, `descricao`, `observacao`, `preco`, `formaDePagamento`, `formaDeEntrega`, `endereco`,`numero`, `bairro`,`complemento`,`pontoDeReferencia`, `estado`, `cidade`,`telefone`, `data`, `status`) 
			VALUES ('".$_SESSION['empresaUtilizada']."' ,'$this->nomeDoCliente','$this->descricao' ,'$this->observacao' , $this->preco ,'$this->formaDePagamento' , '$this->formaDeEntrega' , '$this->endereco' ,'$this->numero' , '$this->bairro' ,'$this->complemento' ,'$this->pontoDeReferencia' , '$this->estado' , '$this->cidade' , '$this->telefone' ,'$dataAtual', 'Novo')";
			$resultado = $this->conexao->atualizar($s);
			$this->conexao->encerrar();
			session_destroy();
			return $resultado;
		}
}