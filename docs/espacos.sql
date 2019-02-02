-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Fev-2018 às 16:53
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
-- Estrutura da tabela `espacos`
--

DROP TABLE IF EXISTS `espacos`;
CREATE TABLE IF NOT EXISTS `espacos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `aluguel` double NOT NULL,
  `metragem` double NOT NULL,
  `benfeitoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `espacos`
--

INSERT INTO `espacos` (`id`, `nome`, `aluguel`, `metragem`, `benfeitoria`) VALUES
(1, 'Palco', 515.67, 400, 'Asfaltamento'),
(2, 'Quiosque', 433.92, 300, 'Substituição dos sistemas elétricos'),
(3, 'Rua 1', 602.91, 218.98, 'Limpeza da rua'),
(4, 'Rua 2', 518.14, 518.07, 'Asfaltamento'),
(5, 'Rua 3', 194.04, 228.26, 'Instalação de grades protetoras'),
(6, 'Rua 4', 281.85, 431.92, 'Obra de Jardinagem'),
(7, 'Quiosque', 433.92, 300, 'Reconstrução de muro'),
(8, 'Palco', 515.67, 400, 'Pintura'),
(9, 'Rua 5', 331.66, 780.09, 'Estátua'),
(10, 'Rua 3', 157.69, 106.49, 'Chafariz'),
(11, 'Gramado', 460, 250, 'Corte do gramado'),
(12, 'Gramado', 460, 250, 'Construção de grade'),
(13, 'Gramado', 460, 250, 'Obra de Jardinagem'),
(14, 'Gramado', 460, 250, 'Limpeza do gramado'),
(15, 'Gramado', 460, 250, 'Instalação de poste de luz'),
(16, 'Palco', 515.67, 400, 'Limpeza'),
(17, 'Palco', 515.67, 400, 'Pintura'),
(18, 'Quiosque', 433.92, 300, 'Instalação de grades protetoras'),
(19, 'Quiosque', 433.92, 300, 'Demão de Verniz'),
(20, 'Quiosque', 433.92, 300, 'Manutenção do telhado'),
(21, 'Quiosque', 433.92, 300, 'Substituição do piso'),
(22, 'Quiosque', 433.92, 300, 'Limpeza'),
(23, 'Quiosque', 433.92, 300, 'Instalação de grade'),
(24, 'Rua 1', 460, 602.91, 'Manutenção da rua'),
(25, 'Rua 1', 602.91, 250, 'Instalação de lixeira'),
(26, 'Rua 1', 460, 250, 'Pintura'),
(27, 'Rua 2', 602.91, 106.49, 'Manutenção da rua'),
(28, 'Rua 2', 602.91, 106.49, 'Instalação de lixeira'),
(29, 'Rua 2', 602.91, 106.49, 'Pintura'),
(30, 'Rua 3', 602.91, 106.49, 'Manutenção da rua'),
(31, 'Rua 3', 602.91, 106.49, 'Instalação de lixeira'),
(32, 'Rua 3', 602.91, 106.49, 'Pintura'),
(33, 'Rua 4', 602.91, 106.49, 'Manutenção da rua'),
(34, 'Rua 4', 602.91, 106.49, 'Instalação de lixeira'),
(35, 'Rua 4', 602.91, 106.49, 'Pintura'),
(36, 'Rua 5', 602.91, 106.49, 'Manutenção da rua'),
(37, 'Rua 5', 602.91, 106.49, 'Instalação de lixeira'),
(38, 'Rua 5', 602.91, 106.49, 'Pintura'),
(39, 'Cimentado', 307.99, 150.2, 'Encerar piso'),
(40, 'Cimentado', 307.99, 150.2, 'Limpeza'),
(41, 'Cimentado', 307.99, 150.2, 'Pintura'),
(42, 'Cimentado', 307.99, 150.2, 'Coleta de Lixo'),
(43, 'Cimentado', 307.99, 150.2, 'Instalação de lixeiras'),
(44, 'Cimentado', 307.99, 150.2, 'Instalação de Rampas'),
(45, 'Cimentado', 307.99, 150.2, 'Instalação de Postes de luz'),
(46, 'Cimentado', 307.99, 150.2, 'Manutenção da rede elétrica'),
(47, 'Cimentado', 307.99, 150.2, 'Manutenção Hidraulica'),
(48, 'Cimentado', 307.99, 150.2, 'Instalação de Pias'),
(49, 'Quiosque', 433.92, 300, 'Instalação de Pias'),
(50, 'Quiosque', 433.92, 300, 'Manutenção Hidraulica');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
