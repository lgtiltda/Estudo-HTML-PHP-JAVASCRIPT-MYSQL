-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jan-2023 às 00:52
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exemplo_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `nascimento` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `residencial` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `indicacao` varchar(200) DEFAULT NULL,
  `data` varchar(20) NOT NULL,
  `ultimovisita` varchar(30) DEFAULT NULL,
  `status` varchar(2) NOT NULL,
  `dr` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `nascimento`, `rg`, `cpf`, `endereco`, `bairro`, `numero`, `complemento`, `celular`, `residencial`, `email`, `indicacao`, `data`, `ultimovisita`, `status`, `dr`) VALUES
(1, 'MANOEL MATIAS DA COSTA NETO', NULL, NULL, NULL, 'ESTRADA COARI-ITAPEUA KM04, NUMERO 15', 'ZONA RURAL', 's/nº', 'COM. SÃO JOÃO DA BOCA', '97981004-4448', NULL, NULL, NULL, '22/01/2023', NULL, '1', '1'),
(2, 'MANOEL MATIAS DA COSTA NETO', NULL, NULL, NULL, 'ESTRADA COARI-ITAPEUA KM04, NUMERO 15', 'ZONA RURAL', '701', 'COM. SÃO JOÃO DA BOCA', '97981004-4448', NULL, NULL, NULL, '22/01/2023', NULL, '1', '1'),
(3, 'MANOEL MATIAS DA COSTA NETO', '', NULL, '', 'ESTRADA COARI-ITAPEUA KM04, NUMERO 15', 'ZONA RURAL', 's/nº', 'COM. SÃO JOÃO DA BOCA', '97981004-4448', NULL, NULL, NULL, '22/01/2023', NULL, '1', '1'),
(4, 'MANOEL MATIAS DA COSTA NETO', '', NULL, '', 'ESTRADA COARI-ITAPEUA KM04, NUMERO 15', 'ZONA RURAL', 's/nº', 'COM. SÃO JOÃO DA BOCA', '97981004-4448', NULL, NULL, NULL, '22/01/2023', NULL, '1', '1'),
(5, 'NAYELE FERREIRA MARQUES', '', NULL, '', 'ESTRADA COARI-ITAPEUA KM04, NUMERO 15', 'ZONA RURAL', '', 'COM. SÃO JOÃO DA BOCA', '97981004-4448', NULL, NULL, NULL, '22/01/2023', NULL, '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permissao` int(11) NOT NULL,
  `rua` varchar(40) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `comissao` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `usuario`, `rg`, `cpf`, `email`, `foto`, `permissao`, `rua`, `bairro`, `numero`, `celular`, `senha`, `comissao`, `status`) VALUES
(1, 'ADMINISTRADOR', 'loginadm', NULL, NULL, '', 'a2031fa9a60c3ed8edaaf5e3a7274de5.png', 1, NULL, '......', NULL, '', 'f5bb0c8de146c67b44babbf4e6584cc0', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
