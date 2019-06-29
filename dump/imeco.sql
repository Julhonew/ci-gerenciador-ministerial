-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2019 às 21:27
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
  `tipo_cert` int(11) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `emissao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `certificados`
--

INSERT INTO `certificados` (`id`, `nome`, `sexo`, `dt_nasc`, `mae`, `pai`, `dt_apr`, `tipo_cert`, `cargo`, `emissao`) VALUES
(1, 'Julho Justino Sales', NULL, '1996-06-09', NULL, NULL, NULL, 1, 'Membro', '2019-06-27 04:31:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fontes`
--

CREATE TABLE `fontes` (
  `id` int(11) NOT NULL,
  `fonte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fontes`
--

INSERT INTO `fontes` (`id`, `fonte`) VALUES
(1, 'arial'),
(2, 'comic sans ms'),
(3, 'courier new'),
(4, 'georgia'),
(5, 'lucida sans unicode'),
(6, 'tahoma'),
(7, 'times new roman'),
(8, 'trebuchet ms'),
(9, 'verdana');

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
(1, 'Julho Justino Sales', '1', '1996-06-09', '392822027', '4659497836', '2019-06-28 02:25:29', '434ef5357535175de61d3b244502c7e2.jpg'),
(2, 'Aline Liur Justino', '1', '1993-02-06', '000000000', '00000000000', '2019-06-27 04:26:28', 'default.jpg'),
(3, 'Clarice Justino de Sales Rodriguez', '1', '1994-08-13', '000000000', '00000000000', '2019-06-27 04:26:46', 'default.jpg');

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
  `negrito` int(1) DEFAULT '0',
  `italic` int(1) DEFAULT '0',
  `sublinhado` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `texto_cert`
--

INSERT INTO `texto_cert` (`id`, `id_cert`, `fonte`, `cor`, `tamanho`, `negrito`, `italic`, `sublinhado`) VALUES
(1, 1, 'comic sans ms', 'black', 12, 1, 0, 1),
(2, 1, 'courier new', 'white', 12, 0, 1, 0),
(3, 1, 'georgia', 'blue', 12, 1, 0, 1),
(4, 1, 'lucida sans unicode', 'yellow', 12, 0, 1, 0),
(5, 1, 'tahoma', 'red', 12, 1, 0, 1),
(6, 1, 'trebuchet ms', 'green', 12, 0, 1, 0),
(7, 2, 'arial', 'black', 12, 0, 0, 0),
(8, 2, 'arial', 'black', 12, 0, 0, 0),
(9, 2, 'arial', 'black', 12, 0, 0, 0),
(10, 2, 'arial', 'black', 12, 0, 0, 0),
(11, 2, 'arial', 'black', 12, 0, 0, 0),
(12, 2, 'arial', 'black', 12, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cert`
--

CREATE TABLE `tipo_cert` (
  `id` int(11) NOT NULL,
  `tipo` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tipo_cert`
--

INSERT INTO `tipo_cert` (`id`, `tipo`, `img`, `texto`) VALUES
(1, 'Certificado de teste', 'f5b0b6931b5d3fd74fe5e9d79d0bbba0.jpg', '<p>&nbsp;</p>\r\n\r\n<p>{{1&ordm;pastorPresidente}} : Adiciona o nome do 1&ordm; Pastor Presidente</p>\r\n\r\n<p>{{2&ordm;pastorPresidente}} : Adiciona o nome do 2&ordm; Pastor Presidente</p>\r\n\r\n<p>{{1&ordm;secretario(a)}} : Adiciona o nome do 1&ordm; Secretario(a)</p>\r\n\r\n<p>{{2&ordm;secretario(a)}} : Adiciona o nome do 2&ordm; Secretario(a)</p>\r\n\r\n<p>{{tesoureiro(a)}} : Adiciona o nome do Tesoureiro(a)</p>\r\n\r\n<p>{{nome}} : Adiciona o nome do comtemplado do certificado<br />\r\n&nbsp;</p>\r\n'),
(2, 'Julho aqui', NULL, '<h1><span style=\"font-family:Comic Sans MS,cursive\"><span style=\"color:#f1c40f\">Julho</span></span></h1>\r\n\r\n<p><span style=\"background-color:#2ecc71\">Julho</span></p>\r\n\r\n<h1><sup><sub><s><u><em><strong>Julho</strong></em></u></s></sub></sup></h1>\r\n');

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
(1, '{{1ºpastorPresidente}}', ' : Adiciona o nome do 1º Pastor Presidente'),
(2, '{{2ºpastorPresidente}}', ' : Adiciona o nome do 2º Pastor Presidente'),
(3, '{{1ºsecretario(a)}}', ' : Adiciona o nome do 1º Secretario(a)'),
(4, '{{2ºsecretario(a)}}', ' : Adiciona o nome do 2º Secretario(a)'),
(5, '{{tesoureiro(a)}}', ' : Adiciona o nome do Tesoureiro(a)'),
(6, '{{nome}}', ' : Adiciona o nome do comtemplado do certificado');

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
-- Indexes for table `fontes`
--
ALTER TABLE `fontes`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fontes`
--
ALTER TABLE `fontes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `texto_cert`
--
ALTER TABLE `texto_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipo_cert`
--
ALTER TABLE `tipo_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `titulos_cert`
--
ALTER TABLE `titulos_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
