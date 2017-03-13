-- MySQL Script generated by MySQL Workbench
-- Fri Mar 10 15:45:00 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Edispel
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Edispel
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Edispel` DEFAULT CHARACTER SET utf8 ;
USE `Edispel` ;

-- -----------------------------------------------------
-- Table `Edispel`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Edispel`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `logiin_usuario` VARCHAR(45) NOT NULL,
  `senha_usuario` VARCHAR(32) NOT NULL,
  `nome_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `logiin_usuario_UNIQUE` (`logiin_usuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Edispel`.`categoria_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Edispel`.`categoria_produto` (
  `id_cateogira` INT NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cateogira`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Edispel`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Edispel`.`produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `FK_categoria` INT NULL,
  `cod_produto` VARCHAR(45) NOT NULL,
  `nome_produto` VARCHAR(45) NOT NULL,
  `descricao_produto` VARCHAR(500) NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE INDEX `cod_produto_UNIQUE` (`cod_produto` ASC),
  INDEX `FK_categoria_idx` (`FK_categoria` ASC),
  CONSTRAINT `FK_categoria`
    FOREIGN KEY (`FK_categoria`)
    REFERENCES `Edispel`.`categoria_produto` (`id_cateogira`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Edispel`.`foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Edispel`.`foto` (
  `id_foto` INT NOT NULL AUTO_INCREMENT,
  `FK_produto` INT NOT NULL,
  `caminho_foto` VARCHAR(45) NULL,
  `ordem_foto` INT NULL,
  PRIMARY KEY (`id_foto`, `FK_produto`),
  INDEX `FK_produto_idx` (`FK_produto` ASC),
  CONSTRAINT `FK_produto`
    FOREIGN KEY (`FK_produto`)
    REFERENCES `Edispel`.`produto` (`id_produto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
