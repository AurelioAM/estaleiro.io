-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2023 às 09:30
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `casa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `cod_cliente` varchar(20) NOT NULL,
  `descricao` varchar(40) NOT NULL,
  `qtd` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `preco_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `codigo`, `cod_cliente`, `descricao`, `qtd`, `preco`, `preco_total`) VALUES
(1, 1, 'cli_002', 'Limak 42.5', 20, 450, 9000),
(2, 2, 'cli_002', 'Limak 42.5', 20, 2560, 9000),
(3, 3, 'Donaldo', 'Bloco 10', 2000, 450, 900000),
(4, 4, 'Donaldo', 'Bloco 10', 0, 450, 0),
(5, 4, 'Donaldo', 'Bloco 10', 100, 450, 45000),
(6, 4, 'Donaldo', 'Bloco 10', 20, 450, 9000),
(7, 5, 'Donaldo', 'Areia Incomate', 10, 1000, 10000),
(8, 5, 'Donaldo', 'Bloco 10', 50, 450, 22500),
(9, 6, 'Donaldo', 'Areia Incomate', 20, 1000, 20000),
(10, 6, 'Donaldo', 'Limak 42.5', 10, 450, 4500),
(11, 7, 'Donaldo', 'Blocos 20', 450, 30, 13500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cod_cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `endereco`, `email`, `telefone`, `cod_cliente`) VALUES
(1, 'Wamina', 'Bairro do Jardim', 'waminita@gmail;com', '123456', 'cli_002'),
(2, 'Donaldo', 'Bairro de Aeroporto B', 'duck@gmail.com', '85428343', ''),
(3, 'Donaldo Mangue', 'Donaldo Mangue', 'duckmangue@gmail.com', '+258844810779', 'cli_0135');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cod_funcionario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `user`, `senha`, `tipo`, `status`, `cod_funcionario`) VALUES
(1, 'Angelo', 'Angel', '1234', 'admin', 'activo', 'fun_0001');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(40) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `codigo`, `nome`, `user`, `senha`) VALUES
(1, 'fun_0001', 'Angelo', 'Angel', '1234'),
(2, 'fun_0124', 'Donaldo', 'duck', '1234'),
(3, 'cli_0135', 'Donaldo Mangue', 'duckmangue@gmail.com', '+258844810779');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `foto`) VALUES
(1, '', '', 'cimento.jpg'),
(2, 'Bloco', 'Bloco 10', '10.jpg'),
(3, 'Blocos', 'Blocos 15', '15.jpg'),
(5, 'Bloco', 'Blocos 20', '20.jpg'),
(6, 'Areia', 'Areia Incomate', 'areiag.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `stock`
--

INSERT INTO `stock` (`id`, `id_produto`, `preco`, `quantidade`) VALUES
(1, 2, 450, 400),
(2, 3, 24, 6500),
(3, 5, 30, 4500),
(4, 1, 450, 1000),
(5, 6, 1000, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `nomeCliente` varchar(50) NOT NULL,
  `itens` int(11) NOT NULL,
  `precoTotal` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `nomeCliente`, `itens`, `precoTotal`, `data`) VALUES
(1, 'Aurelio', 3, 5020, '2023-06-05'),
(2, 'Guest', 1, 9000, '2023-06-05'),
(3, 'Guest', 1, 900000, '2023-06-05'),
(4, 'Donaldo', 3, 54000, '2023-06-05'),
(5, 'Donaldo', 2, 32500, '2023-06-05'),
(6, 'Guest', 2, 24500, '2023-06-06'),
(7, 'Angelo', 1, 13500, '2023-06-06');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
