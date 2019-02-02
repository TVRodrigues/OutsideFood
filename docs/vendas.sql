-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Fev-2018 às 18:31
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
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `servicos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `quantidade`, `servicos_id`) VALUES
(1, 2945, 31),
(2, 994, 9),
(3, 464, 26),
(4, 1866, 25),
(5, 1045, 12),
(6, 443, 34),
(7, 399, 2),
(8, 2567, 19),
(9, 335, 5),
(10, 368, 16),
(11, 1692, 29),
(12, 350, 15),
(13, 2822, 18),
(14, 2948, 25),
(15, 2286, 34),
(16, 78, 36),
(17, 2079, 6),
(18, 2584, 7),
(19, 2963, 17),
(20, 1902, 22),
(21, 2352, 10),
(22, 1700, 32),
(23, 1117, 3),
(24, 893, 37),
(25, 1654, 20),
(26, 1716, 36),
(27, 2848, 6),
(28, 1804, 37),
(29, 1051, 23),
(30, 2667, 40),
(31, 1564, 23),
(32, 168, 31),
(33, 2047, 16),
(34, 1604, 31),
(35, 2455, 29),
(36, 1160, 22),
(37, 1730, 14),
(38, 943, 5),
(39, 2427, 9),
(40, 2590, 38),
(41, 1839, 13),
(42, 1143, 14),
(43, 2346, 14),
(44, 2235, 14),
(45, 1371, 10),
(46, 2265, 4),
(47, 1383, 38),
(48, 1081, 25),
(49, 1323, 38),
(50, 1706, 39),
(51, 466, 13),
(52, 1134, 2),
(53, 2716, 38),
(54, 1376, 35),
(55, 2299, 26),
(56, 1126, 38),
(57, 891, 2),
(58, 2017, 18),
(59, 362, 25),
(60, 2190, 40),
(61, 2421, 14),
(62, 1545, 10),
(63, 923, 20),
(64, 2441, 29),
(65, 1246, 18),
(66, 238, 31),
(67, 2721, 39),
(68, 973, 1),
(69, 826, 36),
(70, 1532, 25),
(71, 476, 14),
(72, 2617, 24),
(73, 1963, 33),
(74, 2676, 26),
(75, 1180, 27),
(76, 103, 40),
(77, 842, 38),
(78, 2167, 38),
(79, 549, 2),
(80, 1838, 2),
(81, 2124, 22),
(82, 1385, 33),
(83, 1860, 22),
(84, 1226, 24),
(85, 184, 27),
(86, 2216, 20),
(87, 2648, 33),
(88, 802, 30),
(89, 950, 21),
(90, 3000, 7),
(91, 1037, 13),
(92, 376, 34),
(93, 780, 29),
(94, 2615, 35),
(95, 778, 29),
(96, 467, 9),
(97, 1400, 7),
(98, 2365, 38),
(99, 2995, 36),
(100, 647, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendas_servicos1_idx` (`servicos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_servicos1` FOREIGN KEY (`servicos_id`) REFERENCES `servicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
