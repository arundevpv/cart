/*
SQLyog Community v10.5 Beta1
MySQL - 5.5.25a : Database - cart
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cart` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cart`;

/*Table structure for table `adds` */

DROP TABLE IF EXISTS `adds`;

CREATE TABLE `adds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `category_id` int(10) unsigned NOT NULL,
  `price` float(20,2) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `model` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_products` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `free_shipping` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adds_category_id_foreign` (`category_id`),
  CONSTRAINT `adds_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `adds` */

insert  into `adds`(`id`,`title`,`description`,`category_id`,`price`,`manufacturer_id`,`quantity`,`is_active`,`model`,`related_products`,`free_shipping`,`created_at`,`updated_at`,`deleted_at`,`user_id`) values (12,'MacBook','\r\n\r\nIntel Core 2 Duo processor\r\n\r\nPowered by an Intel Core 2 Duo processor at speeds up to 2.16GHz, the new MacBook is the fastest ever.\r\n\r\n1GB memory, larger hard drives\r\n\r\nThe new MacBook now comes with 1GB of memory standard and larger hard drives for the entire line perfect for running more of your favorite applications and storing growing media collections.\r\n\r\nSleek, 1.08-inch-thin design\r\n\r\nMacBook makes it easy to hit the road thanks to its tough polycarbonate case, built-in wireless technologies, and innovative MagSafe Power Adapter that releases automatically if someone accidentally trips on the cord.\r\n\r\nBuilt-in iSight camera\r\n\r\nRight out of the box, you can have a video chat with friends or family,2 record a video at your desk, or take fun pictures with Photo Booth\r\n',18,36120.00,1,10,1,'Model1','',1,'2016-03-21 03:24:48','2016-03-21 03:24:48',NULL,1),(13,'iphone','iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name or number in your address book, a favorites list, or a call log. It also automatically syncs all your contacts from a PC, Mac, or Internet service. And it lets you select and listen to voicemail messages in whatever order you want just like email.',14,15150.00,1,20,1,'plus','',1,'2016-03-21 03:30:39','2016-03-21 03:30:39',NULL,1),(14,'Canon EOS 5D','Canon\'s press material for the EOS 5D states that it \'defines (a) new D-SLR category\', while we\'re not typically too concerned with marketing talk this particular statement is clearly pretty accurate. The EOS 5D is unlike any previous digital SLR in that it combines a full-frame (35 mm sized) high resolution sensor (12.8 megapixels) with a relatively compact body (slightly larger than the EOS 20D, although in your hand it feels noticeably \'chunkier\'). The EOS 5D is aimed to slot in between the EOS 20D and the EOS-1D professional digital SLR\'s, an important difference when compared to the latter is that the EOS 5D doesn\'t have any environmental seals. While Canon don\'t specifically refer to the EOS 5D as a \'professional\' digital SLR it will have obvious appeal to professionals who want a high quality digital SLR in a body lighter than the EOS-1D. It will also no doubt appeal to current EOS 20D owners (although lets hope they\'ve not bought too many EF-S lenses...) äë',20,4900.00,2,300,1,'EOS 5D','',1,'2016-03-21 04:12:00','2016-03-21 04:12:00',NULL,1);

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `banner` */

insert  into `banner`(`id`,`title`,`link`,`status`,`created_at`,`updated_at`) values (1,'Homepage',NULL,1,'2016-03-20 13:50:38','2016-03-20 13:50:41');

/*Table structure for table `banner_image` */

DROP TABLE IF EXISTS `banner_image`;

