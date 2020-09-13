create database agenda;

use agenda;

CREATE TABLE `agenda`.`api` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(45) NOT NULL,
  `api_key` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT '1',
PRIMARY KEY (`id`));

CREATE TABLE `agenda`.`agenda` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` LONGTEXT NULL,
  `data` TIMESTAMP NOT NULL,
  `status` VARCHAR(45) NOT NULL,
PRIMARY KEY (`id`));
