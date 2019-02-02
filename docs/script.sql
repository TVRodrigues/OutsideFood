-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Fev-2018 às 18:38
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
CREATE DATABASE IF NOT EXISTS outsidefood;
USE outsidefood;
-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`) VALUES
(1, 'Aracaju'),
(2, 'Belém'),
(3, 'Belo Horizonte'),
(4, 'Boa Vista'),
(5, 'Brasília'),
(6, 'Campo Grande'),
(7, 'Cuiabá'),
(8, 'Curitiba'),
(9, 'Florianópolis'),
(10, 'Fortaleza'),
(11, 'Goiânia'),
(12, 'João Pessoa'),
(13, 'Macapá'),
(14, 'Maceió'),
(15, 'Manaus'),
(16, 'Natal'),
(17, 'Palmas'),
(18, 'Porto Alegre'),
(19, 'Porto Velho'),
(20, 'Recife'),
(21, 'Rio de Janeiro'),
(22, 'Salvador'),
(23, 'São Luís'),
(24, 'São Paulo'),
(25, 'Rio Branco'),
(26, 'Teresina'),
(27, 'Vitória'),
(28, 'Uberlândia'),
(29, 'Contagem'),
(30, 'Juiz de Fora'),
(31, 'Montes Claros'),
(32, 'João Monlevade'),
(33, 'Campinas'),
(34, 'Santos'),
(35, 'São José dos Campos'),
(36, 'Duque de Caxias'),
(37, 'Nova Iguaçu'),
(38, 'Niterói'),
(39, 'Volta Redonda'),
(40, 'Petrópolis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `culinaria`
--

CREATE TABLE `culinaria` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_culinaria` varchar(45),
  `tempo` int(11)
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicoes`
--

CREATE TABLE `edicoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `capacidade` int(11) NOT NULL,
  `lotacao` int(11) NOT NULL,
  `eventos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `edicoes`
--

INSERT INTO `edicoes` (`id`, `numero`, `capacidade`, `lotacao`, `eventos_id`) VALUES
(1, 3, 269, 435, 1),
(2, 2, 670, 483, 10),
(3, 1, 506, 598, 20),
(4, 3, 333, 595, 5),
(5, 5, 375, 582, 8),
(6, 4, 593, 495, 15),
(7, 3, 393, 226, 12),
(8, 4, 459, 279, 33),
(9, 2, 288, 588, 40),
(10, 4, 696, 294, 35),
(11, 4, 623, 248, 2),
(12, 4, 476, 331, 9),
(13, 4, 528, 290, 22),
(14, 5, 417, 243, 25),
(15, 2, 566, 480, 3),
(16, 4, 347, 144, 6),
(17, 4, 580, 235, 11),
(18, 3, 349, 160, 19),
(19, 3, 402, 319, 21),
(20, 2, 495, 453, 31),
(21, 1, 282, 394, 32),
(22, 4, 283, 166, 33),
(23, 2, 455, 377, 34),
(24, 3, 284, 109, 35),
(25, 3, 505, 185, 36),
(26, 2, 665, 345, 37),
(27, 2, 278, 149, 38),
(28, 5, 565, 213, 39),
(29, 4, 524, 528, 7),
(30, 3, 279, 306, 16),
(31, 1, 555, 518, 18),
(32, 1, 428, 126, 28),
(33, 2, 528, 469, 29),
(34, 4, 590, 382, 23),
(35, 4, 431, 211, 24),
(36, 1, 272, 170, 40),
(37, 5, 685, 347, 39),
(38, 1, 350, 553, 29),
(39, 3, 568, 440, 1),
(40, 4, 662, 303, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicoes_has_espacos`
--

