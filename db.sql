/* First ejecute is intruction */
CREATE DATABASE  `tarea 2`;

/* then create tha table*/

CREATE TABLE `tarea 2`.`products` (`id`INT(20) NULL AUTO_INCREMENT ,`code` INT(20)  NULL   , `name` varchar(255) NOT NULL , `description` MEDIUMTEXT NOT NULL , `category` TEXT NOT NULL , `available` TEXT NOT NULL , `price` INT(20) NOT NULL , `image`  MEDIUMTEXT NOT NULL , UNIQUE (`id`)) ENGINE = MyISAM;