CREATE TABLE `banner_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `banner_image` */

insert  into `banner_image`(`id`,`banner_id`,`image`,`created_at`,`updated_at`) values (1,1,'eBay_Giving_charity_876x402_17March2016_33.jpg',NULL,NULL),(2,1,'Jewllery_876x402_16March2016.jpg',NULL,NULL),(3,1,'PCH_876x402_16March2016.jpg',NULL,NULL),(4,1,'SolidFurniture_876x402_11March2016.jpg',NULL,NULL),(5,1,'TV_JoyMax_876x402_10March2016.jpg',NULL,NULL);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `shown_home_page` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`photo`,`parent_id`,`is_active`,`created_at`,`updated_at`,`deleted_at`,`shown_home_page`) values (13,'Mobiles & Tablets','1427867464.png',0,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(14,'Mobiles','1427867045.png',13,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,1),(15,'Tablets','1427864586.png',13,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(16,'Accessories','1427867586.png',13,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(17,'Electronics & Appliances','1427867647.png',0,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(18,'Computers & Laptops','1427866088.png',17,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,1),(19,'TV, Video & Audio','1427867588.png',17,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(20,'Camera & Accessories','1427865909.png',17,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,1),(21,'Other Electronics','1427867050.png',17,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(22,'Home & Furnitures','1427867651.png',0,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(23,'Furniture','1427865432.png',22,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(24,'Decor & Furnishing','1427866752.png',22,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(25,'Paintings & Handicrafts','1427864533.png',22,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0),(26,'Other Household Items','1427866993.png',22,1,'2016-03-20 11:09:24','2016-03-20 11:09:24',NULL,0);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`permissions`) values (1,'Admin','{\"admin\":1}'),(2,'Users','{\"user\":1}');

/*Table structure for table `manufacturer` */

DROP TABLE IF EXISTS `manufacturer`;

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `manufacturer` */

insert  into `manufacturer`(`id`,`name`,`photo`,`status`,`created_at`,`updated_at`) values (1,'Apple','1458455265.jpg',1,'2016-03-20 06:45:27','2016-03-20 06:45:27'),(2,'Canon','1458533650.jpg',1,'2016-03-21 04:10:14','2016-03-21 04:10:14');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `add_id` int(10) unsigned NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `product_images_add_id_foreign` (`add_id`),
  CONSTRAINT `product_images_add_id_foreign` FOREIGN KEY (`add_id`) REFERENCES `adds` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`add_id`,`image_name`,`is_active`) values (1,12,'4429-21-03-2016-03-43-24-apple_cinema_30-228x228.jpg',1),(2,12,'777-21-03-2016-03-43-24-macbook_4-500x500.jpg',1),(3,12,'1545-21-03-2016-03-44-24-macbook_5-500x500.jpg',1),(4,13,'3753-21-03-2016-03-35-30-iphone_1-228x228.jpg',1),(5,13,'2129-21-03-2016-03-35-30-iphone_2-500x500.jpg',1),(6,13,'2040-21-03-2016-03-35-30-iphone_6-500x500.jpg',1),(7,14,'3310-21-03-2016-04-58-11-canon_eos_5d_1-500x500.jpg',1),(8,14,'2353-21-03-2016-04-58-11-canon_eos_5d_2-500x500.jpg',1);

/*Table structure for table `throttle` */

DROP TABLE IF EXISTS `throttle`;

CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `throttle` */

insert  into `throttle`(`id`,`user_id`,`ip_address`,`attempts`,`suspended`,`banned`,`last_attempt_at`,`suspended_at`,`banned_at`) values (1,2,'::1',0,0,0,NULL,NULL,NULL),(2,1,'42.107.175.156',0,0,0,NULL,NULL,NULL),(3,5,'182.64.177.192',1,0,0,'2015-07-01 12:30:30',NULL,NULL),(4,7,'111.92.94.35',0,0,0,'2015-07-24 20:21:21',NULL,NULL),(5,8,'115.113.225.246',1,0,0,'2015-07-28 13:29:24',NULL,NULL),(6,1,'111.92.92.253',0,0,0,NULL,NULL,NULL),(7,8,'115.118.154.253',1,0,0,'2015-10-05 15:29:31',NULL,NULL),(8,1,'115.118.154.253',0,0,0,NULL,NULL,NULL),(9,10,'182.64.12.16',0,0,0,NULL,NULL,NULL),(10,1,'127.0.0.1',0,0,0,NULL,NULL,NULL),(11,1,'::1',0,0,0,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`first_name`,`last_name`,`address`,`contact_no`,`permissions`,`activated`,`activation_code`,`activated_at`,`last_login`,`persist_code`,`reset_password_code`,`created_at`,`updated_at`) values (1,'arun@gmail.com','$2y$10$BevL5LmCCsZfFC6cOJDqPevv89e2c2Tw9JsBaIi6aCDYxlpIP5qOa','Admin',NULL,NULL,NULL,NULL,1,NULL,NULL,'2016-03-21 03:30:46','$2y$10$I3fQhF1p7W.vqb.zgnh1r.8F60fSPTSxMAq9QXfAJbZ1H15oEFVBS',NULL,'0000-00-00 00:00:00','2016-03-21 03:30:46');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users_groups` */

insert  into `users_groups`(`user_id`,`group_id`) values (1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
