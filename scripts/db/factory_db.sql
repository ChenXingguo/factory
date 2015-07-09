-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema factory
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema factory
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `factory` DEFAULT CHARACTER SET utf8 ;
USE `factory` ;

-- -----------------------------------------------------
-- Table `factory`.`attribute_section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`attribute_section` (
  `section_id` SMALLINT(3) NOT NULL,
  `section_name` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`section_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`attributes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`attributes` (
  `attribute_id` INT(11) NOT NULL,
  `lang` CHAR(2) NOT NULL,
  `attribute_level` SMALLINT(2) NULL DEFAULT NULL,
  `attribute_name` VARCHAR(45) NULL DEFAULT NULL,
  `attribute_type` VARCHAR(45) NULL DEFAULT NULL,
  `attribute_path` VARCHAR(45) NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`attribute_id`, `lang`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`category` (
  `category_id` INT(11) NOT NULL,
  `lang` CHAR(2) NOT NULL,
  `category_code` VARCHAR(5) NULL DEFAULT NULL,
  `category_name` VARCHAR(45) NULL DEFAULT NULL,
  `level` SMALLINT(2) NULL DEFAULT NULL,
  `parent_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`, `lang`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`category_attributes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`category_attributes` (
  `category_id` INT(11) NOT NULL,
  `attribute_id` INT(11) NOT NULL,
  PRIMARY KEY (`category_id`, `attribute_id`),
  INDEX `fk_attribute_id_idx` (`attribute_id` ASC),
  CONSTRAINT `fk_attribute_id`
    FOREIGN KEY (`attribute_id`)
    REFERENCES `factory`.`attributes` (`attribute_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_category_id`
    FOREIGN KEY (`category_id`)
    REFERENCES `factory`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`category_attributes_flat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`category_attributes_flat` (
  `category_id` INT(11) NOT NULL,
  `attributes` VARCHAR(255) NULL DEFAULT NULL,
  `category_attributes_category_id` INT(11) NOT NULL,
  `category_attributes_attribute_id` INT(11) NOT NULL,
  PRIMARY KEY (`category_id`, `category_attributes_category_id`, `category_attributes_attribute_id`),
  INDEX `fk_category_attributes_flat_category_attributes1_idx` (`category_attributes_category_id` ASC, `category_attributes_attribute_id` ASC),
  CONSTRAINT `fk_category_attributes_flat_category_attributes1`
    FOREIGN KEY (`category_attributes_category_id` , `category_attributes_attribute_id`)
    REFERENCES `factory`.`category_attributes` (`category_id` , `attribute_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`company` (
  `id` INT(11) NOT NULL DEFAULT '0',
  `name` VARCHAR(45) NOT NULL,
  `licenses` VARCHAR(255) NULL DEFAULT NULL,
  `industry` VARCHAR(45) NULL DEFAULT NULL,
  `num_employees` VARCHAR(45) NULL DEFAULT NULL,
  `address1` VARCHAR(45) NOT NULL,
  `address2` VARCHAR(45) NULL DEFAULT NULL,
  `city` VARCHAR(20) NOT NULL,
  `province` VARCHAR(20) NOT NULL,
  `postal_code` VARCHAR(20) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `fax` VARCHAR(45) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`roles` (
  `code` VARCHAR(5) NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `auth_key` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_hash` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_reset_token` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `status` SMALLINT(6) NOT NULL DEFAULT '10',
  `created_at` INT(11) NOT NULL,
  `updated_at` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `factory`.`contact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`contact` (
  `company_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `roles_code` VARCHAR(5) NOT NULL,
  `first_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NULL DEFAULT NULL,
  `work_phone` VARCHAR(45) NULL DEFAULT NULL,
  `mobile_phone` VARCHAR(45) NULL DEFAULT NULL,
  `address1` VARCHAR(45) NULL DEFAULT NULL,
  `address2` VARCHAR(45) NULL DEFAULT NULL,
  `city` VARCHAR(45) NULL DEFAULT NULL,
  `province` VARCHAR(45) NULL DEFAULT NULL,
  `postal_code` VARCHAR(45) NULL DEFAULT NULL,
  `note` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `udpated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `user_id_idx` (`user_id` ASC),
  INDEX `company_id_idx` (`company_id` ASC),
  INDEX `fk_contact_roles1_idx` (`roles_code` ASC),
  PRIMARY KEY (`company_id`, `user_id`),
  CONSTRAINT `company_id`
    FOREIGN KEY (`company_id`)
    REFERENCES `factory`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contact_roles1`
    FOREIGN KEY (`roles_code`)
    REFERENCES `factory`.`roles` (`code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `factory`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`country` (
  `code` CHAR(2) NOT NULL,
  `name` CHAR(52) NOT NULL,
  `population` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`industries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`industries` (
  `code` VARCHAR(2) NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `parent_code` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`migration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`migration` (
  `version` VARCHAR(180) NOT NULL,
  `apply_time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`product` (
  `product_id` INT(11) NOT NULL AUTO_INCREMENT,
  `lang` CHAR(2) NOT NULL,
  `company_id` INT(11) NULL DEFAULT NULL,
  `product_name` VARCHAR(45) NULL DEFAULT NULL,
  `upc_code` VARCHAR(45) NULL DEFAULT NULL,
  `sku` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `length` VARCHAR(45) NULL DEFAULT NULL,
  `width` VARCHAR(45) NULL DEFAULT NULL,
  `height` VARCHAR(45) NULL DEFAULT NULL,
  `length_unit` VARCHAR(45) NULL DEFAULT NULL,
  `weight` VARCHAR(45) NULL DEFAULT NULL,
  `weight_unit` VARCHAR(45) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`, `lang`),
  INDEX `company_id_idx` (`company_id` ASC),
  CONSTRAINT `fk_company_id`
    FOREIGN KEY (`company_id`)
    REFERENCES `factory`.`company` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`product_attribute_nv`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`product_attribute_nv` (
  `product_id` INT(11) NOT NULL,
  `lang` CHAR(2) NOT NULL,
  `attribute_name` VARCHAR(45) NULL DEFAULT NULL,
  `attribute_value` VARCHAR(45) NULL DEFAULT NULL,
  `attribute_unit` VARCHAR(15) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`, `lang`),
  CONSTRAINT `fk_product_attribute_nv_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `factory`.`product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`product_attributes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`product_attributes` (
  `product_id` INT(11) NOT NULL,
  `attribute_id` INT(11) NULL DEFAULT NULL,
  `section_id` SMALLINT(3) NULL DEFAULT NULL,
  `attribute_value` VARCHAR(255) NULL DEFAULT NULL,
  `attribute_unit` VARCHAR(15) NULL DEFAULT NULL,
  `note` VARCHAR(255) NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `attributes_attribute_id` INT(11) NOT NULL,
  `attributes_lang` CHAR(2) NOT NULL,
  `product_product_id` INT(11) NOT NULL,
  `product_lang` CHAR(2) NOT NULL,
  `attribute_section_section_id` SMALLINT(3) NOT NULL,
  PRIMARY KEY (`product_id`, `attributes_attribute_id`, `attributes_lang`, `product_product_id`, `product_lang`, `attribute_section_section_id`),
  INDEX `fk_product_attributes_attributes1_idx` (`attributes_attribute_id` ASC, `attributes_lang` ASC),
  INDEX `fk_product_attributes_product1_idx` (`product_product_id` ASC, `product_lang` ASC),
  INDEX `fk_product_attributes_attribute_section1_idx` (`attribute_section_section_id` ASC),
  CONSTRAINT `fk_product_attributes_attribute_section1`
    FOREIGN KEY (`attribute_section_section_id`)
    REFERENCES `factory`.`attribute_section` (`section_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_attributes_attributes1`
    FOREIGN KEY (`attributes_attribute_id` , `attributes_lang`)
    REFERENCES `factory`.`attributes` (`attribute_id` , `lang`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_attributes_product1`
    FOREIGN KEY (`product_product_id` , `product_lang`)
    REFERENCES `factory`.`product` (`product_id` , `lang`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`product_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`product_category` (
  `code` VARCHAR(32) NOT NULL,
  `category_name` VARCHAR(45) NULL DEFAULT NULL,
  `level` SMALLINT(2) NULL DEFAULT NULL,
  `parent_code` VARCHAR(32) NULL DEFAULT NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`product_images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`product_images` (
  `product_id` INT(11) NOT NULL,
  `seq_no` SMALLINT(3) NULL DEFAULT NULL,
  `url` VARCHAR(255) NULL DEFAULT NULL,
  `title` VARCHAR(45) NULL DEFAULT NULL,
  `alt_text` VARCHAR(45) NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  CONSTRAINT `fk_product_id`
    FOREIGN KEY (`product_id`)
    REFERENCES `factory`.`product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`product_pricing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`product_pricing` (
  `product_id` INT(11) NOT NULL,
  `production_cost` DECIMAL(9,2) NULL DEFAULT NULL,
  `production_cost_unit` CHAR(3) NULL DEFAULT NULL,
  `packaging_cost` DECIMAL(9,2) NULL DEFAULT NULL,
  `packaging_cost_unit` CHAR(3) NULL DEFAULT NULL,
  `ship2cndc_cost` DECIMAL(9,2) NULL DEFAULT NULL,
  `ship2cndc_cost_unit` CHAR(3) NULL DEFAULT NULL,
  `subtotal_to_cndc` DECIMAL(9,2) NULL DEFAULT NULL,
  `subtotal_to_cndc_unit` CHAR(3) NULL DEFAULT NULL,
  `ocean_freight_cost` DECIMAL(9,2) NULL DEFAULT NULL,
  `ocean_freight_cost_unit` CHAR(3) NULL DEFAULT NULL,
  `custom_broker_fee` DECIMAL(9,2) NULL DEFAULT NULL,
  `custom_broker_fee_unit` CHAR(3) NULL DEFAULT NULL,
  `custom_duty` DECIMAL(9,2) NULL DEFAULT NULL,
  `custom_duty_unit` CHAR(3) NULL DEFAULT NULL,
  `ship2usdc_cost` DECIMAL(9,2) NULL DEFAULT NULL,
  `ship2usdc_unit` CHAR(3) NULL DEFAULT NULL,
  `est_ship2customer_cost` DECIMAL(9,2) NULL DEFAULT NULL,
  `est_ship2customer_cost_unit` CHAR(3) NULL DEFAULT NULL,
  `min_sale_price` DECIMAL(9,2) NULL DEFAULT NULL,
  `min_sale_price_unit` CHAR(3) NULL DEFAULT NULL,
  `msrp` DECIMAL(9,2) NULL DEFAULT NULL,
  `msrp_unit` CHAR(3) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_product_id` INT(11) NOT NULL,
  `product_lang` CHAR(2) NOT NULL,
  PRIMARY KEY (`product_id`, `product_product_id`, `product_lang`),
  INDEX `fk_product_pricing_product1_idx` (`product_product_id` ASC, `product_lang` ASC),
  CONSTRAINT `fk_product_pricing_product1`
    FOREIGN KEY (`product_product_id` , `product_lang`)
    REFERENCES `factory`.`product` (`product_id` , `lang`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `factory`.`user_stat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `factory`.`user_stat` (
  `last_login` DATETIME NOT NULL,
  `tmes_login` SMALLINT(4) NULL DEFAULT NULL,
  `email_verified` TINYINT(1) NULL DEFAULT NULL,
  `depth` SMALLINT(4) NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`last_login`, `user_id`),
  INDEX `fk_user_stat_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_stat_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `factory`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
