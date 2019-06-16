-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jun-2019 às 05:02
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imeco`
--
CREATE DATABASE IF NOT EXISTS `imeco` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `imeco`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`) VALUES
(1, 'Membro'),
(2, 'Cooperador'),
(3, 'Cooperadora'),
(4, 'Diacono'),
(5, 'Diaconiza'),
(6, 'Missionaria'),
(7, 'Missionario'),
(8, 'Presbitero'),
(9, 'Pastor'),
(10, 'Pastora');

-- --------------------------------------------------------

--
-- Estrutura da tabela `certificados`
--

CREATE TABLE `certificados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `dt_apr` date DEFAULT NULL,
  `tipo_cert` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `certificados`
--

INSERT INTO `certificados` (`id`, `nome`, `sexo`, `dt_nasc`, `mae`, `pai`, `dt_apr`, `tipo_cert`) VALUES
(1, 'Julho Justino Sales', 'Masculino', '1996-06-09', 'Maria', 'Manoel', '2019-04-14', '1'),
(2, 'Aline', 'Feminino', '1993-02-06', 'Genilda', '----', '2019-04-14', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `emissao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id`, `nome`, `cargo`, `data_nasc`, `rg`, `cpf`, `emissao`, `foto`) VALUES
(4, 'Julho Justino Sales', '1', '0000-00-00', '000000000', '46559497836', '2019-06-15 18:54:05', 'default.jpg'),
(5, 'Aline Liur Justino', '2', '0000-00-00', '000000000', '00000000000', '2019-06-16 01:10:31', 'default.jpg'),
(6, 'Clarice Justino de Sales Rodriguez', '3', '0000-00-00', '000000000', '00000000000', '2019-06-16 01:10:42', 'default.jpg'),
(7, 'Julho Justino Sales', '1', '0000-00-00', '000000000', '00000000000', '2019-06-16 01:43:22', 'default.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cert`
--

CREATE TABLE `tipo_cert` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo_cert`
--

INSERT INTO `tipo_cert` (`id`, `nome`) VALUES
(1, 'Apresentação'),
(2, 'Batismo'),
(3, 'Cooperador'),
(4, 'Diacono/Diaconiza'),
(5, 'Missionario(a)'),
(6, 'Presbitero'),
(7, 'Pastor(a)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_cert`
--
ALTER TABLE `tipo_cert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tipo_cert`
--
ALTER TABLE `tipo_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
