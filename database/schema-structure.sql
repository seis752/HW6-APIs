-- MySQL Script generated by MySQL Workbench
-- 03/31/15 23:32:15
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema seis752justin_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `seis752justin_db` ;

-- -----------------------------------------------------
-- Schema seis752justin_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `seis752justin_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `seis752justin_db` ;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id` BIGINT(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(80) NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `profile_img_url` VARCHAR(500) NULL,
  `lat` DECIMAL(10,6) NULL,
  `lon` DECIMAL(10,6) NULL,
  `phone` VARCHAR(15) NULL,
  `created_when` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `message` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `message` VARCHAR(4000) NOT NULL,
  `created_when` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `relationship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `relationship` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_1_id` INT UNSIGNED NOT NULL,
  `user_2_id` INT UNSIGNED NOT NULL,
  `created_when` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;