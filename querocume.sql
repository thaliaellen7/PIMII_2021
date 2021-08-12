-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Ago-2021 às 05:37
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
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `salario` double NOT NULL,
  `endereco` varchar(10) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `complemento` varchar(60) NOT NULL,
  `pontoDeReferencia` varchar(60) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `dataDeAdmissao` varchar(20) NOT NULL,
  `dataDeDemissao` varchar(20) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `idEmpresa`, `nome`, `email`, `senha`, `cargo`, `salario`, `endereco`, `numero`, `bairro`, `complemento`, `pontoDeReferencia`, `estado`, `cidade`, `dataDeAdmissao`, `dataDeDemissao`, `telefone`) VALUES
(1, 0, 'Carlos', 'carlos@gmail.com', 'dc599a9972fde3045dab59dbd1ae170b', 'garcom', 2000, 'lkjlkj', 87, 'çkçlk', 'lçkçl', 'klççl', 'lçk', 'ç~]ç]', '	lçlkçl', 'lçkçlk', '8797987987'),
(2, 0, 'Antonia', 'antonia@gmail.com', '4a6f93feab73fbe7b10942a4a4e4b83c', 'cozinheiro(a)', 3000, 'sdfsdfsd', 7845, 'sdfsdfdsf', 'fdsfsd', 'dsfsdf', 'sdfsdf', 'sdfsdf', 'dsfsd', 'sdfsdf', 'sdfsdf');

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
  `numero` varchar(5) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `pontoDeReferencia` varchar(60) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data` varchar(45) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedidos`, `idEmpresa`, `nomeDoCliente`, `descricao`, `observacao`, `preco`, `formaDePagamento`, `formaDeEntrega`, `endereco`, `numero`, `bairro`, `complemento`, `pontoDeReferencia`, `estado`, `cidade`, `telefone`, `data`, `status`) VALUES
(45, 0, 'kçlk', 'çlkçl', 'çlkçl', 0, 'Crédito', 'Delivery', 'çlkçl', 'çlklç', 'l', 'l', 'l', 'l', 'l', NULL, '03/08/2021 - 00:03', 'Pronto'),
(46, 22, 'Carlos', 'sdgd\r\nsdgsdgsdgsdg\r\ngdsgsdg dsf s dfsdf\r\ndsfsdf\r\nsdfsdfsd', 'lhjkhkj', 0, 'Débito', 'Localmente', 'rua', 'numer', 'bairr', 'complemento', 'ponto de referencia', 'estado', 'cidade', '342', '03/08/2021 - 00:05', 'Pronto'),
(47, 0, 'jlkj', 'lkjlk', 'k', 0, 'Crédito', 'Delivery', 'k', 'k', 'k', 'k', 'k', 'k', 'k', NULL, '03/08/2021 - 00:15', 'Novo'),
(48, 0, 'kjl', 'k', 'k', 0, 'Crédito', 'Delivery', 'k', 'k', 'k', 'k', 'k', 'k', 'k', NULL, '03/08/2021 - 00:18', 'Pronto'),
(50, 0, 'Ronaldo', '1 Pizza G de calabreza\r\n1 cajuina de 2L\r\n1 porção de baião\r\n1 fatia de bolo', 'O baião não pode conter cheiro verde', 20, 'Crédito', 'Delivery', 'VIA LOCAL 8', 'Jubai', '67', 'Loteamento', 'IFCE', 'Ce', 'Canindé', '40028922', '03/08/2021 - 16:11', 'Pronto'),
(51, 0, 'jlkj', 'klj', 'jjlk', 0, 'Crédito', 'Delivery', 'lkj', 'klj', 'lkj', 'kjl', 'klj', 'klj', 'klj', 'lkj', '03/08/2021 - 17:19', 'Pronto'),
(52, 0, 'Sebastião', 'jlk\r\nfghgfh\r\nhfghfg', 'klçkçlk', 0, 'Crédito', 'Delivery', 'çlk', 'lçk', 'lk', 'l', 'l', 'l', 'l', 'l', '04/08/2021 - 00:07', 'Entregue');

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
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `produtonoestoque`
--
ALTER TABLE `produtonoestoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
