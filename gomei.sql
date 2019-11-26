-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2019 às 14:39
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
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `genero` char(1) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `genero`, `cep`, `uf`) VALUES
(6, 'Cliente2', '289456132-00', 'F', '07812-620', 'SP'),
(7, 'Cliente3', '357159789-00', 'M', '03245-789', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_mei` int(11) DEFAULT NULL,
  `descricaocompra` varchar(200) NOT NULL,
  `dtcompra` datetime NOT NULL,
  `valorcompra` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id_compra`, `id_fornecedor`, `id_mei`, `descricaocompra`, `dtcompra`, `valorcompra`) VALUES
(2, NULL, NULL, 'Pneu', '2019-11-22 18:03:05', '20.00'),
(3, NULL, NULL, 'Lapiseira', '2019-11-22 18:04:28', '15.00'),
(4, NULL, NULL, 'Borracha', '2019-11-22 18:14:17', '2.00'),
(5, 1, 2, 'Curso PHP', '2019-11-23 09:06:32', '100.00'),
(6, 1, 1, 'Curso HTML5', '2019-11-23 09:06:32', '60.00'),
(7, 2, 3, 'Curso CSS', '2019-11-23 09:06:32', '80.00'),
(8, 3, 2, 'Curso JavaScript', '2019-11-23 09:06:32', '200.00'),
(9, 4, 4, 'Curso Java', '2019-11-23 09:06:32', '500.00'),
(10, 4, 6, 'Curso MySQL', '2019-11-23 09:06:33', '200.00'),
(11, 5, 5, 'Curso WebServices', '2019-11-23 09:06:33', '500.00'),
(12, 10, 9, 'Curso Laravel', '2019-11-23 09:19:26', '150.00'),
(13, 1, 10, 'Curso POO', '2019-11-23 09:19:26', '150.00'),
(14, 2, 11, 'Curso MVC', '2019-11-23 09:19:26', '180.00'),
(15, 13, 9, 'Curso JSP', '2019-11-23 09:19:26', '200.00'),
(16, 14, 12, 'Curso JSF', '2019-11-23 09:19:26', '200.00'),
(17, 4, 13, 'Curso Bootstrap', '2019-11-23 09:19:26', '100.00'),
(18, 15, 15, 'Curso Git', '2019-11-23 09:19:26', '150.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` int(11) NOT NULL,
  `id_mei` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `iniciocontrato` datetime NOT NULL,
  `fimcontrato` date DEFAULT NULL,
  `horarioservico` varchar(200) NOT NULL,
  `valorhora` varchar(20) NOT NULL,
  `dtpagamento` varchar(100) NOT NULL,
  `valorpagamento` decimal(7,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contrato`
--

INSERT INTO `contrato` (`id_contrato`, `id_mei`, `id_funcionario`, `iniciocontrato`, `fimcontrato`, `horarioservico`, `valorhora`, `dtpagamento`, `valorpagamento`) VALUES
(2, 1, 5, '2019-11-25 15:45:39', '2019-11-25', '8h - 17h', 'R$ 20.00', 'dias 15 e 28', '3200.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int(11) NOT NULL,
  `descricaoestoque` varchar(200) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `quantidade` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id_estoque`, `descricaoestoque`, `preco`, `quantidade`) VALUES
(11, 'Ganache brigadeiro', '5.00', '1.00'),
(12, 'teclado', '50.00', '1.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `id_mei` int(11) NOT NULL,
  `razaosocial` varchar(200) NOT NULL,
  `inscricaoestadual` varchar(20) NOT NULL,
  `inscricaomunicipal` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `id_mei`, `razaosocial`, `inscricaoestadual`, `inscricaomunicipal`) VALUES
(9, 9, 'LG', '456798765/0001', '98765/0001SC'),
(10, 9, 'For11', '1123456789/0001', '1123456789/0001SP'),
(12, 10, 'FornecedorTeste1', '123456782', '123456782SP'),
(13, 10, 'Fornecedor6', '623456782', '623456782SP'),
(14, 10, 'FornecedorTeste2', '2723456782', '2723456782SP'),
(15, 11, 'Fornecedor8', '8623456782', '823456782SP'),
(16, 9, 'hp S/A', '123456782100', '123456782100SP'),
(17, 1, 'Lenovo', '123456789/00001', '123456789/00001SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
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
  `ctps` varchar(20) DEFAULT NULL,
  `pispasep` varchar(20) DEFAULT NULL,
  `numeroconta` varchar(20) DEFAULT NULL,
  `tipoconta` varchar(50) DEFAULT NULL,
  `nomebanco` varchar(50) DEFAULT NULL,
  `agenciabancaria` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `cpf`, `email`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`, `ctps`, `pispasep`, `numeroconta`, `tipoconta`, `nomebanco`, `agenciabancaria`) VALUES
(5, 'Camila', '789456132-78', 'camila@gmail.com', '86 4587-7894', '86 9 7894-1522', 'F', '78123549-7', 'Creusa', 'Carlos', '02556-789', 'Rua Barata Ribeiro', '7897', 'Ãgua Branca', 'SÃ£o Pedro', 'PI', '4567-789', '132456-015', '789654-4561', 'PoupanÃ§a', 'Banco do Brasil', '054');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mei`
--

CREATE TABLE `mei` (
  `id_mei` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `razaosocial` varchar(200) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `ocupacaoprincipal` varchar(200) DEFAULT NULL,
  `ocupacaosecundaria` varchar(200) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(200) DEFAULT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mei`
--

INSERT INTO `mei` (`id_mei`, `nome`, `email`, `senha`, `razaosocial`, `cnpj`, `ocupacaoprincipal`, `ocupacaosecundaria`, `cpf`, `tel`, `cel`, `sexo`, `rg`, `nome_mae`, `nome_pai`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `uf`) VALUES
(1, 'Paloma', 'paloma@gmail.com', 'f27f6f1c7c5cbf4e3e192e0a47b85300', 'Paloma Ltda', '123456789-78', 'programadora independente', 'Professora', '456789123-00', '51 45678932', '51 45678923', 'F', '789435498-3', 'Dona Lucrécia', 'Seu Sebastião', '06812-154', 'Rua Boituva', '45A', 'São Nicolau', 'Porto Alegre', 'RS'),
(2, 'Joselito', 'joselito@gmail.com', '2af54305f183778d87de0c70c591fae4', 'Joselito Ltda.', '123456789-98', 'MÃ¡gico Independente', 'desenhista', '123456789-01', '11 2678-7891', '11 9 7845-7841', 'M', '789435498-1', 'Maria Lito', 'JoÃ£o Lito', '06812-003', 'Rua Maracatu', '789', 'BrÃ¡s', 'SÃ£o Paulo', 'uf'),
(3, 'Joana', 'joana@gmail.com', '2af54305f183778d87de0c70c591fae4', 'Joana Ltda.', '123456789-12', 'Manicure', 'Pedicure', '357159789-03', '11 2678-7894', '11 9 7845-7845', 'F', '789435498-3', 'Dona Alzira', 'Seu RoboÃ£o', '02657-128', 'Av. MarquÃªs de SÃ¢o Vicente', '1254', 'Barra Funda', 'SÃ£o Paulo', 'uf'),
(4, 'gustavo', 'gustavo @ g email.com', 'c1ebb4933e06ce5617483f665e26627c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Patrícia', 'patricia@gmail.com', 'f27f6f1c7c5cbf4e3e192e0a47b85300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Rúbens', 'rubens@gmail.com', '44f437ced647ec3f40fa0841041871cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Fernandèz', 'fernandez@gmail.com', '343d9040a671c45832ee5381860e2996', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Ágata', 'agata@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Ramirès', 'ramires@gmail.com', '44f437ced647ec3f40fa0841041871cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Ólga', 'olga@gmail.com', '7f94dd413148ff9ac9e9e4b6ff2b6ca9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Ísis', 'isis@gmail.com', '36347412c7d30ae6fde3742bbc4f21b9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Élida', 'elida@gmail.com', 'd2f2297d6e829cd3493aa7de4416a18f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Bóson', 'boson@gmail.com', '08f8e0260c64418510cefb2b06eee5cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Carlos', 'carlos@gmail.com', '9df62e693988eb4e1e1444ece0578579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Dálete', 'dalete@gmail.com', '77963b7a931377ad4ab5ad6a9cd718aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Gabriela', 'gabriela@gmail.com', 'ba248c985ace94863880921d8900c53f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Hízzis', 'hizzis@gmail.com', 'a3aca2964e72000eea4c56cb341002a4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `descricaoservico` varchar(200) NOT NULL,
  `precoservico` decimal(7,2) NOT NULL,
  `quantidadeservico` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `descricaoservico`, `precoservico`, `quantidadeservico`) VALUES
(2, 'Cortar cabelo', '20.00', '1.00'),
(5, 'ManutenÃ§Ã£o de pc', '60.00', '1.00'),
(6, 'Conserto de geladeira', '100.00', '1.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_mei` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_servico` int(11) DEFAULT NULL,
  `id_estoque` int(11) DEFAULT NULL,
  `produto_servico` varchar(200) NOT NULL,
  `dtvenda` datetime NOT NULL,
  `qtd` decimal(7,2) NOT NULL,
  `valortotal` decimal(7,2) NOT NULL,
  `valorrecebido` decimal(7,2) NOT NULL,
  `troco` decimal(7,2) NOT NULL,
  `formapgto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_mei`, `id_cliente`, `id_servico`, `id_estoque`, `produto_servico`, `dtvenda`, `qtd`, `valortotal`, `valorrecebido`, `troco`, `formapgto`) VALUES
(1, NULL, NULL, NULL, 7, 'agua mineral', '2019-11-22 12:13:07', '2.00', '10.00', '20.00', '10.00', 'dinheiro'),
(2, NULL, NULL, NULL, 11, 'sapato preto', '2019-11-22 12:37:43', '1.00', '100.00', '100.00', '0.00', 'dinheiro'),
(3, NULL, NULL, NULL, 1, 'camiseta amarela', '2019-11-22 12:47:14', '1.00', '80.00', '100.00', '20.00', 'dinheiro'),
(4, NULL, NULL, NULL, 12, 'celular', '2019-11-22 13:02:32', '1.00', '800.00', '800.00', '0.00', 'dinheiro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_fornecedor` (`id_fornecedor`),
  ADD KEY `id_mei` (`id_mei`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `id_mei` (`id_mei`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `mei`
--
ALTER TABLE `mei`
  ADD PRIMARY KEY (`id_mei`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_mei` (`id_mei`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_servico` (`id_servico`),
  ADD KEY `fk_venda_id_estoque` (`id_estoque`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mei`
--
ALTER TABLE `mei`
  MODIFY `id_mei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_mei`) REFERENCES `mei` (`id_mei`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_id_estoque` FOREIGN KEY (`id_estoque`) REFERENCES `estoque` (`id_estoque`),
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_mei`) REFERENCES `mei` (`id_mei`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `venda_ibfk_3` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
  ADD CONSTRAINT `venda_ibfk_4` FOREIGN KEY (`id_estoque`) REFERENCES `estoque` (`id_estoque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
