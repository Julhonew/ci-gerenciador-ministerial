-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2019 às 04:22
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
  `tipo_cert` varchar(50) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `emissao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto_cert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `certificados`
--

INSERT INTO `certificados` (`id`, `nome`, `sexo`, `dt_nasc`, `mae`, `pai`, `dt_apr`, `tipo_cert`, `cargo`, `emissao`, `texto_cert`) VALUES
(1, 'Julho Justino Sales', 'Masculino', '1996-06-09', 'Maria', 'Manoel', '2019-04-14', '1', NULL, '2019-06-17 01:45:39', NULL),
(2, 'Aline', 'Feminino', '1993-02-06', 'Genilda', '----', '2019-04-14', '2', NULL, '2019-06-17 01:45:39', NULL);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `texto_cert`
--

CREATE TABLE `texto_cert` (
  `id` int(11) NOT NULL,
  `id_cert` int(11) DEFAULT NULL,
  `fonte` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamanho` int(3) DEFAULT NULL,
  `estilo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cert`
--

CREATE TABLE `tipo_cert` (
  `id` int(11) NOT NULL,
  `tipo` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo_cert`
--

INSERT INTO `tipo_cert` (`id`, `tipo`) VALUES
(1, 'Apresentação'),
(2, 'Batismo'),
(3, 'Cooperador'),
(4, 'Diacono/Diaconiza'),
(5, 'Missionario(a)'),
(6, 'Presbitero'),
(7, 'Pastor(a)'),
(8, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulos_cert`
--

CREATE TABLE `titulos_cert` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `titulos_cert`
--

INSERT INTO `titulos_cert` (`id`, `nome`, `descricao`) VALUES
(1, '{{1ºpastorPresidente}}', ': Adiciona o nome do 1º Pastor Presidente'),
(2, '{{2ºpastorPresidente}}', ': Adiciona o nome do 2º Pastor Presidente'),
(3, '{{1ºsecretario(a)}}', ': Adiciona o nome do 1º Secretario(a)'),
(4, '{{2ºsecretario(a)}}', ': Adiciona o nome do 2º Secretario(a)'),
(5, '{{tesoureiro(a)}}', ': Adiciona o nome do Tesoureiro(a)'),
(6, '{{nome}}', ': Adiciona o nome do comtemplado do certificado');

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
-- Indexes for table `texto_cert`
--
ALTER TABLE `texto_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_cert`
--
ALTER TABLE `tipo_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulos_cert`
--
ALTER TABLE `titulos_cert`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `texto_cert`
--
ALTER TABLE `texto_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_cert`
--
ALTER TABLE `tipo_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `titulos_cert`
--
ALTER TABLE `titulos_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
