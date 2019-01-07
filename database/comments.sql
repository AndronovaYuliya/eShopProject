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
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sc_id_products_id` (`id_product`),
  CONSTRAINT `fk_sc_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
