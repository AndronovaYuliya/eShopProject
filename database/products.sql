--
-- Table structure for table `products`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `products`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT 1,
  `id_category` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sp_id_categories_idx` (`id_category`),
  CONSTRAINT `fk_sp_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;