CREATE TABLE `edicoes_has_espacos` (
  `edicoes_id` int(10) UNSIGNED NOT NULL,
  `espacos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `espacos`
--

CREATE TABLE `espacos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `aluguel` varchar(15) NOT NULL,
  `metragem` double NOT NULL,
  `benfeitoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `espacos`
--

INSERT INTO `espacos` (`id`, `nome`, `aluguel`, `metragem`, `benfeitoria`) VALUES
(1, 'Palco', '515.67', 400, 'Asfaltamento'),
(2, 'Quiosque', '433.92', 300, 'Substituição dos sistemas elétricos'),
(3, 'Rua 1', '602.91', 218.98, 'Limpeza da rua'),
(4, 'Rua 2', '518.14', 518.07, 'Asfaltamento'),
(5, 'Rua 3', '194.04', 228.26, 'Instalação de grades protetoras'),
(6, 'Rua 4', '281.85', 431.92, 'Obra de Jardinagem'),
(7, 'Quiosque', '433.92', 300, 'Reconstrução de muro'),
(8, 'Palco', '515.67', 400, 'Pintura'),
(9, 'Rua 5', '331.66', 780.09, 'Estátua'),
(10, 'Rua 3', '157.69', 106.49, 'Chafariz'),
(11, 'Gramado', '460', 250, 'Corte do gramado'),
(12, 'Gramado', '460', 250, 'Construção de grade'),
(13, 'Gramado', '460', 250, 'Obra de Jardinagem'),
(14, 'Gramado', '460', 250, 'Limpeza do gramado'),
(15, 'Gramado', '460', 250, 'Instalação de poste de luz'),
(16, 'Palco', '515.67', 400, 'Limpeza'),
(17, 'Palco', '515.67', 400, 'Pintura'),
(18, 'Quiosque', '433.92', 300, 'Instalação de grades protetoras'),
(19, 'Quiosque', '433.92', 300, 'Demão de Verniz'),
(20, 'Quiosque', '433.92', 300, 'Manutenção do telhado'),
(21, 'Quiosque', '433.92', 300, 'Substituição do piso'),
(22, 'Quiosque', '433.92', 300, 'Limpeza'),
(23, 'Quiosque', '433.92', 300, 'Instalação de grade'),
(24, 'Rua 1', '460', 602.91, 'Manutenção da rua'),
(25, 'Rua 1', '602.91', 250, 'Instalação de lixeira'),
(26, 'Rua 1', '460', 250, 'Pintura'),
(27, 'Rua 2', '602.91', 106.49, 'Manutenção da rua'),
(28, 'Rua 2', '602.91', 106.49, 'Instalação de lixeira'),
(29, 'Rua 2', '602.91', 106.49, 'Pintura'),
(30, 'Rua 3', '602.91', 106.49, 'Manutenção da rua'),
(31, 'Rua 3', '602.91', 106.49, 'Instalação de lixeira'),
(32, 'Rua 3', '602.91', 106.49, 'Pintura'),
(33, 'Rua 4', '602.91', 106.49, 'Manutenção da rua'),
(34, 'Rua 4', '602.91', 106.49, 'Instalação de lixeira'),
(35, 'Rua 4', '602.91', 106.49, 'Pintura'),
(36, 'Rua 5', '602.91', 106.49, 'Manutenção da rua'),
(37, 'Rua 5', '602.91', 106.49, 'Instalação de lixeira'),
(38, 'Rua 5', '602.91', 106.49, 'Pintura'),
(39, 'Cimentado', '307.99', 150.2, 'Encerar piso'),
(40, 'Cimentado', '307.99', 150.2, 'Limpeza'),
(42, 'Cimentado', '307.99', 150.2, 'Coleta de Lixo'),
(43, 'Cimentado', '307.99', 150.2, 'Instalação de lixeiras'),
(44, 'Cimentado', '307.99', 150.2, 'Instalação de Rampas'),
(45, 'Cimentado', '307.99', 150.2, 'Instalação de Postes de luz'),
(46, 'Cimentado', '307.99', 150.2, 'Manutenção da rede elétrica'),
(47, 'Cimentado', '307.99', 150.2, 'Manutenção Hidraulica'),
(48, 'Cimentado', '307.99', 150.2, 'Instalação de Pias'),
(49, 'Quiosque', '433.92', 300, 'Instalação de Pias'),
(50, 'Quiosque', '433.92', 300, 'Manutenção Hidraulica');

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
(1, 'Petrópolis Gourmet', '2018-10-10', '13:00:00', 'João Silva', 'assets/img/evento.png', 1, 1),
(2, 'Brasil Sabor', '2018-08-26', '08:00:00', 'Maria Souza', 'assets/img/evento.png', 2, 2),
(3, 'Restaurant Week', '2018-05-21', '09:00:00', 'Talita Santos', 'assets/img/evento.png', 3, 3),
(4, 'Comida Di Buteco', '2018-12-04', '10:00:00', 'Sander Henrique', 'assets/img/evento.png', 4, 4),
(5, 'Festa de Natal Eatalyano', '2017-07-31', '18:00:00', 'Paloma Gomes', 'assets/img/evento.png', 5, 5),
(6, 'Festival Retrô', '2018-09-02', '11:00:00', 'Nicole Alves', 'assets/img/evento.png', 6, 6),
(7, 'Festival da Quitanda', '2017-02-20', '12:00:00', 'Victor Temer', 'assets/img/evento.png', 7, 7),
(8, 'Festa do Pastel de Angu', '2017-12-15', '13:00:00', 'Thiago Vieira', 'assets/img/evento.png', 8, 8),
(9, 'Festival Diamantina Gourmet', '2018-09-12', '14:00:00', 'Bruno Menezes', 'assets/img/evento.png', 9, 10),
(10, 'Festa do Café com Biscoito ', '2018-12-20', '15:00:00', 'Daniel Couto', 'assets/img/evento.png', 10, 9),
(11, 'Festival de Churros', '2018-11-22', '16:00:00', 'Leticia', 'assets/img/evento.png', 12, 12),
(12, 'Festival de Açaí', '2018-05-02', '17:00:00', 'Giovanna', 'assets/img/evento.png', 13, 11),
(13, 'Festival de Cachorro Quente', '2018-10-25', '18:00:00', 'Kelly', 'assets/img/evento.png', 21, 13),
(14, 'Festival da Feijoada', '2018-11-23', '19:00:00', 'Brenda', 'assets/img/evento.png', 22, 14),
(15, 'Festival de Tropeiro', '2018-01-09', '20:00:00', 'Larissa', 'assets/img/evento.png', 23, 15),
(16, 'Festival de Sorvete', '2018-03-04', '21:00:00', 'Vinicius', 'assets/img/evento.png', 24, 16),
(17, 'Festival de Macarrão', '2018-10-12', '19:00:00', 'Gabriel', 'assets/img/evento.png', 25, 17),
(18, 'Festival de Pães', '2019-10-12', '10:00:00', 'Caio', 'assets/img/evento.png', 26, 18),
(19, 'Festival de Brigadeiro', '2018-03-18', '08:30:00', 'Leonidas', 'assets/img/evento.png', 27, 19),
(20, 'Festival de Doce de Leite', '2018-11-20', '23:00:00', 'Aline', 'assets/img/evento.png', 28, 20),
(21, 'Festival de Arroz', '2018-05-01', '09:30:00', 'Priscila', 'assets/img/evento.png', 29, 31),
(22, 'Festival de Comidas do Mar', '2018-02-02', '18:30:00', 'Mariana', 'assets/img/evento.png', 30, 32),
(23, 'Festival de Biscoitos', '2018-01-01', '19:40:00', 'Gian', 'assets/img/evento.png', 31, 33),
(24, 'Festival de Pipoca', '2018-09-06', '18:20:00', 'Bruno', 'assets/img/evento.png', 32, 34),
(25, 'Festival de Lasanha', '2018-05-06', '09:30:00', 'Fernanda', 'assets/img/evento.png', 33, 35),
(26, 'Festival de Sopa', '2018-04-02', '07:00:00', 'Josiane', 'assets/img/evento.png', 34, 36),
(27, 'Festival de Uvas', '2018-07-08', '11:30:00', 'Lucas', 'assets/img/evento.png', 35, 37),
(28, 'Festival de Queijo', '2018-12-11', '12:30:00', 'Pedro', 'assets/img/evento.png', 36, 38),
(29, 'Festival de Carnes', '2018-09-20', '08:00:00', 'Thales', 'assets/img/evento.png', 37, 39),
(30, 'Festival de Balas e Pirulitos', '2018-06-12', '00:00:01', 'Cacilda', 'assets/img/evento.png', 38, 40),
(31, 'Festival de Laranjas', '2018-05-07', '22:30:00', 'Halef', 'assets/img/evento.png', 39, 40),
(32, 'Festival de Tropeiro', '2018-04-03', '21:00:00', 'Marilene', 'assets/img/evento.png', 40, 1),
(33, 'Festival de Tomates', '2018-07-01', '13:00:00', 'Ulisses', 'assets/img/evento.png', 40, 21),
(34, 'Festival de Tacos', '2018-08-03', '13:30:00', 'André', 'assets/img/evento.png', 1, 22),
(35, 'Festival de Amendoins', '2018-11-03', '14:00:00', 'Paulo', 'assets/img/evento.png', 40, 23),
(36, 'Festival de Castanhas', '2018-02-04', '15:00:00', 'Silvana', 'assets/img/evento.png', 39, 24),
(37, 'Festival de Linguiça', '2018-03-02', '16:30:00', 'Diana', 'assets/img/evento.png', 1, 25),
(38, 'Festival de Salsicha', '2018-02-01', '17:30:00', 'Marcos', 'assets/img/evento.png', 5, 26),
(39, 'Festival de Presunto', '2018-03-05', '18:40:00', 'Alice', 'assets/img/evento.png', 15, 27),
(40, 'Festival de Pimenta', '2018-04-18', '08:00:00', 'Sandra', 'assets/img/evento.png', 16, 28);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios_has_culinaria`
--

CREATE TABLE `funcionarios_has_culinaria` (
  `funcionarios_id` int(10) UNSIGNED NOT NULL,
  `culinaria_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `email`, `senha`, `tipo`) VALUES
(1, 'tigas245@outlook.com', '601f1889667efaebb33b8c12572835da3f027f78', 1),
(2, 'ac.nulla.In@pretiumetrutrum.net', '90a7aeced4f948a4b410bbc4a8f1a899a70ce0ef', 0),
(3, 'Cras@aneque.com', '2e715b8b7143b3b2cd9acfc2796f2897f59080ce', 1),
(4, 'Duis.gravida.Praesent@mauris.co.uk', 'bcef4dceba528a9ebd934b5b5a13de28bf30d068', 0),
(5, 'dolor.Fusce.feugiat@euelitNulla.org', '1adf925fc244639cd13fa8e20aef882059cdff9c', 1),
(6, 'quis.diam@acipsumPhasellus.com', 'a5dc87083b619c9bc95d2014a92bab09c8d6c71f', 1),
(7, 'montes.nascetur@bibendum.co.uk', '45ee5491877acee533d301e2a48ce809eb4df133', 0),
(8, 'dui@Maecenas.co.uk', 'ec6a96d4767794736efb7bb1cf0088f3c44ca5ee', 0),
(9, 'in@arcuAliquamultrices.com', 'e9e88dd03012986f54e9c4acb3760bd1face5745', 0),
(10, 'Quisque.porttitor@odiovel.com', '48269b461f48fa274336817cb6840ef944f52b30', 0),
(11, 'facilisis@faucibuslectus.ca', 'f26400e1f2e0ff3a3258bdbe4dd03f555d5aecc3', 0),
(12, 'tristique.neque.venenatis@nuncac.com', 'dc3b8844363417e20f677e96877f01d515b8a6e3', 0),
(13, 'quis.tristique.ac@tellus.ca', '4ea0af2452891febb91609ef6039b6d1b56ef24f', 1),
(14, 'Cras.pellentesque.Sed@sapiengravidanon.edu', '5ca565345355ef37c22edb3c342fe1138bd37927', 0),
(15, 'vitae.purus@enimNunc.co.uk', 'f7311ff0a46e86b80c02b55113bef1ab8871f8c0', 1),
(16, 'pede.blandit@rutrumFuscedolor.ca', '8df23bdfb73551c1c7aa33a0d1669a86137d2ec5', 1),
(17, 'Cum.sociis.natoque@convallis.net', '8d261533e64a6b19b09f3d47343c532b8d5a38ab', 0),
(18, 'ipsum@Phasellus.com', 'ed9d5dbc3c203401ca772ed2cbbb7358eb88aaf9', 1),
(19, 'sagittis@porttitorinterdum.co.uk', 'e507c6a1184cfa450389160912ad9dc83c485e71', 0),
(20, 'libero@sitamet.org', '3bcdaf838f8b31b455add270cc6d655e58c7d72a', 0),
(21, 'tristique.aliquet@pedeNuncsed.ca', '54662639f1fd99e16bb27cce0a4edf5357937832', 0),
(22, 'tristique.senectus.et@ante.org', 'ced76c085aca3f9e80e40b8132bef84bd9514703', 1),
(23, 'ac.mattis@nuncestmollis.co.uk', 'f894177c3ab4c771d3364ee27d0ff566314cd342', 1),
(24, 'quam@Maurisnon.co.uk', 'd5cfc3c3a34e708584d36e55b9a6510b69dd02c5', 0),
(25, 'vel.arcu.eu@elementumpurus.co.uk', 'd58e170476258221bc6a1c307ed8c6ddc45e39db', 1),
(26, 'erat.nonummy.ultricies@Pellentesque.co.uk', '88afc132c0e114eefd3e92f07f1e09efedcdea0a', 0),
(27, 'fermentum.vel.mauris@nostra.ca', 'e78b8b4713c51e987f14a5891152f22d957052a8', 1),
(28, 'a.purus@Nulla.net', 'ae3356e329fac03d1da0535c812e4d3a1aa43b40', 0),
(29, 'mi.enim.condimentum@lectus.ca', 'b5439ed6814f18e34669b24a0c6fa198cd65e491', 0),
(30, 'est.vitae@necdiamDuis.co.uk', 'd175d9f7456d41dec2c47f13e3fa98fad796456b', 1),
(31, 'a.nunc@et.edu', 'a52162caccfec1b060975f2ffe1049d5d6a3e694', 0),
(32, 'eros.turpis@tortorat.edu', '9a5a199c0904e3ed0466f71dda1c8ffc2720d469', 0),
(33, 'Vivamus.nibh.dolor@etultrices.com', 'c3dc295a2a95a1f7995203e03c90e67fc135dcf4', 1),
(34, 'ultrices@amet.ca', '2bb59d2ec0ad8fa8bc3f3b98017dc0d81ce4fe70', 0),
(35, 'tincidunt.tempus.risus@massa.edu', '3fc45579391b97db9daaf3b4c4337fcb690ccd2c', 1),
(36, 'velit.egestas@ascelerisque.org', 'd9d2744c58220622b0505b5ca764026bbd99e0b0', 0),
(37, 'nulla@faucibuslectusa.net', '87e6c4f88cdc0206d867074d59f1a8b5cc3bd8a9', 1),
(38, 'tellus.Nunc@acipsum.edu', 'cd99357dcafbaeb4bd64a05e845e54007ff33bfe', 1),
(39, 'nonummy.ipsum@felis.ca', '55991ef41cd30b9d0076271f02d725e68e4f567c', 0),
(40, 'montes.nascetur.ridiculus@ultrices.ca', 'b01681dcfa1b4cfd61d66fde56d88798dfeaac16', 0);

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
(1, 'Feijoada', 17.23, 'assets/img/comida.png'),
(2, 'Macarrão', 12.59, 'assets/img/comida.png'),
(3, 'Sushi', 24.94, 'assets/img/comida.png'),
(4, 'Crepes', 10.45, 'assets/img/comida.png'),
(5, 'Mingau de Farinha de Tapioca', 13.89, 'assets/img/comida.png'),
(6, 'Tacos', 10.46, 'assets/img/comida.png'),
(7, 'Bacalhau', 39.67, 'assets/img/comida.png'),
(8, 'Bobotie', 16.78, 'assets/img/comida.png'),
(9, 'Ganoush', 19.31, 'assets/img/comida.png'),
(10, 'Tourtière', 30.78, 'assets/img/comida.png'),
(11, 'Mocotó', 20.23, 'assets/img/comida.png'),
(12, 'Sanduiche Natural', 8.59, 'assets/img/comida.png'),
(13, 'Pastel de Queijo', 4.5, 'assets/img/comida.png'),
(14, 'Pastel de Carne', 4.5, 'assets/img/comida.png'),
(15, 'Pastel de Pizza', 6.5, 'assets/img/comida.png'),
(16, 'Feijão Tropeiro', 10, 'assets/img/comida.png'),
(17, 'Vatapá', 15.99, 'assets/img/comida.png'),
(18, 'Acarajé', 8, 'assets/img/comida.png'),
(19, 'Empadão', 6, 'assets/img/comida.png'),
(20, 'Tapioca', 9.99, 'assets/img/comida.png'),
(21, 'Lasanha', 20.23, 'assets/img/comida.png'),
(22, 'Escondidinho de Carne moída', 20, 'assets/img/comida.png'),
(23, 'Hamburguer', 14.5, 'assets/img/comida.png'),
(24, 'Misto Quente', 4.5, 'assets/img/comida.png'),
(25, 'Moqueca', 6.5, 'assets/img/comida.png'),
(26, 'Charque', 20.46, 'assets/img/comida.png'),
(27, 'Risoto', 39.67, 'assets/img/comida.png'),
(28, 'Khao tom', 16.78, 'assets/img/comida.png'),
(29, 'Bún bò Huế', 19.31, 'assets/img/comida.png'),
(30, 'Bánh bao', 30.78, 'assets/img/comida.png'),
(31, 'Bánh xèo', 20.23, 'assets/img/comida.png'),
(32, 'Cassoulet', 38.59, 'assets/img/comida.png'),
(33, 'Blanquette de veau', 44.5, 'assets/img/comida.png'),
(34, 'Coq au vin', 4.5, 'assets/img/comida.png'),
(35, 'Biltong', 26.5, 'assets/img/comida.png'),
(36, 'Bobotie', 10.46, 'assets/img/comida.png'),
(37, 'Chakalaka', 39.67, 'assets/img/comida.png'),
(38, 'Baião de Dois', 16.78, 'assets/img/comida.png'),
(39, 'Melktert', 19.31, 'assets/img/comida.png'),
(40, 'Sosatie', 30.78, 'assets/img/comida.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pratos_has_ingredientes`
--

CREATE TABLE `pratos_has_ingredientes` (
  `pratos_id` int(10) UNSIGNED NOT NULL,
  `ingredientes_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(25) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `salario` varchar(15) NOT NULL,
  `espacos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`,`nome`,`tipo`,`foto`,`salario`,`espacos_id`) VALUES 
(1,"Iaculis Industries",0,'assets/img/foodtruck.png',671,26),
(2,"Facilisis LLP",1,'assets/img/foodtruck.png',627,16),
(3,"Adipiscing Ligula Aenean PC",1,'assets/img/foodtruck.png',381,6),
(4,"Consectetuer Ipsum Nunc Corp.",0,'assets/img/foodtruck.png',619,9),
(5,"Volutpat Nunc Sit Limited",1,'assets/img/foodtruck.png',675,36),
(6,"Penatibus Et Magnis Corporation",0,'assets/img/foodtruck.png',579,7),
(7,"Eu Eleifend Nec Corp.",0,'assets/img/foodtruck.png',414,15),
(8,"Feugiat Corporation",0,'assets/img/foodtruck.png',700,9),
(9,"Cursus A Enim Company",0,'assets/img/foodtruck.png',572,30),
(10,"Egestas Rhoncus Inc.",0,'assets/img/foodtruck.png',608,18),
(11,"Eu Consulting",0,'assets/img/foodtruck.png',370,8),
(12,"A Purus LLP",1,'assets/img/foodtruck.png',638,16),
(13,"Iaculis Nec Eleifend Company",1,'assets/img/foodtruck.png',578,14),
(14,"Curae; Incorporated",0,'assets/img/foodtruck.png',282,40),
(15,"Sagittis Felis Donec LLP",1,'assets/img/foodtruck.png',467,15),
(16,"Eget Dictum Consulting",0,'assets/img/foodtruck.png',664,31),
(17,"Eu Eleifend Associates",0,'assets/img/foodtruck.png',576,24),
(18,"In Inc.",0,'assets/img/foodtruck.png',346,17),
(19,"Nisi Aenean Limited",0,'assets/img/foodtruck.png',666,35),
(20,"Dui Consulting",1,'assets/img/foodtruck.png',478,10),
(21,"Nibh Corp.",0,'assets/img/foodtruck.png',654,6),
(22,"Pede Sagittis Consulting",1,'assets/img/foodtruck.png',320,24),
(23,"Maecenas Iaculis Corporation",1,'assets/img/foodtruck.png',594,33),
(24,"Cum Sociis Natoque Consulting",0,'assets/img/foodtruck.png',562,22),
(25,"Enim Ltd",1,'assets/img/foodtruck.png',376,34),
(26,"Nunc Laoreet Lectus PC",1,'assets/img/foodtruck.png',605,1),
(27,"Sed Foundation",0,'assets/img/foodtruck.png',282,30),
(28,"Vivamus Sit Amet Institute",0,'assets/img/foodtruck.png',547,20),
(29,"Ac Turpis Industries",1,'assets/img/foodtruck.png',700,10),
(30,"Non Enim Mauris LLC",0,'assets/img/foodtruck.png',363,18),
(31,"Mauris Blandit Ltd",0,'assets/img/foodtruck.png',303,5),
(32,"Risus Donec Limited",1,'assets/img/foodtruck.png',538,35),
(33,"Eros Nec Tellus PC",1,'assets/img/foodtruck.png',658,22),
(34,"Et Rutrum Industries",0,'assets/img/foodtruck.png',281,8),
(35,"Ac Corp.",0,'assets/img/foodtruck.png',500,3),
(36,"Nec Eleifend Company",0,'assets/img/foodtruck.png',599,37),
(37,"Cum Sociis Natoque Company",0,'assets/img/foodtruck.png',670,17),
(38,"Ullamcorper Viverra Maecenas Foundation",1,'assets/img/foodtruck.png',699,39),
(39,"In Lorem Corporation",1,'assets/img/foodtruck.png',252,3),
(40,"A Ltd",1,'assets/img/foodtruck.png',382,5);


-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_has_pratos`
--

CREATE TABLE `servicos_has_pratos` (
  `servicos_id` int(10) UNSIGNED NOT NULL,
  `pratos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estrutura da tabela `album`
--

CREATE TABLE `albuns` (
  `id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `culinaria`
--
ALTER TABLE `culinaria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edicoes`
--
ALTER TABLE `edicoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_edicoes_eventos1_idx` (`eventos_id`);

--
-- Indexes for table `edicoes_has_espacos`
--
ALTER TABLE `edicoes_has_espacos`
  ADD PRIMARY KEY (`edicoes_id`,`espacos_id`),
  ADD KEY `fk_edicoes_has_espacos_espacos1_idx` (`espacos_id`),
  ADD KEY `fk_edicoes_has_espacos_edicoes1_idx` (`edicoes_id`);

--
-- Indexes for table `espacos`
--
ALTER TABLE `espacos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eventos_cidades1_idx` (`cidades_id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionarios_servicos1_idx` (`servicos_id`);

--
-- Indexes for table `funcionarios_has_culinaria`
--
ALTER TABLE `funcionarios_has_culinaria`
  ADD PRIMARY KEY (`funcionarios_id`,`culinaria_id`),
  ADD KEY `fk_funcionarios_has_culinaria_culinaria1_idx` (`culinaria_id`),
  ADD KEY `fk_funcionarios_has_culinaria_funcionarios1_idx` (`funcionarios_id`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_locais_cidades_idx` (`cidades_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pratos_has_ingredientes`
--
ALTER TABLE `pratos_has_ingredientes`
  ADD PRIMARY KEY (`pratos_id`,`ingredientes_id`),
  ADD KEY `fk_pratos_has_ingredientes_ingredientes1_idx` (`ingredientes_id`),
  ADD KEY `fk_pratos_has_ingredientes_pratos1_idx` (`pratos_id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_servicos_espacos1_idx` (`espacos_id`);

--
-- Indexes for table `servicos_has_pratos`
--
ALTER TABLE `servicos_has_pratos`
  ADD PRIMARY KEY (`servicos_id`,`pratos_id`),
  ADD KEY `fk_servicos_has_pratos_pratos1_idx` (`pratos_id`),
  ADD KEY `fk_servicos_has_pratos_servicos1_idx` (`servicos_id`);

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
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `culinaria`
--
ALTER TABLE `culinaria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `edicoes`
--
ALTER TABLE `edicoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `espacos`
--
ALTER TABLE `espacos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pratos`
--
ALTER TABLE `pratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `edicoes`
--
ALTER TABLE `edicoes`
  ADD CONSTRAINT `fk_edicoes_eventos1` FOREIGN KEY (`eventos_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `edicoes_has_espacos`
--
ALTER TABLE `edicoes_has_espacos`
  ADD CONSTRAINT `fk_edicoes_has_espacos_edicoes1` FOREIGN KEY (`edicoes_id`) REFERENCES `edicoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_edicoes_has_espacos_espacos1` FOREIGN KEY (`espacos_id`) REFERENCES `espacos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
