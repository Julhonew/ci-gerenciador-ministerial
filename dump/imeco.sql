-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Set-2019 às 15:38
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
-- Estrutura da tabela `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `data` int(12) DEFAULT NULL,
  `data_inclusao` int(12) DEFAULT NULL,
  `data_alteracao` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `agenda`
--

TRUNCATE TABLE `agenda`;
--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `status`, `nome`, `descricao`, `data`, `data_inclusao`, `data_alteracao`) VALUES
(17, '1', 'teste', '', 1564542720, 1564542660, 1564542715);

-- --------------------------------------------------------

--
-- Estrutura da tabela `age_eventos`
--

DROP TABLE IF EXISTS `age_eventos`;
CREATE TABLE `age_eventos` (
  `id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_membro` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `data_inclusao` int(12) DEFAULT NULL,
  `data_alteracao` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `age_eventos`
--

TRUNCATE TABLE `age_eventos`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `age_status`
--

DROP TABLE IF EXISTS `age_status`;
CREATE TABLE `age_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `age_status`
--

TRUNCATE TABLE `age_status`;
--
-- Extraindo dados da tabela `age_status`
--

INSERT INTO `age_status` (`id`, `status`) VALUES
(1, 'Realizado'),
(2, 'Aguardando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `cargos`
--

TRUNCATE TABLE `cargos`;
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

DROP TABLE IF EXISTS `certificados`;
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
-- Truncate table before insert `certificados`
--

TRUNCATE TABLE `certificados`;
--
-- Extraindo dados da tabela `certificados`
--

INSERT INTO `certificados` (`id`, `nome`, `sexo`, `dt_nasc`, `mae`, `pai`, `dt_apr`, `tipo_cert`, `cargo`, `emissao`) VALUES
(1, 'Aline Liur Justino', NULL, '0000-00-00', NULL, NULL, NULL, 1, 'Membro', '2019-07-26 22:04:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

DROP TABLE IF EXISTS `cores`;
CREATE TABLE `cores` (
  `id` int(11) NOT NULL,
  `cor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `traducao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `cores`
--

TRUNCATE TABLE `cores`;
--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id`, `cor`, `traducao`) VALUES
(1, 'black', 'Preto'),
(2, 'white', 'Branco'),
(3, 'blue', 'Azul'),
(4, 'yellow', 'Amarelo'),
(5, 'red', 'Vermelho'),
(6, 'green', 'Verde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretoria`
--

DROP TABLE IF EXISTS `diretoria`;
CREATE TABLE `diretoria` (
  `id` int(11) NOT NULL,
  `membro_id` int(11) DEFAULT NULL,
  `dir_cargo_id` int(3) DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_inclusao` int(12) DEFAULT NULL,
  `data_alteracao` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `diretoria`
--

TRUNCATE TABLE `diretoria`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `dir_cargos`
--

DROP TABLE IF EXISTS `dir_cargos`;
CREATE TABLE `dir_cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir_status` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `dir_cargos`
--

TRUNCATE TABLE `dir_cargos`;
--
-- Extraindo dados da tabela `dir_cargos`
--

INSERT INTO `dir_cargos` (`id`, `cargo`, `dir_status`) VALUES
(1, '1º Pastor Presidente(a)', 1),
(2, '2º Pastor Presidente(a)', 0),
(3, '3º Pastor Presidente(a)', 0),
(4, '1º Secretario(a)', 0),
(5, '2º Secretario(a)', 1),
(6, 'Tesoureiro(a)', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro`
--

DROP TABLE IF EXISTS `financeiro`;
CREATE TABLE `financeiro` (
  `id` int(11) NOT NULL,
  `tipo` int(5) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `data` int(12) DEFAULT NULL,
  `data_inclusao` int(12) DEFAULT NULL,
  `data_alteracao` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `financeiro`
--

TRUNCATE TABLE `financeiro`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_status`
--

DROP TABLE IF EXISTS `fin_status`;
CREATE TABLE `fin_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `fin_status`
--

TRUNCATE TABLE `fin_status`;
--
-- Extraindo dados da tabela `fin_status`
--

INSERT INTO `fin_status` (`id_status`, `status`) VALUES
(1, 'Concluido'),
(2, 'Aguardando Lançamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_tipo`
--

DROP TABLE IF EXISTS `fin_tipo`;
CREATE TABLE `fin_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `fin_tipo`
--

TRUNCATE TABLE `fin_tipo`;
--
-- Extraindo dados da tabela `fin_tipo`
--

INSERT INTO `fin_tipo` (`id`, `tipo`) VALUES
(1, 'Entrada'),
(2, 'Saída');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fontes`
--

DROP TABLE IF EXISTS `fontes`;
CREATE TABLE `fontes` (
  `id` int(11) NOT NULL,
  `fonte` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `fontes`
--

TRUNCATE TABLE `fontes`;
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

DROP TABLE IF EXISTS `membros`;
CREATE TABLE `membros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `rg` varchar(12) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `emissao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `foto` varchar(50) DEFAULT NULL,
  `dir_status` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `membros`
--

TRUNCATE TABLE `membros`;
--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id`, `nome`, `cargo`, `data_nasc`, `rg`, `cpf`, `emissao`, `foto`, `dir_status`) VALUES
(1, 'Aline Liur Justino', '5', '1991-02-06', '000000000', '00000000000', '2019-07-28 15:04:38', '23371fd6f039167b614af7169fab3589.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `texto_cert`
--

DROP TABLE IF EXISTS `texto_cert`;
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
-- Truncate table before insert `texto_cert`
--

TRUNCATE TABLE `texto_cert`;
--
-- Extraindo dados da tabela `texto_cert`
--

INSERT INTO `texto_cert` (`id`, `id_cert`, `fonte`, `cor`, `tamanho`, `negrito`, `italic`, `sublinhado`) VALUES
(1, 1, 'comic sans ms', 'black', 6, 1, 0, 1),
(2, 1, 'courier new', 'white', 1, 0, 1, 0),
(3, 1, 'georgia', 'blue', 2, 1, 0, 1),
(4, 1, 'lucida sans unicode', 'yellow', 10, 0, 1, 0),
(5, 1, 'tahoma', 'red', 20, 1, 0, 1),
(6, 1, 'trebuchet ms', 'green', 30, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cert`
--

DROP TABLE IF EXISTS `tipo_cert`;
CREATE TABLE `tipo_cert` (
  `id` int(11) NOT NULL,
  `tipo` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tipo_cert`
--

TRUNCATE TABLE `tipo_cert`;
--
-- Extraindo dados da tabela `tipo_cert`
--

INSERT INTO `tipo_cert` (`id`, `tipo`, `img`, `texto`) VALUES
(1, 'Certificado de teste', 'f5b0b6931b5d3fd74fe5e9d79d0bbba0.jpg', '<p>&nbsp;</p>\r\n\r\n<p>{{1&ordm;pastorPresidente}} : Adiciona o nome do 1&ordm; Pastor Presidente</p>\r\n\r\n<p>{{2&ordm;pastorPresidente}} : Adiciona o nome do 2&ordm; Pastor Presidente</p>\r\n\r\n<p>{{1&ordm;secretario(a)}} : Adiciona o nome do 1&ordm; Secretario(a)</p>\r\n\r\n<p>{{2&ordm;secretario(a)}} : Adiciona o nome do 2&ordm; Secretario(a)</p>\r\n\r\n<p>{{tesoureiro(a)}} : Adiciona o nome do Tesoureiro(a)</p>\r\n\r\n<p>{{nome}} : Adiciona o nome do comtemplado do certificado<br />\r\n&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulos_cert`
--

DROP TABLE IF EXISTS `titulos_cert`;
CREATE TABLE `titulos_cert` (
  `id` int(11) NOT NULL,
  `nome` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `titulos_cert`
--

TRUNCATE TABLE `titulos_cert`;
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
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_eventos`
--
ALTER TABLE `age_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_status`
--
ALTER TABLE `age_status`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diretoria`
--
ALTER TABLE `diretoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dir_cargos`
--
ALTER TABLE `dir_cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financeiro`
--
ALTER TABLE `financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fin_status`
--
ALTER TABLE `fin_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `fin_tipo`
--
ALTER TABLE `fin_tipo`
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
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `age_eventos`
--
ALTER TABLE `age_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `age_status`
--
ALTER TABLE `age_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diretoria`
--
ALTER TABLE `diretoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dir_cargos`
--
ALTER TABLE `dir_cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `financeiro`
--
ALTER TABLE `financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fin_status`
--
ALTER TABLE `fin_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fin_tipo`
--
ALTER TABLE `fin_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fontes`
--
ALTER TABLE `fontes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `texto_cert`
--
ALTER TABLE `texto_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipo_cert`
--
ALTER TABLE `tipo_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `titulos_cert`
--
ALTER TABLE `titulos_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
