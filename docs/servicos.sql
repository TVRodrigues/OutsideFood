-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Fev-2018 às 12:25
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
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `salario` varchar(15) NOT NULL,
  `espacos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `tipo`, `foto`, `salario`, `espacos_id`) VALUES
(1, 1, 'foto', '1425.54', 2),
(2, 0, 'foto', '4139.73', 4),
(3, 1, 'foto', '1294.95', 11),
(4, 0, 'foto', '3339.22', 16),
(5, 0, 'foto', '3966.67', 27),
(6, 0, 'foto', '3744.36', 2),
(7, 1, 'foto', '2214.43', 40),
(8, 0, 'foto', '644.84', 8),
(9, 1, 'foto', '1775.94', 28),
(10, 0, 'foto', '1901', 34),
(11, 1, 'foto', '832', 9),
(12, 0, 'foto', '3380.2', 39),
(13, 1, 'foto', '3933.89', 22),
(14, 0, 'foto', '2835.4', 38),
(15, 1, 'foto', '4635.49', 20),
(16, 0, 'foto', '1925.75', 2),
(17, 0, 'foto', '3675.95', 28),
(18, 1, 'foto', '3068.13', 34),
(19, 0, 'foto', '3275.16', 27),
(20, 0, 'foto', '2339.77', 8),
(21, 0, 'foto', '1992.99', 17),
(22, 1, 'foto', '1711.67', 33),
(23, 0, 'foto', '2052.32', 36),
(24, 1, 'foto', '2574.92', 1),
(25, 0, 'foto', '2688.76', 3),
(26, 0, 'foto', '545.1', 6),
(27, 0, 'foto', '2052.01', 27),
(28, 0, 'foto', '992.87', 5),
(29, 1, 'foto', '997.46', 20),
(30, 0, 'foto', '4602.51', 25),
(31, 1, 'foto', '3264.5', 23),
(32, 0, 'foto', '572.52', 34),
(33, 1, 'foto', '706.13', 5),
(34, 0, 'foto', '2906.66', 40),
(35, 1, 'foto', '4756.79', 33),
(36, 0, 'foto', '3025.02', 34),
(37, 0, 'foto', '4625.51', 7),
(38, 1, 'foto', '3376.28', 37),
(39, 0, 'foto', '1828.58', 5),
(40, 1, 'foto', '3153.68', 21),
(41, 1, 'foto', '1931.54', 7),
(42, 0, 'foto', '4336.09', 11),
(43, 0, 'foto', '3977.8', 30),
(44, 0, 'foto', '3004.32', 37),
(45, 1, 'foto', '3885.03', 28),
(46, 1, 'foto', '4137.09', 11),
(47, 1, 'foto', '4565.21', 40),
(48, 0, 'foto', '3777.27', 38),
(49, 1, 'foto', '579.76', 7),
(50, 0, 'foto', '1156.04', 2),
(51, 1, 'foto', '2301.72', 4),
(52, 0, 'foto', '2216.46', 30),
(53, 0, 'foto', '2218.22', 40),
(54, 1, 'foto', '2116.15', 7),
(55, 1, 'foto', '1648.44', 7),
(56, 0, 'foto', '3124.38', 35),
(57, 0, 'foto', '4772.62', 21),
(58, 0, 'foto', '1826.99', 27),
(59, 1, 'foto', '4880.68', 7),
(60, 1, 'foto', '2393.15', 6),
(61, 0, 'foto', '843.04', 13),
(62, 1, 'foto', '4795.7', 16),
(63, 1, 'foto', '1456.03', 37),
(64, 0, 'foto', '2427.83', 23),
(65, 0, 'foto', '527.96', 20),
(66, 0, 'foto', '715.23', 39),
(67, 0, 'foto', '516.94', 25),
(68, 0, 'foto', '4998.96', 24),
(69, 0, 'foto', '2968.17', 17),
(70, 1, 'foto', '2289.35', 20),
(71, 0, 'foto', '2646.54', 33),
(72, 0, 'foto', '649.05', 12),
(73, 0, 'foto', '4917.91', 1),
(74, 0, 'foto', '3059.28', 30),
(75, 0, 'foto', '1106.24', 19),
(76, 1, 'foto', '2291.28', 18),
(77, 0, 'foto', '2982.62', 29),
(78, 1, 'foto', '2480.82', 12),
(79, 0, 'foto', '2521.7', 12),
(80, 1, 'foto', '2837.31', 5),
(81, 1, 'foto', '2419.27', 25),
(82, 1, 'foto', '4901.65', 16),
(83, 1, 'foto', '3839.23', 30),
(84, 0, 'foto', '1146.93', 27),
(85, 0, 'foto', '3516.95', 11),
(86, 0, 'foto', '3967.86', 25),
(87, 1, 'foto', '709.07', 27),
(88, 1, 'foto', '4437.07', 15),
(89, 1, 'foto', '3794.26', 14),
(90, 0, 'foto', '1847.84', 27),
(91, 1, 'foto', '922.12', 10),
(92, 1, 'foto', '1876.55', 13),
(93, 0, 'foto', '1280.77', 25),
(94, 0, 'foto', '3624.22', 13),
(95, 1, 'foto', '3313.55', 25),
(96, 1, 'foto', '2703.35', 6),
(97, 1, 'foto', '3844.16', 24),
(98, 0, 'foto', '4198.36', 4),
(99, 1, 'foto', '508.78', 35),
(100, 1, 'foto', '2477.69', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_servicos_espacos1_idx` (`espacos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
