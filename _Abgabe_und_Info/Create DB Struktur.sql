CREATE DATABASE `css-schulforum` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` mediumtext NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `replys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `aktiv` bit(1) NOT NULL DEFAULT b'0',
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


CREATE ALGORITHM=UNDEFINED DEFINER=`schule-css`@`%` SQL SECURITY DEFINER VIEW `css-schulforum`.`category_view` 
AS select `c`.`id` 
AS `id`,`c`.`title` 
AS `title`,(select count(`css-schulforum`.`posts`.`id`) from `css-schulforum`.`posts` where `css-schulforum`.`posts`.`cat_id` = `c`.`id`) 
AS `count` from `css-schulforum`.`category` `c`;

CREATE ALGORITHM=UNDEFINED DEFINER=`schule-css`@`%` SQL SECURITY DEFINER VIEW `css-schulforum`.`posts_view` 
AS select `p`.`id` 
AS `id`,`p`.`user_id` 
AS `user_id`,`p`.`cat_id` 
AS `cat_id`,`p`.`title` 
AS `title`,`p`.`text` 
AS `text`,`p`.`timestamp` 
AS `timestamp`,(select count(`css-schulforum`.`replys`.`id`) from `css-schulforum`.`replys` where `css-schulforum`.`replys`.`post_id` = `p`.`id`) 
AS `replys` from `css-schulforum`.`posts` `p`;

