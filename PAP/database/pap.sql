-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Dez-2020 às 15:38
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morada` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telemovel` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_enc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telemovel_enc` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_civil_aluno` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidade` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nascimento` date NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `morada`, `codigo_postal`, `telemovel`, `email`, `nome_enc`, `telemovel_enc`, `id_civil_aluno`, `localidade`, `nascimento`, `id_turma`) VALUES
(1, 'Ricardo Costa Granja', 'Rua da Boavista nº:116', '5795-516', '939236400', NULL, 'Maria da Luz Salgado Costa', '966377322', '31012300 1 ZY4', '', '2003-03-03', 3),
(2, 'André Neto', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaa', '111111111', '0', 'aaaaaaaaaaaaaa', '1111111', '111111111', 'aaaaaaaaaaaaa', '2020-11-11', 3),
(3, 'aaaaaaaa', 'aaaaaaaa', '1111111', '111111111', 'aaaaaaaaaaaaa', 'aaaaaaaaa', '', '', '', '0000-00-00', 0),
(4, 'aaaaaaaaaaa', 'aaaaaaaaaaaa', '11111111', NULL, NULL, 'aaaaaaaaaaaaaaa', '111111111', '1111111111', 'aaaaaaaaa', '2020-12-02', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carregamentos`
--

CREATE TABLE `carregamentos` (
  `id_carregamento` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `carregamento` int(11) NOT NULL,
  `id_movimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_movimento` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_saida`
--

CREATE TABLE `entrada_saida` (
  `id_entrada_saida` int(11) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_saida` time NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos`
--

CREATE TABLE `movimentos` (
  `id_movimento` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_compras`
--

CREATE TABLE `produtos_compras` (
  `id_prod_comp` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_completo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `nome`, `nome_completo`) VALUES
(1, '10ºH1', 'Humanidades'),
(2, '11ºSE', 'Socio Económico'),
(3, '12ºI1', 'Informática');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Indexes for table `carregamentos`
--
ALTER TABLE `carregamentos`
  ADD PRIMARY KEY (`id_carregamento`),
  ADD KEY `id_movimento` (`id_movimento`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_movimento` (`id_movimento`);

--
-- Indexes for table `entrada_saida`
--
ALTER TABLE `entrada_saida`
  ADD PRIMARY KEY (`id_entrada_saida`),
  ADD KEY `id_movimento` (`id_movimento`);

--
-- Indexes for table `movimentos`
--
ALTER TABLE `movimentos`
  ADD PRIMARY KEY (`id_movimento`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `produtos_compras`
--
ALTER TABLE `produtos_compras`
  ADD PRIMARY KEY (`id_prod_comp`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carregamentos`
--
ALTER TABLE `carregamentos`
  MODIFY `id_carregamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entrada_saida`
--
ALTER TABLE `entrada_saida`
  MODIFY `id_entrada_saida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id_movimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos_compras`
--
ALTER TABLE `produtos_compras`
  MODIFY `id_prod_comp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
