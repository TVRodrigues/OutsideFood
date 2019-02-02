-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Fev-2018 às 18:17
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
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `servicos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `tipo`, `servicos_id`) VALUES
(1, 'Avye Mcgee', 0, 40),
(2, 'Rae Fischer', 0, 17),
(3, 'Maile Mcdowell', 1, 21),
(4, 'Inga Riley', 1, 31),
(5, 'Hilda Stein', 1, 25),
(6, 'Olivia Mcintyre', 1, 25),
(7, 'Linda Higgins', 1, 13),
(8, 'Blossom Whitley', 0, 17),
(9, 'Kelsey Rodriguez', 1, 36),
(10, 'Rana Stevenson', 1, 30),
(11, 'Cora Odonnell', 1, 14),
(12, 'Constance Terry', 1, 37),
(13, 'Katelyn Waters', 1, 15),
(14, 'Tallulah Solis', 0, 4),
(15, 'Maggie Hickman', 1, 40),
(16, 'Deborah Duran', 1, 32),
(17, 'Hannah Hubbard', 1, 21),
(18, 'Yetta Hinton', 1, 11),
(19, 'Oprah Abbott', 0, 21),
(20, 'Odette Vincent', 0, 36),
(21, 'Ingrid Russo', 1, 8),
(22, 'Sharon Walters', 1, 39),
(23, 'April Rutledge', 0, 30),
(24, 'Sigourney Dejesus', 1, 2),
(25, 'Lilah Lara', 1, 9),
(26, 'Alea Smith', 1, 4),
(27, 'Xaviera Sweeney', 0, 7),
(28, 'Mara Cooper', 0, 37),
(29, 'Vivien Davidson', 1, 31),
(30, 'Eliana Bishop', 1, 33),
(31, 'Germane Garza', 1, 1),
(32, 'Lucy Alford', 0, 34),
(33, 'Shelly Hendricks', 0, 1),
(34, 'Tana Ellison', 0, 2),
(35, 'Alexis Brock', 1, 35),
(36, 'Quon Gomez', 0, 12),
(37, 'Liberty Hart', 1, 27),
(38, 'Jenette Schultz', 0, 35),
(39, 'Stephanie Petty', 0, 3),
(40, 'Abra Waters', 1, 31),
(41, 'Justina Reese', 1, 28),
(42, 'Yael Mcfarland', 0, 36),
(43, 'Sandra Hudson', 0, 5),
(44, 'Ina Moore', 1, 33),
(45, 'Jasmine Pearson', 1, 14),
(46, 'McKenzie Frederick', 0, 27),
(47, 'Keelie Acevedo', 1, 14),
(48, 'Kelsie Miles', 0, 9),
(49, 'Cally Lamb', 0, 4),
(50, 'Nadine Fowler', 0, 6),
(51, 'Harriet Romero', 0, 24),
(52, 'Eugenia Stanley', 1, 11),
(53, 'Jaime Fletcher', 1, 29),
(54, 'Nadine Cooke', 0, 39),
(55, 'Xaviera Obrien', 0, 8),
(56, 'Quon Duke', 0, 16),
(57, 'Wendy Wolfe', 1, 37),
(58, 'Dara Mueller', 0, 33),
(59, 'Amethyst French', 1, 12),
(60, 'Chanda Mcdowell', 0, 37),
(61, 'Chanda Clemons', 0, 6),
(62, 'Kylan Christian', 1, 22),
(63, 'Quynn Gates', 0, 17),
(64, 'Rhona Hogan', 1, 24),
(65, 'Hope Murphy', 1, 35),
(66, 'Madeline Riggs', 0, 10),
(67, 'Yetta Finley', 0, 28),
(68, 'Xandra Day', 1, 21),
(69, 'Azalia Adkins', 1, 36),
(70, 'Zoe Velez', 0, 37),
(71, 'Nadine Nash', 1, 33),
(72, 'Yael Luna', 0, 10),
(73, 'Maryam Lowery', 1, 15),
(74, 'Jessamine Riddle', 0, 28),
(75, 'Candice Foley', 1, 30),
(76, 'Lysandra Malone', 1, 30),
(77, 'Mikayla Moss', 0, 16),
(78, 'Illiana Shepard', 0, 9),
(79, 'Kylie Roberson', 0, 35),
(80, 'Farrah Maxwell', 0, 7),
(81, 'Felicia Webster', 1, 13),
(82, 'Jacqueline Sanford', 0, 34),
(83, 'Dora Stafford', 0, 8),
(84, 'Demetria Hansen', 0, 21),
(85, 'Sarah Cline', 1, 14),
(86, 'Shea Sweeney', 0, 15),
(87, 'Kaitlin Young', 1, 38),
(88, 'Scarlet Sloan', 0, 20),
(89, 'Noelle Mullins', 0, 26),
(90, 'Denise Rojas', 0, 15),
(91, 'Juliet Bond', 1, 9),
(92, 'Ivy Fields', 1, 36),
(93, 'Cathleen Day', 1, 17),
(94, 'Martena Ewing', 1, 25),
(95, 'Carissa Baird', 0, 12),
(96, 'Maia Meyer', 0, 15),
(97, 'Tallulah Garner', 1, 23),
(98, 'Barbara Lester', 0, 9),
(99, 'Anika Britt', 1, 1),
(100, 'Signe Knowles', 0, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionarios_servicos1_idx` (`servicos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionarios_servicos1` FOREIGN KEY (`servicos_id`) REFERENCES `servicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
