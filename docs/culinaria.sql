-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Fev-2018 às 18:15
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
-- Estrutura da tabela `culinaria`
--

CREATE TABLE `culinaria` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_culinaria` varchar(45) NOT NULL,
  `tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `culinaria`
--

INSERT INTO `culinaria` (`id`, `tipo_culinaria`, `tempo`) VALUES
(1, 'Brasileira', 10),
(2, 'Italiana', 8),
(3, 'Francesa', 9),
(4, 'Japonesa', 2),
(5, 'Indigena', 8),
(6, 'Mexicana', 3),
(7, 'Portuguesa', 2),
(8, 'Africana', 5),
(9, 'Asiática', 5),
(10, 'Mineira', 3),
(11, 'Nordestina', 11),
(12, 'Mesopotâmia', 10),
(13, 'Mediterrânea', 5),
(14, 'Sudoeste Americano', 8),
(15, 'Indiana', 15),
(16, 'Russa', 12),
(17, 'Chinesa', 2),
(18, 'Coreana', 4),
(19, 'Tailandesa', 6),
(20, 'Alemã', 10),
(21, 'Argentina', 9),
(22, 'Chilena', 7),
(23, 'Uruguaia', 3),
(24, 'Sul Africana', 12),
(25, 'Gaucha', 7),
(26, 'Goiana', 3),
(27, 'Paulista', 11),
(28, 'Baiana', 5),
(29, 'Paraense', 14),
(30, 'Capixaba', 2),
(31, 'Sul Matrogossense', 1),
(32, 'Paraibana', 7),
(33, 'Inglesa', 15),
(34, 'Grega', 13),
(35, 'Egípcia', 10),
(36, 'Australiana', 8),
(37, 'Peruana', 12),
(38, 'Colombiana', 13),
(39, 'Turca', 8),
(40, 'Canadense', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `culinaria`
--
ALTER TABLE `culinaria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `culinaria`
--
ALTER TABLE `culinaria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
