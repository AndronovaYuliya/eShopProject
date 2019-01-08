--
-- Table structure for table `categories_attributes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `categories_attributes`(
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_attribute` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shop_categories_attributes_1_idx` (`id_category`),
  KEY `fk_sca_id_attributes_idx` (`id_attribute`),
  CONSTRAINT `fk_sca_id_attribute` FOREIGN KEY (`id_attribute`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sca_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;
