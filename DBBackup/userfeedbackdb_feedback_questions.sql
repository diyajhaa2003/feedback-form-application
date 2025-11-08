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
-- Table structure for table `feedback_questions`
--

DROP TABLE IF EXISTS `feedback_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feedback_Category_id` bigint unsigned NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_questions_feedback_category_id_foreign` (`feedback_Category_id`),
  CONSTRAINT `feedback_questions_feedback_category_id_foreign` FOREIGN KEY (`feedback_Category_id`) REFERENCES `feedback_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_questions`
--

LOCK TABLES `feedback_questions` WRITE;
/*!40000 ALTER TABLE `feedback_questions` DISABLE KEYS */;
INSERT INTO `feedback_questions` VALUES (1,1,'Is our website easy to navigate?','radio','2025-11-07 05:44:43','2025-11-07 06:26:02'),(2,2,'What do you like most about the product?','text','2025-11-07 05:53:20','2025-11-07 06:26:31'),(3,2,'Would you recommend our product?','radio','2025-11-07 05:53:20','2025-11-07 06:26:31'),(4,3,'How satisfied are you with our service?','rating','2025-11-07 06:25:18','2025-11-07 06:25:18'),(5,3,'Was our staff helpful?','radio','2025-11-07 06:25:18','2025-11-07 06:25:18'),(6,4,'Was your order delivered on time?','radio','2025-11-07 06:27:16','2025-11-07 06:27:16'),(7,4,'How would you rate the packaging quality?','rating','2025-11-07 06:27:16','2025-11-07 06:27:16'),(10,1,'Is it responsive?','radio','2025-11-07 21:07:36','2025-11-07 21:07:36'),(11,6,'dummyd','radio','2025-11-08 02:09:40','2025-11-08 02:10:12'),(13,3,'dummycontent','text','2025-11-08 08:09:56','2025-11-08 08:09:56');
/*!40000 ALTER TABLE `feedback_questions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-08 19:14:17
