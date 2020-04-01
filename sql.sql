SET @@global.sql_mode = '';

ALTER TABLE `permissions` ADD `auto_credits_amount` INT(11) NOT NULL DEFAULT '3500' AFTER `acc_infinite_friends`, ADD `auto_pixels_amount` INT(11) NOT NULL DEFAULT '65' AFTER `auto_credits_amount`, ADD `auto_gotw_amount` INT(11) NOT NULL DEFAULT '0' AFTER `auto_pixels_amount`;
ALTER TABLE `permissions` ADD `auto_points_amount` INT(11) NOT NULL DEFAULT '3' AFTER `auto_gotw_amount`;

ALTER TABLE `users` CHANGE `password` `password` VARCHAR(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `users` ADD `passcode` VARCHAR(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `password`;
ALTER TABLE `users` ADD `user_style` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'none' AFTER `rank`;
ALTER TABLE `users` ADD `discord_name` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL AFTER `user_style`;
ALTER TABLE `users` ADD `feed_posts` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL AFTER `user_style`;
ALTER TABLE `users` ADD `country` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'world' AFTER `user_style`;
ALTER TABLE `users` ADD `premiar` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '0' AFTER `user_style`;
ALTER TABLE `users` ADD `accept_rules` ENUM('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' AFTER `discord_name`;
ALTER TABLE `camera_web` ADD `likes` VARCHAR(100) NOT NULL DEFAULT '0' AFTER `room_id`;

DROP TABLE IF EXISTS `users_likes`;
CREATE TABLE `users_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feed_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `users_likes`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

DROP TABLE IF EXISTS `cms_news`;
CREATE TABLE IF NOT EXISTS `cms_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `shortstory` text NOT NULL,
  `longstory` text NOT NULL,
  `author` varchar(200) NOT NULL DEFAULT 'Hotel',
  `active_form` enum('0','1') DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `cms_feed`;
CREATE TABLE IF NOT EXISTS `cms_feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `story` text NOT NULL,
  `author` varchar(200) NOT NULL DEFAULT 'Hotel',
  `likes` varchar(100) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `cms_mantenimiento`;
CREATE TABLE IF NOT EXISTS `cms_mantenimiento` (
  `id` int(11) unsigned NOT NULL,
  `mantenimiento` enum('0','1') DEFAULT '0',
  `motivo` longtext NOT NULL,
  `dia` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `cms_mantenimiento` VALUES (1,'0','','');