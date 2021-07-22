-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Jul-2021 às 21:57
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `querocume`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `idEmpresa` int(11) NOT NULL,
  `nomeDoProduto` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `preco` double NOT NULL,
  `disponibilidade` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `Endereco` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Cidade` varchar(45) NOT NULL,
  `Descrição` longtext NOT NULL,
  `logo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `e-mail` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `salario` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `dataDeAdmissao` varchar(45) NOT NULL,
  `dataDeDemissao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nomeDoCliente` varchar(60) NOT NULL,
  `descricao` mediumtext NOT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  `preco` double NOT NULL,
  `formaDePagamento` varchar(45) NOT NULL,
  `formaDeEntrega` varchar(45) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `data` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedidos`, `idEmpresa`, `nomeDoCliente`, `descricao`, `observacao`, `preco`, `formaDePagamento`, `formaDeEntrega`, `endereco`, `estado`, `cidade`, `data`, `status`) VALUES
(1, 0, 'Joao', 'dsadadasdasd', 'asdasdasd', 20, 'dasda', 'asd', 'asd', 'dasdas', 'asd', 'dasda', 'dasds');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtonoestoque`
--

CREATE TABLE `produtonoestoque` (
  `idEstoque` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data` varchar(45) NOT NULL,
  `valorUnitario` double NOT NULL,
  `valorTotal` double NOT NULL,
  `quantidadeTotal` int(11) NOT NULL,
  `quantidadeUtilizada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`);

--
-- Índices para tabela `produtonoestoque`
--
ALTER TABLE `produtonoestoque`
  ADD PRIMARY KEY (`idEstoque`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtonoestoque`
--
ALTER TABLE `produtonoestoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
