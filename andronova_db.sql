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

DROP TABLE IF EXISTS `additionals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additionals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sa_id_products_idx` (`id_product`),
  KEY `fk_sa_id_orders_idx` (`id_order`),
  CONSTRAINT `fk_sa_id_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sa_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additionals`
--

LOCK TABLES `additionals` WRITE;
/*!40000 ALTER TABLE `additionals` DISABLE KEYS */;
INSERT INTO `additionals` VALUES (1,2,1,3,1.810895008,'2019-01-19','2019-01-19'),(2,1,7,8,1,'2019-01-19','2019-01-19'),(3,1,8,4,79.88056574,'2019-01-19','2019-01-19'),(4,9,1,5,368144.747584,'2019-01-19','2019-01-19'),(5,8,2,4,11066.547482,'2019-01-19','2019-01-19'),(6,9,3,10,2.744036707,'2019-01-19','2019-01-19'),(7,5,2,9,10926.747,'2019-01-19','2019-01-19'),(8,1,6,6,7392.038,'2019-01-19','2019-01-19'),(9,6,2,1,214011565.7,'2019-01-19','2019-01-19'),(10,9,7,2,9000.022864527,'2019-01-19','2019-01-19'),(11,20,10,6,14.1,'2019-01-19','2019-01-19'),(12,8,2,1,0.732995703,'2019-01-19','2019-01-19'),(13,10,20,4,1111.73394,'2019-01-19','2019-01-19'),(14,2,7,10,150884.414,'2019-01-19','2019-01-19'),(15,1,12,1,20.5921185,'2019-01-19','2019-01-19'),(16,7,18,3,72.65,'2019-01-19','2019-01-19'),(17,7,6,5,14.7,'2019-01-19','2019-01-19'),(18,17,20,8,181393.7468759,'2019-01-19','2019-01-19'),(19,5,11,6,165850.71693864,'2019-01-19','2019-01-19'),(20,19,8,2,29354.9448,'2019-01-19','2019-01-19');
/*!40000 ALTER TABLE `additionals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (1,'rerum','2019-01-19','2019-01-19'),(2,'incidunt','2019-01-19','2019-01-19'),(3,'dignissimos','2019-01-19','2019-01-19'),(4,'qui','2019-01-19','2019-01-19'),(5,'sed','2019-01-19','2019-01-19'),(6,'culpa','2019-01-19','2019-01-19'),(7,'vel','2019-01-19','2019-01-19'),(8,'quae','2019-01-19','2019-01-19'),(9,'in','2019-01-19','2019-01-19'),(10,'vero','2019-01-19','2019-01-19'),(11,'aut','2019-01-19','2019-01-19'),(12,'aut','2019-01-19','2019-01-19'),(13,'saepe','2019-01-19','2019-01-19'),(14,'velit','2019-01-19','2019-01-19'),(15,'inventore','2019-01-19','2019-01-19'),(16,'ut','2019-01-19','2019-01-19'),(17,'quod','2019-01-19','2019-01-19'),(18,'aut','2019-01-19','2019-01-19'),(19,'placeat','2019-01-19','2019-01-19'),(20,'tenetur','2019-01-19','2019-01-19');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes_values`
--

DROP TABLE IF EXISTS `attributes_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(45) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `attributes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_av_id_attribute_idx` (`attributes_id`),
  CONSTRAINT `fk_av_id_attribute` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes_values`
--

LOCK TABLES `attributes_values` WRITE;
/*!40000 ALTER TABLE `attributes_values` DISABLE KEYS */;
INSERT INTO `attributes_values` VALUES (1,'accusamus','2019-01-19','2019-01-19',3),(2,'nam','2019-01-19','2019-01-19',9),(3,'iusto','2019-01-19','2019-01-19',5),(4,'laborum','2019-01-19','2019-01-19',3),(5,'ut','2019-01-19','2019-01-19',2),(6,'omnis','2019-01-19','2019-01-19',8),(7,'autem','2019-01-19','2019-01-19',4),(8,'dolorum','2019-01-19','2019-01-19',9),(9,'natus','2019-01-19','2019-01-19',4),(10,'adipisci','2019-01-19','2019-01-19',7),(11,'at','2019-01-19','2019-01-19',3),(12,'vero','2019-01-19','2019-01-19',16),(13,'enim','2019-01-19','2019-01-19',19),(14,'impedit','2019-01-19','2019-01-19',18),(15,'ut','2019-01-19','2019-01-19',11),(16,'nostrum','2019-01-19','2019-01-19',16),(17,'ut','2019-01-19','2019-01-19',17),(18,'sint','2019-01-19','2019-01-19',11),(19,'mollitia','2019-01-19','2019-01-19',16),(20,'quam','2019-01-19','2019-01-19',7);
/*!40000 ALTER TABLE `attributes_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sc_parent_id_idx` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'suscipit','Qui dolorum temporibus in animi exercitationem sint. Exercitationem quibusdam aspernatur cumque modi doloremque. Sint corrupti temporibus nulla sequi saepe modi qui.',NULL,1,NULL,'87844cad5ff870779edec64e413dac28','2019-01-19','2019-01-19'),(2,'dolorem','Occaecati ex ullam voluptatem optio autem sed. Blanditiis nihil est aliquid rerum. Id voluptate vel eius ea deleniti. Et ratione fuga voluptate laboriosam non.',NULL,1,NULL,'7dc8c0b61ec298285f04023e8372058b','2019-01-19','2019-01-19'),(3,'qui','Autem quas tempora sit odit aut veritatis. Porro maxime ut nostrum dolorem. Saepe sunt eveniet itaque voluptatem. Rerum itaque doloribus soluta quae animi dolores.',NULL,1,NULL,'4710b94466130e705069bbaba324334b','2019-01-19','2019-01-19'),(4,'enim','Excepturi molestias fuga excepturi. Ut corrupti ex sequi non in et. Rem molestias voluptatem ipsa sed sint neque quae. Corrupti est in illum.',NULL,1,NULL,'cfac76432ad695ed79083a967c958070','2019-01-19','2019-01-19'),(5,'tempore','Tempora sapiente vero vitae atque occaecati minima illum. Sequi dolor adipisci id voluptas est molestias. Asperiores veritatis eaque quae deleniti porro ut sint.',NULL,1,NULL,'1a827ed2e7661c8c1bac56d2022f3ee5','2019-01-19','2019-01-19'),(6,'autem','Provident corporis explicabo similique itaque voluptas. Fugit ullam non fugit ratione et delectus deleniti dolor. Et iusto qui esse nulla aut.',NULL,1,NULL,'6cc9beb08b44ec6d5303da9e7092a322','2019-01-19','2019-01-19'),(7,'tenetur','Deserunt maxime eaque vel assumenda ipsum ut facilis. Accusamus magnam officiis quia voluptates voluptatem et. Debitis porro tempora et nostrum voluptatum sed.',NULL,1,NULL,'45bbf7f0b304fc94418239d685b1db10','2019-01-19','2019-01-19'),(8,'ipsam','Quas voluptatem cumque officia facere. Magnam corrupti eius laudantium voluptates recusandae sunt. Vitae dolores voluptas qui tempora totam voluptatem nulla. At cumque itaque sequi iste ut.',NULL,1,NULL,'bdc8acb7966bd05643e43915ae531308','2019-01-19','2019-01-19'),(9,'enim','Qui rem laudantium voluptatem atque voluptatem. Omnis sequi minima consequatur et autem. Aliquam sapiente ut ut quidem accusantium laboriosam doloremque sint. Sit id ratione sunt cum.',NULL,1,NULL,'40853549ef47ae54715963d6e3777a58','2019-01-19','2019-01-19'),(10,'quo','Nulla et voluptas perspiciatis sit esse et. Repudiandae temporibus ut neque qui aliquam soluta aspernatur. Ullam consequuntur quia ut. Tempora ea placeat suscipit.',NULL,1,NULL,'2bedd9a4457573d6521351b107a3b954','2019-01-19','2019-01-19'),(11,'numquam','Dolores nam qui beatae assumenda in amet. Sint quam aut nam sit ex doloribus molestiae. Corporis laborum est suscipit iusto. Natus commodi nisi sapiente id reiciendis delectus.',NULL,1,NULL,'49430cc12157ee2c15779d8390a2567d','2019-01-19','2019-01-19'),(12,'odio','Quia cupiditate neque inventore officiis. Cum eaque natus odio molestias in. Veniam non in et. Hic aut explicabo optio delectus.',NULL,1,NULL,'d9b7d11975419dd42449b9f44bd8364b','2019-01-19','2019-01-19'),(13,'aut','Eos voluptatem mollitia ut aut. Voluptas qui iusto dolorum illum. Earum qui eligendi vitae quas aut rerum. Architecto et assumenda placeat eveniet saepe. Sequi quia error odit et cum aspernatur qui.',NULL,1,NULL,'bab38221b8fc76aa19336f93f83b10e8','2019-01-19','2019-01-19'),(14,'aut','Quae quisquam voluptas laudantium quam enim adipisci. Non consequatur est consectetur exercitationem placeat. Et ab rerum fugit veniam. Quae earum dolorum aut ullam.',NULL,1,NULL,'ac82519c1c28c6ace5a7a3981de09872','2019-01-19','2019-01-19'),(15,'amet','Maiores sit et officiis tempore enim id similique. Eum sequi cum et reprehenderit sed occaecati architecto. Maiores repudiandae inventore facere dolor rem iste. Maiores est asperiores qui.',NULL,1,NULL,'ed2bbf2ac1c6fdf08f8317a68f1c9f7a','2019-01-19','2019-01-19'),(16,'occaecati','Culpa omnis ducimus officiis. Ut quibusdam architecto aut earum est perspiciatis voluptas.',NULL,1,NULL,'60aaa0f553a16fafeba71a6bebb2fcaf','2019-01-19','2019-01-19'),(17,'omnis','Et voluptatem omnis assumenda. Omnis nobis voluptatibus voluptatibus est. Esse qui non id omnis et commodi qui. Nisi eum doloribus mollitia porro sequi.',NULL,1,NULL,'b4bd7d44c0a2343b08580c313455cc08','2019-01-19','2019-01-19'),(18,'tempora','Et eligendi aliquam iste doloremque et. Qui magni rerum aliquid tempore laborum. Eius corporis ipsam est corporis voluptate aliquid. Distinctio suscipit mollitia accusantium blanditiis dolor ut.',NULL,1,NULL,'3f87a58cc88b789691400bef990b9e5a','2019-01-19','2019-01-19'),(19,'quis','Sit eos est qui laboriosam autem quae. Inventore aut voluptatem ut consequatur quia aliquid qui.',NULL,1,NULL,'675562e56c0d412b0418cfd15df0dd01','2019-01-19','2019-01-19'),(20,'sit','Facilis nesciunt sed occaecati repellendus quo. Sed odit est laboriosam labore tempora. Illo ut eveniet et vel saepe. Occaecati unde nobis tempora accusantium dolor iusto laboriosam ut.',NULL,1,NULL,'4724c1e4cb6368e33c65279ab79172ba','2019-01-19','2019-01-19');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_attributes`
--

DROP TABLE IF EXISTS `categories_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `id_attribute` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shop_categories_attributes_1_idx` (`id_category`),
  KEY `fk_sca_id_attributes_idx` (`id_attribute`),
  CONSTRAINT `fk_sca_id_attribute` FOREIGN KEY (`id_attribute`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sca_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_attributes`
--

LOCK TABLES `categories_attributes` WRITE;
/*!40000 ALTER TABLE `categories_attributes` DISABLE KEYS */;
INSERT INTO `categories_attributes` VALUES (1,5,4,'2019-01-19','2019-01-19'),(2,4,5,'2019-01-19','2019-01-19'),(3,3,10,'2019-01-19','2019-01-19'),(4,5,9,'2019-01-19','2019-01-19'),(5,1,6,'2019-01-19','2019-01-19'),(6,1,7,'2019-01-19','2019-01-19'),(7,10,8,'2019-01-19','2019-01-19'),(8,4,4,'2019-01-19','2019-01-19'),(9,2,1,'2019-01-19','2019-01-19'),(10,5,7,'2019-01-19','2019-01-19'),(11,6,8,'2019-01-19','2019-01-19'),(12,1,6,'2019-01-19','2019-01-19'),(13,5,10,'2019-01-19','2019-01-19'),(14,2,2,'2019-01-19','2019-01-19'),(15,5,12,'2019-01-19','2019-01-19'),(16,3,2,'2019-01-19','2019-01-19'),(17,2,1,'2019-01-19','2019-01-19'),(18,10,10,'2019-01-19','2019-01-19'),(19,4,13,'2019-01-19','2019-01-19'),(20,2,3,'2019-01-19','2019-01-19');
/*!40000 ALTER TABLE `categories_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'flossie45','schneider.antonina','1111','jcremin@roob.com','(245) 362-3319 x4231','Port','Suite 165','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(2,'qbayer','wsenger','1111','madilyn.okeefe@nikolaus.com','(305) 778-4942 x416','North','Suite 891','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(3,'gerson02','maegan69','1111','maybell99@gusikowski.com','667-744-3191 x44618','North','Apt. 613','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(4,'yspencer','fisher.adonis','1111','jacynthe14@hotmail.com','1-212-627-8005','North','Suite 933','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(5,'elva54','darwin48','1111','xblick@gmail.com','(843) 275-2949 x87866','Lake','Apt. 151','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(6,'raul73','alysha36','1111','ylang@harber.com','997.761.2463','West','Suite 839','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(7,'ajohns','fadel.abigale','1111','leatha.torp@howell.com','(359) 629-4192','South','Suite 789','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(8,'ckling','marcia.mccullough','1111','turcotte.billie@gmail.com','+14099853224','Port','Suite 400','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(9,'erohan','gpouros','1111','burdette.oreilly@koelpin.com','503.362.1859','South','Suite 807','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(10,'walter.domenica','sylvia.fisher','1111','erling30@beier.com','(318) 771-6424 x267','Lake','Suite 289','2019-01-19 17:26:48','2019-01-19','2019-01-19'),(11,'chase38','mozelle33','1111','hand.torrance@hotmail.com','1-790-713-8651','East','Apt. 460','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(12,'katelyn.larson','stamm.mariano','1111','jairo81@boyer.com','+17702846249','Port','Apt. 684','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(13,'conroy.osborne','crona.sebastian','1111','vquigley@herzog.net','1-816-757-2602 x8885','South','Apt. 822','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(14,'oberbrunner.gunner','wkuphal','1111','walter.dorian@gmail.com','+1-708-605-1192','Lake','Suite 329','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(15,'arvel.rogahn','mmedhurst','1111','myra02@gmail.com','513-564-5481','North','Suite 339','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(16,'ruecker.nicholas','breanna.kunze','1111','bartoletti.celia@yahoo.com','+1-721-335-6803','South','Suite 998','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(17,'dcasper','lkoelpin','1111','cdouglas@hotmail.com','923-526-9989','North','Apt. 512','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(18,'ikuvalis','waldo.herzog','1111','heller.charity@fadel.com','+1.545.478.5364','North','Suite 836','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(19,'mitchell.raven','jason44','1111','okeefe.elta@rau.com','693.598.3342 x29684','North','Apt. 208','2019-01-19 17:26:50','2019-01-19','2019-01-19'),(20,'aufderhar.jakob','zella.yost','1111','kathryne.ryan@yahoo.com','561.545.8493','North','Apt. 850','2019-01-19 17:26:50','2019-01-19','2019-01-19');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Quia autem in nostrum tempora culpa. Illum voluptatem et deleniti. Numquam repellat nihil sit unde. Recusandae pariatur reprehenderit unde voluptatem.','commodi',1,'1','2019-01-19','2019-01-19 17:26:49'),(2,'Quidem quam fugit id consectetur vero aspernatur incidunt. Maxime omnis quam hic et et. Atque vel at modi aliquid aut qui.','debitis',9,'5','2019-01-19','2019-01-19 17:26:49'),(3,'Ea beatae incidunt totam atque sunt saepe placeat. Occaecati officiis aut odit ea. Alias facere adipisci id dolor tempora voluptatum enim quo.','impedit',4,'1','2019-01-19','2019-01-19 17:26:49'),(4,'Beatae eveniet molestias dolore dolores ipsam. Cupiditate aliquid amet quia soluta. Fugiat laborum ex nihil illo dolores. Libero nesciunt natus neque dicta minus porro voluptatem.','unde',10,'3','2019-01-19','2019-01-19 17:26:49'),(5,'Velit et similique culpa. Omnis fugiat sit mollitia eos molestiae. Animi illo repudiandae deserunt ea. Dolor optio consequatur quae id consequatur.','consequatur',3,'4','2019-01-19','2019-01-19 17:26:49'),(6,'Et voluptatibus sed aut sequi eum. Vitae ut distinctio eligendi aut velit cumque nulla. Molestias ex reiciendis quod eius sunt.','quas',3,'3','2019-01-19','2019-01-19 17:26:49'),(7,'Recusandae veritatis hic mollitia autem dolore. Voluptatem vero est sint reiciendis. Quod at non officiis repellendus adipisci. Necessitatibus error impedit exercitationem natus enim vero in.','vitae',9,'2','2019-01-19','2019-01-19 17:26:49'),(8,'Qui blanditiis atque at voluptas. Perspiciatis est officia sit natus. Eaque voluptatem et pariatur et.','quidem',9,'4','2019-01-19','2019-01-19 17:26:49'),(9,'Sapiente temporibus deserunt saepe eos et qui qui. Ea dolores architecto labore deserunt et et distinctio. Fugiat perferendis provident impedit quidem. Vero expedita ducimus quia voluptas.','eaque',2,'3','2019-01-19','2019-01-19 17:26:49'),(10,'Numquam alias odit officia mollitia deserunt similique rerum. Voluptatibus consequatur et ut qui totam. Odit et enim nesciunt ipsum.','iure',10,'3','2019-01-19','2019-01-19 17:26:49'),(11,'Ut nesciunt atque harum tempore. Consequatur consequatur aut error enim enim qui. At est iste qui cum et.','sint',1,'4','2019-01-19','2019-01-19 17:26:50'),(12,'Excepturi sunt voluptate consequatur quis quasi est. Architecto quidem provident et est et. Sit soluta amet quo amet nemo labore enim. Aspernatur voluptatem hic dolores enim ducimus.','odio',17,'1','2019-01-19','2019-01-19 17:26:50'),(13,'Et non quisquam voluptatem nihil ut dolorem illo. Optio consectetur ipsum ipsam. Est voluptatibus et aut maiores quia aut dignissimos.','velit',14,'1','2019-01-19','2019-01-19 17:26:50'),(14,'Eveniet perferendis modi qui libero et. Voluptas labore asperiores nobis rerum ab. Et libero sit incidunt enim deleniti velit.','quia',9,'4','2019-01-19','2019-01-19 17:26:50'),(15,'Ut nihil et non perferendis. Molestias enim iure et esse modi. Rerum non aut libero ipsum occaecati. Sit ipsa neque quaerat dicta consectetur vitae delectus.','officia',8,'1','2019-01-19','2019-01-19 17:26:50'),(16,'Et hic assumenda sed et. Beatae eligendi aut non et et a. Sed dolorem excepturi veritatis consequatur voluptas distinctio rem.','necessitatibus',11,'2','2019-01-19','2019-01-19 17:26:50'),(17,'Distinctio et debitis amet. Laudantium aut dolorem quasi animi consectetur.','sed',5,'1','2019-01-19','2019-01-19 17:26:50'),(18,'Totam tenetur mollitia qui sed iste aspernatur quas. Praesentium fugiat rerum provident et. Enim porro magni culpa quis doloremque. Beatae perspiciatis fugit doloribus ab dolor in.','voluptatem',14,'5','2019-01-19','2019-01-19 17:26:50'),(19,'Aut dolorem qui rerum provident temporibus. Necessitatibus tempora suscipit delectus ut autem eius consequatur rerum. Aut cumque rem et cupiditate eos provident autem.','nesciunt',17,'4','2019-01-19','2019-01-19 17:26:50'),(20,'Minima aut impedit pariatur sed ut totam provident rerum. Voluptatem quis quasi et accusamus.','et',16,'2','2019-01-19','2019-01-19 17:26:50');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'https://lorempixel.com/480/640/technics/?71877','2019-01-19','2019-01-19 17:26:49'),(2,'https://lorempixel.com/480/640/technics/?61260','2019-01-19','2019-01-19 17:26:49'),(3,'https://lorempixel.com/480/640/technics/?50645','2019-01-19','2019-01-19 17:26:49'),(4,'https://lorempixel.com/480/640/technics/?59296','2019-01-19','2019-01-19 17:26:49'),(5,'https://lorempixel.com/480/640/technics/?18777','2019-01-19','2019-01-19 17:26:49'),(6,'https://lorempixel.com/480/640/technics/?13525','2019-01-19','2019-01-19 17:26:49'),(7,'https://lorempixel.com/480/640/technics/?42299','2019-01-19','2019-01-19 17:26:49'),(8,'https://lorempixel.com/480/640/technics/?90709','2019-01-19','2019-01-19 17:26:49'),(9,'https://lorempixel.com/480/640/technics/?32339','2019-01-19','2019-01-19 17:26:49'),(10,'https://lorempixel.com/480/640/technics/?90238','2019-01-19','2019-01-19 17:26:49'),(11,'https://lorempixel.com/480/640/technics/?61217','2019-01-19','2019-01-19 17:26:49'),(12,'https://lorempixel.com/480/640/technics/?67138','2019-01-19','2019-01-19 17:26:49'),(13,'https://lorempixel.com/480/640/technics/?42691','2019-01-19','2019-01-19 17:26:49'),(14,'https://lorempixel.com/480/640/technics/?82020','2019-01-19','2019-01-19 17:26:49'),(15,'https://lorempixel.com/480/640/technics/?44976','2019-01-19','2019-01-19 17:26:49'),(16,'https://lorempixel.com/480/640/technics/?53146','2019-01-19','2019-01-19 17:26:49'),(17,'https://lorempixel.com/480/640/technics/?45429','2019-01-19','2019-01-19 17:26:49'),(18,'https://lorempixel.com/480/640/technics/?19885','2019-01-19','2019-01-19 17:26:49'),(19,'https://lorempixel.com/480/640/technics/?85933','2019-01-19','2019-01-19 17:26:49'),(20,'https://lorempixel.com/480/640/technics/?69940','2019-01-19','2019-01-19 17:26:49'),(21,'https://lorempixel.com/480/640/technics/?77763','2019-01-19','2019-01-19 17:26:50'),(22,'https://lorempixel.com/480/640/technics/?30279','2019-01-19','2019-01-19 17:26:50'),(23,'https://lorempixel.com/480/640/technics/?35207','2019-01-19','2019-01-19 17:26:50'),(24,'https://lorempixel.com/480/640/technics/?70818','2019-01-19','2019-01-19 17:26:50'),(25,'https://lorempixel.com/480/640/technics/?23817','2019-01-19','2019-01-19 17:26:50'),(26,'https://lorempixel.com/480/640/technics/?15142','2019-01-19','2019-01-19 17:26:50'),(27,'https://lorempixel.com/480/640/technics/?44271','2019-01-19','2019-01-19 17:26:50'),(28,'https://lorempixel.com/480/640/technics/?72146','2019-01-19','2019-01-19 17:26:50'),(29,'https://lorempixel.com/480/640/technics/?83446','2019-01-19','2019-01-19 17:26:50'),(30,'https://lorempixel.com/480/640/technics/?81661','2019-01-19','2019-01-19 17:26:50'),(31,'https://lorempixel.com/480/640/technics/?94552','2019-01-19','2019-01-19 17:26:50'),(32,'https://lorempixel.com/480/640/technics/?87328','2019-01-19','2019-01-19 17:26:50'),(33,'https://lorempixel.com/480/640/technics/?79356','2019-01-19','2019-01-19 17:26:50'),(34,'https://lorempixel.com/480/640/technics/?69078','2019-01-19','2019-01-19 17:26:50'),(35,'https://lorempixel.com/480/640/technics/?61983','2019-01-19','2019-01-19 17:26:50'),(36,'https://lorempixel.com/480/640/technics/?18774','2019-01-19','2019-01-19 17:26:50'),(37,'https://lorempixel.com/480/640/technics/?75400','2019-01-19','2019-01-19 17:26:50'),(38,'https://lorempixel.com/480/640/technics/?66162','2019-01-19','2019-01-19 17:26:50'),(39,'https://lorempixel.com/480/640/technics/?49206','2019-01-19','2019-01-19 17:26:50'),(40,'https://lorempixel.com/480/640/technics/?30038','2019-01-19','2019-01-19 17:26:50');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `key_words`
--

DROP TABLE IF EXISTS `key_words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `key_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_words`
--

LOCK TABLES `key_words` WRITE;
/*!40000 ALTER TABLE `key_words` DISABLE KEYS */;
INSERT INTO `key_words` VALUES (1,'et','2019-01-19','2019-01-19 17:26:48'),(2,'ut','2019-01-19','2019-01-19 17:26:48'),(3,'deserunt','2019-01-19','2019-01-19 17:26:48'),(4,'corporis','2019-01-19','2019-01-19 17:26:48'),(5,'odio','2019-01-19','2019-01-19 17:26:48'),(6,'qui','2019-01-19','2019-01-19 17:26:48'),(7,'voluptas','2019-01-19','2019-01-19 17:26:48'),(8,'similique','2019-01-19','2019-01-19 17:26:48'),(9,'quibusdam','2019-01-19','2019-01-19 17:26:48'),(10,'atque','2019-01-19','2019-01-19 17:26:48'),(11,'ex','2019-01-19','2019-01-19 17:26:48'),(12,'qui','2019-01-19','2019-01-19 17:26:48'),(13,'veritatis','2019-01-19','2019-01-19 17:26:48'),(14,'ea','2019-01-19','2019-01-19 17:26:48'),(15,'sapiente','2019-01-19','2019-01-19 17:26:48'),(16,'amet','2019-01-19','2019-01-19 17:26:48'),(17,'voluptas','2019-01-19','2019-01-19 17:26:48'),(18,'qui','2019-01-19','2019-01-19 17:26:48'),(19,'et','2019-01-19','2019-01-19 17:26:48'),(20,'dolorem','2019-01-19','2019-01-19 17:26:48'),(21,'error','2019-01-19','2019-01-19 17:26:50'),(22,'consequatur','2019-01-19','2019-01-19 17:26:50'),(23,'autem','2019-01-19','2019-01-19 17:26:50'),(24,'consequuntur','2019-01-19','2019-01-19 17:26:50'),(25,'veniam','2019-01-19','2019-01-19 17:26:50'),(26,'cumque','2019-01-19','2019-01-19 17:26:50'),(27,'inventore','2019-01-19','2019-01-19 17:26:50'),(28,'sint','2019-01-19','2019-01-19 17:26:50'),(29,'blanditiis','2019-01-19','2019-01-19 17:26:50'),(30,'doloribus','2019-01-19','2019-01-19 17:26:50'),(31,'in','2019-01-19','2019-01-19 17:26:50'),(32,'necessitatibus','2019-01-19','2019-01-19 17:26:50'),(33,'libero','2019-01-19','2019-01-19 17:26:50'),(34,'atque','2019-01-19','2019-01-19 17:26:50'),(35,'voluptas','2019-01-19','2019-01-19 17:26:50'),(36,'assumenda','2019-01-19','2019-01-19 17:26:50'),(37,'et','2019-01-19','2019-01-19 17:26:50'),(38,'quas','2019-01-19','2019-01-19 17:26:50'),(39,'quia','2019-01-19','2019-01-19 17:26:50'),(40,'porro','2019-01-19','2019-01-19 17:26:50');
/*!40000 ALTER TABLE `key_words` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `sum` double DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `ttn` varchar(45) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_so_id_clients_idx` (`id_client`),
  CONSTRAINT `fk_so_id_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'2019-01-19',5,'','1',5,'2019-01-19','2019-01-19 17:26:49'),(2,'2019-01-19',0,'','4',6,'2019-01-19','2019-01-19 17:26:49'),(3,'2019-01-19',6,'','8',10,'2019-01-19','2019-01-19 17:26:49'),(4,'2019-01-19',1,'','4',6,'2019-01-19','2019-01-19 17:26:49'),(5,'2019-01-19',3,'1','1',10,'2019-01-19','2019-01-19 17:26:49'),(6,'2019-01-19',9,'','4',5,'2019-01-19','2019-01-19 17:26:49'),(7,'2019-01-19',3,'','7',6,'2019-01-19','2019-01-19 17:26:49'),(8,'2019-01-19',6,'1','7',6,'2019-01-19','2019-01-19 17:26:49'),(9,'2019-01-19',9,'','1',3,'2019-01-19','2019-01-19 17:26:49'),(10,'2019-01-19',9,'','3',8,'2019-01-19','2019-01-19 17:26:49'),(11,'2019-01-19',3,'','7',5,'2019-01-19','2019-01-19 17:26:50'),(12,'2019-01-19',9,'','6',10,'2019-01-19','2019-01-19 17:26:50'),(13,'2019-01-19',1,'1','0',9,'2019-01-19','2019-01-19 17:26:50'),(14,'2019-01-19',7,'','9',4,'2019-01-19','2019-01-19 17:26:50'),(15,'2019-01-19',8,'','0',1,'2019-01-19','2019-01-19 17:26:50'),(16,'2019-01-19',1,'','6',5,'2019-01-19','2019-01-19 17:26:50'),(17,'2019-01-19',0,'','4',2,'2019-01-19','2019-01-19 17:26:50'),(18,'2019-01-19',7,'1','3',3,'2019-01-19','2019-01-19 17:26:50'),(19,'2019-01-19',9,'','8',2,'2019-01-19','2019-01-19 17:26:50'),(20,'2019-01-19',9,'','5',10,'2019-01-19','2019-01-19 17:26:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `brand` varchar(45) NOT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '1',
  `id_category` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sp_id_categories_idx` (`id_category`),
  CONSTRAINT `fk_sp_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'delectus','itaque','Iure sint possimus architecto tempore. Dolorem corporis ad totam sapiente harum libero. Officia sequi qui et sunt. Optio unde enim sint sit natus distinctio.',6,'9f780cd9e9de603721f9ae5be9a627fb',5,4,'2019-01-19','2019-01-19 17:26:49'),(2,'quia','qui','Autem dolorem cum maxime mollitia consectetur. Ipsa dolorum exercitationem optio autem ipsam. Non est id iusto quidem repellat quae.',2,'2f3d1a181f1d8319ad839dfb454f8328',7,1,'2019-01-19','2019-01-19 17:26:49'),(3,'quod','voluptas','Voluptas aut assumenda harum et ab magnam alias. Mollitia pariatur mollitia nobis illo unde quis.',3,'87cb144ce9169071776dd3675b6081e9',2,7,'2019-01-19','2019-01-19 17:26:49'),(4,'quam','aperiam','Sint perferendis rem perspiciatis beatae exercitationem. Ut et est et qui et. Et et ab quasi quidem fuga qui ab. Dolorem alias possimus id voluptatem delectus numquam officia.',5,'3283ac15d1c11b91df197d4e3172013c',9,3,'2019-01-19','2019-01-19 17:26:49'),(5,'tempora','architecto','Praesentium et commodi in illo. Tempore ipsam consequatur et. Voluptatum eum voluptatem tempore eius. Ut accusantium eius voluptatem culpa vitae et.',5,'198f6dae96b46c693be3e1da7df6d6d6',1,8,'2019-01-19','2019-01-19 17:26:49'),(6,'voluptatem','accusamus','Corporis repellat facere eum. Neque est illum quidem quos explicabo. Mollitia similique dolores et ullam. Rerum autem sit recusandae ut velit quaerat.',2,'d1430d9bcdc7e4022eb7552d976619dd',6,4,'2019-01-19','2019-01-19 17:26:49'),(7,'blanditiis','repellat','Numquam nihil perspiciatis suscipit ratione. Nam ratione quis voluptas similique consequatur labore. Explicabo voluptatem qui nemo aut. Sunt dolores et alias dolorem.',1,'dda83b443f96ef5ffbeb93cd725d45bb',2,8,'2019-01-19','2019-01-19 17:26:49'),(8,'qui','enim','Animi cum est et nisi minima ut consequatur. Illo harum nihil praesentium aliquid. Et commodi quisquam iure quasi. Quisquam quas facilis adipisci nemo nihil placeat dolorum.',1,'176aef8a460909f23d4e2ca58b7e9ab0',8,6,'2019-01-19','2019-01-19 17:26:49'),(9,'sequi','molestiae','Vero officia quam laborum quisquam mollitia aut ducimus. Magni et laudantium cum qui. Velit voluptate suscipit optio beatae voluptas. Ut dolorem sed earum ipsa. Nisi soluta et delectus nemo.',3,'1c76693c03236f3fc13321f0dfa4722a',7,4,'2019-01-19','2019-01-19 17:26:49'),(10,'eveniet','quaerat','Voluptas ipsum qui qui nulla. Incidunt corporis et temporibus et. At molestiae nihil earum ut voluptate vel. Doloribus quaerat maxime et totam cum velit dolor.',5,'5380c2b3426dd9a5fb4a93d8ced3aaee',2,7,'2019-01-19','2019-01-19 17:26:49'),(11,'a','aspernatur','Eveniet ullam ex qui vel. Magni debitis quis fugit sit similique iure adipisci. Porro ipsa doloribus et in doloremque. Aliquam facere et qui dignissimos quia consequatur exercitationem.',1,'d83568e083e1699f695ecb0536d45e13',8,8,'2019-01-19','2019-01-19 17:26:50'),(12,'enim','ut','Vero suscipit provident et non qui. Non ut unde voluptas et officia et quos dicta. Dicta eum impedit doloremque incidunt maxime. Dolores accusamus necessitatibus ipsum esse magni voluptatem.',7,'bfc9d34c3a32dbc32ee86fe210a54a7c',3,3,'2019-01-19','2019-01-19 17:26:50'),(13,'assumenda','blanditiis','Accusamus veritatis esse quia sit et voluptatum quidem. Earum odio et amet excepturi distinctio. Pariatur dolore vitae sit magni quis animi necessitatibus.',4,'8276e487778ad609b73a97bfd681d241',8,6,'2019-01-19','2019-01-19 17:26:50'),(14,'dolore','vel','Est ipsa repellat odit esse nisi velit est eum. Omnis et et provident deleniti numquam. Tempore reiciendis et ducimus provident placeat.',1,'edf9411dfbbbeb46669687ba29e8df04',6,6,'2019-01-19','2019-01-19 17:26:50'),(15,'est','in','Nemo maiores pariatur laboriosam ipsa. Et harum voluptates voluptatem pariatur recusandae recusandae sint sapiente.',0,'034167393a3c8612576f7b88d23cf93a',3,8,'2019-01-19','2019-01-19 17:26:50'),(16,'at','itaque','Nulla perspiciatis voluptas tempore quis eaque minima in. Odit incidunt doloremque omnis perspiciatis aut. Illum magnam exercitationem quasi sit sed sit. Qui possimus iste dignissimos dolorem.',2,'8613a5cc84f778cf0a54f9314180dbef',5,5,'2019-01-19','2019-01-19 17:26:50'),(17,'illo','consequatur','Veritatis dignissimos accusantium veniam. Assumenda beatae modi vel fugiat. Assumenda saepe totam atque provident.',0,'729f0d847121e72d7f35c7a8e7485f8b',1,9,'2019-01-19','2019-01-19 17:26:50'),(18,'nulla','ducimus','Doloribus ipsa mollitia dignissimos rerum aut aut culpa. Ut maxime sit et ipsa facilis ut aspernatur. Eveniet similique consequatur repellat qui ab ut.',0,'aa854f5dce923bf9b122142bd045d36d',3,3,'2019-01-19','2019-01-19 17:26:50'),(19,'quasi','sit','Optio aut vero explicabo perferendis. Dolorem minus at quisquam fugiat tempore reiciendis delectus. Voluptas aut omnis odio suscipit omnis quod qui similique.',2,'09e181c7ad6c6fdaa2a4bfb614128e20',0,9,'2019-01-19','2019-01-19 17:26:50'),(20,'voluptas','doloribus','Incidunt dolores ut dicta et. Cupiditate cupiditate sunt sit repellendus quia alias. Consectetur repellendus sit voluptatem a sed.',1,'06fc26c0f7e7c9ea4c1a4a3ada55e3e6',6,1,'2019-01-19','2019-01-19 17:26:50');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_galary` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_spg_id_products_idx` (`id_product`),
  KEY `fk_spg_id_image_idx` (`id_galary`),
  CONSTRAINT `fk_spg_id_galary` FOREIGN KEY (`id_galary`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_spg_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES (1,9,5,'2019-01-19','2019-01-19'),(2,7,8,'2019-01-19','2019-01-19'),(3,18,10,'2019-01-19','2019-01-19'),(4,7,7,'2019-01-19','2019-01-19'),(5,11,7,'2019-01-19','2019-01-19'),(6,16,9,'2019-01-19','2019-01-19'),(7,17,3,'2019-01-19','2019-01-19'),(8,9,2,'2019-01-19','2019-01-19'),(9,3,5,'2019-01-19','2019-01-19'),(10,8,3,'2019-01-19','2019-01-19'),(11,14,10,'2019-01-19','2019-01-19'),(12,6,1,'2019-01-19','2019-01-19'),(13,16,4,'2019-01-19','2019-01-19'),(14,16,9,'2019-01-19','2019-01-19'),(15,18,2,'2019-01-19','2019-01-19'),(16,15,5,'2019-01-19','2019-01-19'),(17,18,6,'2019-01-19','2019-01-19'),(18,2,3,'2019-01-19','2019-01-19'),(19,7,10,'2019-01-19','2019-01-19'),(20,17,9,'2019-01-19','2019-01-19'),(21,39,6,'2019-01-19','2019-01-19'),(22,31,5,'2019-01-19','2019-01-19'),(23,31,14,'2019-01-19','2019-01-19'),(24,29,14,'2019-01-19','2019-01-19'),(25,6,13,'2019-01-19','2019-01-19'),(26,35,6,'2019-01-19','2019-01-19'),(27,16,13,'2019-01-19','2019-01-19'),(28,35,17,'2019-01-19','2019-01-19'),(29,17,2,'2019-01-19','2019-01-19'),(30,7,17,'2019-01-19','2019-01-19'),(31,16,1,'2019-01-19','2019-01-19'),(32,22,5,'2019-01-19','2019-01-19'),(33,14,7,'2019-01-19','2019-01-19'),(34,29,16,'2019-01-19','2019-01-19'),(35,24,9,'2019-01-19','2019-01-19'),(36,26,4,'2019-01-19','2019-01-19'),(37,15,10,'2019-01-19','2019-01-19'),(38,13,14,'2019-01-19','2019-01-19'),(39,35,12,'2019-01-19','2019-01-19'),(40,28,20,'2019-01-19','2019-01-19');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_key_words`
--

DROP TABLE IF EXISTS `products_key_words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_key_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `id_key_word` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pkw_id_product_idx` (`id_product`),
  KEY `fk_pkw_id_key_word_idx` (`id_key_word`),
  CONSTRAINT `fk_pkw_id_key_word` FOREIGN KEY (`id_key_word`) REFERENCES `key_words` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pkw_id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_key_words`
--

LOCK TABLES `products_key_words` WRITE;
/*!40000 ALTER TABLE `products_key_words` DISABLE KEYS */;
INSERT INTO `products_key_words` VALUES (1,4,1,'2019-01-19','2019-01-19 17:26:49'),(2,2,1,'2019-01-19','2019-01-19 17:26:49'),(3,3,15,'2019-01-19','2019-01-19 17:26:49'),(4,2,16,'2019-01-19','2019-01-19 17:26:49'),(5,2,16,'2019-01-19','2019-01-19 17:26:49'),(6,2,18,'2019-01-19','2019-01-19 17:26:49'),(7,9,7,'2019-01-19','2019-01-19 17:26:49'),(8,4,2,'2019-01-19','2019-01-19 17:26:49'),(9,8,15,'2019-01-19','2019-01-19 17:26:49'),(10,10,18,'2019-01-19','2019-01-19 17:26:49'),(11,6,1,'2019-01-19','2019-01-19 17:26:49'),(12,1,12,'2019-01-19','2019-01-19 17:26:49'),(13,3,2,'2019-01-19','2019-01-19 17:26:49'),(14,7,12,'2019-01-19','2019-01-19 17:26:49'),(15,2,5,'2019-01-19','2019-01-19 17:26:49'),(16,7,20,'2019-01-19','2019-01-19 17:26:49'),(17,9,2,'2019-01-19','2019-01-19 17:26:49'),(18,5,1,'2019-01-19','2019-01-19 17:26:49'),(19,5,15,'2019-01-19','2019-01-19 17:26:49'),(20,10,16,'2019-01-19','2019-01-19 17:26:49'),(21,5,24,'2019-01-19','2019-01-19 17:26:51'),(22,18,40,'2019-01-19','2019-01-19 17:26:51'),(23,1,36,'2019-01-19','2019-01-19 17:26:51'),(24,8,24,'2019-01-19','2019-01-19 17:26:51'),(25,5,38,'2019-01-19','2019-01-19 17:26:51'),(26,10,13,'2019-01-19','2019-01-19 17:26:51'),(27,7,30,'2019-01-19','2019-01-19 17:26:51'),(28,4,18,'2019-01-19','2019-01-19 17:26:51'),(29,20,28,'2019-01-19','2019-01-19 17:26:51'),(30,4,40,'2019-01-19','2019-01-19 17:26:51'),(31,13,39,'2019-01-19','2019-01-19 17:26:51'),(32,8,11,'2019-01-19','2019-01-19 17:26:51'),(33,18,8,'2019-01-19','2019-01-19 17:26:51'),(34,20,35,'2019-01-19','2019-01-19 17:26:51'),(35,9,5,'2019-01-19','2019-01-19 17:26:51'),(36,8,39,'2019-01-19','2019-01-19 17:26:51'),(37,1,15,'2019-01-19','2019-01-19 17:26:51'),(38,6,39,'2019-01-19','2019-01-19 17:26:51'),(39,1,7,'2019-01-19','2019-01-19 17:26:51'),(40,16,29,'2019-01-19','2019-01-19 17:26:51');
/*!40000 ALTER TABLE `products_key_words` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `date_touched` date NOT NULL,
  `sess_data` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `session_id_UNIQUE` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'login2','$2y$10$5v1.FnUiIxutoiepatq3BO0wgiP9i/UxDV8GIgem4dMIjxWAI3hz6','andronovayuliyatest@gmail.com','First','Last','User','2019-01-19','2019-01-20 23:37:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-23 13:47:25
