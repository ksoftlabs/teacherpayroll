-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema teacherpayroll
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema teacherpayroll
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `teacherpayroll` DEFAULT CHARACTER SET utf8 ;
USE `teacherpayroll` ;

-- -----------------------------------------------------
-- Table `teacherpayroll`.`teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`teacher` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`teacher` (
  `t_id` INT NOT NULL,
  `t_name` VARCHAR(45) NOT NULL,
  `t_account` INT NULL,
  `t_gross` DECIMAL(10,2) NULL,
  `t_deduct` DECIMAL(10,2) NULL,
  `t_net` DECIMAL(10,2) NULL,
  PRIMARY KEY (`t_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`welfare`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`welfare` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`welfare` (
  `teacher_t_id` INT NOT NULL,
  `wel_amount` DECIMAL(10,2) NULL,
  PRIMARY KEY (`teacher_t_id`),
  CONSTRAINT `fk_welfare_teacher`
    FOREIGN KEY (`teacher_t_id`)
    REFERENCES `teacherpayroll`.`teacher` (`t_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`smi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`smi` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`smi` (
  `teacher_t_id` INT NOT NULL,
  `smi_amount` DECIMAL(10,2) NULL,
  PRIMARY KEY (`teacher_t_id`),
  CONSTRAINT `fk_table1_teacher1`
    FOREIGN KEY (`teacher_t_id`)
    REFERENCES `teacherpayroll`.`teacher` (`t_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`gurusetha`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`gurusetha` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`gurusetha` (
  `teacher_t_id` INT NOT NULL,
  `guru_amount` DECIMAL(10,2) NULL,
  PRIMARY KEY (`teacher_t_id`),
  CONSTRAINT `fk_table1_teacher2`
    FOREIGN KEY (`teacher_t_id`)
    REFERENCES `teacherpayroll`.`teacher` (`t_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`rdb`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`rdb` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`rdb` (
  `teacher_t_id` INT NOT NULL,
  `rdb_amount` DECIMAL(10,2) NULL,
  PRIMARY KEY (`teacher_t_id`),
  CONSTRAINT `fk_table1_teacher3`
    FOREIGN KEY (`teacher_t_id`)
    REFERENCES `teacherpayroll`.`teacher` (`t_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`stc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`stc` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`stc` (
  `teacher_t_id` INT NOT NULL,
  `stc_amount` DECIMAL(10,2) NULL,
  PRIMARY KEY (`teacher_t_id`),
  CONSTRAINT `fk_stc_teacher1`
    FOREIGN KEY (`teacher_t_id`)
    REFERENCES `teacherpayroll`.`teacher` (`t_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`dinapala`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`dinapala` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`dinapala` (
  `teacher_t_id` INT NOT NULL,
  `dina_amount` DECIMAL(10,2) NULL,
  PRIMARY KEY (`teacher_t_id`),
  CONSTRAINT `fk_table1_teacher4`
    FOREIGN KEY (`teacher_t_id`)
    REFERENCES `teacherpayroll`.`teacher` (`t_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`misc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`misc` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`misc` (
  `misc_id` INT NOT NULL,
  `misc_welfare_total` DECIMAL(10,2) NULL,
  `misc_smi_total` DECIMAL(10,2) NULL,
  `misc_guru_total` DECIMAL(10,2) NULL,
  `misc_rdb_total` DECIMAL(10,2) NULL,
  `misc_stc_total` DECIMAL(10,2) NULL,
  `misc_dina_total` DECIMAL(10,2) NULL,
  `misc_boc_total` DECIMAL(10,2) NULL,
  PRIMARY KEY (`misc_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `teacherpayroll`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `teacherpayroll`.`users` ;

CREATE TABLE IF NOT EXISTS `teacherpayroll`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(255) NOT NULL,
  `user_username` VARCHAR(45) NOT NULL,
  `user_pass` VARCHAR(255) NOT NULL,
  `user_approved` TINYINT(1) NOT NULL DEFAULT 0,
  `user_type` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `user_username_UNIQUE` (`user_username` ASC),
  UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
