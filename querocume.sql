-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Ago-2021 às 15:55
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
(2, 1, 'çklçklç', 'lçkçlkçlk', 'sopa', 1, 1),
(3, 1, 'carangueijo', 'jlkjlkjlkj', 'sopa', 2, 1),
(4, 1, 'hkjhj', 'kjhkjh', 'Sanduíches', 25.5, 1),
(5, 2, 'peixe frito', 'csdcds\r\ncsdcsdcsdcsd\r\nsdcsdcsdcsd\r\nsdcsdcsd', 'sanduíche', 12, 1),
(6, 1, 'fbdfbdfbdfbdf', 'bfdbdfbdf', 'sopa', 23.2, 1),
(7, 1, 'Sopa de Ervilhas', 'Ervilhas, milho, caldo de galinha e arroz', 'Sopas', 20, 1),
(8, 1, 'Churrasco de boi', 'Carne de boi\r\ntempero de carne\r\nsazon de carne\r\ntempero chileno', 'Espetinhos', 5, 1);

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
(1, 1, 'Carlos', 'carlos@gmail.com', 'dc599a9972fde3045dab59dbd1ae170b', 'garcom', 2000, 'lkjlkj', 87, 'çkçlk', 'lçkçl', 'klççl', 'lçk', 'ç~]ç]', '05/08/2021 - 18:29', '', '8797987987'),
(2, 1, 'Antonia', 'antonia@gmail.com', '4a6f93feab73fbe7b10942a4a4e4b83c', 'cozinheiro(a)', 3000, 'sdfsdfsd', 7845, 'sdfsdfdsf', 'fdsfsd', 'dsfsdf', 'sdfsdf', 'sdfsdf', '05/08/2021 - 18:29', '', 'sdfsdf'),
(3, 2, 'Dane', 'dane@gmail.com', '70bb67c31f32594966075a9f74b0858a', 'garcon', 1212, 'sad', 2, 'sadas', 'adsas', 'adasd', 'ce', 'caninde', '05/08/2021 - 18:29', '123123', '112312');

-- --------------------------------------------------------

--
-- Estrutura da tabela `outrosganhos`
--

