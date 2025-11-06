-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador único do curso',
  `nome` VARCHAR(100) NULL COMMENT 'Nome do curso',
  `descricao` TEXT(500) NULL COMMENT 'Descrição detalhada do curso',
  `carga_horaria` INT NULL COMMENT 'Duração em horas do curso',
  `data_criacao` DATETIME NULL COMMENT 'Data de criação do curso',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`alunos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador único do aluno',
  `nome` VARCHAR(100) NULL COMMENT 'Nome completo do aluno',
  `email` VARCHAR(100) NULL COMMENT 'E-mail do aluno',
  `telefone` VARCHAR(20) NULL COMMENT 'Contato telefônico',
  `data_nascimento` DATE NULL COMMENT 'Data de nascimento',
  `data_cadastro` DATETIME NULL COMMENT 'Data de cadastro no sistema',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_aluno_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`professores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`professores` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador único do professor',
  `nome` VARCHAR(100) NULL COMMENT 'Nome completo',
  `email` VARCHAR(100) NULL COMMENT 'E-mail do professor',
  `formacao` VARCHAR(150) NULL COMMENT 'Formação acadêmica',
  `data_cadastro` DATETIME NULL COMMENT 'Data de cadastro no sistema',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_professor_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`matriculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`matriculas` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador único da matrícula',
  `aluno_id` INT NULL COMMENT 'Aluno matriculado',
  `curso_id` INT NULL COMMENT 'Curso escolhido',
  `professor_id` INT NULL COMMENT 'Professor responsável',
  `data_matricula` DATETIME NULL COMMENT 'Data da matrícula',
  `status` ENUM('Ativa', 'Concluída', 'Cancelada') NULL COMMENT 'Situação da matrícula',
  `alunos_id` INT NOT NULL,
  `cursos_id` INT NOT NULL,
  `professores_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_matriculas_alunos1_idx` (`alunos_id` ASC),
  INDEX `fk_matriculas_cursos1_idx` (`cursos_id` ASC),
  INDEX `fk_matriculas_professores1_idx` (`professores_id` ASC),
  CONSTRAINT `fk_matriculas_alunos1`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `mydb`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriculas_cursos1`
    FOREIGN KEY (`cursos_id`)
    REFERENCES `mydb`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriculas_professores1`
    FOREIGN KEY (`professores_id`)
    REFERENCES `mydb`.`professores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;