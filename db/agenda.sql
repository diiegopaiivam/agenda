-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2020 às 22:53
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(10) UNSIGNED NOT NULL,
  `responsavel_id` int(10) UNSIGNED NOT NULL,
  `serie_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `responsavel_id`, `serie_id`, `name`, `email`, `phone`) VALUES
(1, 1, 12, 'Rafael Santana Rabelo', 'rafaelsantana@gmail.com', 9985457489),
(2, 1, 8, 'Raquel Santana Rabelo', 'raquelzinha@gmail.com', 985632145),
(7, 3, 12, 'Aline Oliveira Nascimento', 'alineeoliveiraaaa23@gmail.com', 997611207),
(8, 3, 12, 'Larisse Oliveira Nascimento', 'lariol@gmail.com', 981235697);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunicado`
--

CREATE TABLE `comunicado` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunicado_enviados`
--

CREATE TABLE `comunicado_enviados` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_aluno` int(10) UNSIGNED NOT NULL,
  `id_serie` int(10) UNSIGNED NOT NULL,
  `id_responsavel` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
(1, '2020_03_28_161624_users', 1),
(2, '2020_03_28_164138_responsavel', 1),
(3, '2020_03_28_164155_serie', 1),
(4, '2020_03_28_164203_comunicado', 1),
(5, '2020_03_28_174058_aluno', 1),
(6, '2020_03_28_175637_comunicado_enviados', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
--

CREATE TABLE `responsavel` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` bigint(20) NOT NULL,
  `phone2` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`id`, `name`, `email`, `phone1`, `phone2`) VALUES
(1, 'Fernando Costa Mendes', 'ferobeirario@gmail.com', 992777480, 995748963),
(2, 'Maria Lucineide Batista de Paiva', 'neide@gmail.com', 986960141, 998296824),
(3, 'Maria do Socorro Oliveira', 'socorroliveira@hotmail.com', 985654789, 985569678);

-- --------------------------------------------------------

--
-- Estrutura da tabela `serie`
--

CREATE TABLE `serie` (
  `id` int(10) UNSIGNED NOT NULL,
  `serie` int(11) NOT NULL,
  `turma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `serie`
--

INSERT INTO `serie` (`id`, `serie`, `turma`, `turno`) VALUES
(1, 1, 'A', 'Manha'),
(2, 2, 'A', 'Manha'),
(3, 3, 'A', 'Manha'),
(4, 4, 'A', 'Manha'),
(5, 5, 'A', 'Manha'),
(6, 6, 'A', 'Manha'),
(7, 7, 'A', 'Manha'),
(8, 8, 'A', 'Manha'),
(9, 9, 'A', 'Manha'),
(10, 11, 'A', 'Manha'),
(11, 12, 'A', 'Manha'),
(12, 13, 'A', 'Manha'),
(13, 1, 'A', 'Tarde'),
(14, 2, 'A', 'Tarde'),
(15, 3, 'A', 'Tarde'),
(16, 4, 'A', 'Tarde'),
(17, 5, 'A', 'Tarde'),
(18, 6, 'A', 'Tarde'),
(19, 7, 'A', 'Tarde'),
(20, 8, 'A', 'Tarde'),
(21, 9, 'A', 'Tarde'),
(22, 11, 'A', 'Tarde'),
(23, 12, 'A', 'Tarde'),
(24, 13, 'A', 'Tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aluno_email_unique` (`email`),
  ADD KEY `responsavel_id` (`responsavel_id`),
  ADD KEY `serie_id` (`serie_id`);

--
-- Indexes for table `comunicado`
--
ALTER TABLE `comunicado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comunicado_enviados`
--
ALTER TABLE `comunicado_enviados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comunicado_enviados_id_aluno_foreign` (`id_aluno`),
  ADD KEY `comunicado_enviados_id_serie_foreign` (`id_serie`),
  ADD KEY `comunicado_enviados_id_responsavel_foreign` (`id_responsavel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `responsavel_email_unique` (`email`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comunicado`
--
ALTER TABLE `comunicado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comunicado_enviados`
--
ALTER TABLE `comunicado_enviados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `responsavel_id` FOREIGN KEY (`responsavel_id`) REFERENCES `responsavel` (`id`),
  ADD CONSTRAINT `serie_id` FOREIGN KEY (`serie_id`) REFERENCES `serie` (`id`);

--
-- Limitadores para a tabela `comunicado_enviados`
--
ALTER TABLE `comunicado_enviados`
  ADD CONSTRAINT `comunicado_enviados_id_aluno_foreign` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comunicado_enviados_id_responsavel_foreign` FOREIGN KEY (`id_responsavel`) REFERENCES `responsavel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comunicado_enviados_id_serie_foreign` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
