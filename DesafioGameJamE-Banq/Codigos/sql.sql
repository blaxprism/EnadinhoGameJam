-- Criação do banco de dados
CREATE DATABASE `enadinho`;
USE `enadinho`;

-- Tabela de coordenador
CREATE TABLE `coordenadores` (
	`id_coordenador` INT AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(100) NOT NULL,
	`data_nascimento` DATE NOT NULL,
	`email_institucional` VARCHAR(100) NOT NULL,
	`senha` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Tabela de professores
CREATE TABLE `professores` (
	`id_professor` INT AUTO_INCREMENT PRIMARY KEY,
	`fk_coordenador` INT NOT NULL,
	`nome` VARCHAR(100) NOT NULL,
	`data_nascimento` DATE NOT NULL,
	`email_institucional` VARCHAR(100) NOT NULL,
	`senha` VARCHAR(255) NOT NULL,
	FOREIGN KEY (`fk_coordenador`) REFERENCES `coordenadores`(`id_coordenador`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `alunos` (
	`id_aluno` int AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(100) not null,
	`data_nascimento` date not null,
	`email_institucional` varchar(100) not null,
	`senha` varchar(255) not null
) ENGINE=InnoDB;

-- Tabela de cursos
CREATE TABLE `cursos` (
	`id_curso` INT AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(100) NOT NULL,
	`eixo` VARCHAR(100) NOT NULL,
	`objetivo` TEXT NOT NULL
) ENGINE=InnoDB;

-- Tabela de disciplinas
CREATE TABLE `disciplinas` (
	`id_disciplina` INT AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(100) NOT NULL,
	`ementa` TEXT,
	`objetivos_aprendizagem` TEXT,
	`fk_curso` INT NOT NULL,
	FOREIGN KEY (`fk_curso`) REFERENCES `cursos`(`id_curso`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabela de enunciados
CREATE TABLE `enunciados` (
	`id_enunciado` INT AUTO_INCREMENT PRIMARY KEY,
	`titulo` VARCHAR(100) NOT NULL,
	`texto` TEXT NOT NULL,
	`fk_disciplina` INT NOT NULL,
	FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplinas`(`id_disciplina`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabela de questões
CREATE TABLE `questoes` (
	`id_questao` INT AUTO_INCREMENT PRIMARY KEY,
	`fk_enunciado` INT NOT NULL,
	`pergunta` TEXT NOT NULL,
	`dificuldade` INT NOT NULL,
	FOREIGN KEY (`fk_enunciado`) REFERENCES `enunciados`(`id_enunciado`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `alternativas` (
	`id_alternativa` INT AUTO_INCREMENT PRIMARY KEY,
	`fk_questao` INT NOT NULL,
	`texto_alternativa` TEXT NOT NULL,
	`is_correta` boolean NOT NULL DEFAULT FALSE,
	FOREIGN KEY (`fk_questao`) REFERENCES `questoes`(`id_questao`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabela de feedbacks sobre as questões
CREATE TABLE `feedbacks` (
	`id_feedback` INT AUTO_INCREMENT PRIMARY KEY,
	`fk_questao` INT NOT NULL,
	`feedback_texto` TEXT NOT NULL,
	FOREIGN KEY (`fk_questao`) REFERENCES `questoes`(`id_questao`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabela de alocação de disciplinas a professores
CREATE TABLE `alocacoes` (
	`id_alocacao` INT AUTO_INCREMENT PRIMARY KEY,
	`fk_professor` INT NOT NULL,
	`fk_disciplina` INT NOT NULL,
	`fk_coordenador` INT NOT NULL,
	FOREIGN KEY (`fk_professor`) REFERENCES `professores`(`id_professor`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE,
	FOREIGN KEY (`fk_disciplina`) REFERENCES `disciplinas`(`id_disciplina`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE,
	FOREIGN KEY (`fk_coordenador`) REFERENCES `coordenadores`(`id_coordenador`) 
		ON DELETE CASCADE 
		ON UPDATE CASCADE
) ENGINE=InnoDB;
