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


DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pizzas`;

CREATE TABLE `pizzas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cost` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pizza_ingredients`;

CREATE TABLE `pizza_ingredients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pizza_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `ordering` tinyint(2) NOT NULL,
  `quantity` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `pizza_ingredients`
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);



INSERT INTO `pizzas` (`id`, `name`, `cost`) VALUES
(1, 'Margherita', '12.00'),
(2, 'Quattro Stagioni', '12.00');


INSERT INTO `ingredients` (`id`, `name`, `cost`) VALUES
(1, 'tomato', '2.00'),
(2, 'sliced mushrooms', '2.00'),
(3, 'feta cheese', '2.00'),
(4, 'sausages', '2.00'),
(5, 'sliced onion', '2.00'),
(6, 'mozzarella cheese', '2.00'),
(7, 'oregano', '2.00'),
(8, 'bacon', '2.00');


INSERT INTO `pizza_ingredients` (`id`, `pizza_id`, `ingredient_id`, `ordering`, `quantity`) VALUES
(1, 1, 1, 1, 30),
(2, 1, 2, 2, 40);



