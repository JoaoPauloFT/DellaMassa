-- CREATE DATABASE id16726370_dellamassa;
USE pizzariadellam;
-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21-Mar-2022 às 23:17
-- Versão do servidor: 10.5.12-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id16726370_dellamassa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acai`
--

CREATE TABLE `acai` (
  `id_acai` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ingrediente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `acai`
--

INSERT INTO `acai` (`id_acai`, `nome`, `ingrediente`, `valor`) VALUES
(1, 'Açai 500ml', '500ml', '17.99'),
(2, 'Açai 350ml', '350ml', '12.99'),
(4, 'Barca de Açai', 'Acompanhamentos: 4 Tradicionais e 2 Especiais', '31.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `id_bebida` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`id_bebida`, `nome`, `quantidade`, `valor`) VALUES
(1, 'Coca-cola', '2 lts', '12.00'),
(2, 'Pepsi', '600 mls', '7.00'),
(3, 'Fanta Laranja', '2,5 lts', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `borda`
--

CREATE TABLE `borda` (
  `id_borda` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `borda`
--

INSERT INTO `borda` (`id_borda`, `nome`, `valor`) VALUES
(1, 'Catupiry', '10.99'),
(2, 'Cheddar', '7.99'),
(3, 'Vulcão', '12.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `formaPag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `troco` int(11) DEFAULT NULL,
  `subTotal` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `taxaEntrega` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `valorTotal` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `NumPedido` int(11) DEFAULT NULL,
  `DataPedido` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_cliente`, `id_endereco`, `formaPag`, `troco`, `subTotal`, `taxaEntrega`, `valorTotal`, `NumPedido`, `DataPedido`, `status`) VALUES
(1, 1, 10, 'Cartão de Credito', 0, '71.46', '5.00', '76.46', 1, '2021-09-21 20:44:33', 'Preparando'),
(9, 2, 14, 'Dinheiro', 0, '7.99', '8', '15.99', 0, NULL, NULL),
(10, 1, 13, 'Cartão de Debito', 0, '131.93', '5.00', '136.93', 2, '2021-09-22 23:03:32', 'Preparando'),
(11, 1, 13, 'Cartão de Credito', 0, '61.9', '5.00', '66.9', 3, '2021-09-25 11:42:28', 'Preparando'),
(12, 1, 13, 'Dinheiro', 100, '84.96', '5.00', '89.96', 4, '2021-09-27 21:36:10', 'Preparando'),
(13, 1, 13, 'Cartão de Credito', 0, '200.93', '5.00', '205.93', 6, '2021-10-09 19:24:02', 'Saiu para entrega'),
(14, 4, 18, 'Cartão de Credito', 0, '194.4', '4.00', '198.4', 5, '2021-10-04 14:14:23', 'Preparando'),
(15, 1, 13, 'Dinheiro', 50, '29.99', '5.00', '34.99', 7, '2021-10-09 19:30:05', 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nCarrinho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `senha`, `celular`, `email`, `nCarrinho`) VALUES
(1, 'João Paulo F. Timóteo', '1358', '12988272255', 'joaopaulotimoteo@gmail.com', 0),
(2, 'teste', '1', '12988888888', 'tatuzeragameplays@gmail.com', 9),
(3, 'João Tatu', '1', '12988272255', 'joaotatutimoteo@gmail.com', 0),
(4, 'João Pedro da Silva', '1', '12988272288', 'joao.timoteo@brascamzf.com.br', 0),
(5, 'Vanderlei', '1358', '12988225522', 'vanderlei@gmail.com', 0),
(8, 'teste', '1', '12988272255', 'teste@gmail.com', 0),
(9, 'pedro', '1358', '12988272458', 'pedro@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `rua` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(5) NOT NULL,
  `bairro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `flag` int(1) NOT NULL,
  `distancia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `rua`, `numero`, `bairro`, `cep`, `complemento`, `id_cliente`, `flag`, `distancia`) VALUES
(10, 'Navojoa', 23, 'Vale das Virtudes', '05796160', 'Prime Logistica', 1, 0, 2164),
(13, 'José Máximo Pinheiro de Lima', 212, 'Jardim Ipê', '05797350', '', 1, 0, 2545),
(14, 'Hilário Buzzarello', 148, 'Cidade Auxiliadora', '05798160', '', 2, 0, 5088),
(16, 'Baucis', 90, 'Jardim São Luís', '05844030', '', 1, 0, 7207),
(17, 'Canuto Luiz', 600, 'Jardim Capelinha', '05850140', '', 1, 0, 5302),
(18, 'Tigre', 226, 'independencia ll', '06810490', 'Borges', 4, 0, 1892);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrega`
--

CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `distancia` int(11) NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `tempo` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `entrega`
--

INSERT INTO `entrega` (`id_entrega`, `nome`, `distancia`, `valor`, `tempo`) VALUES
(1, '1 Km', 1000, '3.00', '10 mins'),
(2, '2 Km', 2000, '4.00', '10 mins'),
(3, '3 Km', 3000, '5.00', '15 mins'),
(4, '4 Km', 4000, '6.00', '15 mins'),
(5, '5 Km', 5000, '7.00', '20 mins'),
(6, '6 Km', 6000, '8.00', '20 mins'),
(7, '7 Km', 7000, '9.00', '30 mins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `esfiha`
--

CREATE TABLE `esfiha` (
  `id_esfiha` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `esfiha`
--

INSERT INTO `esfiha` (`id_esfiha`, `nome`, `tipo`, `valor`) VALUES
(1, 'Carne', 's', '1.99'),
(2, 'Calabresa', 's', '2.49'),
(3, 'Frango com Catupiry', 's', '2.99'),
(4, 'M&Ms', 'd', '3.99'),
(5, 'Chocolate', 'd', '3.49'),
(6, 'Mix Chocolate', 'd', '3.49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id_ingrediente` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ingrediente`
--

INSERT INTO `ingrediente` (`id_ingrediente`, `nome`, `valor`) VALUES
(1, 'Paçoca', '2.00'),
(2, 'Leite Condensado', '2.00'),
(3, 'Oreo', '2.50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemCarrinho`
--

CREATE TABLE `itemCarrinho` (
  `id_item_carrinho` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_item2` int(11) DEFAULT NULL,
  `id_item3` int(11) DEFAULT NULL,
  `id_carrinho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_borda` int(11) DEFAULT NULL,
  `valorUnit` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `valorTotal` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `itemCarrinho`
--

INSERT INTO `itemCarrinho` (`id_item_carrinho`, `id_item`, `id_item2`, `id_item3`, `id_carrinho`, `quantidade`, `descricao`, `id_borda`, `valorUnit`, `valorTotal`, `tipo`) VALUES
(3, 2, NULL, NULL, 1, 2, '', NULL, '4.99', '9.98', 'sobremesa'),
(37, 3, NULL, NULL, 9, 1, '', NULL, '7.99', '7.99', 'sobremesa'),
(38, 1, 3, NULL, 1, 1, '', NULL, '38.99', '38.99', 'pizza'),
(48, 2, NULL, NULL, 1, 1, '1;3;', NULL, '22.49', '22.49', 'acai'),
(66, 1, NULL, NULL, 10, 1, 'teste 2', 1, '38.99', '49.98', 'pizza'),
(67, 1, NULL, NULL, 10, 1, 'teste esfiha', NULL, '1.99', '1.99', 'esfiha'),
(69, 4, NULL, NULL, 10, 2, '', NULL, '26.99', '53.98', 'lanche'),
(70, 1, NULL, NULL, 10, 2, '', NULL, '21.99', '43.98', 'lanche'),
(71, 6, NULL, NULL, 10, 1, 'teste lanche', NULL, '8.99', '8.99', 'lanche'),
(76, 2, NULL, NULL, 11, 10, '', NULL, '4.99', '49.90', 'sobremesa'),
(83, 1, NULL, NULL, 11, 1, '', NULL, '12.00', '12.00', 'bebida'),
(89, 1, NULL, NULL, 12, 2, 'f', NULL, '26.99', '53.98', 'pizza'),
(93, 4, NULL, NULL, 12, 1, '', NULL, '20.99', '20.99', 'lanche'),
(95, 3, NULL, NULL, 12, 1, '', NULL, '9.99', '9.99', 'pastel'),
(110, 2, NULL, NULL, 14, 1, 'teste', NULL, '2.49', '2.49', 'esfiha'),
(112, 6, NULL, NULL, 14, 2, 'teste doce', NULL, '3.49', '6.98', 'esfiha'),
(114, 6, NULL, NULL, 14, 1, 'tranquilo', NULL, '8.99', '8.99', 'lanche'),
(122, 2, NULL, NULL, 14, 2, 'recheada', 2, '42.99', '101.96', 'pizza'),
(123, 18, NULL, NULL, 14, 1, '', NULL, '26.99', '26.99', 'pizza'),
(124, 16, 17, NULL, 14, 1, 'teste', NULL, '46.99', '46.99', 'pizza'),
(126, 14, NULL, NULL, 13, 1, '', NULL, '26.99', '26.99', 'pizza'),
(127, 1, 7, 11, 13, 3, 'sem cebola', 3, '44.99', '173.94', 'pizza'),
(128, 5, 14, NULL, 15, 1, '', NULL, '29.99', '29.99', 'pizza'),
(129, 15, NULL, NULL, 16, 1, '', NULL, '29.99', '29.99', 'pizza'),
(130, 1, NULL, NULL, 16, 1, 'teste', 3, '26.99', '39.98', 'pizza'),
(131, 8, NULL, NULL, 17, 2, '', 3, '29.99', '85.96', 'pizza'),
(132, 2, NULL, NULL, 18, 2, '', NULL, '7.00', '14.00', 'bebida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanche`
--

CREATE TABLE `lanche` (
  `id_lanche` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ingrediente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `valorDuplo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `lanche`
--

INSERT INTO `lanche` (`id_lanche`, `nome`, `ingrediente`, `valor`, `valorDuplo`) VALUES
(1, 'X-Burguer', 'Pão, Queijo e Hamburguer Artesanal', '14.99', '21.99'),
(2, 'X-Salada', 'Pão, Queijo, Hamburguer Artesanal e Salada', '16.99', '22.99'),
(3, 'X-Bacon', 'Pão, Queijo, Hamburguer Artesanal e Bacon', '17.99', '23.99'),
(4, 'X-Salada Bacon', 'Pão, Queijo, Hamburguer Artesanal, Salada e Bacon', '20.99', '26.99'),
(5, 'X-Tudo', 'Pão, Hamburguer Artesanal, Presunto, Omelete, Bacon e Catupiry', '22.99', '28.99'),
(6, 'Hot Dog Simples', 'Pão, Salsicha, Maionese, Vinagrete, Purê de Batata, Ketchup e Mostarda', '8.99', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pastel`
--

CREATE TABLE `pastel` (
  `id_pastel` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pastel`
--

INSERT INTO `pastel` (`id_pastel`, `nome`, `valor`) VALUES
(1, 'Carne', '9.99'),
(2, 'Queijo', '9.99'),
(3, 'Frango com Catupiry', '9.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

CREATE TABLE `pizza` (
  `id_pizza` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ingrediente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipoPizza` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `valorBroto` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pizza`
--

INSERT INTO `pizza` (`id_pizza`, `nome`, `ingrediente`, `tipoPizza`, `valor`, `valorBroto`) VALUES
(1, 'Atum', 'Atum.', 's', '41.99', '27.99'),
(2, 'Americana', 'Atum, Cebola, Ervilha, Mussarela e Palmito', 's', '42.99', '29.99'),
(3, 'Calamussa', 'Calabresa Fatiada e Mussarela', 's', '35.99', '24.99'),
(4, 'Toscana', 'Calabresa Moída, Mussarela e Cebola', 's', '37.99', '26.99'),
(5, 'Canadense', 'Lombo Canadense, Requeijão (Catupiry), Mussarela e Cebola', 's', '41.99', '29.99'),
(6, 'Lombo', 'Lombo Canadense, Requeijão (Catupiry) e Cebola', 's', '37.99', '26.99'),
(7, 'Calabrepiry', 'Calabresa coberta com Requeijão (Catupiry)', 's', '36.99', '25.99'),
(8, 'Champignon', 'Champignon coberto com Parmesão', 's', '41.99', '29.99'),
(9, '2 Queijos', 'Requeijão (Catupiry) e Mussarela', 's', '36.99', '25.99'),
(10, '3 Queijos', 'Mussarela, Parmesão e Requeijão (Catupiry)', 's', '41.99', '29.99'),
(11, '4 Queijos', 'Requeijão (Catupiry), Provolone, Mussarela e Parmesão', 's', '44.99', '31.99'),
(12, 'Escarola', 'Escarola, Bacon e Mussarela', 's', '36.99', '25.99'),
(13, 'Caipira', 'Frango Desfiado, Milho e mussarela', 's', '39.99', '27.99'),
(14, 'Brigadeiro', 'Chocolate e Granulado', 'd', '37.99', '26.99'),
(15, 'Degradê', 'Mix Chocolate Branco e Chocolate ao Leite', 'd', '41.99', '29.99'),
(16, 'Degradê com Frutas', 'Mix de Morango, Uva Verde ou Banana com Chocolate', 'd', '46.99', '33.99'),
(17, 'Doce de Leite', 'Doce de Leite e Coco Ralado', 'd', '34.99', '24.99'),
(18, 'Choconana', 'Chocolate com Banana', 'd', '37.99', '26.99'),
(21, 'Moda da Casa', 'Mussarela, presunto, ovo e cebola', 's', '35.99', '17.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `porcao`
--

CREATE TABLE `porcao` (
  `id_porcao` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ingrediente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `porcao`
--

INSERT INTO `porcao` (`id_porcao`, `nome`, `ingrediente`, `valor`) VALUES
(1, 'Batata Frita', 'Batata Frita Pequena', '9.99'),
(2, 'Frango à Passarinho', 'Com Polenta', '39.99'),
(3, 'Contra File em Tiras Acebolado', '400g', '29.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobremesa`
--

CREATE TABLE `sobremesa` (
  `id_sobremesa` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sobremesa`
--

INSERT INTO `sobremesa` (`id_sobremesa`, `nome`, `valor`) VALUES
(1, 'Brigadeiro', '2.99'),
(2, 'Pão de Mel', '4.99'),
(3, 'Pudim', '7.99');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `login`, `senha`) VALUES
(6, 'Vanderlei', 'vanderlei', '321');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acai`
--
ALTER TABLE `acai`
  ADD PRIMARY KEY (`id_acai`);

--
-- Índices para tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Índices para tabela `borda`
--
ALTER TABLE `borda`
  ADD PRIMARY KEY (`id_borda`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_EndeCli` (`id_cliente`);

--
-- Índices para tabela `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`);

--
-- Índices para tabela `esfiha`
--
ALTER TABLE `esfiha`
  ADD PRIMARY KEY (`id_esfiha`);

--
-- Índices para tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Índices para tabela `itemCarrinho`
--
ALTER TABLE `itemCarrinho`
  ADD PRIMARY KEY (`id_item_carrinho`);

--
-- Índices para tabela `lanche`
--
ALTER TABLE `lanche`
  ADD PRIMARY KEY (`id_lanche`);

--
-- Índices para tabela `pastel`
--
ALTER TABLE `pastel`
  ADD PRIMARY KEY (`id_pastel`);

--
-- Índices para tabela `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id_pizza`);

--
-- Índices para tabela `porcao`
--
ALTER TABLE `porcao`
  ADD PRIMARY KEY (`id_porcao`);

--
-- Índices para tabela `sobremesa`
--
ALTER TABLE `sobremesa`
  ADD PRIMARY KEY (`id_sobremesa`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acai`
--
ALTER TABLE `acai`
  MODIFY `id_acai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `borda`
--
ALTER TABLE `borda`
  MODIFY `id_borda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `esfiha`
--
ALTER TABLE `esfiha`
  MODIFY `id_esfiha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `itemCarrinho`
--
ALTER TABLE `itemCarrinho`
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de tabela `lanche`
--
ALTER TABLE `lanche`
  MODIFY `id_lanche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pastel`
--
ALTER TABLE `pastel`
  MODIFY `id_pastel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `porcao`
--
ALTER TABLE `porcao`
  MODIFY `id_porcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sobremesa`
--
ALTER TABLE `sobremesa`
  MODIFY `id_sobremesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_EndeCli` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
