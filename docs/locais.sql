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
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cidades_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`, `cidades_id`) VALUES
(1, 'Riomar Shopping', 1),
(2, 'Espaço São José Liberto', 2),
(3, 'Expominas', 3),
(4, 'Reciclar Eventos', 4),
(5, 'Casa das Nações', 5),
(6, 'Espaço Nutri', 6),
(7, 'Centro de Eventos do Pantanal', 7),
(8, 'Capri Gastronomia para Eventos', 8),
(9, 'Kobrasol', 9),
(10, 'Iate Clube de Fortaleza', 10),
(11, 'Viela Gastronômica', 11),
(12, 'Goiamum Gigante', 12),
(13, 'Estacionamento do SEBRAE', 13),
(14, 'Praça Multieventos', 14),
(15, 'Estacionamento Uni Nilton Lins', 15),
(16, 'AMPARO GASTRONÔMICO', 16),
(17, 'Praça vereador Tarcísio Machado', 17),
(18, 'Praça Gustavo Langsch', 18),
(19, 'R&M buffet e eventos gastronômicos', 19),
(20, 'Hotel Armação Convention Center', 20),
(21, 'Praia de Copacabana', 21),
(22, 'Casacor', 22),
(23, 'Shopping da Ilha', 23),
(24, 'Pacaembú', 24),
(25, 'Ágora Gastronomia & Eventos', 25),
(26, 'Praça da Bandeira', 26),
(27, 'Salão Sabores', 27),
(28, 'Granja Marileusa', 28),
(29, 'Praça Tancredo Neves', 29),
(30, 'Fátima Buffet', 30),
(31, 'Alfa Eventos', 31),
(32, 'Praça do Povo', 32),
(33, 'Condomínio Civil Shopping Center Iguatemi', 33),
(34, 'Centro Histórico de Santos', 34),
(35, 'Parque Robert Burle Max', 35),
(36, 'Parque Araruama', 36),
(37, 'Reserva Gastronomia', 37),
(38, 'Teatro Popular de Niterói', 38),
(39, 'Praça São José de Calazans', 39),
(40, 'Palácio de Cristal', 40),
(41, 'Praça da Liberdade', 3),
(42, 'Mineirinho', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_locais_cidades_idx` (`cidades_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `locais`
--
ALTER TABLE `locais`
  ADD CONSTRAINT `fk_locais_cidades` FOREIGN KEY (`cidades_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
