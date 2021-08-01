<?php
class Conexao {
	private $conexao;

	public function __construct () {
		$this->conexao = new mysqli('localhost', 'root', '', 'querocume');
		$this->conexao->set_charset('utf8');
	}

	public function consultar ($sql) {
		return $this->conexao->query($sql)->fetch_all();
	}

	public function atualizar ($sql) {
		return $this->conexao->query($sql);
	}

	public function encerrar () {
		$this->conexao->close();
	}
}