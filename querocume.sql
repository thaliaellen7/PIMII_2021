-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2021 às 16:53
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
  `IdItem` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nomeDoProduto` varchar(60) NOT NULL,
  `descricao` longtext NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `preco` double NOT NULL,
  `disponibilidade` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`IdItem`, `idEmpresa`, `nomeDoProduto`, `descricao`, `categoria`, `preco`, `disponibilidade`) VALUES
(1, 1, 'kçlk', 'cahcorro', 'sanduíche', 2, 0),
(2, 1, 'çklçklç', 'lçkçlkçlk', 'sopa', 1, 1),
(3, 1, 'carangueijo', 'jlkjlkjlkj', 'sopa', 2, 1),
(4, 1, 'hkjhj', 'kjhkjh', 'sanduíche', 2, 1),
(5, 2, 'peixe frito', 'csdcds\r\ncsdcsdcsdcsd\r\nsdcsdcsdcsd\r\nsdcsdcsd', 'sanduíche', 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `numero` int(20) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `complemento` varchar(60) NOT NULL,
  `pontoDeReferencia` varchar(60) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `descricao` longtext NOT NULL,
  `logo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nome`, `telefone`, `endereco`, `numero`, `bairro`, `complemento`, `pontoDeReferencia`, `estado`, `cidade`, `descricao`, `logo`) VALUES
(1, 'Fino Sabor', '(85) 9 8995-8252', 'Rua Via Local 8', 87, 'Jubaia', 'Loteamento Sagrada Família', 'Depois do IFCE', 'CE', 'Canindé', 'Através desses sites e aplicativos as empresas podem se comunicar e se relacionar com o seu cliente ideal, ter mais custo vs benefício comparado ao marketing tradicional, e ainda, usar estratégias para se destacar da concorrência.', NULL),
(2, 'Borda de Ouro', '(85) 9 8958-8965', 'lk klj kljkljkl', 8795, 'CAN', 'jkjkljklj', 'n,mn,mnm', 'CE', 'Canindé', 'Um dos principais objetivos do HTML é dar estrutura de texto e significado, também conhecido como semântica), para que um navegador possa exibi-lo corretamente. Este artigo explica a forma como HTML pode ser usado para estruturar uma página de texto, adicionar títulos e parágrafos, enfatizar palavras, criar listas e muito mais.', NULL);

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
(1, 1, 'Carlos', 'carlos@gmail.com', 'dc599a9972fde3045dab59dbd1ae170b', 'garcom', 2000, 'lkjlkj', 87, 'çkçlk', 'lçkçl', 'klççl', 'lçk', 'ç~]ç]', '	lçlkçl', 'lçkçlk', '8797987987'),
(2, 0, 'Antonia', 'antonia@gmail.com', '4a6f93feab73fbe7b10942a4a4e4b83c', 'cozinheiro(a)', 3000, 'sdfsdfsd', 7845, 'sdfsdfdsf', 'fdsfsd', 'dsfsdf', 'sdfsdf', 'sdfsdf', 'dsfsd', 'sdfsdf', 'sdfsdf'),
(3, 2, 'Dane', 'dane@gmail.com', '70bb67c31f32594966075a9f74b0858a', 'garcon', 1212, 'sad', 2, 'sadas', 'adsas', 'adasd', 'ce', 'caninde', '1212', '123123', '112312');

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
(52, 0, 'Sebastião', 'jlk\r\nfghgfh\r\nhfghfg', 'klçkçlk', 0, 'Crédito', 'Delivery', 'çlk', 'lçk', 'lk', 'l', 'l', 'l', 'l', 'l', '04/08/2021 - 00:07', 'Entregue'),
(54, 1, 'thaia', '', 'testeeeeeeeeeeee', 4, 'Crédito/Débito', 'Delivery', 'd', '7', 'd', 'l', '', 'l', 'l', '89898.656', '05/08/2021 - 18:29', 'Novo'),
(55, 1, 'thaia', '                                            kçlk                                            hkjhj                  \r\n                ', 'testeeeeeeeeeeee', 4, 'Crédito/Débito', 'Delivery', 'd', '7', 'd', 'l', 'l', 'l', 'l', '89898.656', '05/08/2021 - 18:29', 'Novo'),
(56, 1, 'assadasdas', '                                            kçlk                                            hkjhj                                            carangueijo                  \r\n                ', '2 Teste de funcionamento', 6, 'Crédito/Débito', 'Delivery', 'sadas', '58658', 'hgjghj', 'asdas', 'asdas', 'asdas', 'asdas', '131212321', '05/08/2021 - 18:31', 'Novo'),
(57, 0, 'fhfg', 'fghfgh', 'fhgfghf', 0, 'Crédito', 'Delivery', 'gfhfg', '4', 'ghfgh', 'fghfg', 'hgf', 'hfg', 'fghfg', 'fhfg', '05/08/2021 - 20:03', 'Pronto'),
(58, 1, 'hjgh', 'hgjghjgh\r\nghjghjghjgh\r\njghjghjgh\r\nghjhgj', 'jhgjh', 0, 'Crédito', 'Delivery', 'ghjgh', '4', 'gfh', 'fg', 'hgf', 'gf', 'hgf', 'fghfg', '05/08/2021 - 20:32', 'Novo'),
(59, 1, 'Kelly', '                                            kçlk \r\n                                            hkjhj \r\n                  \r\n                ', 'hkhjkhj', 10, 'Crédito/Débito', 'Delivery', 'asdasd', '12', 'asdas', 'asdas', 'asdad', 'dassda', 'asdas', 'asdas', '05/08/2021 - 20:36', 'Novo'),
(60, 1, 'Robson', '                                             kçlk \r\n                                             hkjhj \r\n                  \r\n                ', 'cbcvbvc', 10, 'Crédito/Débito', 'Delivery', 'asdas', '2', 'adsd', 'adsd', 'asdas', 'dasd', 'asdas', 'asdas', '05/08/2021 - 20:38', 'Novo'),
(61, 1, 'fvdf', '                                             kçlk \r\n                  \r\n                ', 'fdvdf', 2, 'Crédito/Débito', 'Delivery', 'fdvfd', '3', 'd', 'd', 'vds', 'sdvv', 'vdsvsd', 'd', '05/08/2021 - 21:24', 'Novo'),
(62, 1, 'Thalia Ellen Araújo do Amaral', '                                             kçlk \r\n                  \r\n                ', 'saxas', 2, 'Crédito/Débito', 'Delivery', 'VIA LOCAL 8', '67', 'JUBAIA', 'LOTEAMENTO SAGRADA FAMÍLIA', 'IFCE', 'Ce', 'caninde', '99999999', '07/08/2021 - 09:31', 'Novo'),
(63, 1, 'Thalia Ellen Araújo do Amaral', '                                             kçlk \r\n                  \r\n                ', 'ghfg', 2, 'Crédito/Débito', 'Delivery', 'VIA LOCAL 8', '67', 'JUBAIA', 'LOTEAMENTO SAGRADA FAMÍLIA', 'asdas', 'Ce', 'caninde', '99999999', '07/08/2021 - 09:39', 'Novo'),
(64, 1, 'Thalia Ellen Araújo do Amaral', '                                             kçlk \r\n                  \r\n                ', 'ghfg', 2, 'Crédito/Débito', 'Delivery', 'VIA LOCAL 8', '67', 'JUBAIA', 'LOTEAMENTO SAGRADA FAMÍLIA', 'asdas', 'Ce', 'caninde', '54645645645', '07/08/2021 - 09:40', 'Novo'),
(65, 1, 'Thalia Ellen Araújo do Amaral', '                                             kçlk \r\n                  \r\n                ', 'ghfg', 2, 'Crédito/Débito', 'Delivery', 'VIA LOCAL 8', '67', 'JUBAIA', 'LOTEAMENTO SAGRADA FAMÍLIA', 'asdas', 'Ce', 'caninde', '54645645645', '07/08/2021 - 09:41', 'Novo'),
(66, 1, 'Thalia Ellen Araújo do Amaral', '                                             kçlk \r\n                                             hkjhj \r\n                                             çklçklç \r\n                  \r\n                ', 'Sem cebola nem milho', 5, 'Crédito/Débito', 'Delivery', 'VIA LOCAL 8', '67', 'JUBAIA', 'LOTEAMENTO SAGRADA FAMÍLIA', 'IFCE', 'CE', 'CANINDÉ', '(85) 9 8995-8252', '07/08/2021 - 10:30', 'Novo'),
(67, 1, 'wefwe', '                                             kçlk \r\n                                             hkjhj \r\n                                             çklçklç \r\n                  \r\n                ', 'wewef', 5, 'Crédito/Débito', 'Delivery', 'wefwe', '424', 'wefew', 'wefew', 'wefwe', 'wefwe', 'weffwe', 'wefwef', '07/08/2021 - 10:52', 'Novo'),
(68, 1, 'wefwe', '                                             kçlk \r\n                                             hkjhj \r\n                  \r\n                ', 'wewef', 4, 'Crédito/Débito', 'Delivery', 'wefwe', '424', 'wefew', 'wefew', 'wefwe', 'wefwe', 'weffwe', 'wefwef', '07/08/2021 - 10:54', 'Novo'),
(69, 2, 'fdvdfv', '                                             peixe frito \r\n                  \r\n                ', 'svdfdvf', 36, 'Crédito/Débito', 'Delivery', 'dsfsdfds', '12', 'vfdv', 'dfvdf', 'vfdv', 'fdvdf', 'dfvdf', '123123123', '07/08/2021 - 10:55', 'Novo'),
(70, 1, 'lkjlkjl lkjlkjjlkj', '                                             kçlk \r\n                                             hkjhj \r\n                  \r\n                ', '', 4, 'Crédito/Débito', 'Delivery', 'k', '9', 'k', 'k', 'k', 'k', 'kljkl', 'k', '07/08/2021 - 11:01', 'Novo'),
(71, 1, 'fdgfd', '                                             kçlk \r\n                  \r\n                ', 'gfdfg', 12, 'Crédito/Débito', 'Delivery', 'dfgdf', '7', 'dfgf', 'dasd', 'sadas', 'dasd', 'adasd', '1', '07/08/2021 - 11:10', 'Novo');

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
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`IdItem`);

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
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `IdItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `produtonoestoque`
--
ALTER TABLE `produtonoestoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
