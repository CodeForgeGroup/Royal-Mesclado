-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/05/2024 às 21:15
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
  `statusServico` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id`, `funcionario_id`, `cliente_id`, `servico_id`, `horario_id`, `dataAgendamento`, `horarioInicial`, `statusServico`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 6, '2024-05-13', '10:30:00', 'Pendente', '2024-05-13 21:26:04', '2024-05-13 21:26:04');

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
(1, 'imagem/1WvlN1CK30hsTT5qbrjLBWLaZLCS8pJ8kFbW6PFq.png', 'nicolas', 'souza', 'nicolas@gmail.com', '12323542', 'Teste', 0, 'ativo', '2024-05-13 21:23:04', '2024-05-13 21:27:33');

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
  `numeroFuncionario` varchar(11) NOT NULL,
  `emailFuncionario` varchar(255) NOT NULL,
  `especialidadeFuncionario` varchar(100) NOT NULL,
  `inicioExpedienteFuncionario` time NOT NULL,
  `fimExpedienteFuncionario` time NOT NULL,
  `cargoFuncionario` varchar(30) NOT NULL,
  `qntCortesFuncionario` int(11) NOT NULL,
  `salarioFuncionario` double(10,2) NOT NULL,
  `statusFuncionario` varchar(10) NOT NULL,
  `valorCorteFuncionario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `fotoFuncionario`, `nomeFuncionario`, `sobrenomeFuncionario`, `numeroFuncionario`, `emailFuncionario`, `especialidadeFuncionario`, `inicioExpedienteFuncionario`, `fimExpedienteFuncionario`, `cargoFuncionario`, `qntCortesFuncionario`, `salarioFuncionario`, `statusFuncionario`, `valorCorteFuncionario`, `created_at`, `updated_at`) VALUES
