-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: cotacaodb
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.22-MariaDB

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
-- Table structure for table `cotacao_frete`
--

DROP TABLE IF EXISTS `cotacao_frete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotacao_frete` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transportadora_id` bigint(20) unsigned NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentual_cotacao` decimal(10,2) NOT NULL,
  `valor_extra` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cotacao_frete_transportadora_id_foreign` (`transportadora_id`),
  CONSTRAINT `cotacao_frete_transportadora_id_foreign` FOREIGN KEY (`transportadora_id`) REFERENCES `transportadora` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotacao_frete`
--

LOCK TABLES `cotacao_frete` WRITE;
/*!40000 ALTER TABLE `cotacao_frete` DISABLE KEYS */;
INSERT INTO `cotacao_frete` VALUES (1,1,'PR',2.00,15.00,'2022-04-19 03:08:31','2022-04-19 03:08:31'),(2,5,'PB',2.95,13.50,'2022-04-19 04:20:51','2022-04-19 04:20:51'),(3,5,'PR',2.95,14.35,'2022-04-19 16:38:16','2022-04-19 16:38:16'),(4,3,'PR',4.22,10.35,'2022-04-19 16:38:52','2022-04-19 16:38:52'),(6,2,'PR',4.80,17.72,'2022-04-19 16:50:02','2022-04-19 16:50:02'),(7,4,'PR',5.00,18.00,'2022-04-19 16:50:22','2022-04-19 16:50:22'),(8,1,'AC',12.32,22.30,'2022-04-20 04:46:05','2022-04-20 04:46:05'),(9,1,'AL',12.32,22.30,'2022-04-20 17:29:43','2022-04-20 17:29:43'),(10,4,'CE',2.32,20.20,'2022-04-20 17:33:10','2022-04-20 17:33:10');
/*!40000 ALTER TABLE `cotacao_frete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transportadora`
--

DROP TABLE IF EXISTS `transportadora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transportadora` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportadora`
--

LOCK TABLES `transportadora` WRITE;
/*!40000 ALTER TABLE `transportadora` DISABLE KEYS */;
INSERT INTO `transportadora` VALUES (1,'Transportadora 1','2022-04-18 23:00:32','2022-04-18 23:00:32'),(2,'Transportadora 2','2022-04-18 23:00:32','2022-04-18 23:00:32'),(3,'Transportadora 3','2022-04-18 23:00:32','2022-04-18 23:00:32'),(4,'Transportadora 4','2022-04-18 23:00:32','2022-04-18 23:00:32'),(5,'Transportadora 5','2022-04-18 23:00:32','2022-04-18 23:00:32');
/*!40000 ALTER TABLE `transportadora` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-20 21:11:03
