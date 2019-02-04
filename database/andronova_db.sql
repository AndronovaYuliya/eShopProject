-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: Andronova_db
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `additionals`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `additionals`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sa_id_products_idx` (`id_product`),
  KEY `fk_sa_id_orders_idx` (`id_order`),
  CONSTRAINT `fk_sa_id_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sa_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `attributes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `attributes`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `attributes_values`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `attributes_values`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  `attributes_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_av_id_attribute_idx` (`attributes_id`),
  CONSTRAINT `fk_av_id_attribute` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categories`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `categories`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
   `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sc_parent_id_idx` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categories_attributes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `categories_attributes`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_attribute` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shop_categories_attributes_1_idx` (`id_category`),
  KEY `fk_sca_id_attributes_idx` (`id_attribute`),
  CONSTRAINT `fk_sca_id_attribute` FOREIGN KEY (`id_attribute`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sca_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `clients`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `clients`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `born` varchar(45) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `comments`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `comments`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  `user` varchar(45) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `stars` varchar(45) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sc_id_products_id` (`id_product`),
  CONSTRAINT `fk_sc_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `images`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `images`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `key_words`
--
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `key_words`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `orders`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `orders`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `sum` double DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `ttn` varchar(45) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_so_id_clients_idx` (`id_client`),
  CONSTRAINT `fk_so_id_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `products`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `brand` varchar(45) NOT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `old_price` float DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT 1,
  `id_category` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sp_id_categories_idx` (`id_category`),
  CONSTRAINT `fk_sp_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `products_images`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `products_images`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_galary` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_spg_id_products_idx` (`id_product`),
  KEY `fk_spg_id_image_idx` (`id_galary`),
  CONSTRAINT `fk_spg_id_galary` FOREIGN KEY (`id_galary`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_spg_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `products_key_words`
--
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `products_key_words`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `id_key_word` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pkw_id_product_idx` (`id_product`),
  KEY `fk_pkw_id_key_word_idx` (`id_key_word`),
  CONSTRAINT `fk_pkw_id_key_word` FOREIGN KEY (`id_key_word`) REFERENCES `key_words` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pkw_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `sessions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `sess_data` text NOT NULL,
  `date_touched` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `session_id_UNIQUE` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;



/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-23 13:47:25
