-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 27-Fev-2019 às 15:52
-- Versão do servidor: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funil_vendas`
--

CREATE TABLE `funil_vendas` (
  `funil_id` int(11) NOT NULL,
  `localidade_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `funil_etapa` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funil_vendas`
--

INSERT INTO `funil_vendas` (`funil_id`, `localidade_id`, `lead_id`, `funil_etapa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(38, 7, 14, 3, '2019-02-27 15:28:37', '2019-02-27 15:31:57', NULL),
(39, 8, 15, 1, '2019-02-27 15:28:47', '2019-02-27 15:28:47', NULL),
(40, 7, 16, 2, '2019-02-27 15:31:52', '2019-02-27 15:31:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funil_vendas_notas`
--

CREATE TABLE `funil_vendas_notas` (
  `fvn_id` int(11) NOT NULL,
  `funil_id` int(11) NOT NULL,
  `fvn_tipo` varchar(255) NOT NULL,
  `fvn_descricao` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `localidade_id` int(11) NOT NULL,
  `lead_nome` varchar(255) NOT NULL,
  `lead_email` varchar(255) DEFAULT NULL,
  `lead_endereco` varchar(255) DEFAULT NULL,
  `lead_sobre` varchar(255) DEFAULT NULL,
  `lead_whatsapp` varchar(255) DEFAULT NULL,
  `lead_instagram` varchar(255) DEFAULT NULL,
  `lead_facebook` varchar(255) DEFAULT NULL,
  `lead_reclama_facebook` varchar(10) DEFAULT NULL,
  `lead_reclama_telefone` varchar(10) DEFAULT NULL,
  `lead_curte_facebook` varchar(10) DEFAULT NULL,
  `lead_recomenda_facebook` varchar(10) DEFAULT NULL,
  `lead_segue_instagram` varchar(10) DEFAULT NULL,
  `lead_reclama_google` varchar(10) DEFAULT NULL,
  `lead_boa_pagadora` varchar(10) DEFAULT NULL,
  `lead_familiar` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `leads`
--

INSERT INTO `leads` (`lead_id`, `localidade_id`, `lead_nome`, `lead_email`, `lead_endereco`, `lead_sobre`, `lead_whatsapp`, `lead_instagram`, `lead_facebook`, `lead_reclama_facebook`, `lead_reclama_telefone`, `lead_curte_facebook`, `lead_recomenda_facebook`, `lead_segue_instagram`, `lead_reclama_google`, `lead_boa_pagadora`, `lead_familiar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 7, 'Aleck Yann Marques de Matos', 'aleckyann@gmail.com', NULL, NULL, '38999538975', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-27 14:24:25', '2019-02-27 14:24:25', NULL),
(15, 8, 'Elinaldo', 'eli@gmail.com', NULL, NULL, '3899664455', NULL, NULL, NULL, NULL, 'on', 'on', 'on', NULL, NULL, NULL, '2019-02-27 15:17:43', '2019-02-27 15:17:43', NULL),
(16, 7, 'Júnior Matos', 'juniormattos@gmail.com', '', '', '(38) 9 9953-5474', '', '', 'off', 'on', 'off', 'off', 'off', 'on', 'on', 'off', '2019-02-27 15:18:23', '2019-02-27 15:18:44', NULL),
(17, 9, 'Lucas viana', 'lv@gmail.com', '', '', '(88) 6 282', '', '', 'off', 'on', 'on', 'on', 'off', 'off', 'off', 'off', '2019-02-27 15:31:40', '2019-02-27 15:31:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localidades`
--

CREATE TABLE `localidades` (
  `localidade_id` int(11) NOT NULL,
  `localidade_nome` varchar(255) NOT NULL,
  `localidade_descricao` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localidades`
--

INSERT INTO `localidades` (`localidade_id`, `localidade_nome`, `localidade_descricao`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Montalvânia', 'Cidade sede', '2019-02-27 14:23:47', '2019-02-27 14:23:47', NULL),
(8, 'Itacarambi', 'Cidade com maior número de clientes', '2019-02-27 15:17:20', '2019-02-27 15:17:20', NULL),
(9, 'Juvenília', 'Cidade pequena', '2019-02-27 15:31:20', '2019-02-27 15:31:20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(255) NOT NULL,
  `usuario_email` varchar(255) NOT NULL,
  `usuario_senha` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_email`, `usuario_senha`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aleck Yann Mattos', 'aleckyann@gmail.com', '$2y$10$OFcFE/IK/rjV5WhQFkO6D.OvZLGl5TT.nN/dC4BYxXzdbKNiFvbdG', '2019-02-21 09:13:30', '2019-02-21 09:13:30', NULL),
(2, 'Júnior Matos', 'juniormattos@hotmail.com', '$2y$10$OFcFE/IK/rjV5WhQFkO6D.OvZLGl5TT.nN/dC4BYxXzdbKNiFvbdG', '2019-02-21 09:13:30', '2019-02-21 09:13:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funil_vendas`
--
ALTER TABLE `funil_vendas`
  ADD PRIMARY KEY (`funil_id`);

--
-- Indexes for table `funil_vendas_notas`
--
ALTER TABLE `funil_vendas_notas`
  ADD PRIMARY KEY (`fvn_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`localidade_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funil_vendas`
--
ALTER TABLE `funil_vendas`
  MODIFY `funil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `funil_vendas_notas`
--
ALTER TABLE `funil_vendas_notas`
  MODIFY `fvn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `localidades`
--
ALTER TABLE `localidades`
  MODIFY `localidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
