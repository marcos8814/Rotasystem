-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Out-2015 às 04:01
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `rotasystem`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`mot_id`, `mot_nome`, `mot_cat`, `mot_fone`) VALUES
(1, 'Manoel de Melo', 'B', '(92) 9XXX-XXXX'),
(2, 'Lucas Bomfim', 'B', '(92) 9XXX-XXXX'),
(3, ' JosÃ© de Oliveira Martins', 'D', '(92) 99154-5622');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota`
--

CREATE TABLE IF NOT EXISTS `rota` (
  `rot_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `motorista_mot_id` int(10) unsigned NOT NULL,
  `veiculos_vei_id` int(10) unsigned NOT NULL,
  `rot_nome` varchar(100) DEFAULT NULL,
  `rot_data` varchar(10) DEFAULT NULL,
  `rot_horaentrada` varchar(50) DEFAULT NULL,
  `rot_horaeatrazo` varchar(50) DEFAULT NULL,
  `rot_horasaida` varchar(50) DEFAULT NULL,
  `rot_horasatrazo` varchar(50) DEFAULT NULL,
  `rot_status_rota` varchar(100) NOT NULL,
  `rot_rfid` varchar(100) NOT NULL,
  PRIMARY KEY (`rot_id`),
  KEY `rota_FKIndex1` (`veiculos_vei_id`),
  KEY `rota_FKIndex2` (`motorista_mot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `rota`
--

INSERT INTO `rota` (`rot_id`, `motorista_mot_id`, `veiculos_vei_id`, `rot_nome`, `rot_data`, `rot_horaentrada`, `rot_horaeatrazo`, `rot_horasaida`, `rot_horasatrazo`, `rot_status_rota`, `rot_rfid`) VALUES
(47, 1, 1, 'CENTRO - A', '12/11/2015', '13:00', '23:50', '15:00', '23:50', 'Finalizada', '12345678980'),
(48, 1, 1, 'CENTRO - B', '12/11/2015', '13:00', '23:52', '15:00', '23:52', 'Finalizada', '12345678980');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_email`, `usu_fone`, `usu_login`, `usu_senha`, `usu_nivel`) VALUES
(1, 'Marcos Silva Mota', 'marcos@gmail.com', '(92) 9 XXXX-XXXX', 'admin', 'admin', 'administrador'),
(2, ' JosÃ© de Oliveira Martins', ' jose@dominio.com.br', '(92) 99154-5622', 'jose', '123456', 'usuario');

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
  `vei_lotacao` varchar(10) DEFAULT NULL,
  `vei_datavistoria` varchar(10) DEFAULT NULL,
  `vei_etiqueta` varchar(100) NOT NULL,
  `vei_status` varchar(100) NOT NULL,
  PRIMARY KEY (`vei_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`vei_id`, `vei_modelo`, `vei_marca`, `vei_placa`, `vei_ano`, `vei_lotacao`, `vei_datavistoria`, `vei_etiqueta`, `vei_status`) VALUES
(1, 'Onibus', 'Marcopolo', 'AEI 365', '2015', '20', '2015-10-06', '12345678980', 'Disponivel'),
(2, 'Micro-onibus', 'Mercedes', 'KFG 972', '2014', '10', '2015-10-07', '0000000000', 'Disponivel'),
(11, 'Mine van', 'kia', 'ABC-123', '2014', '15', '12/11/2015', '2016', 'Disponivel'),
(12, 'Micro-Ã´nibus', 'Marcopolo', 'JWN-312', '2015', '23', '12/11/2015', '20152015', 'Disponivel');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
