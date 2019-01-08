--
-- Table structure for table `attributes_values`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `attributes_values`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `attributes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_av_id_attribute_idx` (`attributes_id`),
  CONSTRAINT `fk_av_id_attribute` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
/*!40101 SET character_set_client = @saved_cs_client */;