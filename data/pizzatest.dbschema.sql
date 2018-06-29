CREATE DATABASE IF NOT EXISTS `pizza_test`
    DEFAULT CHARACTER SET = `utf8`
    DEFAULT COLLATE = `utf8_general_ci`;

USE `pizza_test`;

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `cost` decimal(6,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
