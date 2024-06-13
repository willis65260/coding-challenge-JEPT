-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema CodingChallenge
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema CodingChallenge
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `CodingChallenge` DEFAULT CHARACTER SET utf8 ;
USE `CodingChallenge` ;

-- -----------------------------------------------------
-- Table `CodingChallenge`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CodingChallenge`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_users`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CodingChallenge`.`payments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CodingChallenge`.`payments` (
  `id_payments` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `concept` VARCHAR(45) NOT NULL,
  `quantity` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_payments`),
  INDEX `id_user_idx` (`id_user` ASC) VISIBLE,
  CONSTRAINT `id_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `CodingChallenge`.`users` (`id_users`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
