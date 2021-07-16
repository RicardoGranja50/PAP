-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2021 às 12:07
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
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `morada` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telemovel` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_enc` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telemovel_enc` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_civil_aluno` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidade` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `foto_aluno` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cartao_aluno` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `morada`, `codigo_postal`, `telemovel`, `email`, `nome_enc`, `telemovel_enc`, `id_civil_aluno`, `localidade`, `nascimento`, `id_turma`, `foto_aluno`, `cartao_aluno`, `saldo`) VALUES
(1, 'Ricardo Costa Granja', 'Rua da Boavista nº:116', '5795-516', '939236400', 'ricapt555@gmail.com', 'Maria da Luz Salgado Costa', '966377322', '31012300 1 ZY4', 'S.Salvador do Campo', '2003-03-03', 3, '1617634079_1617634043_1610561276_Capturar.PNG', '0009655308', 204.19),
(18, 'Tiago Costa', 'Rua dos talhos nº111', '0000-000', '123456789', 'ricapt555@gmail.com', 'Márcia', '939236400', '31012300 1 ZY4', 'Roriz', '2002-11-19', 3, '1617634063_1617200820_Vikings-Série-Derivada.jpg', '0006949217', 15.6),
(22, 'Marcelo', 'Rua dos Talhos', '9181-018', '939236400', 'lethalarms@gmail.com', 'Marcelo', '939236400', '31012300 1 ZY4', 'Vila das Aves', '2003-02-11', 3, '1625734671_marcelo.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_saida`
--

CREATE TABLE `entrada_saida` (
  `id_entrada_saida` int(11) NOT NULL,
  `id_movimento` int(11) NOT NULL,
  `tipo_entrada_saida` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentos`
--

CREATE TABLE `movimentos` (
  `id_movimento` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `tipo_movimento` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carregamento` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `carrinho` tinyint(4) DEFAULT NULL,
  `entrada_saida` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `movimentos`
--

INSERT INTO `movimentos` (`id_movimento`, `id_aluno`, `tipo_movimento`, `carregamento`, `created_at`, `updated_at`, `carrinho`, `entrada_saida`) VALUES
(58, 1, 'carregamento', 3, '2021-03-08 16:41:42', '2021-03-08 16:41:42', NULL, NULL),
(65, 1, 'papelaria', 6.9, '2021-03-09 00:09:48', '2021-03-18 09:25:48', 0, NULL),
(66, 1, 'papelaria', 15, '2021-03-15 17:31:27', '2021-03-18 09:27:47', 0, NULL),
(67, 1, 'papelaria', 5.4, '2021-03-18 09:33:31', '2021-03-18 22:15:40', 0, NULL),
(68, 1, 'carregamento', 9, '2021-03-18 22:15:20', '2021-03-18 22:15:20', NULL, NULL),
(69, 1, 'papelaria', 3, '2021-03-18 22:15:48', '2021-03-18 22:15:54', 0, NULL),
(70, 1, 'papelaria', 5.4, '2021-03-18 22:15:56', '2021-03-18 22:29:53', 0, NULL),
(71, 1, 'carregamento', 10, '2021-03-18 22:29:20', '2021-03-18 22:29:20', NULL, NULL),
(72, 1, 'papelaria', 6.9, '2021-03-18 22:30:01', '2021-03-22 16:31:19', 0, NULL),
(73, 1, 'carregamento', 12, '2021-03-22 16:31:01', '2021-03-22 16:31:01', NULL, NULL),
(74, 1, 'carregamento', 10, '2021-03-26 15:24:56', '2021-03-26 15:24:56', NULL, NULL),
(75, 1, 'papelaria', 3, '2021-03-26 15:25:10', '2021-03-26 15:26:06', 0, NULL),
(76, 1, 'papelaria', 4, '2021-03-26 15:26:09', '2021-03-26 15:26:11', 0, NULL),
(77, 1, 'carregamento', 10, '2021-03-26 16:54:15', '2021-03-26 16:54:15', NULL, NULL),
(78, 1, 'papelaria', 2, '2021-03-26 16:54:47', '2021-03-26 16:55:03', 0, NULL),
(79, 1, 'carregamento', 100, '2021-03-26 19:03:39', '2021-03-26 19:03:39', NULL, NULL),
(80, 1, 'papelaria', 3, '2021-03-26 19:03:47', '2021-03-26 19:03:56', 0, NULL),
(81, 1, 'carregamento', 10, '2021-03-26 20:01:38', '2021-03-26 20:01:38', NULL, NULL),
(82, 1, 'papelaria', 3, '2021-03-26 20:01:56', '2021-03-26 20:02:12', 0, NULL),
(83, 1, 'carregamento', 100, '2021-03-31 21:32:38', '2021-03-31 22:32:38', NULL, NULL),
(84, 1, 'papelaria', 6, '2021-03-31 21:33:02', '2021-03-31 22:33:09', 0, NULL),
(85, 18, 'carregamento', 1, '2021-04-06 10:00:32', '2021-04-06 11:00:32', NULL, NULL),
(86, 18, 'papelaria', 3.9, '2021-04-12 14:06:26', '2021-04-12 15:06:49', 0, NULL),
(87, 18, 'carregamento', 30, '2021-04-12 14:06:45', '2021-04-12 15:06:45', NULL, NULL),
(88, 18, 'papelaria', 3, '2021-04-12 14:25:40', '2021-04-12 15:25:42', 0, NULL),
(89, 1, 'bar', 1, '2021-04-12 14:31:16', '2021-04-12 15:50:51', 0, NULL),
(90, 1, 'bar', 1, '2021-04-12 14:51:39', '2021-04-12 15:51:41', 0, NULL),
(91, 1, 'bar', 1, '2021-04-12 14:52:27', '2021-04-12 15:52:29', 0, NULL),
(92, 1, 'bar', 1, '2021-04-12 14:53:22', '2021-04-12 15:53:23', 0, NULL),
(93, 1, 'bar', 2, '2021-04-12 14:57:37', '2021-04-12 15:57:43', 0, NULL),
(94, 1, 'papelaria', 2.4, '2021-04-12 14:58:02', '2021-04-12 15:58:57', 0, NULL),
(95, 1, 'papelaria', 6, '2021-04-12 14:59:01', '2021-04-12 15:59:04', 0, NULL),
(96, 18, 'bar', 2, '2021-04-12 21:09:51', '2021-04-12 22:09:55', 0, NULL),
(101, 1, 'portaria', NULL, '2021-04-16 14:14:24', '2021-04-16 15:14:24', NULL, 0),
(102, 1, 'portaria', NULL, '2021-04-16 14:14:38', '2021-04-16 15:14:38', NULL, 1),
(104, 1, 'portaria', NULL, '2021-04-16 14:16:15', '2021-04-16 15:16:15', NULL, 0),
(105, 1, 'portaria', NULL, '2021-04-16 14:16:22', '2021-04-16 15:16:22', NULL, 1),
(106, 1, 'portaria', NULL, '2021-04-16 14:30:00', '2021-04-16 15:30:00', NULL, 0),
(107, 1, 'portaria', NULL, '2021-04-16 14:30:10', '2021-04-16 15:30:10', NULL, 1),
(108, 1, 'portaria', NULL, '2021-04-16 14:30:32', '2021-04-16 15:30:32', NULL, 0),
(109, 1, 'portaria', NULL, '2021-04-16 14:30:43', '2021-04-16 15:30:43', NULL, 1),
(110, 18, 'portaria', NULL, '2021-04-16 14:32:13', '2021-04-16 15:32:13', NULL, 0),
(111, 18, 'portaria', NULL, '2021-04-16 14:32:51', '2021-04-16 15:32:51', NULL, 1),
(112, 1, 'portaria', NULL, '2021-04-16 14:32:56', '2021-04-16 15:32:56', NULL, 0),
(113, 1, 'portaria', NULL, '2021-04-16 14:46:28', '2021-04-16 15:46:28', NULL, 1),
(114, 18, 'portaria', NULL, '2021-04-16 15:17:21', '2021-04-16 16:17:21', NULL, 0),
(115, 18, 'portaria', NULL, '2021-04-16 15:17:28', '2021-04-16 16:17:28', NULL, 1),
(116, 1, 'portaria', NULL, '2021-04-16 15:17:32', '2021-04-16 16:17:32', NULL, 0),
(117, 1, 'portaria', NULL, '2021-04-16 15:17:34', '2021-04-16 16:17:34', NULL, 1),
(118, 1, 'portaria', NULL, '2021-04-16 15:52:05', '2021-04-16 16:52:05', NULL, 0),
(119, 1, 'bar', 1.1, '2021-04-16 15:56:11', '2021-04-16 16:56:30', 0, NULL),
(120, 1, 'carregamento', 10, '2021-04-16 15:57:06', '2021-04-16 16:57:06', NULL, NULL),
(121, 1, 'papelaria', 6, '2021-04-16 15:57:26', '2021-04-16 16:57:30', 0, NULL),
(122, 18, 'portaria', NULL, '2021-04-16 15:58:48', '2021-04-16 16:58:48', NULL, 0),
(123, 1, 'portaria', NULL, '2021-04-16 15:58:57', '2021-04-16 16:58:57', NULL, 1),
(124, 18, 'portaria', NULL, '2021-04-16 15:59:00', '2021-04-16 16:59:00', NULL, 1),
(125, 18, 'portaria', NULL, '2021-04-16 20:20:16', '2021-04-16 21:20:16', NULL, 0),
(126, 18, 'bar', 2, '2021-04-16 20:21:11', '2021-04-16 21:21:15', 0, NULL),
(127, 18, 'bar', 2, '2021-04-16 20:21:20', '2021-04-16 21:21:25', 0, NULL),
(128, 18, 'portaria', NULL, '2021-04-21 17:22:14', '2021-04-21 18:22:14', NULL, 0),
(129, 1, 'portaria', NULL, '2021-04-21 17:22:17', '2021-04-21 18:22:17', NULL, 0),
(130, 1, 'portaria', NULL, '2021-04-22 16:31:11', '2021-04-22 17:31:11', NULL, 0),
(131, 18, 'portaria', NULL, '2021-04-22 16:31:12', '2021-04-22 17:31:12', NULL, 0),
(132, 18, 'carregamento', 1, '2021-04-22 17:00:12', '2021-04-22 18:00:12', NULL, NULL),
(133, 18, 'carregamento', 1, '2021-04-22 17:01:43', '2021-04-22 18:01:43', NULL, NULL),
(134, 18, 'papelaria', 3.5, '2021-04-22 17:01:51', '2021-04-22 18:01:54', 0, NULL),
(135, 18, 'bar', 1, '2021-04-22 17:14:05', '2021-04-22 18:14:07', 0, NULL),
(136, 18, 'portaria', NULL, '2021-04-22 17:28:01', '2021-04-22 18:28:01', NULL, 1),
(137, 1, 'portaria', NULL, '2021-04-22 17:28:05', '2021-04-22 18:28:05', NULL, 1),
(138, 1, 'portaria', NULL, '2021-04-22 17:28:16', '2021-04-22 18:28:16', NULL, 0),
(139, 18, 'portaria', NULL, '2021-04-22 17:28:18', '2021-04-22 18:28:18', NULL, 0),
(140, 1, 'portaria', NULL, '2021-04-23 12:30:19', '2021-04-23 13:30:19', NULL, 0),
(141, 18, 'portaria', NULL, '2021-04-23 12:30:21', '2021-04-23 13:30:21', NULL, 0),
(142, 18, 'portaria', NULL, '2021-05-05 19:03:45', '2021-05-05 20:03:45', NULL, 0),
(143, 1, 'portaria', NULL, '2021-06-06 12:37:02', '2021-06-06 13:37:02', NULL, 0),
(144, 1, 'portaria', NULL, '2021-07-14 08:15:14', '2021-07-14 17:22:35', NULL, 0),
(151, 1, 'bar', 1, '2021-07-07 10:30:30', '2021-07-07 11:37:30', 0, NULL),
(152, 1, 'bar', 1, '2021-07-07 09:40:17', '2021-07-07 10:40:49', 0, NULL),
(169, 1, 'bar', 1, '2021-07-07 13:22:55', '2021-07-07 14:22:56', 0, NULL),
(173, 1, 'bar', 1, '2021-07-07 13:36:24', '2021-07-07 14:36:48', 0, NULL),
(174, 1, 'papelaria', 4, '2021-07-07 13:36:35', '2021-07-07 14:36:57', 0, NULL),
(176, 1, 'bar', 2.1, '2021-07-08 08:48:14', '2021-07-08 09:51:05', 0, NULL),
(177, 1, 'bar', 1, '2021-07-08 08:51:11', '2021-07-08 09:51:13', 0, NULL),
(178, 1, 'carregamento', 10, '2021-07-08 08:54:19', '2021-07-08 09:54:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ricapt555@gmail.com', '$2y$10$Bi5v7aW5YIWBAbcHkAoADuUgxRVeZU2xy0yeBDbtVNSCNW75RmnmW', '2021-01-19 15:08:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` float NOT NULL,
  `foto` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_produto` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `preco`, `foto`, `tipo_produto`, `cat`) VALUES
(3, 'Afia', 2.4, '1614868116_afia.jpg', 'papelaria', NULL),
(5, 'Borracha', 1.5, '1614868603_borracha.jpg', 'papelaria', NULL),
(6, 'Caderno', 3, '1614868622_caderno.jpg', 'papelaria', NULL),
(7, 'Capa', 4, '1614868645_capa.jpg', 'papelaria', NULL),
(8, 'Capa Micas', 4, '1614868672_capa_micas.jpg', 'papelaria', NULL),
(9, 'Cola batom', 3.5, '1614868733_cola_batao.jpg', 'papelaria', NULL),
(10, 'Cola liquida', 4, '1614868843_coloa_liquida.jpg', 'papelaria', NULL),
(11, 'Lápis', 1, '1614868856_lapis.jpg', 'papelaria', NULL),
(12, 'Calculadora', 5, '1614869124_calculadora.jpg', 'papelaria', NULL),
(13, 'Calculadora Cientifica', 7, '1614869145_calculadora_cientifica.jpg', 'papelaria', NULL),
(14, 'Caneta', 1.5, '1614869164_caneta.jpg', 'papelaria', NULL),
(15, 'Compasso', 3, '1614869177_compasso.jpg', 'papelaria', NULL),
(16, 'Lápis de cor', 4, '1614869203_lapis_de_cor.jpg', 'papelaria', NULL),
(17, 'Marcadores', 5, '1614869268_marcadores.jpg', 'papelaria', NULL),
(18, 'Porta Lápis', 5, '1614869289_porta_lapis.jpg', 'papelaria', NULL),
(19, 'Régua', 3, '1614869302_regua.jpg', 'papelaria', NULL),
(20, 'Transferidor', 3, '1614869319_transferidor.jpg', 'papelaria', NULL),
(21, 'Faltas', 0.1, '1614869384_faltas.jpg', 'papelaria', NULL),
(23, 'Bolo de Chocolate', 1, '1617215154_bolo_chocolate.png', 'bar', 'Bolo'),
(24, 'Bongo', 1, '1617215182_bongo.png', 'bar', 'Sumo'),
(25, 'Compal', 1, '1617215200_compal.png', 'bar', 'Sumo'),
(26, 'Croissant de Chocolate', 1, '1617215241_croissant_chocolate.png', 'bar', 'Bolo'),
(27, 'Garrafa de Água', 0.1, '1617215273_garrafa_agua.png', 'bar', 'Sumo'),
(28, 'Leite Achocolatado', 1, '1617215310_leite_achocolatado.png', 'bar', 'Sumo'),
(29, 'Nata', 1, '1617215327_nata.png', 'bar', 'Bolo'),
(30, 'Pão com Fiambre', 0.5, '1617215353_pao_fiambre.png', 'bar', 'Sande'),
(32, 'Pão Misto', 0.5, '1617215481_pao_misto.png', 'bar', 'Sande'),
(33, 'Pão com Queijo', 0.5, '1617215503_pao_queijo.png', 'bar', 'Sande'),
(34, 'Pão Simples', 0.4, '1617215539_pao_simples.png', 'bar', 'Sande'),
(35, 'Russo', 1, '1617215563_russo.png', 'bar', 'Bolo'),
(44, 'Bola Berlim', 2, '1617706514_1617639756_bola_berlim.png', 'bar', 'Bolo'),
(45, 'Tesoura', 3, '1617707982_1614867306_tesoura.jpg', 'papelaria', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_compras`
--

CREATE TABLE `produtos_compras` (
  `id_prod_comp` int(11) NOT NULL,
  `id_movimento` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` float DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos_compras`
--

INSERT INTO `produtos_compras` (`id_prod_comp`, `id_movimento`, `id_produto`, `valor`, `quantidade`) VALUES
(167, 65, 2, 3, 1),
(168, 65, 3, 2.4, 1),
(169, 65, 5, 1.5, 1),
(174, 66, 2, 3, 1),
(175, 66, 13, 7, 1),
(176, 66, 12, 5, 1),
(183, 67, 2, 3, 1),
(184, 67, 3, 2.4, 1),
(186, 69, 6, 3, 1),
(189, 70, 2, 3, 1),
(190, 70, 3, 2.4, 1),
(192, 72, 2, 3, 1),
(193, 72, 3, 2.4, 1),
(194, 72, 5, 1.5, 1),
(196, 75, 5, 3, 2),
(197, 76, 7, 4, 1),
(198, 78, 11, 2, 2),
(199, 80, 14, 3, 2),
(200, 82, 2, 3, 1),
(201, 84, 6, 6, 2),
(203, 86, 5, 1.5, 1),
(204, 86, 3, 2.4, 1),
(205, 88, 6, 3, 1),
(207, 89, 24, 1, 1),
(208, 90, 23, 1, 1),
(209, 91, 23, 1, 1),
(210, 92, 23, 1, 1),
(211, 93, 24, 2, 2),
(213, 94, 3, 2.4, 1),
(214, 95, 19, 6, 2),
(215, 96, 24, 1, 1),
(216, 96, 23, 1, 1),
(227, 119, 26, 1, 1),
(228, 119, 27, 0.1, 1),
(229, 121, 6, 6, 2),
(230, 126, 23, 1, 1),
(231, 126, 24, 1, 1),
(232, 127, 44, 2, 1),
(233, 134, 9, 3.5, 1),
(234, 135, 26, 1, 1),
(238, 146, 9, 3.5, 1),
(251, 149, 25, 1, 1),
(252, 150, 25, 1, 1),
(254, 151, 23, 1, 1),
(255, 152, 26, 1, 1),
(256, 153, 26, 1, 1),
(259, 155, 30, 0.5, 1),
(262, 156, 30, 0.5, 1),
(263, 157, 30, 0.5, 1),
(265, 158, 30, 1, 2),
(274, 161, 26, 0, 0),
(284, 169, 25, 1, 1),
(289, 173, 26, 1, 1),
(290, 174, 7, 4, 1),
(292, 176, 26, 1, 1),
(293, 176, 25, 1, 1),
(294, 176, 27, 0.1, 1),
(295, 177, 26, 1, 1);

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
(3, 'Informática', '12º', 'I1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `tipo_user`) VALUES
(1, 'Admin', 'ricapt555@gmail.com', NULL, '$2y$10$XcqzZdiv4KlVPf9SIl221OK4xa7WK3gatDSR122fL195lOzoUX/5C', NULL, '2021-01-19 14:54:24', '2021-01-19 14:54:24', 'admin'),
(2, 'Ricardo', 'aaa@aaa.com', NULL, '$2y$10$jV91f/Onm8DZ89VzUOb2GeKVd8dLbbN/PFPICekBKE67IaSXCq3He', NULL, '2021-01-20 22:12:28', '2021-01-20 22:12:28', 'normal'),
(3, 'Tiago', 'tiago@gmail.com', NULL, '$2y$10$NzT9AEa8LAlSg3TvI3WvrOXD5Uj27m44SHpA4NuJZFOUUe4HFNShC', NULL, '2021-01-22 14:17:09', '2021-01-22 14:17:09', 'normal'),
(4, 'papelaria', 'papelaria@gmail.com', NULL, '$2y$10$P.Rw1hvQg1.dfRvmDh3Y1exzeryr0yAI7mg.XNHLl2i5Gz64s1DTi', NULL, '2021-02-25 10:02:29', '2021-02-25 10:02:29', 'papelaria'),
(5, 'bar', 'bar@gmail.com', NULL, '$2y$10$YpNYnt5pP6aQWdZeoMnTju27H8CLukF.8PIFuhaWOWhZDy3467w2K', NULL, '2021-03-18 09:37:20', '2021-03-18 09:37:20', 'bar'),
(7, 'portaria', 'portaria@gmail.com', NULL, '$2y$10$zmkxF.MRsgZOMkBWPKR8eug/usKQaCvNa3pJK2Zjstnj8ngYfBQ/K', NULL, '2021-04-16 13:18:41', '2021-04-16 13:18:41', 'portaria');

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
-- Índices para tabela `entrada_saida`
--
ALTER TABLE `entrada_saida`
  ADD PRIMARY KEY (`id_entrada_saida`),
  ADD KEY `id_movimento` (`id_movimento`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentos`
--
ALTER TABLE `movimentos`
  ADD PRIMARY KEY (`id_movimento`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `id_compra` (`id_movimento`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `entrada_saida`
--
ALTER TABLE `entrada_saida`
  MODIFY `id_entrada_saida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `movimentos`
--
ALTER TABLE `movimentos`
  MODIFY `id_movimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `produtos_compras`
--
ALTER TABLE `produtos_compras`
  MODIFY `id_prod_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