(1, 'imagem/MGBMmiQtjektq3XY0ylWkCWjPjqKfzTU1u79JwxN.png', 'Nicolas', 'Souza', '1194842', 'gustavoh@gmail.com', 'Cabelo', '10:00:00', '18:00:00', 'barbeiro', 0, 1400.00, 'ATIVO', 0, '2024-05-13 21:23:36', '2024-05-13 21:23:36');

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
(1, '08:00:00', NULL, NULL),
(2, '09:00:00', NULL, NULL),
(3, '08:30:00', NULL, NULL),
(4, '09:30:00', NULL, NULL),
(5, '10:00:00', NULL, NULL),
(6, '10:30:00', NULL, NULL),
(7, '11:00:00', NULL, NULL),
(8, '11:30:00', NULL, NULL),
(9, '12:00:00', NULL, NULL),
(10, '12:30:00', NULL, NULL);

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
(1, 'IP: 127.0.0.1 requisitou na rota: /dashboard/barbeiro', '2024-05-13 21:22:51', '2024-05-13 21:22:51'),
(2, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:22:51', '2024-05-13 21:22:51'),
(3, 'IP: 127.0.0.1 requisitou na rota: /cadastrar', '2024-05-13 21:22:53', '2024-05-13 21:22:53'),
(4, 'IP: 127.0.0.1 requisitou na rota: /cadastrar', '2024-05-13 21:23:04', '2024-05-13 21:23:04'),
(5, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:23:04', '2024-05-13 21:23:04'),
(6, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:23:11', '2024-05-13 21:23:11'),
(7, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-05-13 21:23:12', '2024-05-13 21:23:12'),
(8, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-05-13 21:23:16', '2024-05-13 21:23:16'),
(9, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-05-13 21:23:18', '2024-05-13 21:23:18'),
(10, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-05-13 21:24:35', '2024-05-13 21:24:35'),
(11, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-05-13 21:25:23', '2024-05-13 21:25:23'),
(12, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-05-13 21:25:55', '2024-05-13 21:25:55'),
(13, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento/calendario?id_servico=1&nome_servico=Barba%20Design%20com%20Navalha%20e%20Maquininha&valor_servico=100&duracao_servico=01%3A00%3A00', '2024-05-13 21:25:57', '2024-05-13 21:25:57'),
(14, 'IP: 127.0.0.1 requisitou na rota: /funcs3?day=13&month=Maio', '2024-05-13 21:26:00', '2024-05-13 21:26:00'),
(15, 'IP: 127.0.0.1 requisitou na rota: /consultaH?funcionario_id=1&day=13&month=Maio&nome_funcionario=Nicolas%20Souza&idServico=1', '2024-05-13 21:26:02', '2024-05-13 21:26:02'),
(16, 'IP: 127.0.0.1 requisitou na rota: /agendamentos', '2024-05-13 21:26:04', '2024-05-13 21:26:04'),
(17, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/compromissos', '2024-05-13 21:26:05', '2024-05-13 21:26:05'),
(18, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-05-13 21:26:08', '2024-05-13 21:26:08'),
(19, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-05-13 21:26:10', '2024-05-13 21:26:10'),
(20, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/perfil', '2024-05-13 21:26:22', '2024-05-13 21:26:22'),
(21, 'IP: 127.0.0.1 requisitou na rota: /dashboard/cliente/agendamento', '2024-05-13 21:27:40', '2024-05-13 21:27:40'),
(22, 'IP: 127.0.0.1 requisitou na rota: /', '2024-05-13 21:28:28', '2024-05-13 21:28:28'),
(23, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:28:31', '2024-05-13 21:28:31'),
(24, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:28:34', '2024-05-13 21:28:34'),
(25, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:28:54', '2024-05-13 21:28:54'),
(26, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:28:57', '2024-05-13 21:28:57'),
(27, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:28:57', '2024-05-13 21:28:57'),
(28, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:29:04', '2024-05-13 21:29:04'),
(29, 'IP: 127.0.0.1 requisitou na rota: /login', '2024-05-13 21:29:28', '2024-05-13 21:29:28'),
(30, 'IP: 127.0.0.1 requisitou na rota: /dashboard/barbeiro', '2024-05-13 21:29:29', '2024-05-13 21:29:29'),
(31, 'IP: 127.0.0.1 requisitou na rota: /dashboard/barbeiro', '2024-05-13 21:30:15', '2024-05-13 21:30:15'),
(32, 'IP: 127.0.0.1 requisitou na rota: /dashboard/barbeiro', '2024-05-13 21:31:38', '2024-05-13 21:31:38'),
(33, 'IP: 127.0.0.1 requisitou na rota: /dashboard/barbeiro/perfil', '2024-05-13 21:31:44', '2024-05-13 21:31:44'),
(34, 'IP: 127.0.0.1 requisitou na rota: /dashboard/barbeiro/perfil/1edit', '2024-05-13 21:31:49', '2024-05-13 21:31:49'),
(35, 'IP: 127.0.0.1 requisitou na rota: /dashboard/barbeiro/perfil/1edit', '2024-05-13 21:35:09', '2024-05-13 21:35:09');

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
(106, '2014_10_12_000000_create_users_table', 2),
(107, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(108, '2019_08_19_000000_create_failed_jobs_table', 2),
(109, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(110, '2024_02_02_165729_create_horario_table', 2),
(111, '2024_02_08_183749_create_servicos_table', 2),
(112, '2024_03_17_015927_create_contatos_table', 2),
(113, '2024_03_23_025619_create_clientes_table', 2),
(114, '2024_03_23_025843_create_funcionarios_table', 2),
(115, '2024_03_24_034045_usuarios', 2),
(116, '2024_03_25_182421_create_cadastrar_table', 2),
(117, '2024_04_03_193115_create_log_acessos_table', 2),
(118, '2024_04_08_183315_create_agendamentos_table', 2),
(119, '2024_04_10_164620_create_materiais_table', 2),
(120, '2024_04_11_181532_create_vendas_table', 2);

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
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeServico` varchar(50) NOT NULL,
  `fotoServico` varchar(255) NOT NULL,
  `valorServico` double NOT NULL,
  `descricaoServico` varchar(100) NOT NULL,
  `duracaoServico` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nomeServico`, `fotoServico`, `valorServico`, `descricaoServico`, `duracaoServico`, `created_at`, `updated_at`) VALUES
(1, 'Barba Design com Navalha e Maquininha', 'imagem/9XrP027fnDaqgsq6rrzlCyEH593fqmBxjRZGiL6f.png', 100, 'Design de barba com maquina, tesoura e navalha.', '01:00:00', '2024-05-13 21:23:45', '2024-05-13 21:23:45');

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
(1, 'nicolas', 'nicolas@gmail.com', '123', 1, 'cliente', '2024-05-13 18:23:04', '836912', '2024-05-13 21:23:04', '2024-05-13 21:23:04'),
(2, 'Nicolas', 'gustavo@gmail.com', '123', 1, 'funcionario', '2024-05-13 18:28:24', '', NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `log_acessos`
--
ALTER TABLE `log_acessos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `materiais`
--
ALTER TABLE `materiais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
