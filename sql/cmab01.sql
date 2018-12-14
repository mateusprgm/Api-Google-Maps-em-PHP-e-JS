-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql04-farm56.kinghost.net
-- Tempo de geração: 23/08/2018 às 09:03
-- Versão do servidor: 5.5.43-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `cmab01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `prestador`
--

CREATE TABLE IF NOT EXISTS `prestador` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `cel` varchar(12) DEFAULT NULL,
  `servico` varchar(100) DEFAULT NULL,
  `localizacao` varchar(500) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `pedido` varchar(10) DEFAULT NULL,
  `permissao` varchar(12) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `timeopen` varchar(12) DEFAULT NULL,
  `timeclose` varchar(12) DEFAULT NULL,
  `promocao` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `promodesc` varchar(300) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `prestador`
--

INSERT INTO `prestador` (`id`, `nome`, `cel`, `servico`, `localizacao`, `senha`, `pedido`, `permissao`, `descricao`, `timeopen`, `timeclose`, `promocao`, `login`, `promodesc`) VALUES
(48, 'dsfdsfds', '43543543', 'Loja de bike', '-15.834577604353226, -47.930986719604505', 's54o505', 'on', 'on', 'dasda', '06:30', '19:30', NULL, '43543543', NULL),
(47, 'fdssfddsfsd', '342432', 'Mercado', '-15.833834439558677, -47.932488756652845', 'd24e845', 'on', 'on', 'sadsad', '06:30', '18:30', NULL, '342432', NULL),
(46, 'dsfsfds', '443543543543', 'Padaria', '-15.822480193108973, -47.927510576721204', 's35a204', 'on', 'on', 'dasdas', '06:30', '18:30', NULL, NULL, NULL),
(43, 'sadsadsad', '324234', 'Salao', '-15.803029769803137, -47.90261069189819', 'a42a819', '', '', 'sadsadasda', '06:30', '18:30', NULL, NULL, NULL),
(58, 'Testando', '123', 'Mecanica', '-15.825012674236454, -47.9320998021301', 'e3e301', '', '', 'Hhgv', '12:00', '15:00', NULL, '123', NULL),
(41, 'sadsad', '3243423', 'Mercado', '-15.831893940817935, -47.93077214288331', 'a43e331', 'on', 'on', 'fdasdsa', '06:30', '07:30', NULL, NULL, NULL),
(59, 'mateus info', '85510027', 'EletrÃ´nica', '-15.809024595847626, -48.1374178775888', 'a51l888', '', 'on', 'Top\r\n', '07:58', '20:00', NULL, '85510027', NULL),
(37, 'mecanica do ze da montanha', '23423423', 'Mecanica', '-15.809604314983876, -47.96145794862986', 'e42e986', 'on', 'on', '', '06:30', '11:30', NULL, NULL, NULL),
(30, 'vddgf', '4554', 'Padaria', '-15.833710578493799, -47.93313248681642', 'd54a642', 'on', 'on', 'fsdfs', '07:30', '12:30', NULL, NULL, NULL),
(26, 'mercadin ', '34343', 'Mercado', '-15.832348101768236, -47.93038590478517', 'e34e517', 'on', 'on', 'dsadasdsa', '06:35', '10:30', NULL, NULL, NULL),
(23, 'padoca do jao', '35857022', 'Loja de bike', '-15.829790362293387, -47.94283018687196', 'a85o196', '', 'on', 'sdsadsada', '06:30', '19:31', NULL, NULL, NULL),
(56, 'barbearia do gaucho', '123', 'Barbearia', '-15.81062888299606, -48.083778625488264', 'a3a264', '', 'on', 'cortei cabelo a vida inteira', '06:30', '18:30', NULL, '123', NULL),
(53, 'Tezte', '123', 'Mecanica', '-15.83235903220487, -47.93524376829225', 'e3e225', '', '', 'Teate\r\n', '01:28', '06:30', NULL, '123', NULL),
(54, 'salao da janainao', '123', 'Salao', '-15.811132838761564, -48.113043730163554', 'a3a554', '', 'on', 'dsdfsdfsdfs', '18:30', '22:30', NULL, '123', NULL),
(55, 'salao da janaina', '123', 'Salao', '-15.80614962537678, -48.12371014306734', 'a3a734', '', '', 'sdfsdfdsfds', '18:30', '23:30', 'on', '123', NULL),
(60, 'janaina lct', '2525252', 'Lanchonetes', '-15.799727397946993, -48.14588763292056', 'a25a056', 'on', 'on', '', '02:31', '10:30', NULL, '2525252', NULL),
(61, 'mecanico bob construtor', '000', 'Mecanica', '-15.958617888029252, -48.24059559516212', 'e0e212', 'on', 'on', 'testando\r\n', '06:30', '18:30', 'on', '000', NULL),
(68, 'ggg', '55855', 'Serralheiria', '-15.835310142560884, -48.047466912658706', 'g85e706', '', 'on', '', '06:30', '12:28', NULL, '55855', NULL),
(63, 'Hhh', '8555', 'Pedreiro', '-15.826334107301168, -47.92943816983643', 'h55e643', '', '', '', '07:00', '12:20', NULL, '8555', NULL),
(64, 'rtestefdfsfdsfs', '123', 'Pitura', '-15.472416824341357, -48.457764392852766', 't3i766', '', 'on', 'asdasdadsa', '00:30', '06:30', NULL, '123', NULL),
(67, 'chÃ¡ de fralda do pedro ', '123', 'Festas', '-15.8410937,-48.0525882,45', 'h3e113', '', 'on', 'chÃ¡ de fralda do pedro', '06:30', '18:30', NULL, '123', NULL),
(74, 'testando promodesc', '85510027', 'Cursos', '-15.82743392629571, -47.9435741958618', '0000', '', 'on', 'testando promodesc', '06:30', '18:30', '', '85510027', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome`) VALUES
(25, 'Mecanica'),
(52, 'SalÃ£o de Beleza'),
(23, 'Mercado'),
(22, 'Padaria'),
(30, 'Barbearia'),
(31, 'Pedreiro'),
(51, 'Pintura'),
(33, 'Eletricista'),
(53, 'Cursos'),
(35, 'EletrÃ´nica'),
(36, 'Jardinagem'),
(47, 'Carpintaria'),
(54, 'Aulas de ReforÃ§o'),
(39, 'Marmoraria'),
(40, 'Serralheiria'),
(41, 'Chaveiro'),
(75, 'Fretes e MudanÃ§as'),
(48, 'VidraÃ§aria'),
(45, 'Barzinhos'),
(46, 'Lanchonetes'),
(55, 'Massagista'),
(56, 'Lojas de Suplemento'),
(57, 'Lojas de roupas'),
(93, 'DedetizaÃ§Ã£o'),
(76, 'ClÃ­nica OdontolÃ³gica'),
(61, 'Cerralheiria'),
(62, 'ImobiliÃ¡ria'),
(63, 'Lanternagem e Pintura'),
(64, 'Festas e Buffet'),
(65, 'Loja de tinta'),
(66, 'DepilaÃ§Ã£o'),
(68, 'Lava jato'),
(69, 'Posto de gasolina'),
(70, 'Lan hose'),
(71, 'Madereira'),
(72, 'Pizzaria'),
(74, 'Trasportadora'),
(78, 'Clinica MÃ©dica'),
(79, 'Alto Escola'),
(80, 'Alinhamento e Balanceamento'),
(81, 'Lavanderia'),
(82, 'Sapateiro'),
(84, 'LocaÃ§Ã£o de mesas e cadeiras'),
(85, 'LocaÃ§Ã£o de brinquedos infantis'),
(86, 'LocaÃ§Ã£o de roupas para casamento'),
(87, 'Sorveteria'),
(88, 'AÃ§aÃ­'),
(89, 'BabÃ¡'),
(92, 'Empregada DomÃ©stica'),
(100, 'Loja de artigos erÃ³ticos'),
(95, 'SonorizaÃ§Ã£o Automotiva'),
(96, 'Tabacaria'),
(97, 'Restaurante'),
(98, 'Faixas e Placas'),
(99, 'TapeÃ§ari e Capotaria'),
(101, 'Pamonharia'),
(103, 'Avicultura');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `prestador`
--
ALTER TABLE `prestador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `prestador`
--
ALTER TABLE `prestador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
