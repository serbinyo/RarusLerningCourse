-- MySQL Script generated by MySQL Workbench
-- Пн 04 мар 2019 21:10:32
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema carconst
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `carconst` ;

-- -----------------------------------------------------
-- Schema carconst
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `carconst` DEFAULT CHARACTER SET utf8 ;
USE `carconst` ;

-- -----------------------------------------------------
-- Table `carconst`.`series`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carconst`.`series` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `img` VARCHAR(255) NOT NULL,
  `cost` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carconst`.`bodytype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carconst`.`bodytype` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `cost` DECIMAL(10,2) NOT NULL,
  `img` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carconst`.`power`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carconst`.`power` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `cost` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carconst`.`color`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carconst`.`color` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `img` VARCHAR(255) NOT NULL,
  `cost` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carconst`.`furnish`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carconst`.`furnish` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `img` VARCHAR(255) NOT NULL,
  `cost` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carconst`.`dop`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carconst`.`dop` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `img` VARCHAR(255) NOT NULL,
  `cost` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
