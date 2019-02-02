-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Fev-2018 às 17:08
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outsidefood`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicoes`
--

DROP TABLE IF EXISTS `edicoes`;
CREATE TABLE IF NOT EXISTS `edicoes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `capacidade` int(11) NOT NULL,
  `lotacao` int(11) NOT NULL,
  `eventos_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_edicoes_eventos1_idx` (`eventos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edicoes`
--

INSERT INTO `edicoes` (`id`, `numero`, `capacidade`, `lotacao`, `eventos_id`) VALUES
(1, 3, 269, 435, 1),
(2, 2, 670, 483, 1),
(3, 1, 506, 598, 1),
(4, 3, 333, 595, 1),
(5, 5, 375, 582, 1),
(6, 4, 593, 495, 1),
(7, 3, 393, 226, 1),
(8, 4, 459, 279, 1),
(9, 2, 288, 588, 1),
(10, 4, 696, 294, 1),
(11, 4, 623, 248, 1),
(12, 4, 476, 331, 1),
(13, 4, 528, 290, 1),
(14, 5, 417, 243, 1),
(15, 2, 566, 480, 1),
(16, 4, 347, 144, 1),
(17, 4, 580, 235, 1),
(18, 3, 349, 160, 1),
(19, 3, 402, 319, 1),
(20, 2, 495, 453, 1),
(21, 1, 282, 394, 1),
(22, 4, 283, 166, 1),
(23, 2, 455, 377, 1),
(24, 3, 284, 109, 1),
(25, 3, 505, 185, 1),
(26, 2, 665, 345, 1),
(27, 2, 278, 149, 1),
(28, 5, 565, 213, 1),
(29, 4, 524, 528, 1),
(30, 3, 279, 306, 1),
(31, 1, 555, 518, 1),
(32, 1, 428, 126, 1),
(33, 2, 528, 469, 1),
(34, 4, 590, 382, 1),
(35, 4, 431, 211, 1),
(36, 1, 272, 170, 1),
(37, 5, 685, 347, 1),
(38, 1, 350, 553, 1),
(39, 3, 568, 440, 1),
(40, 4, 662, 303, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `edicoes`
--
ALTER TABLE `edicoes`
  ADD CONSTRAINT `fk_edicoes_eventos1` FOREIGN KEY (`eventos_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
