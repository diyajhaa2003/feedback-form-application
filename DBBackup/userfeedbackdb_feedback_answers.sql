-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: userfeedbackdb
-- ------------------------------------------------------
-- Server version	9.4.0

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
-- Table structure for table `feedback_answers`
--

DROP TABLE IF EXISTS `feedback_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedback_question_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_answers_feedback_question_id_foreign` (`feedback_question_id`),
  CONSTRAINT `feedback_answers_feedback_question_id_foreign` FOREIGN KEY (`feedback_question_id`) REFERENCES `feedback_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_answers`
--

LOCK TABLES `feedback_answers` WRITE;
/*!40000 ALTER TABLE `feedback_answers` DISABLE KEYS */;
INSERT INTO `feedback_answers` VALUES (1,1,3,'Yes','2025-11-08 07:43:18','2025-11-08 07:43:18'),(2,10,3,'No','2025-11-08 07:43:18','2025-11-08 07:43:18'),(3,2,1,'Quality','2025-11-08 07:43:40','2025-11-08 07:43:40'),(4,3,1,'Yes','2025-11-08 07:43:40','2025-11-08 07:43:40'),(5,4,2,'3','2025-11-08 07:44:05','2025-11-08 07:44:05'),(6,5,2,'Yes','2025-11-08 07:44:05','2025-11-08 07:44:05'),(7,4,1,'3','2025-11-08 08:08:52','2025-11-08 08:10:24'),(8,5,1,'No','2025-11-08 08:08:52','2025-11-08 08:08:52'),(9,13,1,'hello','2025-11-08 08:10:24','2025-11-08 08:10:24');
/*!40000 ALTER TABLE `feedback_answers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-08 19:14:16
