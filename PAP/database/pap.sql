-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2020 às 18:33
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pap`
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
(2, 'André Neto', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaa', '111111111', '0', 'aaaaaaaaaaaaaa', '1111111', '111111111', 'aaaaaaaaaaaaa', '2020-11-11', 3);

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
  `ano` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso_abreviacao` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `nome`, `ano`, `curso_abreviacao`) VALUES
(1, 'Humanidades', '10º', 'H'),
(2, 'Socio Economico', '11º', 'SE'),
(3, 'Informática', '12º', 'I1'),
(4, '11º', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices para tabela `carregamentos`
--
ALTER TABLE `carregamentos`
  ADD PRIMARY KEY (`id_carregamento`),
  ADD KEY `id_movimento` (`id_movimento`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_movimento` (`id_movimento`);

--
-- Índices para tabela `entrada_saida`
--
ALTER TABLE `entrada_saida`
  ADD PRIMARY KEY (`id_entrada_saida`),
  ADD KEY `id_movimento` (`id_movimento`);

--
-- Índices para tabela `movimentos`
--
ALTER TABLE `movimentos`
  ADD PRIMARY KEY (`id_movimento`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `produtos_compras`
--
ALTER TABLE `produtos_compras`
  ADD PRIMARY KEY (`id_prod_comp`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `carregamentos`
--
ALTER TABLE `carregamentos`
  MODIFY `id_carregamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `entrada_saida`
--
ALTER TABLE `entrada_saida`
  MODIFY `id_entrada_saida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id_movimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos_compras`
--
ALTER TABLE `produtos_compras`
  MODIFY `id_prod_comp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
