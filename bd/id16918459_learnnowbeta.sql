-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14-Mar-2022 às 17:13
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
-- Banco de dados: `id16918459_learnnowbeta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `id_usuario`, `descricao`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 3, ''),
(4, 7, ''),
(5, 8, ''),
(6, 9, ''),
(7, 10, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(1, 9, 4, 'Bom diaa', 1, '2021-11-30 11:16:19'),
(2, 9, 4, 'vc corrigiu minha prova?', 1, '2021-11-30 11:17:05'),
(3, 10, 2, 'oii', 1, '2021-11-30 11:42:52'),
(4, 2, 10, 'oiii\n', 0, '2021-11-30 11:43:22'),
(5, 4, 1, 'oi', 1, '2021-11-30 12:23:40'),
(6, 4, 9, 'oiii', 0, '2021-11-30 12:24:35'),
(7, 1, 4, 'olá\n', 0, '2021-11-30 12:24:36'),
(8, 3, 4, 'oii', 1, '2021-11-30 12:26:32'),
(9, 4, 3, 'olá\n', 1, '2021-11-30 12:26:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `data_comentario` date DEFAULT NULL,
  `hora_comentario` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`) VALUES
(1, 9, 4),
(2, 10, 2),
(3, 4, 1),
(4, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `id_professor`, `nome`, `descricao`) VALUES
(1, 1, 'Ciência', 'Aulas de Ciência...'),
(2, 1, 'Biologia', 'Aulas de Biologia...'),
(3, 3, 'Matemática', 'Aulas de Matemática...'),
(4, 3, 'Cálculo ', 'Aulas de Cálculo...'),
(5, 2, 'Física', 'Aulas de Física...'),
(6, 2, 'Química', 'Aulas de Química...'),
(7, 1, 'Filosofia2', 'gesdghdtjdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `data_postagem` date DEFAULT NULL,
  `hora_postagem` time DEFAULT NULL,
  `cont_likes` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`id`, `id_professor`, `id_disciplina`, `titulo`, `documento`, `data_postagem`, `hora_postagem`, `cont_likes`) VALUES
(1, 3, 4, 'Revisão para a prova', '4f417718345c4921038a8b2e9af4cf27.docx', NULL, NULL, NULL),
(2, 3, 3, 'Lista de Exercício 1', 'd57b6ae499a5987c9cd58319ba2d5ec1.docx', NULL, NULL, NULL),
(3, 2, 5, 'Exercícios 2', '07909175dfab96e596db5eabf76e1f3f.docx', NULL, NULL, NULL),
(4, 2, 5, 'Exercícios 3', '4b168f5ad42ec4bff2ea22ae69d5644c.docx', NULL, NULL, NULL),
(5, 2, 6, 'Prova 1', 'a6b5aa1e0fd2a6fd8460b78b3539a705.docx', NULL, NULL, NULL),
(6, 1, 2, 'Revisão para a prova 2', 'd24b82df9deacc2b2384224e897b33e9.docx', NULL, NULL, NULL),
(7, 1, 1, 'Material para prova', '', NULL, NULL, NULL),
(8, 1, 7, 'Slide aula 1', 'be969da02b9d831e58336a1e879b5633.docx', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id`, `id_aluno`, `id_disciplina`) VALUES
(22, 7, 1),
(2, 4, 1),
(3, 4, 5),
(4, 4, 4),
(5, 6, 2),
(6, 6, 3),
(7, 6, 6),
(8, 5, 1),
(9, 5, 2),
(10, 5, 4),
(11, 5, 6),
(16, 2, 1),
(17, 2, 3),
(18, 2, 5),
(19, 1, 2),
(20, 1, 6),
(21, 1, 4),
(23, 7, 2),
(24, 7, 5),
(25, 7, 3),
(26, 7, 4),
(27, 3, 1),
(28, 3, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `postagem` text NOT NULL,
  `data_postagem` date DEFAULT NULL,
  `hora_postagem` time DEFAULT NULL,
  `cont_likes` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `id_professor`, `id_disciplina`, `postagem`, `data_postagem`, `hora_postagem`, `cont_likes`) VALUES
(1, 1, 2, 'Bom dia meus amores <3', '2021-11-29', '11:21:45', NULL),
(2, 1, 1, 'Atividade para nota está disponível !', '2021-11-29', '11:22:55', NULL),
(3, 3, 4, 'Prova marcada pra semana que vem ! ', '2021-11-29', '11:25:44', NULL),
(4, 3, 4, 'estudem !!!!!', '2021-11-29', '11:25:52', NULL),
(5, 2, 5, 'Ninguém está participando da aula, me aguardem no dia da prova!!!', '2021-11-29', '11:36:38', NULL),
(6, 3, 3, 'Reposição de aula nesse sábado galera!', '2021-11-29', '11:39:05', NULL),
(7, 3, 3, 'Valendo pontinho na média!', '2021-11-29', '11:41:49', NULL),
(8, 2, 6, 'Prova de recuperação nessa sexta galera!', '2021-11-30', '08:19:09', NULL),
(9, 1, 7, 'Boa dia alunos!', '2021-11-30', '09:21:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `id_usuario`, `descricao`) VALUES
(1, 4, ''),
(2, 5, ''),
(3, 6, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp(),
  `permissao` enum('professor','aluno') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nascimento`, `foto`, `last_seen`, `permissao`) VALUES
(1, 'Pedro Henrique', 'pedro@gmail.com', '123', '1999-11-11', '20211129021154.jpeg', '2021-11-29 14:08:54', 'aluno'),
(2, 'Charles Vinicius', 'charles@gmail.com', '123', '1999-12-22', '20211129021130.jpeg', '2021-11-29 14:09:30', 'aluno'),
(3, 'Rafael Carneiro', 'rafael@gmail.com', '123', '1999-12-12', '20211129021156.jpeg', '2021-11-29 14:09:56', 'aluno'),
(4, 'Maria da Silva', 'maria@gmail.com', '123', '1980-12-12', '20211129021105.png', '2021-11-29 14:12:05', 'professor'),
(5, 'Marcelo Correa', 'marcelo@gmail.com', '123', '1997-05-12', '20211129021119.jpeg', '2021-11-29 14:13:19', 'professor'),
(6, 'Jorge Muniz', 'jorge@gmail.com', '123', '1997-05-12', '20211129021131.png', '2021-11-29 14:14:31', 'professor'),
(7, 'Amanda Oliveira', 'amanda@gmail.com', '123', '1997-10-15', '20211129021124.jpeg', '2021-11-29 14:15:24', 'aluno'),
(8, 'Felipe Medeiros', 'felipe@gmail.com', '123', '1998-10-10', '20211129021106.jpeg', '2021-11-29 14:16:06', 'aluno'),
(9, 'Patricia da Silva', 'patricia@gmail.com', '123', '1999-05-10', '20211129021104.jpeg', '2021-11-29 14:17:04', 'aluno'),
(10, 'Stefany Correa', 'stefany@gmail.com', '123', '1998-06-02', '20211129021114.jpeg', '2021-11-29 14:19:14', 'aluno');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Índices para tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_disciplina` (`id_disciplina`);

--
-- Índices para tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_disciplina` (`id_disciplina`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_disciplina` (`id_disciplina`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
