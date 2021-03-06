-- MySQL Script generated by MySQL Workbench
-- Mon 01 Apr 2019 13:58:40 MSK
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bravobd3
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bravobd3` ;

-- -----------------------------------------------------
-- Schema bravobd3
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bravobd3` DEFAULT CHARACTER SET utf8 ;
USE `bravobd3` ;

-- -----------------------------------------------------
-- Table `bravobd3`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bravobd3`.`client` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `middle_name` VARCHAR(255) NULL,
  `lastname` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bravobd3`.`contactbase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bravobd3`.`contactbase` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `client_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contactbase_client_idx` (`client_id` ASC),
  CONSTRAINT `fk_contactbase_client`
    FOREIGN KEY (`client_id`)
    REFERENCES `bravobd3`.`client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bravobd3`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bravobd3`.`contact` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contactbase_id` INT NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `middle_name` VARCHAR(255) NULL,
  `lastname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL,
  `tel` VARCHAR(11) NOT NULL,
  `sending_counter` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contact_contactbase1_idx` (`contactbase_id` ASC),
  CONSTRAINT `fk_contact_contactbase1`
    FOREIGN KEY (`contactbase_id`)
    REFERENCES `bravobd3`.`contactbase` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bravobd3`.`group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bravobd3`.`group` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bravobd3`.`contact_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bravobd3`.`contact_group` (
  `contact_id` INT NOT NULL,
  `group_id` INT NOT NULL,
  PRIMARY KEY (`contact_id`, `group_id`),
  INDEX `fk_contact_has_group_group1_idx` (`group_id` ASC),
  INDEX `fk_contact_has_group_contact1_idx` (`contact_id` ASC),
  CONSTRAINT `fk_contact_has_group_contact1`
    FOREIGN KEY (`contact_id`)
    REFERENCES `bravobd3`.`contact` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contact_has_group_group1`
    FOREIGN KEY (`group_id`)
    REFERENCES `bravobd3`.`group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bravobd3`.`channel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bravobd3`.`channel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bravobd3`.`contact_channel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bravobd3`.`contact_channel` (
  `channel_id` INT NOT NULL,
  `contact_id` INT NOT NULL,
  PRIMARY KEY (`channel_id`, `contact_id`),
  INDEX `fk_messengers_has_contact_contact1_idx` (`contact_id` ASC),
  INDEX `fk_messengers_has_contact_messengers1_idx` (`channel_id` ASC),
  CONSTRAINT `fk_messengers_has_contact_messengers1`
    FOREIGN KEY (`channel_id`)
    REFERENCES `bravobd3`.`channel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_messengers_has_contact_contact1`
    FOREIGN KEY (`contact_id`)
    REFERENCES `bravobd3`.`contact` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
