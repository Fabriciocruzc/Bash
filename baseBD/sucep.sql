-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Abr-2017 às 18:26
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sucep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretor`
--

CREATE TABLE `diretor` (
  `cod_diretor` int(11) NOT NULL,
  `nome_diretor` varchar(100) NOT NULL,
  `cpf_diretor` int(11) NOT NULL,
  `sexo_diretor` varchar(1) NOT NULL,
  `data_n_diretor` varchar(12) NOT NULL,
  `email_diretor` varchar(100) NOT NULL,
  `telefone_diretor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `diretor`
--

INSERT INTO `diretor` (`cod_diretor`, `nome_diretor`, `cpf_diretor`, `sexo_diretor`, `data_n_diretor`, `email_diretor`, `telefone_diretor`) VALUES
(11, 'Denize Nicacio Silva', 1759890448, 'F', '1987-02-21', 'denize@gmail.com', '32670013'),
(13, 'Juscelino Fernandes', 1759590445, 'M', '2017-12-31', 'laysantos220@outlook.com', '84994302191'),
(15, 'teste diretor 3', 1759890445, 'M', '2017-12-31', 'testediretor@gmail.com', '84994302191'),
(16, 'teste diretor 4', 1914720454, 'M', '2017-12-31', 'laysantos220@outlook.com', '84994302191');

-- --------------------------------------------------------

--
-- Estrutura da tabela `discente`
--

