-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema redinmo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `redinmo` ;

-- -----------------------------------------------------
-- Schema redinmo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `redinmo` DEFAULT CHARACTER SET latin1 ;
USE `redinmo` ;

-- -----------------------------------------------------
-- Table `redinmo`.`tipos_inmuebles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`tipos_inmuebles` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`tipos_inmuebles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`avisos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`avisos` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`avisos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_tipo_inmueble` INT NULL,
  `tipo_op` INT NULL,
  `id_barrio` INT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `metros_cuadrados` INT NULL,
  `cant_ambientes` INT NULL,
  `cant_dormitorios` INT NULL,
  `cant_banios` INT NULL,
  `estado_inmueble` VARCHAR(45) NULL,
  `anio` INT NULL,
  `detalles` TEXT NULL,
  `precio` INT NULL,
  `id_usuario` INT NULL,
  `fecha` DATETIME NULL,
  `estado_aviso` VARCHAR(45) NULL,
  `nombre_barrio` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `id_tipo_inmueble` (`id_tipo_inmueble` ASC),
  INDEX `id_barrio` (`id_barrio` ASC),
  CONSTRAINT `avisos_id_tipo_inmueble`
    FOREIGN KEY (`id_tipo_inmueble`)
    REFERENCES `redinmo`.`tipos_inmuebles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`aviso_fotos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`aviso_fotos` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`aviso_fotos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_aviso` INT NOT NULL,
  `url` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `id_aviso`),
  INDEX `id_aviso` (`id_aviso` ASC),
  CONSTRAINT `aviso_fotos_id_aviso_fk`
    FOREIGN KEY (`id_aviso`)
    REFERENCES `redinmo`.`avisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`paises`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`paises` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`paises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(2) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unique_codigo` (`codigo` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`provincias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`provincias` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`provincias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_pais` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_pais` (`id_pais` ASC),
  CONSTRAINT `provincias_id_pais_fk`
    FOREIGN KEY (`id_pais`)
    REFERENCES `redinmo`.`paises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`localidades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`localidades` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`localidades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_provincia` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_provincia` (`id_provincia` ASC),
  CONSTRAINT `localidades_id_provincia_fk`
    FOREIGN KEY (`id_provincia`)
    REFERENCES `redinmo`.`provincias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`barrios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`barrios` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`barrios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_localidad` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_localidad` (`id_localidad` ASC),
  CONSTRAINT `barrios_id_localidad_fk`
    FOREIGN KEY (`id_localidad`)
    REFERENCES `redinmo`.`localidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`enviado_mail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`enviado_mail` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`enviado_mail` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_aviso` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `ip_address` VARCHAR(15) NULL,
  `fecha` DATETIME NULL,
  PRIMARY KEY (`id`, `id_aviso`),
  INDEX `id_aviso_fk_2_idx` (`id_aviso` ASC),
  CONSTRAINT `enviado_mail_id_aviso_fk`
    FOREIGN KEY (`id_aviso`)
    REFERENCES `redinmo`.`avisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`groups` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `groupscol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `redinmo`.`tipos_inmuebles_caracteristicas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`tipos_inmuebles_caracteristicas` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`tipos_inmuebles_caracteristicas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`inmuebles_caracteristicas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`inmuebles_caracteristicas` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`inmuebles_caracteristicas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_aviso` INT NOT NULL,
  `id_tipo_inmuebles_caracteristicas` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `id_aviso`, `id_tipo_inmuebles_caracteristicas`),
  INDEX `id_aviso` (`id_aviso` ASC),
  INDEX `id_tipo_inmuebles_caracteristicas_idx` (`id_tipo_inmuebles_caracteristicas` ASC),
  CONSTRAINT `inm_carac_id_tipo_inmuebles_caracteristicas`
    FOREIGN KEY (`id_tipo_inmuebles_caracteristicas`)
    REFERENCES `redinmo`.`tipos_inmuebles_caracteristicas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `inm_carac_id_aviso`
    FOREIGN KEY (`id_aviso`)
    REFERENCES `redinmo`.`avisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`login_attempts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`login_attempts` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`login_attempts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(15) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `time` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `redinmo`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`users` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(15) NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `salt` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `activation_code` VARCHAR(45) NULL,
  `forgotten_password_code` VARCHAR(45) NULL DEFAULT NULL,
  `forgotten_password_time` INT NULL,
  `remember_code` VARCHAR(45) NULL DEFAULT NULL,
  `created_on` INT NULL,
  `last_login` INT NULL,
  `active` INT NULL DEFAULT NULL,
  `first_name` VARCHAR(45) NULL DEFAULT NULL,
  `last_name` VARCHAR(45) NULL DEFAULT NULL,
  `company` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `redinmo`.`mensajes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`mensajes` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`mensajes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_aviso` INT NOT NULL,
  `id_user` INT NOT NULL,
  `fecha` DATETIME NULL,
  `mensaje` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `id_aviso`, `id_user`),
  INDEX `id_usuario` (`id_user` ASC),
  INDEX `id_aviso` (`id_aviso` ASC),
  CONSTRAINT `mensajes_id_aviso_fk`
    FOREIGN KEY (`id_aviso`)
    REFERENCES `redinmo`.`avisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `mensajes_id_user_fk`
    FOREIGN KEY (`id_user`)
    REFERENCES `redinmo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COMMENT = '			';


-- -----------------------------------------------------
-- Table `redinmo`.`users_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`users_groups` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`users_groups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `group_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`, `group_id`),
  INDEX `user_id_fk_idx` (`user_id` ASC),
  INDEX `group_id_fk_idx` (`group_id` ASC),
  CONSTRAINT `users_groups_user_id_fk`
    FOREIGN KEY (`user_id`)
    REFERENCES `redinmo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_group_id_fk`
    FOREIGN KEY (`group_id`)
    REFERENCES `redinmo`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `redinmo`.`user_busquedas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`user_busquedas` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`user_busquedas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `fecha_hora` DATETIME NULL,
  `cadena` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `id_user`),
  CONSTRAINT `user_busquedas_id_user_fk`
    FOREIGN KEY (`id_user`)
    REFERENCES `redinmo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`user_favoritos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`user_favoritos` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`user_favoritos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `id_aviso` INT NOT NULL,
  `fecha` DATETIME NULL,
  PRIMARY KEY (`id`, `id_user`, `id_aviso`),
  INDEX `id_aviso_fk_idx` (`id_aviso` ASC),
  CONSTRAINT `user_favoritos_id_user_fk`
    FOREIGN KEY (`id_user`)
    REFERENCES `redinmo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_favoritos_id_aviso_fk`
    FOREIGN KEY (`id_aviso`)
    REFERENCES `redinmo`.`avisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`user_pedidos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`user_pedidos` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`user_pedidos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `id_tipo_inmueble` INT NULL,
  `tipo_op` INT NULL,
  `id_ciudad` INT NULL,
  `precio_min` INT NULL,
  `precio_max` INT NULL,
  `activo` INT NULL,
  PRIMARY KEY (`id`, `id_user`),
  INDEX `id_tipo_inmueble_fk_idx` (`id_tipo_inmueble` ASC),
  CONSTRAINT `user_pedidos_id_user_fk`
    FOREIGN KEY (`id_user`)
    REFERENCES `redinmo`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `user_pedidos_id_tipo_inmueble_fk`
    FOREIGN KEY (`id_tipo_inmueble`)
    REFERENCES `redinmo`.`tipos_inmuebles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`ver_datos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`ver_datos` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`ver_datos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_aviso` INT NOT NULL,
  `ip_address` VARCHAR(15) NOT NULL,
  `fecha_hora` DATETIME NOT NULL,
  PRIMARY KEY (`id`, `id_aviso`),
  INDEX `id_aviso_fk_idx` (`id_aviso` ASC),
  CONSTRAINT `ver_datos_id_aviso_fk`
    FOREIGN KEY (`id_aviso`)
    REFERENCES `redinmo`.`avisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `redinmo`.`visualizaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `redinmo`.`visualizaciones` ;

CREATE TABLE IF NOT EXISTS `redinmo`.`visualizaciones` (
  `id` INT NOT NULL,
  `id_aviso` INT NOT NULL,
  `ip_address` INT(15) NULL,
  `fecha_hora` DATETIME NULL,
  PRIMARY KEY (`id`, `id_aviso`),
  INDEX `id_aviso_fk_idx` (`id_aviso` ASC),
  CONSTRAINT `visualizaciones_id_aviso_fk`
    FOREIGN KEY (`id_aviso`)
    REFERENCES `redinmo`.`avisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