CREATE TABLE `outrosganhos` (
  `idGanho` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` double NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `outrosganhos`
--

INSERT INTO `outrosganhos` (`idGanho`, `idEmpresa`, `descricao`, `preco`, `data`) VALUES
(2, 1, 'uiyiyu', 66, '10/08/2021 - 15:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `outrosgastos`
--

CREATE TABLE `outrosgastos` (
  `idGasto` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` double NOT NULL,
  `data` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `outrosgastos`
--

INSERT INTO `outrosgastos` (`idGasto`, `idEmpresa`, `descricao`, `preco`, `data`) VALUES
(2, 1, 'Conserto das mesas', 200.75, '09/08/2021 - 23:28'),
(3, 1, 'wewefwefwefwefwe', 21, '10/08/2021 - 14:58');

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
(46, 22, 'Carlos', 'sdgd\r\nsdgsdgsdgsdg\r\ngdsgsdg dsf s dfsdf\r\ndsfsdf\r\nsdfsdfsd', 'lhjkhkj', 0, 'Débito', 'Localmente', 'rua', 'numer', 'bairr', 'complemento', 'ponto de referencia', 'estado', 'cidade', '342', '03/08/2021 - 00:05', 'Pronto'),
(54, 1, 'thaia', '', 'testeeeeeeeeeeee', 4, 'Crédito/Débito', 'Delivery', 'd', '7', 'd', 'l', '', 'l', 'l', '89898.656', '05/08/2021 - 18:29', 'Novo'),
(55, 1, 'thaia', '                                            kçlk                                            hkjhj                  \r\n                ', 'testeeeeeeeeeeee', 4, 'Crédito/Débito', 'Delivery', 'd', '7', 'd', 'l', 'l', 'l', 'l', '89898.656', '05/08/2021 - 18:29', 'Novo'),
(56, 1, 'assadasdas', '                                            kçlk                                            hkjhj                                            carangueijo                  \r\n                ', '2 Teste de funcionamento', 6, 'Crédito/Débito', 'Delivery', 'sadas', '58658', 'hgjghj', 'asdas', 'asdas', 'asdas', 'asdas', '131212321', '05/08/2021 - 18:31', 'Novo'),
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
(71, 1, 'fdgfd', '                                             kçlk \r\n                  \r\n                ', 'gfdfg', 12, 'Crédito/Débito', 'Delivery', 'dfgdf', '7', 'dfgf', 'dasd', 'sadas', 'dasd', 'adasd', '1', '07/08/2021 - 11:10', 'Novo'),
(72, 1, 'fdbdfb', '                                             kçlk \r\n                                             çklçklç \r\n                  \r\n                ', 'carla', 50, 'Crédito', 'Delivery', 'oiu', 'uiu', '8', 'ououi', 'iouoi', 'oiuoi', 'oiuoiu', 'iouoi', '07/08/2021 - 12:25', 'Novo'),
(74, 1, 'ffger', '                                             kçlk \r\n                                             hkjhj \r\n                                             çklçklç \r\n                  \r\n                ', 'dsfsdfdsffdv', 7, 'Crédito/Débito', 'Delivery', 'jlk', '9', 'jlkj', 'lkj', 'lkjlkj', 'lkjlk', 'jlkj', 'jlkljkkjl', '07/08/2021 - 12:52', 'Entregue'),
(75, 1, 'José Wilson de Menezes', '1 hamburguer\r\n2 pizzas\r\n1 cajuina', 'sem cebola no hamburguer', 0, 'Crédito', 'Delivery', 'Via local 8', '67', 'Jubaia', 'lOTEAMENTO SAGRADA FAMILIA', 'IFCE', 'CE', 'Canindé', '(85) 9 8995-8252', '08/08/2021 - 17:38', 'Novo'),
(76, 1, 'gsdg dsfsd fsdf sdfsd fsd', 'ergergregr\r\nsdvsdsdsdf\r\nsdfsdfsdfsdfsdf', 'sdfsdfsdfsd', 22, 'Pix', 'Balcão', '', '', '', '', '', '', 'dfvdf', '123123123', '08/08/2021 - 21:54', 'Novo'),
(78, 1, '', 'fgdgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfg', NULL, 20, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09/08/2021 - 23:15', ''),
(79, 1, 'jkhjkhj', 'fhgfghfgh', 'fghfghfg', 65, 'Crédito/Débito', 'Delivery', '', '', '', '', '', '', 'Caucaia', '40028922', '10/08/2021 - 15:13', 'Novo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtonoestoque`
--

CREATE TABLE `produtonoestoque` (
  `idEstoque` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data` varchar(45) NOT NULL,
  `valorTotal` double NOT NULL,
  `quantidadeTotal` int(11) NOT NULL,
  `quantidadeUtilizada` int(11) NOT NULL,
  `fornecedor` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtonoestoque`
--

INSERT INTO `produtonoestoque` (`idEstoque`, `idEmpresa`, `nome`, `data`, `valorTotal`, `quantidadeTotal`, `quantidadeUtilizada`, `fornecedor`) VALUES
(1, 1, 'Pernil Friboi 1kg', '08/08/2021', 75, 2, 1, 'Friboi LTDA'),
(5, 1, 'mghhj', '08/08/2021 - 20:34', 334, 4, 4, 'fddd'),
(6, 1, 'gfggfghfghfg', '08/08/2021 - 20:34', 43, 4, 4, 'rere'),
(9, 1, 'bnmbnm', '08/09/2021 - 20:40', 54, 5, 5, 'ffghf'),
(10, 1, 'asdasdas', '08/08/2021 - 22:10', 18, 1, 1, 'asdas');

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
-- Índices para tabela `outrosganhos`
--
ALTER TABLE `outrosganhos`
  ADD PRIMARY KEY (`idGanho`);

--
-- Índices para tabela `outrosgastos`
--
ALTER TABLE `outrosgastos`
  ADD PRIMARY KEY (`idGasto`);

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
  MODIFY `IdItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `outrosganhos`
--
ALTER TABLE `outrosganhos`
  MODIFY `idGanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `outrosgastos`
--
ALTER TABLE `outrosgastos`
  MODIFY `idGasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `produtonoestoque`
--
ALTER TABLE `produtonoestoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
