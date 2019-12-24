-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 24-Dez-2019 às 11:49
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id_area`, `nome`, `descricao`, `data`) VALUES
(5, 'Design Gráfico', 'Design Gráfico', '2019-12-11 00:04:52'),
(6, 'Vídeo ', 'Vídeo ', '2019-12-11 00:04:52'),
(7, 'Programação', 'sdsadsadsadasdsaf', '2019-12-21 22:16:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero_utilizador`
--

DROP TABLE IF EXISTS `genero_utilizador`;
CREATE TABLE IF NOT EXISTS `genero_utilizador` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(255) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicao`
--

DROP TABLE IF EXISTS `requisicao`;
CREATE TABLE IF NOT EXISTS `requisicao` (
  `id_requisicao` int(11) NOT NULL AUTO_INCREMENT,
  `id_subarea` int(11) NOT NULL,
  `nome_projeto` varchar(50) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_utilizador` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  PRIMARY KEY (`id_requisicao`),
  KEY `fk_id_utilizador_req_utilizador_req` (`id_utilizador`),
  KEY `fk_id_subarea_req_subarea_req` (`id_subarea`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `requisicao`
--

INSERT INTO `requisicao` (`id_requisicao`, `id_subarea`, `nome_projeto`, `descricao`, `data`, `id_utilizador`, `preco`) VALUES
(1, 6, 'AutoCarlos Stand', 'Criação de um logotipo para um stand de automoveis com o nome Auto Carlos.', '2019-12-11 00:48:48', 8, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `id_utilizador` int(11) NOT NULL,
  `id_subarea` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `fk_id_utilizador_utilizador` (`id_utilizador`),
  KEY `fk_id_subarea_subarea` (`id_subarea`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_utilizador`, `id_subarea`, `data`, `id_servico`, `descricao`) VALUES
(2, 7, '2019-12-24 11:40:59', 17, 'teste'),
(1, 9, '2019-12-11 00:08:11', 18, ''),
(1, 6, '2019-12-11 00:26:39', 19, ''),
(1, 10, '2019-12-11 00:26:39', 20, ''),
(2, 12, '2019-12-12 13:14:31', 21, ''),
(1, 7, '2019-12-21 21:53:56', 22, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subarea`
--

DROP TABLE IF EXISTS `subarea`;
CREATE TABLE IF NOT EXISTS `subarea` (
  `id_subarea` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_area` int(11) NOT NULL,
  PRIMARY KEY (`id_subarea`),
  KEY `fk_id_area_area` (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `nome`, `data`, `id_area`) VALUES
(6, 'Logotipo', '2019-12-11 00:05:41', 5),
(7, 'Flyer', '2019-12-11 00:05:41', 5),
(8, 'Ilustração', '2019-12-11 00:06:24', 5),
(9, 'Video Institucional', '2019-12-11 00:06:24', 6),
(10, 'Animação de Logotipo', '2019-12-11 00:23:03', 6),
(11, 'Edição de Vídeo', '2019-12-11 00:23:03', 6),
(12, 'Motion Graphics', '2019-12-11 00:23:25', 6),
(13, 'Web Design', '2019-12-21 22:18:37', 7),
(14, 'Mobile Apps', '2019-12-21 22:18:37', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_utilizador`
--

DROP TABLE IF EXISTS `tipo_utilizador`;
CREATE TABLE IF NOT EXISTS `tipo_utilizador` (
  `id_tipo` int(11) NOT NULL,
  `nome_tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_utilizador`
--

INSERT INTO `tipo_utilizador` (`id_tipo`, `nome_tipo`) VALUES
(1, 'Cliente'),
(2, 'Trabalhador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `id_utilizador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pass` varchar(20) NOT NULL,
  `tipo_utilizador` int(11) NOT NULL,
  `biografia` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilizador`),
  UNIQUE KEY `id_area` (`id_utilizador`),
  KEY `fk_id_tipo_tipo_utilizador` (`tipo_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `nome`, `id_genero`, `email`, `data_nascimento`, `data`, `pass`, `tipo_utilizador`, `biografia`, `imagem`) VALUES
(1, 'Rafael', 0, 'rafae.xpto@gmail.com', '1993-10-16', '2019-12-23 22:06:31', '12345', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'http://localhost/projetofinal/img/uploads/rafaelhenriques.jpg'),
(2, 'André Ferreira', 0, 'andreferreira@gmail.com', '1999-12-18', '2019-12-23 22:03:18', '12345678', 1, '', 'http://localhost/projetofinal/img/uploads/andreferreira.jpg'),
(4, 'Sofia Santos Barreira', 0, 'sofiasbarreira@gmail.com', '2019-12-11', '2019-12-23 21:02:51', '123456', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(6, 'Jacinta Paes', 0, 'sdsadsad@gmail.com', '2019-12-11', '2019-12-23 21:02:51', '12345678', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(7, 'Nuno ConceiÃ§Ã£o', 0, 'nuno@gmail.com', '2019-12-17', '2019-12-23 21:02:51', '1234567890', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(8, 'Carlos ', 0, 'carlos@gmail.com', '2019-12-18', '2019-12-23 21:02:51', 'asdfgh', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(9, 'ZÃ© Borrego', 0, 'zeborrego@gmail.com', '2019-12-18', '2019-12-23 21:02:51', 'zeborrego', 2, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(10, 'Sofia Ssdfsdfsd', 0, 'sofiasbarreira@gmail.com', '2008-12-12', '2019-12-23 21:02:51', '123456789', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `requisicao`
--
ALTER TABLE `requisicao`
  ADD CONSTRAINT `fk_id_subarea_req_subarea_req` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`),
  ADD CONSTRAINT `fk_id_utilizador_req_utilizador_req` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `fk_id_subarea_subarea` FOREIGN KEY (`id_subarea`) REFERENCES `subarea` (`id_subarea`),
  ADD CONSTRAINT `fk_id_utilizador_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`);

--
-- Limitadores para a tabela `subarea`
--
ALTER TABLE `subarea`
  ADD CONSTRAINT `fk_id_area_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `fk_id_tipo_tipo_utilizador` FOREIGN KEY (`tipo_utilizador`) REFERENCES `tipo_utilizador` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
