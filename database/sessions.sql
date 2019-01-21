/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `sessions` (
  `idsessions` varchar(255) NOT NULL,
  `date_touched` date DEFAULT NULL,
  `sess_data` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsessions`),
  UNIQUE KEY `idsessions_UNIQUE` (`idsessions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;