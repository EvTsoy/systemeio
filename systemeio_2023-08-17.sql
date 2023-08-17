# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.22-log)
# Database: systemeio
# Generation Time: 2023-08-17 13:47:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table coupon
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupon`;

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64BF3F02C54C8C93` (`type_id`),
  CONSTRAINT `FK_64BF3F02C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `coupon_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;

INSERT INTO `coupon` (`id`, `code`, `type_id`, `value`)
VALUES
	(1,'laboriosam131',2,63),
	(2,'aperiam194',2,90),
	(3,'voluptas149',1,95),
	(4,'ipsa176',2,78),
	(5,'reprehenderit131',2,64),
	(6,'porro167',1,45),
	(7,'nesciunt123',2,49),
	(8,'fugit120',1,18),
	(9,'ab135',1,94),
	(10,'nihil138',1,83),
	(11,'corporis183',1,91),
	(12,'sapiente140',1,26),
	(13,'quo170',1,23),
	(14,'laborum134',1,11),
	(15,'at199',1,99),
	(16,'aspernatur101',1,32),
	(17,'sit112',1,84),
	(18,'rerum197',2,71),
	(19,'ea105',2,35),
	(20,'ut191',2,33),
	(21,'aut153',1,90),
	(22,'hic103',1,68),
	(23,'aut127',1,91),
	(24,'et187',2,74),
	(25,'ducimus184',2,57),
	(26,'exercitationem150',2,19),
	(27,'illo191',2,80),
	(28,'quaerat188',1,22),
	(29,'eos113',2,100),
	(30,'iste136',2,85),
	(31,'sit199',1,12),
	(32,'cum177',1,89),
	(33,'fugiat199',2,21),
	(34,'reprehenderit100',1,32),
	(35,'ducimus199',1,65),
	(36,'repellat132',1,95),
	(37,'excepturi158',2,63),
	(38,'facere177',1,26),
	(39,'in195',1,26),
	(40,'necessitatibus193',1,76),
	(41,'necessitatibus164',2,82),
	(42,'vel185',1,46),
	(43,'aut101',2,30),
	(44,'suscipit113',1,56),
	(45,'iure105',2,89),
	(46,'cum148',2,32),
	(47,'quod194',1,72),
	(48,'et149',1,76),
	(49,'tempora190',2,12),
	(50,'molestias108',2,17),
	(51,'nostrum140',1,27),
	(52,'rerum172',2,64),
	(53,'omnis195',2,26),
	(54,'et143',2,91),
	(55,'cum165',1,41),
	(56,'officia163',1,50),
	(57,'ea160',2,51),
	(58,'qui100',1,12),
	(59,'a167',2,81),
	(60,'est156',1,71),
	(61,'optio102',1,20),
	(62,'vel182',1,70),
	(63,'accusantium104',2,30),
	(64,'magnam172',2,55),
	(65,'maiores171',1,59),
	(66,'quas111',2,19),
	(67,'eveniet131',2,21),
	(68,'et112',2,35),
	(69,'illum173',1,28),
	(70,'error117',1,84),
	(71,'repellat184',1,41),
	(72,'doloremque193',1,75),
	(73,'id176',2,81),
	(74,'eum136',2,42),
	(75,'sit193',2,57),
	(76,'ut149',1,19),
	(77,'soluta162',2,89),
	(78,'sequi199',2,12),
	(79,'sunt198',2,68),
	(80,'veritatis109',1,27),
	(81,'aut174',1,21),
	(82,'pariatur137',2,39),
	(83,'rem186',1,41),
	(84,'ullam144',1,92),
	(85,'quos107',1,63),
	(86,'dicta198',1,48),
	(87,'non150',1,64),
	(88,'doloribus192',2,54),
	(89,'atque116',2,41),
	(90,'et189',2,81),
	(91,'consequuntur170',2,93),
	(92,'voluptatum142',1,78),
	(93,'culpa156',2,39),
	(94,'eum104',1,95),
	(95,'sunt159',2,38),
	(96,'id183',2,95),
	(97,'aut183',2,81),
	(98,'nihil121',1,65),
	(99,'est114',1,28),
	(100,'laboriosam175',1,36);

/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupon_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupon_type`;

CREATE TABLE `coupon_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `coupon_type` WRITE;
/*!40000 ALTER TABLE `coupon_type` DISABLE KEYS */;

INSERT INTO `coupon_type` (`id`, `type`)
VALUES
	(1,'Фиксированная сумма скидки'),
	(2,'Процент от суммы покупки');

/*!40000 ALTER TABLE `coupon_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table doctrine_migration_versions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doctrine_migration_versions`;

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`)
VALUES
	('DoctrineMigrations\\Version20230816081535','2023-08-17 12:41:26',33),
	('DoctrineMigrations\\Version20230816082020','2023-08-17 12:41:26',23),
	('DoctrineMigrations\\Version20230816082107','2023-08-17 12:41:26',11),
	('DoctrineMigrations\\Version20230816082241','2023-08-17 12:41:26',58),
	('DoctrineMigrations\\Version20230816084146','2023-08-17 12:41:26',25),
	('DoctrineMigrations\\Version20230816091020','2023-08-17 12:41:26',8),
	('DoctrineMigrations\\Version20230816125023','2023-08-17 12:41:26',79),
	('DoctrineMigrations\\Version20230817054237','2023-08-17 12:41:26',10),
	('DoctrineMigrations\\Version20230817054326','2023-08-17 12:41:26',56),
	('DoctrineMigrations\\Version20230817100314','2023-08-17 12:41:26',18);

/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table messenger_messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messenger_messages`;

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `payment_processor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F52993984584665A` (`product_id`),
  KEY `IDX_F5299398B2A824D8` (`tax_id`),
  KEY `IDX_F529939866C5951B` (`coupon_id`),
  KEY `IDX_F5299398514A7680` (`payment_processor_id`),
  CONSTRAINT `FK_F52993984584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_F5299398514A7680` FOREIGN KEY (`payment_processor_id`) REFERENCES `payment_processor` (`id`),
  CONSTRAINT `FK_F529939866C5951B` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`id`),
  CONSTRAINT `FK_F5299398B2A824D8` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;

INSERT INTO `order` (`id`, `product_id`, `tax_id`, `coupon_id`, `price`, `payment_processor_id`)
VALUES
	(2,2,1,NULL,23,1),
	(3,2,1,NULL,23,1),
	(4,2,1,NULL,23,1),
	(5,2,1,NULL,23,1);

/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payment_processor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment_processor`;

CREATE TABLE `payment_processor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `payment_processor` WRITE;
/*!40000 ALTER TABLE `payment_processor` DISABLE KEYS */;

INSERT INTO `payment_processor` (`id`, `title`)
VALUES
	(1,'Paypal'),
	(2,'Stripe');

/*!40000 ALTER TABLE `payment_processor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`, `title`, `price`)
VALUES
	(1,'Iphone',100),
	(2,'Наушники',20),
	(3,'Чехол',10);

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tax
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tax`;

CREATE TABLE `tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tax` WRITE;
/*!40000 ALTER TABLE `tax` DISABLE KEYS */;

INSERT INTO `tax` (`id`, `country`, `value`, `country_code`, `pattern`)
VALUES
	(1,'Germany',19,'DE','^[A-Za-z]{2}\\d{9}$'),
	(2,'Italy',22,'IT','^[A-Za-z]{2}\\d{11}$'),
	(3,'France',20,'FR','^[A-Za-z]{2}\\d{9}$'),
	(4,'Greece',24,'GR','^[A-Za-z]{4}\\d{9}$');

/*!40000 ALTER TABLE `tax` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
