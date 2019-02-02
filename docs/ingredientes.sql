-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Fev-2018 às 18:38
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
-- Estrutura da tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nome`) VALUES
(1, 'farinha de trigo'),
(2, 'ovo'),
(3, 'leite'),
(4, 'camarão'),
(5, 'massa'),
(6, 'tomate'),
(7, 'pão'),
(8, 'creme de leite'),
(9, 'peixe'),
(10, 'corante'),
(11, 'vinho'),
(12, 'azeite'),
(13, 'sal'),
(14, 'farinha de rosca'),
(15, 'alface'),
(16, 'salsicha'),
(17, 'cebolinha'),
(18, 'salsinha'),
(19, 'cenoura'),
(20, 'batata'),
(21, 'pimenta'),
(22, 'linguiça'),
(23, 'feijão'),
(24, 'arroz'),
(25, 'bacon'),
(26, 'queijo'),
(27, 'presunto'),
(28, 'mussarela'),
(29, 'pimentão'),
(30, 'alho'),
(31, 'café'),
(32, 'chocolate'),
(33, 'cacau'),
(34, 'alho poró'),
(35, 'champingnon'),
(36, 'vieiras'),
(37, 'óleo'),
(38, 'mandioca'),
(39, 'amido de milho'),
(40, 'cebola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
