-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08-Mar-2019 às 10:55
-- Versão do servidor: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.2

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
-- Estrutura da tabela `funil_upgrades`
--

CREATE TABLE `funil_upgrades` (
  `funil_id` int(11) NOT NULL,
  `localidade_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `funil_etapa` int(11) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funil_upgrades_notas`
--

CREATE TABLE `funil_upgrades_notas` (
  `fun_id` int(11) NOT NULL,
  `funil_id` int(11) NOT NULL,
  `fun_tipo` varchar(255) NOT NULL,
  `fun_descricao` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 7, 'aleck yann', 'aleckyann@gmail.com', NULL, NULL, '3899538975', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 15:31:49', '2019-03-01 15:31:49', NULL),
(19, 7, 'junio mattos', 'jrm@gmail.com', NULL, NULL, '38567', NULL, NULL, 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 15:32:08', '2019-03-01 15:32:08', NULL),
(20, 7, 'Aleck Yann', 'aleckyann@gmail.com', '', '', '38999538975', '', '', 'off', 'off', 'off', 'off', 'off', 'on', 'off', 'off', '2019-03-01 15:32:27', '2019-03-08 10:54:37', NULL),
(21, 9, 'warley', 'warley@gmail.com', NULL, NULL, '389512611', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-01 15:35:32', '2019-03-01 15:35:32', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lead_sms`
--

CREATE TABLE `lead_sms` (
  `lead_sms_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `lead_sms_text` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Aleck Yann Mattosss', 'aleckyann@gmail.com', '$2y$10$BTuNUwoWCh6GjNv.vkIbg.vwLj5HEuBcAOKKmFozSmL2G9j16mI1.', '2019-02-21 09:13:30', '2019-02-28 16:06:26', NULL),
(2, 'Júnior Matos', 'juniormattos@hotmail.com', '$2y$10$OFcFE/IK/rjV5WhQFkO6D.OvZLGl5TT.nN/dC4BYxXzdbKNiFvbdG', '2019-02-21 09:13:30', '2019-02-21 09:13:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funil_upgrades`
--
ALTER TABLE `funil_upgrades`
  ADD PRIMARY KEY (`funil_id`);

--
-- Indexes for table `funil_upgrades_notas`
--
ALTER TABLE `funil_upgrades_notas`
  ADD PRIMARY KEY (`fun_id`);

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
-- Indexes for table `lead_sms`
--
ALTER TABLE `lead_sms`
  ADD PRIMARY KEY (`lead_sms_id`);

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
-- AUTO_INCREMENT for table `funil_upgrades`
--
ALTER TABLE `funil_upgrades`
  MODIFY `funil_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funil_upgrades_notas`
--
ALTER TABLE `funil_upgrades_notas`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funil_vendas`
--
ALTER TABLE `funil_vendas`
  MODIFY `funil_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funil_vendas_notas`
--
ALTER TABLE `funil_vendas_notas`
  MODIFY `fvn_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lead_sms`
--
ALTER TABLE `lead_sms`
  MODIFY `lead_sms_id` int(11) NOT NULL AUTO_INCREMENT;
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
