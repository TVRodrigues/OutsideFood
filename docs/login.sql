-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Fev-2018 às 23:59
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
