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
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `organizador` varchar(45) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cidades_id` int(10) UNSIGNED NOT NULL,
  `locais_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `data`, `horario`, `organizador`, `foto`, `cidades_id`, `locais_id`) VALUES
(1, 'Petrópolis Gourmet', '2018-10-10', '13:00:00', 'João Silva', 'foto', 1, 1),
(2, 'Brasil Sabor', '2018-08-26', '08:00:00', 'Maria Souza', 'foto', 2, 2),
(3, 'Restaurant Week', '2018-05-21', '09:00:00', 'Talita Santos', 'foto', 3, 3),
(4, 'Comida Di Buteco', '2018-12-04', '10:00:00', 'Sander Henrique', 'foto', 4, 4),
(5, 'Festa de Natal Eatalyano', '2017-07-31', '18:00:00', 'Paloma Gomes', 'foto', 5, 5),
(6, 'Festival Retrô', '2018-09-02', '11:00:00', 'Nicole Alves', 'foto', 6, 6),
(7, 'Festival da Quitanda', '2017-02-20', '12:00:00', 'Victor Temer', 'foto', 7, 7),
(8, 'Festa do Pastel de Angu', '2017-12-15', '13:00:00', 'Thiago Vieira', 'foto', 8, 8),
(9, 'Festival Diamantina Gourmet', '2018-09-12', '14:00:00', 'Bruno Menezes', 'foto', 9, 10),
(10, 'Festa do Café com Biscoito ', '2018-12-20', '15:00:00', 'Daniel Couto', 'foto', 10, 9),
(11, 'Festival de Churros', '2018-11-22', '16:00:00', 'Leticia', 'foto', 12, 12),
(12, 'Festival de Açaí', '2018-05-02', '17:00:00', 'Giovanna', 'foto', 13, 11),
(13, 'Festival de Cachorro Quente', '2018-10-25', '18:00:00', 'Kelly', 'foto', 21, 13),
(14, 'Festival da Feijoada', '2018-11-23', '19:00:00', 'Brenda', 'foto', 22, 14),
(15, 'Festival de Tropeiro', '2018-01-09', '20:00:00', 'Larissa', 'foto', 23, 15),
(16, 'Festival de Sorvete', '2018-03-04', '21:00:00', 'Vinicius', 'foto', 24, 16),
(17, 'Festival de Macarrão', '2018-10-12', '19:00:00', 'Gabriel', 'foto', 25, 17),
(18, 'Festival de Pães', '2019-10-12', '10:00:00', 'Caio', 'foto', 26, 18),
(19, 'Festival de Brigadeiro', '2018-03-18', '08:30:00', 'Leonidas', 'foto', 27, 19),
(20, 'Festival de Doce de Leite', '2018-11-20', '23:00:00', 'Aline', 'foto', 28, 20),
(21, 'Festival de Arroz', '2018-05-01', '09:30:00', 'Priscila', 'foto', 29, 31),
(22, 'Festival de Comidas do Mar', '2018-02-02', '18:30:00', 'Mariana', 'foto', 30, 32),
(23, 'Festival de Biscoitos', '2018-01-01', '19:40:00', 'Gian', 'foto', 31, 33),
(24, 'Festival de Pipoca', '2018-09-06', '18:20:00', 'Bruno', 'foto', 32, 34),
(25, 'Festival de Lasanha', '2018-05-06', '09:30:00', 'Fernanda', 'foto', 33, 35),
(26, 'Festival de Sopa', '2018-04-02', '07:00:00', 'Josiane', 'foto', 34, 36),
(27, 'Festival de Uvas', '2018-07-08', '11:30:00', 'Lucas', 'foto', 35, 37),
(28, 'Festival de Queijo', '2018-12-11', '12:30:00', 'Pedro', 'foto', 36, 38),
(29, 'Festival de Carnes', '2018-09-20', '08:00:00', 'Thales', 'foto', 37, 39),
(30, 'Festival de Balas e Pirulitos', '2018-06-12', '00:00:01', 'Cacilda', 'foto', 38, 40),
(31, 'Festival de Laranjas', '2018-05-07', '22:30:00', 'Halef', 'foto', 39, 40),
(32, 'Festival de Tropeiro', '2018-04-03', '21:00:00', 'Marilene', 'foto', 40, 1),
(33, 'Festival de Tomates', '2018-07-01', '13:00:00', 'Ulisses', 'foto', 40, 21),
(34, 'Festival de Tacos', '2018-08-03', '13:30:00', 'André', 'foto', 1, 22),
(35, 'Festival de Amendoins', '2018-11-03', '14:00:00', 'Paulo', 'foto', 40, 23),
(36, 'Festival de Castanhas', '2018-02-04', '15:00:00', 'Silvana', 'foto', 39, 24),
(37, 'Festival de Linguiça', '2018-03-02', '16:30:00', 'Diana', 'foto', 1, 25),
(38, 'Festival de Salsicha', '2018-02-01', '17:30:00', 'Marcos', 'foto', 5, 26),
(39, 'Festival de Presunto', '2018-03-05', '18:40:00', 'Alice', 'foto', 15, 27),
(40, 'Festival de Pimenta', '2018-04-18', '08:00:00', 'Sandra', 'foto', 16, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eventos_cidades1_idx` (`cidades_id`),
  ADD KEY `fk_eventos_locais1_idx` (`locais_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_cidades1` FOREIGN KEY (`cidades_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eventos_locais1` FOREIGN KEY (`locais_id`) REFERENCES `locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
