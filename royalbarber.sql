-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/06/2024 às 22:28
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `royalbarber`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `funcionario_id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `servico_id` bigint(20) UNSIGNED NOT NULL,
  `horario_id` bigint(20) UNSIGNED NOT NULL,
  `dataAgendamento` date NOT NULL,
  `horarioInicial` time NOT NULL,
  `horarioFinal` time NOT NULL,
  `statusServico` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id`, `funcionario_id`, `cliente_id`, `servico_id`, `horario_id`, `dataAgendamento`, `horarioInicial`, `horarioFinal`, `statusServico`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2024-06-20', '08:00:00', '09:29:59', 'PENDENTE', '2024-06-20 21:37:26', '2024-06-20 21:37:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastrar`
--

CREATE TABLE `cadastrar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeCadastrar` varchar(100) NOT NULL,
  `sobrenomeCadastrar` varchar(200) NOT NULL,
  `emailCadastrar` varchar(250) NOT NULL,
  `senhaCadastrar` varchar(255) NOT NULL,
  `telefoneCadastrar` varchar(11) NOT NULL,
  `enderecocadastrar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fotoCliente` varchar(255) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `sobrenomeCliente` varchar(200) NOT NULL,
  `emailCliente` varchar(255) NOT NULL,
  `telefoneCliente` varchar(11) NOT NULL,
  `enderecoCliente` varchar(150) NOT NULL,
  `qtdCortesCliente` int(11) NOT NULL,
  `statusCliente` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `fotoCliente`, `nomeCliente`, `sobrenomeCliente`, `emailCliente`, `telefoneCliente`, `enderecoCliente`, `qtdCortesCliente`, `statusCliente`, `created_at`, `updated_at`) VALUES
(1, 'imagem/a0wl7oLpH4q2NayMno1ujwSjhO3BmxjEVPLwoy9c.jpg', 'Nicolas', 'Souza', 'nicolas.souzapb@gmail.com', '11978456588', 'Teste2', 0, 'ATIVO', '2024-06-20 21:15:25', '2024-06-20 21:44:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeContato` varchar(100) NOT NULL,
  `foneContato` varchar(15) NOT NULL,
  `emailContato` varchar(100) NOT NULL,
  `mensContato` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fotoFuncionario` varchar(255) NOT NULL,
  `nomeFuncionario` varchar(100) NOT NULL,
  `sobrenomeFuncionario` varchar(200) NOT NULL,
  `numeroFuncionario` varchar(15) NOT NULL,
  `emailFuncionario` varchar(255) NOT NULL,
  `especialidadeFuncionario` varchar(100) DEFAULT NULL,
  `inicioExpedienteFuncionario` time NOT NULL,
  `fimExpedienteFuncionario` time NOT NULL,
  `dataNascFuncionario` date NOT NULL,
  `cargoFuncionario` varchar(30) NOT NULL,
  `qntCortesFuncionario` int(11) NOT NULL,
  `salarioFuncionario` double(10,2) NOT NULL,
  `descricaoFuncionario` varchar(102) NOT NULL,
  `statusFuncionario` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `fotoFuncionario`, `nomeFuncionario`, `sobrenomeFuncionario`, `numeroFuncionario`, `emailFuncionario`, `especialidadeFuncionario`, `inicioExpedienteFuncionario`, `fimExpedienteFuncionario`, `dataNascFuncionario`, `cargoFuncionario`, `qntCortesFuncionario`, `salarioFuncionario`, `descricaoFuncionario`, `statusFuncionario`, `created_at`, `updated_at`) VALUES
(1, 'imagem/mWjtbzEGk86iwJIP0KecimlxFmCecUnwg4w0rtMD.jpg', 'Gustavo', 'Silva', '14334212312', 'gustavohermogenes1@gmail.com', 'Cabelo e Barba', '08:00:00', '17:00:00', '2006-04-13', 'barbeiro', 0, 3000.00, 'Gustavo rebola no tronco', 'ATIVO', '2024-06-20 21:15:01', '2024-06-20 21:15:01'),
(2, 'imagem/gYt1fox2lBJ57JwF4Xiq8NTu5KzQ0bFrtTAxNP4s.jpg', 'Gustavo', 'Santos', '14334212312', 'gustavohermogenes2@gmail.com', 'Cabelo e Barba', '08:00:00', '17:00:00', '2006-04-13', 'gerente', 0, 3000.00, 'Gustavo rebola no tronco', 'ATIVO', '2024-06-20 21:16:49', '2024-06-20 21:16:49'),
(3, 'imagem/y7lU0sk7tZzeP9Tj6ePIEXdnQ2Kc8akEdrGqmCKJ.jpg', 'Kelinton', 'Silva', '11978562341', 'kelinton@gmail.com', 'Cabelo', '07:00:00', '19:00:00', '2000-11-10', 'barbeiro', 0, 4000.00, 'Gustavo gosta de DAR', 'ativo', '2024-06-20 23:01:51', '2024-06-20 23:24:42'),
(4, 'SEM IMAGEM', 'Kelinton', 'Silva', '11452134589', 'kelinton2@gmail.com', 'Cabelo', '07:00:00', '19:00:00', '2004-12-24', 'barbeiro', 0, 4000.00, 'Teste', 'ATIVO', '2024-06-20 23:02:25', '2024-06-20 23:03:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `horarios` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `horarios`
--

INSERT INTO `horarios` (`id`, `horarios`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '2024-06-20 21:36:00', '2024-06-20 21:36:00'),
(2, '08:30:00', '2024-06-20 21:36:25', '2024-06-20 21:36:25'),
(3, '09:00:00', '2024-06-20 21:36:38', '2024-06-20 21:36:38'),
(4, '09:30:00', '2024-06-20 21:36:43', '2024-06-20 21:36:43'),
(5, '10:00:00', '2024-06-20 21:36:59', '2024-06-20 21:36:59'),
(6, '19:00:00', '2024-06-20 21:37:05', '2024-06-20 21:37:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `log_acessos`
--

CREATE TABLE `log_acessos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `log_acessos`
--

