-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Fev-2018 às 18:14
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
-- Estrutura da tabela `pratos`
--

CREATE TABLE `pratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `preco` double NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pratos`
--

INSERT INTO `pratos` (`id`, `nome`, `preco`, `foto`) VALUES
(1, 'Feijoada', 17.23, 'foto'),
(2, 'Macarrão', 12.59, 'foto'),
(3, 'Sushi', 24.94, 'foto'),
(4, 'Crepes', 10.45, 'foto'),
(5, 'Mingau de Farinha de Tapioca', 13.89, 'foto'),
(6, 'Tacos', 10.46, 'foto'),
(7, 'Bacalhau', 39.67, 'foto'),
(8, 'Bobotie', 16.78, 'foto'),
(9, 'Ganoush', 19.31, 'foto'),
(10, 'Tourtière', 30.78, 'foto'),
(11, 'Mocotó', 20.23, 'foto'),
(12, 'Sanduiche Natural', 8.59, 'foto'),
(13, 'Pastel de Queijo', 4.5, 'foto'),
(14, 'Pastel de Carne', 4.5, 'foto'),
(15, 'Pastel de Pizza', 6.5, 'foto'),
(16, 'Feijão Tropeiro', 10, 'foto'),
(17, 'Vatapá', 15.99, 'foto'),
(18, 'Acarajé', 8, 'foto'),
(19, 'Empadão', 6, 'foto'),
(20, 'Tapioca', 9.99, 'foto'),
(21, 'Lasanha', 20.23, 'foto'),
(22, 'Escondidinho de Carne moída', 20, 'foto'),
(23, 'Hamburguer', 14.5, 'foto'),
(24, 'Misto Quente', 4.5, 'foto'),
(25, 'Moqueca', 6.5, 'foto'),
(26, 'Charque', 20.46, 'foto'),
(27, 'Risoto', 39.67, 'foto'),
(28, 'Khao tom', 16.78, 'foto'),
(29, 'Bún bò Huế', 19.31, 'foto'),
(30, 'Bánh bao', 30.78, 'foto'),
(31, 'Bánh xèo', 20.23, 'foto'),
(32, 'Cassoulet', 38.59, 'foto'),
(33, 'Blanquette de veau', 44.5, 'foto'),
(34, 'Coq au vin', 4.5, 'foto'),
(35, 'Biltong', 26.5, 'foto'),
(36, 'Bobotie', 10.46, 'foto'),
(37, 'Chakalaka', 39.67, 'foto'),
(38, 'Baião de Dois', 16.78, 'foto'),
(39, 'Melktert', 19.31, 'foto'),
(40, 'Sosatie', 30.78, 'foto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pratos`
--
ALTER TABLE `pratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
