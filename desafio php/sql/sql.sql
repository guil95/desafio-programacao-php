-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jun-2015 às 16:45
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `desafio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriapro`
--

CREATE TABLE IF NOT EXISTS `categoriapro` (
  `idCatPro` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCatPro` varchar(40) NOT NULL,
  PRIMARY KEY (`idCatPro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `categoriapro`
--

INSERT INTO `categoriapro` (`idCatPro`, `nomeCatPro`) VALUES
(11, 'Moveis'),
(12, 'Higiene'),
(13, 'Higiene');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `nomeCli` varchar(40) NOT NULL,
  `cpfCli` varchar(40) NOT NULL,
  `telCli` int(11) NOT NULL,
  `idCli` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idCli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`nomeCli`, `cpfCli`, `telCli`, `idCli`) VALUES
('Guilherme', 'teste2', 111, 5),
('Teste', '09466330969', 1, 6),
('Teste', '09466330969', 1, 7),
('Teste', '09466330969', 1, 8),
('Guilherme', 'teste', 1111121, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemvenda`
--

CREATE TABLE IF NOT EXISTS `itemvenda` (
  `idVenda` int(11) NOT NULL,
  `idPro` int(11) NOT NULL,
  `preco` float NOT NULL,
  `qtd` int(11) NOT NULL,
  PRIMARY KEY (`idVenda`,`idPro`),
  KEY `idVenda_2` (`idVenda`),
  KEY `fk_produto` (`idPro`),
  KEY `fk_venda` (`idVenda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itemvenda`
--

INSERT INTO `itemvenda` (`idVenda`, `idPro`, `preco`, `qtd`) VALUES
(176, 34, 10, 10),
(176, 36, 1, 10),
(177, 33, 10, 10),
(177, 34, 10, 10),
(177, 37, 10, 10),
(176, 37, 10, 10),
(176, 33, 10, 10),
(176, 38, 10, 1),
(179, 38, 10, 10),
(179, 37, 10, 10),
(180, 33, 10, 10),
(181, 38, 10, 10),
(181, 37, 10, 10),
(181, 33, 10, 10),
(181, 34, 10, 10),
(181, 36, 1, 10),
(182, 36, 1, 10),
(182, 37, 10, 10),
(182, 33, 10, 10),
(183, 34, 10, 10),
(183, 36, 1, 50),
(182, 34, 10, 10),
(0, 0, 0, 0),
(184, 33, 10, 10),
(184, 36, 1, 10),
(185, 38, 10, 10),
(0, 37, 10, 10),
(0, 33, 10, 10),
(186, 34, 10, 10),
(187, 38, 10, 10),
(187, 36, 1, 1),
(187, 33, 10, 10),
(178, 33, 10, 10),
(178, 34, 10, 10),
(194, 33, 10, 12),
(194, 38, 10, 1),
(194, 34, 10, 1),
(194, 36, 1, 1),
(194, 37, 10, 10),
(194, 39, 10, 10),
(195, 34, 10, 10),
(195, 38, 10, 10),
(195, 37, 10, 10),
(195, 33, 10, 10),
(195, 36, 1, 10),
(195, 40, 10, 10),
(196, 33, 10, 10),
(196, 37, 10, 10),
(196, 34, 10, 5),
(197, 34, 10, 5),
(197, 38, 10, 5),
(198, 33, 10, 10),
(198, 37, 10, 10),
(198, 38, 10, 10),
(199, 38, 10, 10),
(199, 40, 10, 2),
(200, 40, 10, 10),
(200, 38, 10, 10),
(201, 37, 10, 5),
(204, 38, 10, 10),
(206, 38, 10, 10),
(207, 37, 10, 5),
(208, 40, 10, 1),
(208, 39, 10, 10),
(215, 33, 10, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `idPro` int(11) NOT NULL AUTO_INCREMENT,
  `nomePro` varchar(40) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` float NOT NULL,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`idPro`),
  KEY `categoria` (`categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idPro`, `nomePro`, `qtd`, `valor`, `categoria`) VALUES
(40, 'teste', 816, 10, 11),
(39, 'Pasta dental', 797, 10, 12),
(38, 'Sofa', 0, 10, 11),
(36, 'computador', 10, 15, 11),
(34, 'Mesa', 0, 10, 0),
(37, 'cama', 807, 10, 11),
(33, 'Guarda roupa', 804, 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `email`, `senha`, `idUsuario`) VALUES
('Guilherme', 'guilhermerodriguestb@gmail.com', '456', 1),
('Administrador', 'admin@admin.com', 'admin', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `idVenda` int(11) NOT NULL AUTO_INCREMENT,
  `idCli` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `dtVenda` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVenda`),
  KEY `FK_cliente` (`idCli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `idCli`, `status`, `dtVenda`) VALUES
(176, 5, '0', '2015-06-16 20:30:10'),
(177, 5, '0', '2015-06-16 20:30:10'),
(178, 5, '1', '2015-06-16 20:30:10'),
(179, 5, '0', '2015-06-16 20:30:10'),
(180, 5, '0', '2015-06-16 20:30:10'),
(181, 5, '0', '2015-06-16 20:30:10'),
(182, 5, '0', '2015-06-16 20:30:10'),
(183, 5, '1', '2015-06-16 20:30:10'),
(184, 5, '0', '2015-06-16 20:30:10'),
(185, 5, '0', '2015-06-16 20:30:10'),
(186, 5, '1', '2015-06-16 20:30:10'),
(187, 5, '1', '2015-06-16 20:30:10'),
(188, 5, '0', '2015-06-16 20:30:59'),
(189, 5, '0', '2015-06-16 20:31:34'),
(190, 5, '0', '2015-06-16 20:32:56'),
(191, 10, '0', '2015-06-16 20:41:19'),
(192, 10, '0', '2015-06-16 20:44:16'),
(193, 10, '0', '2015-06-16 20:45:41'),
(194, 5, '0', '2015-06-16 20:49:19'),
(195, 5, '0', '2015-06-16 21:17:55'),
(196, 7, '1', '2015-06-17 11:29:38'),
(197, 5, '0', '2015-06-17 11:33:06'),
(198, 5, '0', '2015-06-17 11:40:40'),
(199, 5, '0', '2015-06-17 11:55:18'),
(200, 5, '0', '2015-06-17 12:12:15'),
(201, 5, '0', '2015-06-17 12:13:42'),
(202, 5, '0', '2015-06-17 12:14:12'),
(203, 5, '0', '2015-06-17 12:17:07'),
(204, 5, '0', '2015-06-17 12:19:03'),
(205, 5, '0', '2015-06-17 13:42:27'),
(206, 5, '0', '2015-06-17 18:17:38'),
(207, 5, '0', '2015-06-17 18:19:07'),
(208, 5, '0', '2015-06-17 18:57:25'),
(209, 5, '0', '2015-06-17 19:18:30'),
(210, 5, '0', '2015-06-17 19:40:26'),
(211, 5, '0', '2015-06-17 19:59:02'),
(212, 5, '0', '2015-06-17 20:00:02'),
(213, 5, '0', '2015-06-18 11:20:47'),
(214, 10, '0', '2015-06-18 11:22:11'),
(215, 5, '0', '2015-06-18 11:22:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
