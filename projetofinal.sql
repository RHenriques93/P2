-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Dez-2019 às 21:43
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
  `img_area` varchar(255) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id_area`, `nome`, `descricao`, `data`, `img_area`) VALUES
(5, 'Design Gráfico', 'Design Gráfico', '2019-12-26 17:50:19', 'computer.png'),
(6, 'Vídeo ', 'Vídeo ', '2019-12-26 17:50:50', 'video.png'),
(7, 'Programação', 'Programação', '2019-12-26 17:50:51', 'html-coding.png');

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

--
-- Extraindo dados da tabela `genero_utilizador`
--

INSERT INTO `genero_utilizador` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco_servico`
--

DROP TABLE IF EXISTS `preco_servico`;
CREATE TABLE IF NOT EXISTS `preco_servico` (
  `id_preco_servico` int(11) NOT NULL AUTO_INCREMENT,
  `base` int(11) NOT NULL,
  `padrao` int(11) NOT NULL,
  `premium` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  PRIMARY KEY (`id_preco_servico`),
  KEY `fk_id_servico_servico` (`id_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `preco_servico`
--

INSERT INTO `preco_servico` (`id_preco_servico`, `base`, `padrao`, `premium`, `id_servico`) VALUES
(6, 10, 20, 30, 17),
(7, 210, 350, 500, 18),
(8, 25, 50, 100, 19),
(9, 25, 35, 50, 21),
(11, 40, 50, 60, 30),
(12, 30, 40, 50, 45),
(13, 10, 20, 30, 46);

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
  `img_req` varchar(255) NOT NULL DEFAULT 'http://localhost/projetofinal/img/uploads/exemplo.jpg',
  PRIMARY KEY (`id_requisicao`),
  KEY `fk_id_utilizador_req_utilizador_req` (`id_utilizador`),
  KEY `fk_id_subarea_req_subarea_req` (`id_subarea`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `requisicao`
--

INSERT INTO `requisicao` (`id_requisicao`, `id_subarea`, `nome_projeto`, `descricao`, `data`, `id_utilizador`, `preco`, `img_req`) VALUES
(1, 6, 'Auto Carlos Stand 2019', 'CriaÃ§Ã£o de um logÃ³tipo para um stand de automÃ³veis com o nome Auto Carlos.', '2019-12-27 13:21:47', 8, 200, 'http://localhost/projetofinal/img/uploads/83519.png'),
(2, 7, 'Evento de Natal ', 'CriaÃ§Ã£o de um flyer para um evento de natal onde  irÃ£o decorrer concertos etc.', '2019-12-27 13:50:01', 8, 100, 'http://localhost/projetofinal/img/uploads/83519.png');

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
  `img_service` varchar(255) NOT NULL DEFAULT 'http://localhost/projetofinal/img/uploads/exemplo.jpg',
  `id_preco_servico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `fk_id_utilizador_utilizador` (`id_utilizador`),
  KEY `fk_id_subarea_subarea` (`id_subarea`),
  KEY `fk_id_preco_servico_preco_servico` (`id_preco_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_utilizador`, `id_subarea`, `data`, `id_servico`, `descricao`, `img_service`, `id_preco_servico`) VALUES
(2, 7, '2019-12-26 22:01:41', 17, 'teste', 'http://localhost/projetofinal/img/uploads/exemplo.jpg', 1),
(1, 9, '2019-12-27 13:17:14', 18, 'Crio vÃ­deos para vÃ¡rios tipo de empresas .', 'http://localhost/projetofinal/img/uploads/83519.png', 1),
(1, 6, '2019-12-26 22:01:41', 19, 'CriaÃ§Ã£o de Logotipos para varios tipos de empresas ou individuos.', 'http://localhost/projetofinal/img/uploads/exemplo.jpg', 1),
(2, 12, '2019-12-26 22:01:41', 21, '', 'http://localhost/projetofinal/img/uploads/exemplo.jpg', 1),
(11, 7, '2019-12-26 22:01:41', 30, 'CriaÃ§Ã£o de flyers para todo o tipo de eventos.', 'http://localhost/projetofinal/img/uploads/exemplo.jpg', 1),
(4, 6, '2019-12-26 22:01:41', 45, 'CriaÃ§Ã£o de vÃ­deos do tipo motion graphicss.jdsadsas sddfdddeexxxxt4rrttffxxxx', 'http://localhost/projetofinal/img/uploads/11-11.png', 1),
(4, 13, '2019-12-26 22:01:41', 46, 'realizo serviÃ§os de web design, linguagens html, javascript, php ETCs - xxx', 'http://localhost/projetofinal/img/uploads/exemplo.jpg', 1);

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
  `img_subarea` varchar(255) NOT NULL,
  PRIMARY KEY (`id_subarea`),
  KEY `fk_id_area_area` (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subarea`
--

INSERT INTO `subarea` (`id_subarea`, `nome`, `data`, `id_area`, `img_subarea`) VALUES
(6, 'Logotipo', '2019-12-26 18:16:48', 5, 'logo-design.png'),
(7, 'Flyer', '2019-12-26 18:16:48', 5, 'flyer-for-promotion.png'),
(8, 'Ilustração', '2019-12-26 18:16:48', 5, 'illustration.png'),
(9, 'Video Institucional', '2019-12-26 18:28:32', 6, 'video_institucional.png'),
(10, 'Animação de Logotipo', '2019-12-26 18:28:32', 6, 'logo-design.png'),
(11, 'Edição de Vídeo', '2019-12-26 18:28:32', 6, 'videoediting.png'),
(12, 'Motion Graphics', '2019-12-26 18:28:32', 6, 'motion-graphics.png'),
(13, 'Web Design', '2019-12-26 18:31:59', 7, 'web_design.png'),
(14, 'Mobile Apps', '2019-12-26 18:32:13', 7, 'mobile-app.png');

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
(2, 'Trabalhador'),
(3, 'Cliente e Trabalhador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

DROP TABLE IF EXISTS `utilizador`;
CREATE TABLE IF NOT EXISTS `utilizador` (
  `id_utilizador` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pass` varchar(20) NOT NULL,
  `tipo_utilizador` int(11) NOT NULL,
  `biografia` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_utilizador`),
  UNIQUE KEY `id_area` (`id_utilizador`),
  KEY `fk_id_tipo_tipo_utilizador` (`tipo_utilizador`),
  KEY `fk_id_genero_genero_utilizador` (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `username`, `nome`, `id_genero`, `email`, `data_nascimento`, `data`, `pass`, `tipo_utilizador`, `biografia`, `imagem`) VALUES
(1, 'rafaelxoxota', 'Rafael', 1, 'rafae.xpto@gmail.com', '1993-10-16', '2019-12-27 11:12:10', '12345', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'http://localhost/projetofinal/img/uploads/rafaelhenriques.jpg'),
(2, 'andreferreira', 'André Ferreira', 1, 'andreferreira@gmail.com', '1999-12-18', '2019-12-24 18:43:36', '12345678', 1, 'toque retal', 'http://localhost/projetofinal/img/uploads/andreferreira.jpg'),
(4, 'sofia', 'Sofia Santos Barreira', 2, 'sofiasbarreira@gmail.com', '2019-12-11', '2019-12-26 16:52:22', '123456', 2, 'teste', 'http://localhost/projetofinal/img/uploads/78-2-e1574805386187.jpg'),
(6, '', 'Jacinta Paes', 2, 'sdsadsad@gmail.com', '2019-12-11', '2019-12-24 12:02:45', '12345678', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(7, '', 'Nuno Conceição', 2, 'nuno@gmail.com', '2019-12-17', '2019-12-24 12:02:45', '1234567890', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(8, 'Carlos1999', 'Carlos ', 1, 'carlos@gmail.com', '2019-12-18', '2019-12-27 13:52:26', 'asdfgh', 3, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(9, '', 'Zé Borrego', 1, 'zeborrego@gmail.com', '2019-12-18', '2019-12-24 12:02:45', 'zeborrego', 2, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(10, '', 'Sofia Ssdfsdfsd', 2, 'sofiasbarreira@gmail.com', '2008-12-12', '2019-12-24 12:02:45', '123456789', 1, '', 'http://localhost/projetofinal/img/uploads/hacksawridge.jpg'),
(11, 'putinha', 'Sheila', 2, 'sheila@gmail.com', '2019-12-17', '2019-12-26 11:09:29', '12345', 2, '', 'http://localhost/projetofinal/img/uploads/thehatefuleight.jpg');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `preco_servico`
--
ALTER TABLE `preco_servico`
  ADD CONSTRAINT `fk_id_servico_servico` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `fk_id_genero_genero_utilizador` FOREIGN KEY (`id_genero`) REFERENCES `genero_utilizador` (`id_genero`),
  ADD CONSTRAINT `fk_id_tipo_tipo_utilizador` FOREIGN KEY (`tipo_utilizador`) REFERENCES `tipo_utilizador` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