CREATE TABLE `discente` (
  `cod_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(200) NOT NULL,
  `cpf_aluno` int(11) NOT NULL,
  `sexo_aluno` varchar(1) NOT NULL,
  `data_n_aluno` varchar(12) NOT NULL,
  `pai_aluno` varchar(200) NOT NULL,
  `mae_aluno` varchar(200) NOT NULL,
  `turma_aluno` int(10) NOT NULL,
  `instituicao_aluno` int(10) NOT NULL,
  `situacao_aluno` int(11) NOT NULL,
  `email_aluno` varchar(100) NOT NULL,
  `telefone_aluno` varchar(20) NOT NULL,
  `cidade_aluno` varchar(50) NOT NULL,
  `estado_aluno` varchar(2) NOT NULL,
  `bairro_aluno` varchar(100) NOT NULL,
  `complemento_aluno` varchar(200) NOT NULL,
  `create_aluno` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `discente`
--

INSERT INTO `discente` (`cod_aluno`, `nome_aluno`, `cpf_aluno`, `sexo_aluno`, `data_n_aluno`, `pai_aluno`, `mae_aluno`, `turma_aluno`, `instituicao_aluno`, `situacao_aluno`, `email_aluno`, `telefone_aluno`, `cidade_aluno`, `estado_aluno`, `bairro_aluno`, `complemento_aluno`, `create_aluno`) VALUES
(5, 'Leonardo Mauricio da Silva', 1759890448, 'M', '1995-11-24', 'João Batista Mauricio da Silva', 'Maria Marli da Silva', 11, 10, 2, 'leomauricio7@gmail.com', '84992302191', 'Ielmo Marinho', 'RN', 'Povoado Pacavira', 'Zona Rural', '09/04/2017 04:49:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `cod_disciplina` int(11) NOT NULL,
  `nome_disciplina` varchar(100) NOT NULL,
  `instituicao_disciplina` int(10) NOT NULL,
  `descricao_disciplina` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`cod_disciplina`, `nome_disciplina`, `instituicao_disciplina`, `descricao_disciplina`) VALUES
(11, 'Religião', 10, 'Humanas'),
(6, 'Matemática', 10, 'Materia de Calculo'),
(8, 'Português', 10, 'Letras'),
(9, 'Ciências', 10, 'Humanas'),
(10, 'Geografia', 10, 'Humanas'),
(12, 'Artes', 10, 'Humanas'),
(13, 'Cultura', 10, 'Humanas'),
(14, 'Ed Fisica', 10, 'Humanas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `docente`
--

CREATE TABLE `docente` (
  `cod_professor` int(11) NOT NULL,
  `nome_professor` varchar(100) NOT NULL,
  `cpf_professor` int(11) NOT NULL,
  `sexo_professor` varchar(1) NOT NULL,
  `disciplina_professor` int(10) NOT NULL,
  `instituicao_professor` int(10) NOT NULL,
  `email_professor` varchar(200) NOT NULL,
  `telefone_professor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `docente`
--

INSERT INTO `docente` (`cod_professor`, `nome_professor`, `cpf_professor`, `sexo_professor`, `disciplina_professor`, `instituicao_professor`, `email_professor`, `telefone_professor`) VALUES
(8, 'Layze Silva Santos', 1759895448, 'F', 6, 10, 'laysantos220@outlook.com', '84994202191'),
(7, 'oafdiaodfno', 1759890445, 'M', 7, 10, 'laysantos220@outlook.com', '84000000000'),
(6, 'Alecxandra Lima', 1759890448, 'F', 6, 10, 'alecxandra@gmail.com', '84994302191');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE `documento` (
  `cod_documento` int(20) NOT NULL,
  `data_emissao` varchar(20) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `instituicao` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `segunda` int(11) NOT NULL,
  `terca` int(11) NOT NULL,
  `quarta` int(11) NOT NULL,
  `quinta` int(11) NOT NULL,
  `sexta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id`, `instituicao`, `turma`, `ano`, `horario`, `segunda`, `terca`, `quarta`, `quinta`, `sexta`) VALUES
(26, 10, 21, '2017', '07:00', 12, 13, 10, 6, 9),
(27, 10, 21, '2017', '07:45', 12, 13, 10, 6, 9),
(28, 10, 21, '2017', '08:50', 9, 14, 8, 12, 13),
(29, 10, 21, '2017', '09:35', 9, 14, 8, 12, 13),
(30, 10, 21, '2017', '10:20', 13, 10, 6, 10, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `cod_instituicao` int(11) NOT NULL,
  `nome_instituicao` varchar(100) NOT NULL,
  `diretor_instituicao` int(11) NOT NULL,
  `tipo_instituicao` int(11) NOT NULL,
  `situacao_instituicao` int(11) NOT NULL,
  `telefone_instituicao` varchar(20) NOT NULL,
  `cidade_instituicao` varchar(100) NOT NULL,
  `estado_instituicao` varchar(2) NOT NULL,
  `bairro_instituicao` varchar(100) NOT NULL,
  `complemento_instituicao` varchar(100) NOT NULL,
  `create_instituicao` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`cod_instituicao`, `nome_instituicao`, `diretor_instituicao`, `tipo_instituicao`, `situacao_instituicao`, `telefone_instituicao`, `cidade_instituicao`, `estado_instituicao`, `bairro_instituicao`, `complemento_instituicao`, `create_instituicao`) VALUES
(10, 'Escola Municipal João Vitor da Silva Lima', 11, 1, 1, '32670013', 'Ielmo Marinho', 'RN', 'Sitio Alegria', 'Zona Rural', '09/04/2017 04:47:09'),
(11, 'Escola Municipal Emilia Prócopio', 13, 1, 2, '84994202191', 'Ielmo Marinho', 'RN', 'Povoado Pacavira', 'Zona Rural', '16/04/2017 15:28:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_aluno`
--

CREATE TABLE `situacao_aluno` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacao_aluno`
--

INSERT INTO `situacao_aluno` (`id`, `tipo`) VALUES
(1, 'Matriculado'),
(2, 'Trancada'),
(3, 'Desistente'),
(4, 'Transferido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_instituicao`
--

CREATE TABLE `situacao_instituicao` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacao_instituicao`
--

INSERT INTO `situacao_instituicao` (`id`, `tipo`) VALUES
(1, 'Ativo'),
(2, 'Inativo'),
(3, 'Pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_instituicao`
--

CREATE TABLE `tipo_instituicao` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_instituicao`
--

INSERT INTO `tipo_instituicao` (`id`, `tipo`) VALUES
(1, 'Municipal'),
(2, 'Estadual'),
(3, 'Particular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Diretor'),
(3, 'Professor'),
(4, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cod_turma` int(11) NOT NULL,
  `nome_turma` varchar(100) NOT NULL,
  `instituicao_turma` int(10) NOT NULL,
  `turno_turma` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod_turma`, `nome_turma`, `instituicao_turma`, `turno_turma`) VALUES
(13, '6° Ano "A"', 10, 2),
(12, '7° Ano "A"', 10, 2),
(11, '9° Ano "A"', 10, 2),
(21, '5° Ano "A"', 10, 2),
(15, '9° Ano "B"', 10, 1),
(18, '5° Ano "B', 10, 2),
(19, '6° Ano "B"', 10, 2),
(20, '7° Ano "B"', 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `turno` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`id`, `turno`) VALUES
(1, 'Matutino'),
(2, 'Vespertino'),
(3, 'Noturno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `instituicao` int(11) NOT NULL,
  `criacao` varchar(50) NOT NULL,
  `edicao` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `senha`, `email`, `tipo`, `instituicao`, `criacao`, `edicao`) VALUES
(6, 'teste professor', '01759890442', '123456', 'teste@gmail.com', 3, 10, '10/04/2017 01:38:27', NULL),
(4, 'Leonardo Maurício', '01759890448', '1234', 'leomauricio7@gmail.com', 1, 10, '09/04/2017', NULL),
(5, 'teste diretor', '01759890441', '123456', 'teste@gmail.com', 2, 10, '10/04/2017 01:36:30', NULL),
(7, 'teste aluno', '01759890443', '123456', 'teste@gmail.com', 4, 10, '10/04/2017 01:39:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`cod_diretor`);

--
-- Indexes for table `discente`
--
ALTER TABLE `discente`
  ADD PRIMARY KEY (`cod_aluno`),
  ADD KEY `instituicao_aluno` (`instituicao_aluno`),
  ADD KEY `turma_aluno` (`turma_aluno`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`cod_disciplina`),
  ADD KEY `instituicao_disciplina` (`instituicao_disciplina`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`cod_professor`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`cod_documento`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma` (`turma`),
  ADD KEY `instituicao` (`instituicao`);

--
-- Indexes for table `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`cod_instituicao`),
  ADD UNIQUE KEY `nome` (`nome_instituicao`);

--
-- Indexes for table `situacao_aluno`
--
ALTER TABLE `situacao_aluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situacao_instituicao`
--
ALTER TABLE `situacao_instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_instituicao`
--
ALTER TABLE `tipo_instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod_turma`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diretor`
--
ALTER TABLE `diretor`
  MODIFY `cod_diretor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `discente`
--
ALTER TABLE `discente`
  MODIFY `cod_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `cod_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `docente`
--
ALTER TABLE `docente`
  MODIFY `cod_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `cod_instituicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `situacao_aluno`
--
ALTER TABLE `situacao_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `situacao_instituicao`
--
ALTER TABLE `situacao_instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_instituicao`
--
ALTER TABLE `tipo_instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `cod_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
