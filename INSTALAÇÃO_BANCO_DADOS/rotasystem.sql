-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Out-2015 às 22:17
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rotasystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE IF NOT EXISTS `motorista` (
  `mot_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mot_nome` varchar(100) DEFAULT NULL,
  `mot_cat` varchar(2) DEFAULT NULL,
  `mot_fone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`mot_id`, `mot_nome`, `mot_cat`, `mot_fone`) VALUES
(1, 'Manoel de Melo', 'B', '(92) 9XXX-XXXX'),
(2, 'Lucas Bomfim', 'B', '(92) 9XXX-XXXX');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota`
--

CREATE TABLE IF NOT EXISTS `rota` (
  `rot_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `motorista_mot_id` int(10) unsigned NOT NULL,
  `veiculos_vei_id` int(10) unsigned NOT NULL,
  `rot_nome` varchar(100) DEFAULT NULL,
  `rot_data` date DEFAULT NULL,
  `rot_horaentrada` varchar(50) DEFAULT NULL,
  `rot_horaeatrazo` varchar(50) DEFAULT NULL,
  `rot_horasaida` varchar(50) DEFAULT NULL,
  `rot_horasatrazo` varchar(50) DEFAULT NULL,
  `rot_status_rota` varchar(100) NOT NULL,
  PRIMARY KEY (`rot_id`),
  KEY `rota_FKIndex1` (`veiculos_vei_id`),
  KEY `rota_FKIndex2` (`motorista_mot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `rota`
--

INSERT INTO `rota` (`rot_id`, `motorista_mot_id`, `veiculos_vei_id`, `rot_nome`, `rot_data`, `rot_horaentrada`, `rot_horaeatrazo`, `rot_horasaida`, `rot_horasatrazo`, `rot_status_rota`) VALUES
(1, 1, 1, 'A', '2015-10-06', '17:00', '-', '19:00', '-', 'Em Rota'),
(2, 1, 1, 'B', '2015-10-08', '13:00', '-', '17:00', '-', 'Inativo'),
(3, 1, 1, 'C', '2015-10-04', '15:00', '-', '18:00', '18:30', 'Finalizada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(100) DEFAULT NULL,
  `usu_email` varchar(100) DEFAULT NULL,
  `usu_fone` varchar(100) DEFAULT NULL,
  `usu_login` varchar(100) DEFAULT NULL,
  `usu_senha` varchar(100) DEFAULT NULL,
  `usu_nivel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_email`, `usu_fone`, `usu_login`, `usu_senha`, `usu_nivel`) VALUES
(1, 'Marcos Silva Mota', 'marcos@gmail.com', '(92) 9 XXXX-XXXX', 'admin', 'admin', 'adminsitrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE IF NOT EXISTS `veiculos` (
  `vei_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vei_modelo` varchar(100) DEFAULT NULL,
  `vei_marca` varchar(100) DEFAULT NULL,
  `vei_placa` varchar(7) DEFAULT NULL,
  `vei_ano` varchar(4) DEFAULT NULL,
  `vei_lotacao` int(10) unsigned DEFAULT NULL,
  `vei_datavistoria` date DEFAULT NULL,
  PRIMARY KEY (`vei_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`vei_id`, `vei_modelo`, `vei_marca`, `vei_placa`, `vei_ano`, `vei_lotacao`, `vei_datavistoria`) VALUES
(1, 'Onibus', 'Marcopolo', 'AEI 365', '2015', 20, '2015-10-06'),
(2, 'Micro-onibus', 'Mercedes', 'KFG 972', '2014', 10, '2015-10-07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
