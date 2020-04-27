-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jan-2020 às 06:22
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `qg_missoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `nome_cla` varchar(50) NOT NULL,
  `logo_cla` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `nome_cla`, `logo_cla`) VALUES
(1, 'MILSIM', 'https://i.ibb.co/KG5QhQn/arma-3.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `missoes`
--

CREATE TABLE `missoes` (
  `id` int(100) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `mapa` varchar(50) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL,
  `tipo_missao` varchar(50) DEFAULT NULL,
  `data_hora` varchar(50) DEFAULT NULL,
  `url` varchar(200) NOT NULL,
  `cor_evento` varchar(7) NOT NULL,
  `slots` varbinary(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `missoes`
--

INSERT INTO `missoes` (`id`, `nome`, `imagem`, `mapa`, `situacao`, `tipo_missao`, `data_hora`, `url`, `cor_evento`, `slots`) VALUES
(25, 'Welcome', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTRgjSBGnfNxh2MrIrctECDrykuueLqirSzqAfp9m2WvNatGQhG', '1', 'Matar o general', '1', '2020-08-02 21:00:00.000000', '', '', 0x613a333a7b693a303b613a323a7b693a303b733a353a224c49444552223b693a313b733a343a225641474f223b7d693a313b613a323a7b693a303b733a373a224c494445522032223b693a313b733a343a225641474f223b7d693a323b613a323a7b693a303b733a373a224c494445522033223b693a313b733a343a225641474f223b7d7d);

-- --------------------------------------------------------

--
-- Estrutura da tabela `slots`
--

CREATE TABLE `slots` (
  `id` int(100) UNSIGNED NOT NULL,
  `slots` varchar(30) NOT NULL,
  `preenchido` varchar(30) NOT NULL,
  `id_missao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `slots`
--

INSERT INTO `slots` (`id`, `slots`, `preenchido`, `id_missao`) VALUES
(1, 'a', '1', '1'),
(2, 'as', '1', '1'),
(3, 'a', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) UNSIGNED NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `imagem` varchar(1000) NOT NULL,
  `id_grupo` int(10) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `imagem`, `id_grupo`, `reg_date`) VALUES
(11, 'Admin', '$2y$10$dbtNnfG82212CgOO5EdFXefCYuZP1pwH1.rBqRaird4OTiRGcnXLC', 'admin@admin.com.br', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSKKa83ah9NCo7OgMuXIufNTLwwE-_iWkrg9BQ6c7C5aXj9mhQo', 1, '2020-01-02 06:56:29'),
(13, 'Mathias', 'mathias', '', '', 1, '2019-12-31 04:20:40'),
(14, 'Teste', 'teste', '', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRTB4hPxC4nEaV5CRZriTkSI6F2rt_8Ki7MbJ7AqtfLdNe_op1P', 3, '2019-12-31 04:25:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `missoes`
--
ALTER TABLE `missoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `missoes`
--
ALTER TABLE `missoes`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
