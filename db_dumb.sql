-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: rsautowerkplaats
-- ------------------------------------------------------
-- Server version	5.6.34

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
-- Table structure for table `rs_car`
--

DROP TABLE IF EXISTS `rs_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rs_car` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rs_car_carplate` varchar(6) NOT NULL,
  `rs_cust_id` int(100) NOT NULL,
  `rs_car_carmake` varchar(100) NOT NULL,
  `rs_car_carmodel` varchar(100) NOT NULL,
  `rs_car_carchas` varchar(100) NOT NULL,
  `rs_car_caryear` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rs_car_carplate` (`rs_car_carplate`),
  KEY `rs_cust_id` (`rs_cust_id`),
  CONSTRAINT `rs_car_ibfk_1` FOREIGN KEY (`rs_cust_id`) REFERENCES `rs_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rs_car`
--

LOCK TABLES `rs_car` WRITE;
/*!40000 ALTER TABLE `rs_car` DISABLE KEYS */;
INSERT INTO `rs_car` VALUES (80,'2332WP',126,'AMC','PRADO','DDD',2003),(84,'1232WP',130,'TOYOTA','CARINA','4E',1990),(85,'1121AA',131,'MITSUBISHI','L200','4E',2001),(86,'1222QP',132,'ISUZU','DMAX','HELLO',2001),(88,'3232WP',134,'TOYOTA','4RUNNER','4GB1',2004),(89,'3232QP',135,'TOYOTA','DMAX','4E',1998),(90,'2372WP',136,'MITSUBISHI','PRADO','DDD',2003),(91,'6735QP',137,'TOYOTA','4RUNNER','4E',2003),(92,'6735QL',138,'TOYOTA','4RUNNER','4E',2001),(93,'1212QQ',134,'TOYOTA','CARINA','4E',2001);
/*!40000 ALTER TABLE `rs_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rs_customer`
--

DROP TABLE IF EXISTS `rs_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rs_customer` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rs_cust_name` varchar(100) NOT NULL,
  `rs_cust_surname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rs_customer`
--

LOCK TABLES `rs_customer` WRITE;
/*!40000 ALTER TABLE `rs_customer` DISABLE KEYS */;
INSERT INTO `rs_customer` VALUES (126,'Shivan','Dassasigh'),(130,'Abdoel','Bombgobiend'),(131,'Shayant','Soebs'),(132,'Shayant','Sello'),(134,'Zoe','Jadi'),(135,'Viresh','Ramdin'),(136,'Ddd','Jadi'),(137,'Heyman','Faide'),(138,'Heyman','Fs');
/*!40000 ALTER TABLE `rs_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rs_service`
--

DROP TABLE IF EXISTS `rs_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rs_service` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rs_service` varchar(100) NOT NULL,
  `rs_custid` int(100) NOT NULL,
  `rs_userid` int(100) NOT NULL,
  `rs_carplate` varchar(100) NOT NULL,
  `rs_serviceinfo` text NOT NULL,
  `rs_towstatus` int(1) DEFAULT NULL,
  `rs_price` int(100) NOT NULL,
  `rs_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rs_custid` (`rs_custid`),
  KEY `rs_userid` (`rs_userid`),
  KEY `rs_carplate` (`rs_carplate`),
  KEY `rs_custid_2` (`rs_custid`),
  CONSTRAINT `rs_service_ibfk_1` FOREIGN KEY (`rs_carplate`) REFERENCES `rs_car` (`rs_car_carplate`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rs_service_ibfk_2` FOREIGN KEY (`rs_custid`) REFERENCES `rs_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rs_service_ibfk_3` FOREIGN KEY (`rs_userid`) REFERENCES `rs_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rs_service`
--

LOCK TABLES `rs_service` WRITE;
/*!40000 ALTER TABLE `rs_service` DISABLE KEYS */;
INSERT INTO `rs_service` VALUES (42,'reparatie',126,17,'2332WP','hallo\n',NULL,450,'2017-06-23'),(46,'service',130,17,'1232WP','Smeerolie',NULL,450,'2017-06-24'),(47,'sleepdienst',131,17,'1121AA','gugenheimerstraat',1,1250,'2017-06-24'),(48,'sleepdienst',132,17,'1222QP','Awarastraat',1,678,'2017-06-24'),(49,'service',134,17,'3232WP','Smeerolie Filter,Lucht Filter,ATF Filter',NULL,450,'2017-06-29'),(50,'reparatie',135,17,'3232QP','test',NULL,450,'2017-06-29'),(51,'reparatie',135,17,'3232QP','test',NULL,450,'2017-06-29'),(52,'reparatie',126,17,'2332WP','test',NULL,450,'2017-06-29'),(53,'reparatie',126,17,'2332WP','www',NULL,450,'2017-06-29'),(54,'reparatie',136,17,'2372WP','abdeol',NULL,450,'2017-06-29'),(55,'reparatie',137,17,'6735QP','test',NULL,450,'2017-06-29'),(56,'reparatie',138,17,'6735QL','faide',NULL,450,'2017-06-29'),(57,'service',134,17,'1212QQ','Smeerolie Filter,Lucht Filter',NULL,400,'2017-06-29');
/*!40000 ALTER TABLE `rs_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rs_user`
--

DROP TABLE IF EXISTS `rs_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rs_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rs_name` varchar(100) NOT NULL,
  `rs_surname` varchar(100) NOT NULL,
  `rs_username` varchar(100) NOT NULL,
  `rs_password` varchar(100) NOT NULL,
  `rs_level` enum('standard','admin') NOT NULL DEFAULT 'standard',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rs_user`
--

LOCK TABLES `rs_user` WRITE;
/*!40000 ALTER TABLE `rs_user` DISABLE KEYS */;
INSERT INTO `rs_user` VALUES (16,'shayant','sital','shayantsital35','$2y$10$W0X3ovE900xB2qzhedxtBut8SsdPdbDrkp/jVXa1VWK6ueYBtYfsu','admin'),(17,'Kevin','Edoo','kevinedoo33','$2y$10$IWeUhq650B40N8BHN1FADeypN66GHqxCgI4IhIzP3zm.pmZtleb0G','standard');
/*!40000 ALTER TABLE `rs_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-02  0:45:51
