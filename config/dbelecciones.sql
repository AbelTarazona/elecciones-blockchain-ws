-- MySQL Script generated by MySQL Workbench
-- 06/20/18 22:16:33
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dbelecciones
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbelecciones
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbelecciones` DEFAULT CHARACTER SET utf8 ;
USE `dbelecciones` ;

-- -----------------------------------------------------
-- Table `dbelecciones`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbelecciones`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `dbelecciones`.`Usuario` (
  `DNI` INT NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `perfil` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`DNI`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbelecciones`.`Persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbelecciones`.`Persona` ;

CREATE TABLE IF NOT EXISTS `dbelecciones`.`Persona` (
  `DNI` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`DNI`),
  CONSTRAINT `fk_Persona_Usuario`
    FOREIGN KEY (`DNI`)
    REFERENCES `dbelecciones`.`Usuario` (`DNI`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbelecciones`.`Hash`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbelecciones`.`Hash` ;

CREATE TABLE IF NOT EXISTS `dbelecciones`.`Hash` (
  `idHash` INT NOT NULL AUTO_INCREMENT,
  `hash` VARCHAR(80) NOT NULL,
  `DNI` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idHash`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;