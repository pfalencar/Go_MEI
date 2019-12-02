-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Nov-2019 às 21:18
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gomei`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(200) NOT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `hr` time DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `nome`, `cpf`, `email`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`, `dt`, `hr`, `situacao`) VALUES
(2, 1, 'Pedro Faria', '85426544456', 'pedro@gmail.com', '1129442633', '11988387640', 'M', '5519992952', 'William', 'Lilian', '08215320', 'Rua Flor da Verdade', '456', 'Itaquera', 'SÃ£o Paulo', 'AC', '2019-11-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricaoestoque` varchar(200) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `quantidade` decimal(7,2) NOT NULL,
  `hr` time DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `id_usuario`, `descricaoestoque`, `preco`, `quantidade`, `hr`, `dt`, `situacao`) VALUES
(1, 1, 'Martelo', '14.99', '5.00', NULL, '2019-11-27', NULL),
(3, 1, 'Controle Remoto', '59.99', '12.00', NULL, '2019-11-26', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `razaosocial` varchar(200) NOT NULL,
  `inscricaoestadual` varchar(20) NOT NULL,
  `inscricaomunicipal` varchar(32) NOT NULL,
  `hr` time DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `id_usuario`, `razaosocial`, `inscricaoestadual`, `inscricaomunicipal`, `hr`, `dt`, `situacao`) VALUES
(1, 2, 'HENRIQUE LTDA ME', '01254632', '7854255', NULL, '2019-11-27', NULL),
(2, 1, 'MARCOS LTDA', '01254632', '12283293812', NULL, '2019-11-27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mei`
--

CREATE TABLE `mei` (
  `id_mei` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nomecompleto` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `razaosocial` varchar(200) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `ocupacaoprincipal` varchar(200) NOT NULL,
  `ocupacaosecundaria` varchar(200) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(200) NOT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `cep` varchar(20) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mei`
--

INSERT INTO `mei` (`id_mei`, `id_usuario`, `nomecompleto`, `email`, `razaosocial`, `cnpj`, `ocupacaoprincipal`, `ocupacaosecundaria`, `cpf`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`) VALUES
(1, 1, 'Maria Patricia', 'henrique05212@hotmail.com', 'MARIA LTDA', '1545245415', 'Professora', 'Secretaria', '12012012014', '1129442633', '11988387640', 'F', '5519992952', 'lilian', 'darcio', '08215320', 'Rua Flor da Verdade', '456', 'Itaquera', 'SÃ£o Paulo', 'uf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricaoservico` varchar(200) NOT NULL,
  `precoservico` decimal(7,2) NOT NULL,
  `quantidadeservico` decimal(7,2) NOT NULL,
  `dt` date DEFAULT NULL,
  `hr` time DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `id_usuario`, `descricaoservico`, `precoservico`, `quantidadeservico`, `dt`, `hr`, `situacao`) VALUES
(1, 2, 'InstalaÃ§Ã£o de ArmÃ¡rios', '229.98', '10.00', '2019-11-27', NULL, NULL),
(2, 1, 'Cortar grama', '159.99', '10.00', '2019-11-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(200) NOT NULL,
  `senha_usuario` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'Maria', 'maria@gmail.com', 'c4efd5020cb49b9d3257ffa0fbccc0ae'),
(2, 'Henrique', 'henrique2@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Fernanda', 'fernanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `mei`
--
ALTER TABLE `mei`
  ADD PRIMARY KEY (`id_mei`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mei`
--
ALTER TABLE `mei`
  MODIFY `id_mei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
