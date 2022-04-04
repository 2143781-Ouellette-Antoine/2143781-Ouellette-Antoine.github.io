-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: notes_ouelletteantoine
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cours`
--

LOCK TABLES `cours` WRITE;
/*!40000 ALTER TABLE `cours` DISABLE KEYS */;
INSERT INTO `cours` VALUES (1,'420-2A4-VI','Développement Web 1','fas fa-keyboard'),(2,'420-2A6-VI','Programmation 2','fas fa-laptop'),(3,'420-2B4-VI','Bases de données 1','fas fa-database'),(4,'420-2D4-VI','Support technique','fas fa-phone'),(5,'420-2C4-VI','Réseautique','fas fa-server'),(6,'601-101-MQ','Écriture et littérature','fas fa-book'),(7,'ANG-FGC-R4','Anglais Formation générale commune','fas fa-headphones');
/*!40000 ALTER TABLE `cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cours_id` int NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `calendrier` datetime DEFAULT NULL,
  `ponderation` decimal(5,2) DEFAULT NULL,
  `resultat` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_cours` (`cours_id`),
  CONSTRAINT `evaluations_cours` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluations`
--

LOCK TABLES `evaluations` WRITE;
/*!40000 ALTER TABLE `evaluations` DISABLE KEYS */;
INSERT INTO `evaluations` VALUES (1,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(2,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(3,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(4,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(5,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(6,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(7,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(8,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(9,1,'Examen 1','2022-02-25 10:15:00',25.00,NULL),(10,2,'Examen 1','2022-02-21 13:15:00',10.00,NULL);
/*!40000 ALTER TABLE `evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formatifs`
--

DROP TABLE IF EXISTS `formatifs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formatifs` (
  `id` int NOT NULL,
  `cours_id` int NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateevaluation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formatifs`
--

LOCK TABLES `formatifs` WRITE;
/*!40000 ALTER TABLE `formatifs` DISABLE KEYS */;
INSERT INTO `formatifs` VALUES (1,1,'Formatif pour l\'examen 1','2022-02-08 13:15:00'),(2,2,'Test de connaissances','2022-01-26 10:15:00'),(3,1,'Quizz semaine 5','2022-02-21 13:15:00'),(4,2,'Formatif examen 1','2022-02-17 10:15:00');
/*!40000 ALTER TABLE `formatifs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-11  8:59:13