INSERT INTO `log_acessos` (`id`, `log`, `created_at`, `updated_at`) VALUES
(1, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:15:08', '2024-06-20 21:15:08'),
(2, 'IP: 127.0.0.1 requisitou na rota: /cadastrar', '2024-06-20 21:15:09', '2024-06-20 21:15:09'),
(3, 'IP: 127.0.0.1 requisitou na rota: /cadastrar', '2024-06-20 21:15:25', '2024-06-20 21:15:25'),
(4, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:15:26', '2024-06-20 21:15:26'),
(5, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:15:29', '2024-06-20 21:15:29'),
(6, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:15:30', '2024-06-20 21:15:30'),
(7, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-06-20 21:15:32', '2024-06-20 21:15:32'),
(8, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 21:16:53', '2024-06-20 21:16:53'),
(9, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:16:56', '2024-06-20 21:16:56'),
(10, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:17:39', '2024-06-20 21:17:39'),
(11, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:17:40', '2024-06-20 21:17:40'),
(12, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:18:14', '2024-06-20 21:18:14'),
(13, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente', '2024-06-20 21:18:14', '2024-06-20 21:18:14'),
(14, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente', '2024-06-20 21:18:42', '2024-06-20 21:18:42'),
(15, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente', '2024-06-20 21:20:04', '2024-06-20 21:20:04'),
(16, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 21:20:06', '2024-06-20 21:20:06'),
(17, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/clientes', '2024-06-20 21:20:09', '2024-06-20 21:20:09'),
(18, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/clientes', '2024-06-20 21:21:02', '2024-06-20 21:21:02'),
(19, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:21:09', '2024-06-20 21:21:09'),
(20, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:21:34', '2024-06-20 21:21:34'),
(21, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:22:06', '2024-06-20 21:22:06'),
(22, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar-servico', '2024-06-20 21:22:54', '2024-06-20 21:22:54'),
(23, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar-servico', '2024-06-20 21:22:54', '2024-06-20 21:22:54'),
(24, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar-servico', '2024-06-20 21:23:42', '2024-06-20 21:23:42'),
(25, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:23:42', '2024-06-20 21:23:42'),
(26, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:24:10', '2024-06-20 21:24:10'),
(27, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:24:14', '2024-06-20 21:24:14'),
(28, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:24:24', '2024-06-20 21:24:24'),
(29, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 21:25:37', '2024-06-20 21:25:37'),
(30, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 21:26:48', '2024-06-20 21:26:48'),
(31, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:26:55', '2024-06-20 21:26:55'),
(32, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:27:28', '2024-06-20 21:27:28'),
(33, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:30:39', '2024-06-20 21:30:39'),
(34, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:31:46', '2024-06-20 21:31:46'),
(35, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 21:31:53', '2024-06-20 21:31:53'),
(36, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/clientes', '2024-06-20 21:31:55', '2024-06-20 21:31:55'),
(37, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento', '2024-06-20 21:31:56', '2024-06-20 21:31:56'),
(38, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:31:59', '2024-06-20 21:31:59'),
(39, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:33:37', '2024-06-20 21:33:37'),
(40, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:33:53', '2024-06-20 21:33:53'),
(41, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:34:00', '2024-06-20 21:34:00'),
(42, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:34:01', '2024-06-20 21:34:01'),
(43, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/vendas', '2024-06-20 21:34:01', '2024-06-20 21:34:01'),
(44, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento', '2024-06-20 21:34:03', '2024-06-20 21:34:03'),
(45, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 21:34:09', '2024-06-20 21:34:09'),
(46, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:34:14', '2024-06-20 21:34:14'),
(47, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:34:18', '2024-06-20 21:34:18'),
(48, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:34:18', '2024-06-20 21:34:18'),
(49, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-06-20 21:34:20', '2024-06-20 21:34:20'),
(50, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento/calendario?id_servico=1&nome_servico=Corte%20e%20barba&valor_servico=150&duracao_servico=01%3A30%3A00', '2024-06-20 21:34:22', '2024-06-20 21:34:22'),
(51, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento/calendario?id_servico=1&nome_servico=Corte%20e%20barba&valor_servico=150&duracao_servico=01%3A30%3A00', '2024-06-20 21:35:28', '2024-06-20 21:35:28'),
(52, 'IP: 127.0.0.1 requisitou na rota: /funcs3?day=20&month=Junho', '2024-06-20 21:35:36', '2024-06-20 21:35:36'),
(53, 'IP: 127.0.0.1 requisitou na rota: /consultaH?funcionario_id=1&day=20&month=Junho&nome_funcionario=Gustavo%20Silva&idServico=1', '2024-06-20 21:35:37', '2024-06-20 21:35:37'),
(54, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 21:35:43', '2024-06-20 21:35:43'),
(55, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:35:46', '2024-06-20 21:35:46'),
(56, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:35:49', '2024-06-20 21:35:49'),
(57, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente', '2024-06-20 21:35:49', '2024-06-20 21:35:49'),
(58, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento', '2024-06-20 21:35:53', '2024-06-20 21:35:53'),
(59, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:35:55', '2024-06-20 21:35:55'),
(60, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:00', '2024-06-20 21:36:00'),
(61, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento?horario=1', '2024-06-20 21:36:00', '2024-06-20 21:36:00'),
(62, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:02', '2024-06-20 21:36:02'),
(63, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:25', '2024-06-20 21:36:25'),
(64, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento?horario=2', '2024-06-20 21:36:25', '2024-06-20 21:36:25'),
(65, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:27', '2024-06-20 21:36:27'),
(66, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:38', '2024-06-20 21:36:38'),
(67, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento?horario=3', '2024-06-20 21:36:38', '2024-06-20 21:36:38'),
(68, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:39', '2024-06-20 21:36:39'),
(69, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:43', '2024-06-20 21:36:43'),
(70, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento?horario=4', '2024-06-20 21:36:43', '2024-06-20 21:36:43'),
(71, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:44', '2024-06-20 21:36:44'),
(72, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:36:59', '2024-06-20 21:36:59'),
(73, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento?horario=5', '2024-06-20 21:36:59', '2024-06-20 21:36:59'),
(74, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:37:02', '2024-06-20 21:37:02'),
(75, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adcHorario', '2024-06-20 21:37:05', '2024-06-20 21:37:05'),
(76, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/agendamento?horario=6', '2024-06-20 21:37:06', '2024-06-20 21:37:06'),
(77, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 21:37:09', '2024-06-20 21:37:09'),
(78, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:37:12', '2024-06-20 21:37:12'),
(79, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:37:15', '2024-06-20 21:37:15'),
(80, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:37:15', '2024-06-20 21:37:15'),
(81, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-06-20 21:37:16', '2024-06-20 21:37:16'),
(82, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento/calendario?id_servico=1&nome_servico=Corte%20e%20barba&valor_servico=150&duracao_servico=01%3A30%3A00', '2024-06-20 21:37:18', '2024-06-20 21:37:18'),
(83, 'IP: 127.0.0.1 requisitou na rota: /funcs3?day=20&month=Junho', '2024-06-20 21:37:20', '2024-06-20 21:37:20'),
(84, 'IP: 127.0.0.1 requisitou na rota: /consultaH?funcionario_id=1&day=20&month=Junho&nome_funcionario=Gustavo%20Silva&idServico=1', '2024-06-20 21:37:22', '2024-06-20 21:37:22'),
(85, 'IP: 127.0.0.1 requisitou na rota: /agendamentos', '2024-06-20 21:37:26', '2024-06-20 21:37:26'),
(86, 'IP: 127.0.0.1 requisitou na rota: /emailFuncionario?funcionario_id=1', '2024-06-20 21:37:31', '2024-06-20 21:37:31'),
(87, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:37:32', '2024-06-20 21:37:32'),
(88, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-06-20 21:38:21', '2024-06-20 21:38:21'),
(89, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-06-20 21:38:30', '2024-06-20 21:38:30'),
(90, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 21:40:14', '2024-06-20 21:40:14'),
(91, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:40:16', '2024-06-20 21:40:16'),
(92, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:40:19', '2024-06-20 21:40:19'),
(93, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente', '2024-06-20 21:40:20', '2024-06-20 21:40:20'),
(94, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:40:22', '2024-06-20 21:40:22'),
(95, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/1/editServico', '2024-06-20 21:40:24', '2024-06-20 21:40:24'),
(96, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/1/editServico', '2024-06-20 21:41:11', '2024-06-20 21:41:11'),
(97, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servico/1', '2024-06-20 21:41:16', '2024-06-20 21:41:16'),
(98, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:41:16', '2024-06-20 21:41:16'),
(99, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/1/editServico', '2024-06-20 21:41:19', '2024-06-20 21:41:19'),
(100, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servico/1', '2024-06-20 21:41:22', '2024-06-20 21:41:22'),
(101, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/servicos', '2024-06-20 21:41:22', '2024-06-20 21:41:22'),
(102, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 21:41:26', '2024-06-20 21:41:26'),
(103, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:41:45', '2024-06-20 21:41:45'),
(104, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:41:49', '2024-06-20 21:41:49'),
(105, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:41:49', '2024-06-20 21:41:49'),
(106, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-06-20 21:41:52', '2024-06-20 21:41:52'),
(107, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:42:09', '2024-06-20 21:42:09'),
(108, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:42:21', '2024-06-20 21:42:21'),
(109, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:42:52', '2024-06-20 21:42:52'),
(110, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:43:39', '2024-06-20 21:43:39'),
(111, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/1/edit', '2024-06-20 21:43:41', '2024-06-20 21:43:41'),
(112, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/1', '2024-06-20 21:43:47', '2024-06-20 21:43:47'),
(113, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:43:48', '2024-06-20 21:43:48'),
(114, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:43:51', '2024-06-20 21:43:51'),
(115, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:43:51', '2024-06-20 21:43:51'),
(116, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:43:54', '2024-06-20 21:43:54'),
(117, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:43:55', '2024-06-20 21:43:55'),
(118, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/1/edit', '2024-06-20 21:44:00', '2024-06-20 21:44:00'),
(119, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/1', '2024-06-20 21:44:07', '2024-06-20 21:44:07'),
(120, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:44:07', '2024-06-20 21:44:07'),
(121, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:44:11', '2024-06-20 21:44:11'),
(122, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:44:11', '2024-06-20 21:44:11'),
(123, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:44:13', '2024-06-20 21:44:13'),
(124, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/1/edit', '2024-06-20 21:44:25', '2024-06-20 21:44:25'),
(125, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/1', '2024-06-20 21:44:33', '2024-06-20 21:44:33'),
(126, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:44:33', '2024-06-20 21:44:33'),
(127, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 21:44:37', '2024-06-20 21:44:37'),
(128, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-06-20 21:44:37', '2024-06-20 21:44:37'),
(129, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:44:40', '2024-06-20 21:44:40'),
(130, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 21:45:04', '2024-06-20 21:45:04'),
(131, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 22:30:06', '2024-06-20 22:30:06'),
(132, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 22:30:19', '2024-06-20 22:30:19'),
(133, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-06-20 22:30:31', '2024-06-20 22:30:31'),
(134, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 22:30:46', '2024-06-20 22:30:46'),
(135, 'IP: 127.0.0.1 requisitou na rota: /', '2024-06-20 22:30:51', '2024-06-20 22:30:51'),
(136, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 22:30:52', '2024-06-20 22:30:52'),
(137, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-06-20 22:30:56', '2024-06-20 22:30:56'),
(138, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente', '2024-06-20 22:30:56', '2024-06-20 22:30:56'),
(139, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 22:30:58', '2024-06-20 22:30:58'),
(140, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:31:01', '2024-06-20 22:31:01'),
(141, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:31:09', '2024-06-20 22:31:09'),
(142, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:33:21', '2024-06-20 22:33:21'),
(143, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar/funcionario', '2024-06-20 22:33:59', '2024-06-20 22:33:59'),
(144, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:36:01', '2024-06-20 22:36:01'),
(145, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:36:15', '2024-06-20 22:36:15'),
(146, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:36:25', '2024-06-20 22:36:25'),
(147, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:36:29', '2024-06-20 22:36:29'),
(148, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:36:33', '2024-06-20 22:36:33'),
(149, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:46:07', '2024-06-20 22:46:07'),
(150, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:46:15', '2024-06-20 22:46:15'),
(151, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:46:45', '2024-06-20 22:46:45'),
(152, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:46:54', '2024-06-20 22:46:54'),
(153, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:47:01', '2024-06-20 22:47:01'),
(154, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:47:26', '2024-06-20 22:47:26'),
(155, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:47:28', '2024-06-20 22:47:28'),
(156, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:48:45', '2024-06-20 22:48:45'),
(157, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:49:08', '2024-06-20 22:49:08'),
(158, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:49:19', '2024-06-20 22:49:19'),
(159, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:49:52', '2024-06-20 22:49:52'),
(160, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:50:12', '2024-06-20 22:50:12'),
(161, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:50:18', '2024-06-20 22:50:18'),
(162, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:50:25', '2024-06-20 22:50:25'),
(163, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:50:32', '2024-06-20 22:50:32'),
(164, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:50:37', '2024-06-20 22:50:37'),
(165, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:50:47', '2024-06-20 22:50:47'),
(166, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:50:53', '2024-06-20 22:50:53'),
(167, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:52:48', '2024-06-20 22:52:48'),
(168, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:52:59', '2024-06-20 22:52:59'),
(169, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:11', '2024-06-20 22:53:11'),
(170, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:20', '2024-06-20 22:53:20'),
(171, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:23', '2024-06-20 22:53:23'),
(172, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:31', '2024-06-20 22:53:31'),
(173, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:37', '2024-06-20 22:53:37'),
(174, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:41', '2024-06-20 22:53:41'),
(175, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:45', '2024-06-20 22:53:45'),
(176, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:53:49', '2024-06-20 22:53:49'),
(177, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:01', '2024-06-20 22:54:01'),
(178, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:17', '2024-06-20 22:54:17'),
(179, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:19', '2024-06-20 22:54:19'),
(180, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:24', '2024-06-20 22:54:24'),
(181, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:26', '2024-06-20 22:54:26'),
(182, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:31', '2024-06-20 22:54:31'),
(183, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:33', '2024-06-20 22:54:33'),
(184, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:54:38', '2024-06-20 22:54:38'),
(185, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:55:10', '2024-06-20 22:55:10'),
(186, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:55:28', '2024-06-20 22:55:28'),
(187, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:55:34', '2024-06-20 22:55:34'),
(188, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:55:44', '2024-06-20 22:55:44'),
(189, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:55:53', '2024-06-20 22:55:53'),
(190, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:56:13', '2024-06-20 22:56:13'),
(191, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:56:40', '2024-06-20 22:56:40'),
(192, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:57:10', '2024-06-20 22:57:10'),
(193, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:57:16', '2024-06-20 22:57:16'),
(194, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 22:59:21', '2024-06-20 22:59:21'),
(195, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar/funcionario', '2024-06-20 22:59:51', '2024-06-20 22:59:51'),
(196, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 23:00:09', '2024-06-20 23:00:09'),
(197, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 23:00:19', '2024-06-20 23:00:19'),
(198, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar/funcionario', '2024-06-20 23:01:34', '2024-06-20 23:01:34'),
(199, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar/funcionario', '2024-06-20 23:01:51', '2024-06-20 23:01:51'),
(200, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:01:52', '2024-06-20 23:01:52'),
(201, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 23:02:00', '2024-06-20 23:02:00'),
(202, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/adicionar/funcionario', '2024-06-20 23:02:25', '2024-06-20 23:02:25'),
(203, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:02:25', '2024-06-20 23:02:25'),
(204, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:03:24', '2024-06-20 23:03:24'),
(205, 'IP: 127.0.0.1 requisitou na rota: /funcionario/desativar/4', '2024-06-20 23:03:35', '2024-06-20 23:03:35'),
(206, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:03:35', '2024-06-20 23:03:35'),
(207, 'IP: 127.0.0.1 requisitou na rota: /funcionario/ativar/4', '2024-06-20 23:03:39', '2024-06-20 23:03:39'),
(208, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:03:39', '2024-06-20 23:03:39'),
(209, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:03:43', '2024-06-20 23:03:43'),
(210, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:04:07', '2024-06-20 23:04:07'),
(211, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:04:11', '2024-06-20 23:04:11'),
(212, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:07:50', '2024-06-20 23:07:50'),
(213, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionario/3', '2024-06-20 23:07:56', '2024-06-20 23:07:56'),
(214, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/perfil', '2024-06-20 23:12:56', '2024-06-20 23:12:56'),
(215, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/2/edit', '2024-06-20 23:12:58', '2024-06-20 23:12:58'),
(216, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:13:08', '2024-06-20 23:13:08'),
(217, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:13:10', '2024-06-20 23:13:10'),
(218, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionario/3', '2024-06-20 23:13:54', '2024-06-20 23:13:54'),
(219, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionario/3', '2024-06-20 23:14:20', '2024-06-20 23:14:20'),
(220, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:14:39', '2024-06-20 23:14:39'),
(221, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios/adicionar', '2024-06-20 23:14:42', '2024-06-20 23:14:42'),
(222, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:15:32', '2024-06-20 23:15:32'),
(223, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:15:34', '2024-06-20 23:15:34'),
(224, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:16:26', '2024-06-20 23:16:26'),
(225, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:16:30', '2024-06-20 23:16:30'),
(226, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:16:49', '2024-06-20 23:16:49'),
(227, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:16:52', '2024-06-20 23:16:52'),
(228, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:17:38', '2024-06-20 23:17:38'),
(229, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:17:50', '2024-06-20 23:17:50'),
(230, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:17:55', '2024-06-20 23:17:55'),
(231, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:18:10', '2024-06-20 23:18:10'),
(232, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:18:25', '2024-06-20 23:18:25'),
(233, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:18:36', '2024-06-20 23:18:36'),
(234, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionario/3', '2024-06-20 23:18:52', '2024-06-20 23:18:52'),
(235, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:19:10', '2024-06-20 23:19:10'),
(236, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:19:28', '2024-06-20 23:19:28'),
(237, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:19:40', '2024-06-20 23:19:40'),
(238, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:19:57', '2024-06-20 23:19:57'),
(239, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:20:29', '2024-06-20 23:20:29'),
(240, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionario/3', '2024-06-20 23:24:42', '2024-06-20 23:24:42'),
(241, 'IP: 127.0.0.1 requisitou na rota: /dashboard/gerente/funcionarios', '2024-06-20 23:24:42', '2024-06-20 23:24:42'),
(242, 'IP: 127.0.0.1 requisitou na rota: /dashboard/funcionarios/3/edit', '2024-06-20 23:24:46', '2024-06-20 23:24:46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `materiais`
--

CREATE TABLE `materiais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fotoMaterial` varchar(255) NOT NULL,
  `nomeMaterial` varchar(50) NOT NULL,
  `marcaMaterial` varchar(50) NOT NULL,
  `fornecedorMaterial` varchar(50) NOT NULL,
  `descricaoMaterial` varchar(255) NOT NULL,
  `valorVendaMaterial` double NOT NULL,
  `valorCompraMaterial` double NOT NULL,
  `estoqueMaterial` int(11) NOT NULL,
  `statusMaterial` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(34, '2024_03_04_205631_create_servicos_table', 1),
(121, '2014_10_12_000000_create_users_table', 2),
(122, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(123, '2019_08_19_000000_create_failed_jobs_table', 2),
(124, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(125, '2024_02_02_165729_create_horario_table', 2),
(126, '2024_02_08_183749_create_servicos_table', 2),
(127, '2024_03_13_174616_create_produtos_table', 2),
(128, '2024_03_17_015927_create_contatos_table', 2),
(129, '2024_03_23_025619_create_clientes_table', 2),
(130, '2024_03_23_025843_create_funcionarios_table', 2),
(131, '2024_03_24_034045_usuarios', 2),
(132, '2024_03_25_182421_create_cadastrar_table', 2),
(133, '2024_04_03_193115_create_log_acessos_table', 2),
(134, '2024_04_08_183315_create_agendamentos_table', 2),
(135, '2024_04_10_164620_create_materiais_table', 2),
(136, '2024_04_11_181532_create_vendas_table', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fotoProduto` varchar(255) NOT NULL,
  `nomeProduto` varchar(50) NOT NULL,
  `valorProduto` varchar(100) NOT NULL,
  `estoqueProduto` int(11) NOT NULL,
  `descricaoProduto` varchar(255) NOT NULL,
  `statusProduto` enum('ativo','inativo') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeServico` varchar(50) NOT NULL,
  `fotoServico` varchar(255) NOT NULL,
  `valorServico` double NOT NULL,
  `descricaoServico` varchar(100) NOT NULL,
  `duracaoServico` time NOT NULL,
  `statusServico` enum('ativo','inativo') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nomeServico`, `fotoServico`, `valorServico`, `descricaoServico`, `duracaoServico`, `statusServico`, `created_at`, `updated_at`) VALUES
(1, 'Corte e barba', 'imagem/2wbLhrl2Ajw6EgBvrTPVc7IvI7ih9OunpNxhBfQ7.png', 150, 'corte de cabelo masculino e designe de barba', '01:30:00', 'ativo', '2024-06-20 21:23:42', '2024-06-20 21:41:22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(155) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tipo_usuario_id` bigint(20) NOT NULL,
  `tipo_usuario_type` enum('funcionario','cliente') NOT NULL DEFAULT 'cliente',
  `email_verificado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `token_lembrete` varchar(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo_usuario_id`, `tipo_usuario_type`, `email_verificado_em`, `token_lembrete`, `created_at`, `updated_at`) VALUES
(1, 'Nicolas', 'nicolas.souzapb@gmail.com', '123', 1, 'cliente', '2024-06-20 18:15:25', '788490', '2024-06-20 21:15:25', '2024-06-20 21:15:25'),
(2, 'Gustavo', 'gustavohermogenes2@gmail.com', '123', 2, 'funcionario', '2024-06-20 18:18:09', '', NULL, NULL),
(3, 'Kelinton', 'kelinton@gmail.com', '123', 3, 'funcionario', '2024-06-20 23:01:51', '548215', '2024-06-20 23:01:51', '2024-06-20 23:01:51'),
(4, 'Kelinton', 'kelinton2@gmail.com', '123', 4, 'funcionario', '2024-06-20 23:02:25', '366320', '2024-06-20 23:02:25', '2024-06-20 23:02:25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeVenda` varchar(50) NOT NULL,
  `valorVenda` varchar(100) NOT NULL,
  `qntVenda` int(11) NOT NULL,
  `descricaoVenda` varchar(255) NOT NULL,
  `idFuncionario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendamento_funcionario_id_foreign` (`funcionario_id`),
  ADD KEY `agendamento_cliente_id_foreign` (`cliente_id`),
  ADD KEY `agendamento_servico_id_foreign` (`servico_id`),
  ADD KEY `agendamento_horario_id_foreign` (`horario_id`);

--
-- Índices de tabela `cadastrar`
--
ALTER TABLE `cadastrar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `log_acessos`
--
ALTER TABLE `log_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_token_lembrete_unique` (`token_lembrete`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendas_idfuncionario_foreign` (`idFuncionario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cadastrar`
--
ALTER TABLE `cadastrar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `log_acessos`
--
ALTER TABLE `log_acessos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT de tabela `materiais`
--
ALTER TABLE `materiais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agendamento_funcionario_id_foreign` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agendamento_horario_id_foreign` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agendamento_servico_id_foreign` FOREIGN KEY (`servico_id`) REFERENCES `servicos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_idfuncionario_foreign` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
