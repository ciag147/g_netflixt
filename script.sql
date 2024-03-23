CREATE DATABASE  IF NOT EXISTS `movie-w3b` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `movie-w3b`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: movie-w3b
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'phim-hanh-dong','Phim hành động','2024-02-19 06:02:58'),(2,'phim-vien-tuong','Phim viễn tưởng','2024-02-19 08:13:37'),(3,'phim-co-trang','Phim cổ trang','2024-02-19 08:13:57'),(4,'phim-kinh-di','Phim kinh dị','2024-02-19 08:14:30'),(5,'phim-tam-ly','Phim tâm lý','2024-02-19 08:15:02');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` bigint NOT NULL,
  `videoId` bigint NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Phim tuyệt cú mèo',2,26,'2024-02-09 06:03:03',NULL),(2,'Phim hay quá',5,26,'2024-02-09 06:04:59',NULL),(3,'Tuyệt vời, mong sớm được xem nhiều bộ phim hay nữa',3,15,'2024-02-09 06:04:59',NULL),(4,'Phim nét căng',4,10,'2024-02-09 06:04:58',NULL),(5,'Tuyệt vời ông mặt chời',5,10,'2024-02-09 06:02:58',NULL),(6,'phim hay quá ạ',5,36,'2024-03-17 11:07:32','2024-03-17 11:07:32'),(7,'amazing good job',5,36,'2024-03-17 11:07:52','2024-03-17 11:07:52'),(8,'đỉnh của đỉnh',5,34,'2024-03-17 11:17:32','2024-03-17 11:17:32'),(9,'quá hay luôn',5,34,'2024-03-17 11:17:43','2024-03-17 11:17:43'),(10,'quá tuyệt vời luôn',5,35,'2024-03-17 11:30:27','2024-03-17 11:30:27'),(11,'chân thật từng phút giây',5,35,'2024-03-17 11:30:41','2024-03-17 11:30:41'),(12,'đồ hoạ đỉnh quá, nhìn con rồng như thiệt luôn',5,33,'2024-03-17 11:31:39','2024-03-17 11:31:39'),(13,'quá đỉnh',4,33,'2024-03-17 11:32:27','2024-03-17 11:32:27'),(14,'tuyệt vời ông mặt chời',4,33,'2024-03-17 11:32:43','2024-03-17 11:32:43'),(15,'nam chính ngầu mà nữ chính cũng xinh nữa. Mêêêêêêêêêê!!!!',4,32,'2024-03-17 11:33:37','2024-03-17 11:33:37'),(16,'không còn từ nào để nhận xét, trên cả toẹt vời',4,32,'2024-03-17 11:34:00','2024-03-17 11:34:00'),(17,'xem 2 lần vẫn muốn xem nữa',4,33,'2024-03-17 11:35:26','2024-03-17 11:35:26'),(18,'đỉnh của đỉnh',2,36,'2024-03-17 11:36:21','2024-03-17 11:36:21'),(19,'web chạy nhanh mà phim còn hay nữa. Thứ gì chịu lỗi bây giờ',2,36,'2024-03-17 11:36:45','2024-03-17 11:36:45'),(20,'con rồng ngầu quá đi',2,33,'2024-03-17 11:37:28','2024-03-17 11:37:28'),(21,'nữ 9 xinh quá ạ',2,31,'2024-03-17 11:38:06','2024-03-17 11:38:06'),(22,'nữ 9 xinh mà web còn đẹp nữa. Quá tuyệt dờiii',2,31,'2024-03-17 11:38:37','2024-03-17 11:38:37'),(23,'phim hay quá',3,31,'2024-03-17 11:39:52','2024-03-17 11:39:52'),(24,'mêêêêêêêêêêê',3,31,'2024-03-17 11:40:04','2024-03-17 11:40:04'),(25,'phim hay, giao diện web đẹp. Không còn từ nào để diễn tả, quá tuyệt vờiiii',3,35,'2024-03-17 11:42:13','2024-03-17 11:42:13'),(26,'phim hay quá, excellent',3,34,'2024-03-17 11:44:01','2024-03-17 11:44:01');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `isLiked` tinyint(1) DEFAULT NULL,
  `likedAt` datetime DEFAULT NULL,
  `lastViewedAt` datetime NOT NULL,
  `userId` bigint NOT NULL,
  `videoId` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histories`
--

LOCK TABLES `histories` WRITE;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
INSERT INTO `histories` VALUES (1,1,'2024-02-09 12:50:48','2024-02-09 12:50:44',2,27),(2,1,'2024-02-09 12:50:56','2024-02-09 12:50:54',2,26),(3,1,'2024-02-09 12:51:19','2024-02-09 12:51:16',2,24),(4,1,'2024-02-09 12:52:06','2024-02-09 12:52:04',3,22),(5,1,'2024-02-09 12:52:15','2024-02-09 12:52:13',3,27),(6,1,'2024-02-09 12:52:26','2024-02-09 12:52:23',3,20),(7,1,'2024-02-09 12:52:57','2024-02-09 12:52:55',6,24),(8,0,NULL,'2024-02-09 12:53:02',6,18),(9,0,NULL,'2024-02-09 12:53:11',6,20),(10,1,'2024-02-09 12:53:52','2024-02-09 12:53:49',5,19),(11,1,'2024-02-09 12:54:02','2024-02-09 12:54:00',5,20),(12,1,'2024-02-09 12:54:27','2024-02-09 12:54:25',4,19),(13,1,'2024-02-09 12:54:34','2024-02-09 12:54:31',4,24),(14,1,'2024-03-18 01:07:18','2024-03-18 01:07:14',5,36),(15,1,'2024-03-18 01:08:08','2024-03-18 01:30:05',5,35),(16,1,'2024-03-18 01:17:16','2024-03-18 01:17:12',5,34),(17,0,NULL,'2024-03-18 01:31:08',5,33),(18,1,'2024-03-18 01:34:19','2024-03-18 01:34:15',4,32),(19,1,'2024-03-18 01:34:34','2024-03-18 01:34:30',4,31),(20,0,NULL,'2024-03-18 01:34:58',4,33),(21,1,'2024-03-18 01:36:09','2024-03-18 01:36:05',2,36),(22,1,'2024-03-18 01:39:02','2024-03-18 01:38:58',2,33),(23,1,'2024-03-18 01:39:13','2024-03-18 01:39:09',2,31),(24,1,'2024-03-18 01:39:37','2024-03-18 01:39:32',3,31),(25,1,'2024-03-18 01:40:28','2024-03-18 01:40:22',3,33),(26,0,NULL,'2024-03-18 01:41:23',3,35),(27,1,'2024-03-18 01:42:38','2024-03-18 01:42:35',3,30),(28,1,'2024-03-18 01:42:50','2024-03-18 01:42:46',3,29),(29,1,'2024-03-18 01:43:12','2024-03-18 01:43:08',3,28),(30,0,NULL,'2024-03-18 01:43:32',3,34);
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (45,'2014_10_12_000000_create_users_table',1),(46,'2014_10_12_100000_create_password_resets_table',1),(47,'2019_08_19_000000_create_failed_jobs_table',1),(48,'2024_02_19_143822_create_videos_table',1),(49,'2024_02_19_145209_create_roles_table',1),(50,'2024_02_19_145444_create_user_tokens_table',1),(51,'2024_02_19_145806_create_categoies_table',1),(52,'2024_02_19_150617_create_comments_table',1),(53,'2024_02_19_150756_create_histories_table',1),(54,'2024_02_19_151025_create_ratings_table',1),(55,'2024_03_01_135955_create_orders_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `vnp_TxnRef` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vnp_OrderInfo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vnp_ResponseCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vnp_TransactionNo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vnp_BankCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vnp_Amount` bigint unsigned NOT NULL,
  `userId` bigint NOT NULL,
  `videoId` bigint NOT NULL,
  `vnp_PayDate` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'59836674','Thanh toan don hang:59836674','00','14084747','NCB',20000,2,1,'2024-02-19 10:43:51'),(2,'73526453','Thanh toan don hang:73526453','24','0','NCB',15000,2,5,'2024-02-19 10:46:12'),(3,'87334615','Thanh toan don hang:87334615','00','14084752','NCB',15000,3,5,'2024-02-19 10:50:53'),(4,'43297020','Thanh toan don hang:43297020','00','14084772','NCB',10000,4,7,'2024-02-19 11:05:05'),(5,'94497026','Thanh toan don hang:94497026','00','14084942','NCB',10000,5,7,'2024-02-19 17:19:47'),(6,'43220687','Thanh toan don hang:43220687','00','14084954','NCB',10000,6,9,'2024-02-19 17:56:30'),(7,'45357861','Thanh toan don hang:45357861','00','14084760','NCB',20000,3,35,'2024-03-18 10:43:51'),(8,'43543355','Thanh toan don hang:43543355','00','14084761','NCB',20000,3,33,'2024-03-18 10:45:51'),(9,'78635781','Thanh toan don hang:78635781','00','14084763','NCB',12000,3,32,'2024-03-18 10:48:51'),(10,'35847825','Thanh toan don hang:35847825','00','14084764','NCB',15000,3,31,'2024-03-18 10:56:51'),(11,'45256754','Thanh toan don hang:45256754','00','14084765','NCB',20000,2,35,'2024-03-18 10:43:51'),(12,'85676553','Thanh toan don hang:85676553','00','14084766','NCB',20000,2,33,'2024-03-18 10:45:51'),(13,'12367983','Thanh toan don hang:12367983','00','14084767','NCB',12000,2,32,'2024-03-18 10:48:51'),(14,'12459785','Thanh toan don hang:12459785','00','14084769','NCB',15000,2,31,'2024-03-18 10:56:51'),(15,'78457845','Thanh toan don hang:78457845','00','14084770','NCB',20000,4,35,'2024-03-18 10:43:51'),(16,'12346789','Thanh toan don hang:12346789','00','14084771','NCB',20000,4,33,'2024-03-18 10:45:51'),(17,'16436742','Thanh toan don hang:16436742','00','14084772','NCB',12000,4,32,'2024-03-18 10:48:51'),(18,'90796453','Thanh toan don hang:90796453','00','14084773','NCB',15000,4,31,'2024-03-18 10:56:51'),(19,'31754255','Thanh toan don hang:31754255','00','14084774','NCB',20000,5,35,'2024-03-18 10:43:51'),(20,'85753567','Thanh toan don hang:85753567','00','14084775','NCB',20000,5,33,'2024-03-18 10:45:51'),(21,'13564569','Thanh toan don hang:13564569','00','14084776','NCB',12000,5,32,'2024-03-18 10:48:51'),(22,'85742145','Thanh toan don hang:85742145','00','14084777','NCB',15000,5,31,'2024-03-18 10:56:51'),(23,'84575351','Thanh toan don hang:84575351','00','14084778','NCB',20000,6,35,'2024-03-18 10:43:51'),(24,'94523564','Thanh toan don hang:94523564','00','14084779','NCB',20000,6,33,'2024-03-18 10:45:51'),(25,'34535345','Thanh toan don hang:34535345','00','14084780','NCB',12000,6,32,'2024-03-18 10:48:51'),(26,'67567214','Thanh toan don hang:67567214','00','14084781','NCB',15000,6,31,'2024-03-18 10:56:51');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `star` tinyint NOT NULL,
  `userId` bigint NOT NULL,
  `videoId` bigint NOT NULL,
  `createdAt` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2024-02-19 15:30:48','2024-02-19 15:30:48'),(2,'user','2024-02-19 15:30:48','2024-02-19 15:30:48');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiredAt` datetime DEFAULT NULL,
  `userId` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tokens`
--

LOCK TABLES `user_tokens` WRITE;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `roleId` bigint NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','Lê Thanh Giác',1,'$2y$10$5E29Bxt5bDwjhGxdd7/Gvu9u08J4M7jJwFnOh2lE1KhiTIWiLVSE2','0123456789',NULL,1),(2,'CT06N0129@actvn.edu.vn','Võ Trường Lâm',1,'$2y$10$dZ8cfDNt6EolNcYPTrM3UODVALC3J49dFQyjGj04rH4PYCSST77Ze','0886338217','2024-02-20 08:30:48',2),(3,'CT06N0118@actvn.edu.vn','Lê Thanh Giác',1,'$2y$10$ywAX5AlSEmlChn8IdSLIUuj4d/ypPTE6xiTuK8e99vYsTEGMfxGgu','0357006252','2024-02-20 08:32:48',2),(4,'CT06N0104@actvn.edu.vn','Nguyễn Thanh Bảo',1,'$2y$10$spF1UrSLDiz1qsQK1XuVnOgv1lU1ggkNvDb640W4asB5o42Gs4CHi','0843175549','2024-02-20 08:35:48',2),(5,'CT06N0102@actvn.edu.vn','Phạm Phú An',1,'$2y$10$9Ak1TNGuIvpU7lZdSoGeEu6xLvILtfk9ff370OwZabV84M/KRZoja','0706342549','2024-02-20 08:40:48',2),(6,'CT06N0139@actvn.edu.vn','Bùi Trọng Nghĩa',1,'$2y$10$x58HX935yqsbH3mon5xdIuTgFkuRWDrYpAP0hriPqo6flI.aEl4H.','0973142448','2024-02-20 08:25:48',2),(7,'CT06N0110@actvn.edu.vn','Vũ Tiến Đạt',1,'$2y$10$BQ1pC5Gre30pEV6rrGowY.7gEjsW9u5lO/Nww6MHq9umpvVMf6xg2','0898993601','2024-02-20 08:15:48',2),(8,'CT06N0119@actvn.edu.vn','Huỳnh Chí Giáp',1,'$2y$10$PZ4XV92yXymsSsQy3PJjuOvTBqMvUs8FeR.raOe4.bz/NOPO4o0N6','0783977379','2024-02-20 08:02:48',2),(9,'CT06N0125@actvn.edu.vn','Hà Minh Khánh',1,'$2y$10$/C3EdQpj6H34.mY6JbCsIe/rbweuaCU9xhxWCgpla9CuitF6upjrG','0899150148','2024-02-20 08:29:48',2),(10,'CT06N0132@actvn.edu.vn','Đỗ Hoàng Long',1,'$2y$10$vZlBwXpz4a3rBLubuppBEeCcaIpsclUCjSZdy0MTV8YM2AtVJrLje','0962649157','2024-02-20 08:43:48',2),(11,'CT06N0133@actvn.edu.vn','Ngô Duy Thành Long',1,'$2y$10$T7EO0KuGiPpsuycSGEv03eHMGRXV7f5NIAC/ZnGaJ51Y5uN4iVQum','0944214042','2024-02-20 08:45:48',2),(12,'CT06N0137@actvn.edu.vn','Lê Trọng Nghĩa',1,'$2y$10$DCqBMrHZN6CZ8iW.TH70cOpXSKQeExeCE80HxumYDxbdQH1yCZySi','0774849173','2024-02-20 08:59:48',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `actor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `poster` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `share` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int NOT NULL,
  `categoryId` bigint NOT NULL,
  `createdAt` timestamp NOT NULL,
  `updatedAt` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,'Geoge Dibble, Wes Johnson, Wes Lee',' Ông Trùm Báo Thù - Volkov Origin là một bộ phim hành động đầy hấp dẫn và nghẹt thở,Vào buổi tối muộn, Tiến sĩ Angela Perkins nhận thấy rằng cô ấy có một nhiệm vụ mới. Đi sâu vào tâm trí của người mới đến và bí ẩn nhất của Nhà Lao Horton House, Andre Volkov. Không ai có thể lường trước được tác động mà chuyến thăm của cô ấy sẽ có đối với cuộc sống của cả hai khi cô ấy bắt đầu hành trình tìm kiếm sự thật trong câu trả lời của anh ấy. Bị mù quáng bởi quá khứ của mình, Volkov dần hồi sinh câu chuyện về sự lạm dụng tình cảm, tinh thần và thể xác của mình thông qua lời nói của chính mình. Câu chuyện nguồn gốc của mình. Tuy nhiên, trong cơn thịnh nộ không thể kiểm soát, Volkov phá vỡ xiềng xích của mình chỉ để quay trở lại thế giới ngầm tội phạm, nơi anh ta đoàn tụ với thủ lĩnh đáng tin cậy nhất của mình, Brutus, và thủy thủ đoàn của anh ta. Những gì tiếp theo là một chuyến đi tàu lượn siêu tốc đầy hồi hộp trong bộ phim kinh dị tâm lý này chắc chắn sẽ khiến bạn đặt câu hỏi về sự tỉnh táo của chính mình.','George Dibble','h7Ov3Kv5u7Y',1,'https://img.youtube.com/vi/h7Ov3Kv5u7Y/maxresdefault.jpg',20000,0,'ÔNG TRÙM BÁO THÙ',20,1,'2024-02-09 15:23:29','2024-02-09 15:23:29'),(2,'Ed Skrei','Phần phim mới của series Người vận chuyển có tên gọi The Transporter: Refueled, đây sẽ là tập phim tập trung vào việc khởi động lại dự án đình đám này do “lính mới” Ed Skrein đảm nhận vai chính. Europacorp, nhà sản xuất của loạt phim hành động nổi tiếng Taken và Lucy, hứa hẹn sẽ đem đến cho khán giả một sức sống mới, một cái nhìn mới về Người Vận Chuyển. Chuyện phim vẫn xoay quanh nhân vật Frank Martin, “người vận chuyển” nổi tiếng nhất trong giới kinh doanh và tội phạm với kĩ năng lái xe siêu hạng. Frank Martin có thể vận chuyển bất cứ món hàng nào đến mọi địa điểm được chỉ định, chỉ cần được trả công tương xứng. Nguyên tắc làm việc của anh là không phá vỡ hợp đồng, không hỏi tên và không mở kiện hàng. Nhưng dĩ nhiên trong những cuộc hành trình đầy rẫy những nguy hiểm và những điều bất ngờ ập đến, những nguyên tắc kia đã bị phá vỡ. Bí mật bên trong những kiện hàng, những cuộc truy sát và đụng độ giữa Frank Martin và các tên tội phạm cộm cáng luôn đưa đến những cuộc rượt đuổi ngoạn mục, nghẹt thở.....','Europacorp','s7lY5w51a8c',1,'https://img.youtube.com/vi/s7lY5w51a8c/maxresdefault.jpg',0,0,'NGƯỜI VẬN CHUYỂN',0,1,'2024-02-09 15:30:41','2024-02-09 15:30:41'),(3,'Ngô Kinh, Scott Adkins','Vương Lãnh Phong (Ngô Kinh), một người lính sẵn sàng xông pha trận mạc. Nhưng sau lần cãi lời chỉ huy và bắn chết một phần tử khủng bố, anh bị khai trừ khỏi quân đội. Kẻ bị đánh chết vốn là em trai của tên trùm ma túy Mẫn Đăng. Để trả thù, hắn kết hợp với tên lính đánh thuê Lão Miêu (Scott Adkins) để sát hại Lãnh Phong và những người đồng đội của anh. ','Ngô Kinh','hDuttHj9WWw',1,'https://img.youtube.com/vi/hDuttHj9WWw/maxresdefault.jpg',0,0,'CHIẾN LANG - PHẦN CUỐI',2,1,'2024-02-09 15:34:44','2024-02-09 15:34:44'),(4,'Lý Hoả Hoả, Ngôn Kiệt','Phim TUYỆT ĐỈNH HOẮC GIA QUYỀN kể về cuộc Cách mạng năm 1911, tại Thượng Hải, các võ sĩ yêu nước Huo Zhenshan và He Dachuan đã cùng nhau đốt cháy kho thuốc phiện, khiến ông trùm ​​Axe Gang muốn truy sát họ, và He Dachuan đã bị giết vì cứu Huo Zhenshan. 20 năm sau, Huo Zhenshan mở một phòng võ thuật ở Thượng Hải để quảng bá võ thuật Trung Quốc và tìm kiếm hậu duệ của He Dachuan. Khi đối mặt với thử thách của hội trường quyền anh ở chợ đen, Huo Zhenshan đánh bại các đối thủ. Tuy nhiên, đệ tử lớn nhất Huang Jinpeng bí mật thông đồng với ông chủ của phòng đấm bốc và giết chết chủ nhân của mình. Stone và Huang Jinpeng tìm thấy danh tính của nhau trong cuộc thi - Họ thực sự là những đứa trẻ đã bị lạc mất nhau từ ​​lâu của He Dachuan.','Đới Duy','mEd9PiqJ1g8',1,'https://img.youtube.com/vi/mEd9PiqJ1g8/maxresdefault.jpg',0,0,'TUYỆT ĐỈNH KUNG FU HOẮC GIA QUYỀN',1,3,'2024-02-09 15:39:30','2024-02-09 15:39:30'),(5,'Barry Pepper, Colm Feore, Eve Harlow','Những Kẻ Phản Bội - Trigger Point là một bộ phim hành động đầy hấp dẫn và nghẹt thở, xoay quanh cuộc sống của Nicolas Shaw, một cựu điệp viên Mỹ bị lôi kéo vào một trò chơi nguy hiểm. Shaw phải chạy trốn khỏi những kẻ muốn giết anh, trong khi tìm cách minh oan cho mình và bảo vệ những người thân yêu. Shaw cũng phải đối đầu với quá khứ đau thương của mình, khi anh gặp lại Elias Kane, người đã từng là sếp và bạn thân của anh, và Monica, con gái của Kane, người đã từng có tình cảm với anh. Trigger Point là một bộ phim đậm chất điện ảnh, với những pha hành động mãn nhãn, những cuộc đối thoại sắc bén, và những diễn viên tài năng. Bạn sẽ không thể rời mắt khỏi màn ảnh khi xem Trigger Point, bộ phim được đánh giá cao bởi các nhà phê bình và khán giả. Đừng bỏ lỡ \"Những Kẻ Phản Bội - Trigger Point\" , bộ phim sẽ làm bạn phải thót tim và thích thú!','Brad Turner','Bjn4pwYC7VQ',1,'https://img.youtube.com/vi/Bjn4pwYC7VQ/maxresdefault.jpg',15000,0,'NHỮNG KẺ PHẢN BỘI',2,1,'2024-02-09 15:43:03','2024-02-09 15:43:03'),(6,'Paul Sorvino, Mischa Barton, Eric Roberts','Kẻ Hành Quyết - Executor  là một bộ phim hấp dẫn và gây cấn về cuộc đối đầu giữa sự thiện và ác trong con người. Phim có sự tham gia của các diễn viên nổi tiếng như Paul Sorvino, Mischa Barton và Eric Roberts. Phim khắc họa rõ nét nhân vật Kyle, một sát thủ lạnh lùng và máu lạnh, nhưng cũng có trái tim nhân hậu và tình cảm. Phim cũng chỉ ra được sự ngụy biện và đạo đức giả của linh mục Antonio, người đã lợi dụng niềm tin của Kyle để biến anh ta thành công cụ giết người. Phim có nhiều cảnh hành động gay go và kịch tính, khiến người xem không rời mắt khỏi màn hình. Phim cũng mang lại thông điệp về ý nghĩa của cuộc sống, tình yêu và gia đình. Phim là một tác phẩm đáng xem cho những ai yêu thích thể loại hành động và ly kỳ.','George Dibble','Ky6_Q-ZwkHA',1,'https://img.youtube.com/vi/Ky6_Q-ZwkHA/maxresdefault.jpg',0,0,'KẺ HÀNH QUYẾT',5,1,'2024-02-09 15:45:04','2024-02-09 15:45:04'),(7,'François Civil , Jordan Mintzer','Ty Hargrove muốn trở thành một tay đua xe vô địch. Nhưng rồi một sự cố nảy sinh khi Ty đe dọa tước bỏ danh hiệu của đối thủ và bạn gái của anh ta. Bộ phim với nhịp độ nhanh, hành động đua xe gay cấn. Đường Đua Khốc Liệt - Burnout là một bộ phim hấp dẫn, căng thẳng và chân thực về thế giới ngầm của Pháp, với những cảnh quay đua xe máy ngoạn mục và diễn xuất xuất sắc của François Civil - Jordan Mintzer. Một bộ phim hành động hiệu quả, có cốt truyện hấp dẫn và nhân vật phức tạp. Yann Gozlan đã tạo ra một bộ phim mang đậm dấu ấn cá nhân và khác biệt với những bộ phim cùng thể loại.','Yann Gozla','Gp1bsHMysQU',1,'https://img.youtube.com/vi/Gp1bsHMysQU/maxresdefault.jpg',10000,0,'ĐƯỜNG ĐUA KHỐC LIỆT',3,1,'2024-02-09 15:47:14','2024-02-09 15:47:14'),(8,'Patrick Schwarzenegger, Miles Robbins, Sasha Lane','Sau khi chứng kiến bạo lực đau thương khi còn là một cậu bé 8 tuổi, Luke tạo ra một người bạn tưởng tượng tên là Daniel, người dẫn dắt anh vào một thế giới hư ảo cho phép anh chạy trốn. Sau khi Daniel lừa Luke làm một chuyện kinh khủng, Luke buộc phải nhốt Daniel lại và quên đi người bạn duy nhất của mình. Mười hai năm sau, Luke, một sinh viên năm nhất đại học phải đối mặt với người mẹ bị bệnh tâm thần nặng của mình. Sau một gợi ý tưởng như vô hại từ bác sĩ trị liệu, Luke mời Daniel  trở lại thực tại để đối phó. Daniel quyến rũ, ăn nói trôi chảy và lôi cuốn - trái ngược hoàn toàn với Luke. Khi họ ngày càng trở nên không thể tách rời thì rõ ràng Daniel có một kế hoạch bí mật rất đáng sợ.','Adam Egypt Mortimer','BTEhcVULDx0',1,'https://img.youtube.com/vi/BTEhcVULDx0/maxresdefault.jpg',0,0,'NGƯỜI BẠN TƯỞNG TƯỢNG',1,5,'2024-02-09 15:48:53','2024-02-09 15:48:53'),(9,'Thomas Nicholas','Lật Mặt - Adverse là một bộ phim hành động ly kỳ về một tài xế đi chung xe tên Ethan, do Thomas Nicholas đóng, phải thâm nhập vào một tổ chức tội phạm nguy hiểm để cứu em gái của mình khỏi nạn ma túy. Phim có sự tham gia của nhiều diễn viên nổi tiếng như Mickey Rourke, Lou Diamond Phillips và Sean Astin. Phim được đạo diễn bởi Brian A. Metcalf, người cũng viết kịch bản và sản xuất phim. Là một bộ phim đen tối và căng thẳng, khiến người xem chứng kiến những cảnh bạo lực, ám ảnh và đau thương của các nhân vật. Phim cũng mang đến những bất ngờ và kịch tính khi Ethan phải đối đầu với Kaden, trùm tội phạm do Mickey Rourke đóng, và những tay sai của hắn. Lật Mặt là một bộ phim không dành cho người yếu tim, nhưng nếu bạn thích những bộ phim hành động gay cấn và có chiều sâu, thì còn chần chờ gì nữa, hãy đón xem ngay thôi nào !',' Brian A. Metcalf','G7J7C7uCQfE',1,'https://img.youtube.com/vi/G7J7C7uCQfE/maxresdefault.jpg',15000,0,'LẬT MẶT - THUYẾT MINH',1,1,'2024-02-09 15:52:53','2024-02-09 15:52:53'),(10,'Nicolas Cage, John Cusack, Vanessa Hudgens','Paulson đã bị Hansen bắt cóc, cưỡng hiếp, tra tấn dã man và bạo hành tình dục khi mới 17 tuổi. Sau đó, cô đã may mắn trốn thoát thành công khi Hansen muốn đưa cô tới căn lều của hắn, nơi chỉ có máy bay hoặc tàu thuyền mới đến được. Hansen đã bị kết án bới hành vi giết những cô gái từ 17 - 21 tuổi, nhưng khi Paulson tố cáo hắn với cảnh sát, có kẻ lại thuyết phục mọi người rằng cô đã nói dối. Chỉ đến khi kết quả điều tra của chuyên viên tâm lí Glenn Flothe vừa khớp với miêu tả về Hansen thì vụ án của Paulson mới được xét xử một cách nghiêm túc. Hắn bị buộc tội năm 1983 và bị kết án 461 năm tù.','Adam Egypt Mortimer','9VOz9MRAlRs',1,'https://img.youtube.com/vi/9VOz9MRAlRs/maxresdefault.jpg',0,0,'SÁT NHÂN NÚI TUYẾT',2,1,'2024-02-09 15:55:00','2024-02-09 15:55:00'),(11,'Bella Thorne','Phim Trò Chơi Chết Chóc - Keep Watching (2017) kể về một gia đình bị nhốt trong ngôi nhà của họ bởi những kẻ xâm nhập bí ẩn, buộc họ phải tham gia một trò chơi sinh tử với những quy tắc lạ lùng được tiết lộ dần dần trong đêm. Phim là sự kết hợp giữa thể loại kinh dị và hành động, khiến người xem phải căng thẳng và hồi hộp theo từng cảnh quay','Sean Carter','8StaVMKMfs4',1,'https://img.youtube.com/vi/8StaVMKMfs4/maxresdefault.jpg',20000,0,'TRÒ CHƠI CHẾT CHÓC',17,4,'2024-02-09 15:57:16','2024-02-09 15:57:16'),(12,'Sam Worthington, Taylor Schilling, Tom Wilkinson, Diego Boneta','Phim kể về phi công của Lực lượng Không quân Hotshot, Rick Janssen (Sam Worthington) được chọn cho một thí nghiệm quân sự nhằm tạo ra một con người có khả năng sống sót trong môi trường khắc nghiệt như TITAN, được mệnh danh là mặt trăng của Sao Thổ. Thí nghiệm thành công biến Rick thành một siêu nhân nhưng nó cũng tạo ra những tác dụng phụ chết người đe dọa cuộc sống của Rick, vợ anh Abigail (Taylor Schilling), gia đình anh và có thể là cả nhân loại. Liệu anh có thể thích nghi với môi trường khắc nghiệt của Titan và tìm ra một ngôi nhà mới cho nhân loại hay không? Hãy xem The Titan để biết câu trả lời.','Lennart Ruff','UQl567o0CQ4',1,'https://img.youtube.com/vi/UQl567o0CQ4/maxresdefault.jpg',0,0,'NGƯỜI ĐỘT BIẾN - THUYẾT MINH',18,1,'2024-02-09 15:59:32','2024-02-09 15:59:32'),(13,'Kris Philips, Li Xuejia','Vào cuối thời nhà Thương, yêu hồ Đát Kỷ nhận lệnh của Nữ Oa nhập cung. Trụ Vương không chỉ là ân nhân của Đát Kỷ, mà còn là người mà Đát Kỷ ái mộ. Sau khi trải qua những cuộc tranh đấu chốn hậu cung và đối đầu với bản lĩnh của Khương Tử Nha, Đát Kỷ dần hiểu ra lòng người hiểm ác, chỉ có không từ thủ đoạn mới có thể phá bỏ vận mệnh khác biệt giữa người và yêu. Đát Kỷ vì yêu mà biến thành ma quỷ, lôi kéo Cốt Quỷ Cổn Quyên và diệt sạch trung thần. Tại Bách Yêu Yến ở Lộc Đài, trận chiến cuối cùng giữa Khương Tử Nha và Đát Kỷ đã diễn ra.','Wuersha','6JCa1iVRJTc',1,'https://img.youtube.com/vi/6JCa1iVRJTc/maxresdefault.jpg',0,0,'BẢNG PHONG THẦN - DIỆT YÊU',0,3,'2024-02-09 16:04:32','2024-02-09 16:04:32'),(14,'Dolph Lundgren, Scott Adkins','Castle Heights từng một biểu tượng của thành phố, nay đã bị lãng quên hơn chục năm. Toà nhà sắp bị phá huỷ bằng thuốc nổ. Thế nhưng, không ai biết rằng bên trong tòa nhà lại chứa đựng 3 triệu đô tiền mặt do một kẻ đứng đầu băng đảng cất giấu và hiện hắn ta đang ở tù. Giờ đây, ba kẻ đang tuyệt vọng và tham muốn số tiền ấy gồm có: một cựu chiến binh vô tình thấy số tiền trong lúc chuẩn bị phá huỷ toà nhà, một cai ngục đang kiếm tiền điều trị ung thư cho cô con gái, và người còn lại là một kẻ xấu xa tự nhận là chủ sở hữu số tiền đó. Liệu 1 trong 3 người ai sẽ có được số tiền đó? Liệu họ có lấy được số tiền trước khi tòa nhà bị phá hủy hay sẽ phải trả giá bằng mạng sống của mình?','Đang cập nhật','qJv7uEz9qVw',1,'https://img.youtube.com/vi/qJv7uEz9qVw/maxresdefault.jpg',0,0,'LÂU ĐÀI SỤP ĐỔ',0,1,'2024-02-09 16:06:26','2024-02-09 16:06:26'),(15,'Đang cập nhật','Khi một cuộc tấn công hạt nhân gây ra một xung điện từ cắt đứt mọi nguồn điện, nước và liên lạc với toàn bộ miền tây Hoa Kỳ, Reese phải lao vào một cuộc chiến để sống sót. Khi đại dịch siết chặt thành phố nơi cô sống, Reese và cha cô bắt đầu một hành trình tuyệt vọng để tìm kiếm sự an toàn - một chuyến đi đầy nguy hiểm qua một thế giới trở nên điên rồ, nơi mọi cuộc gặp gỡ với một người lạ có thể là lần cuối cùng của bạn.','Đang cập nhật','e48-Knw2Uxw',0,'https://img.youtube.com/vi/e48-Knw2Uxw/maxresdefault.jpg',0,0,'THẾ GIỚI ĐEN TỐI',4,1,'2024-02-09 16:08:32','2024-03-17 10:47:49'),(16,'Đang cập nhật','Vào lúc nửa đêm, Ji-min đang ngồi trên xe cùng với vị hôn phu đang lái xe của mình là Woo-jin thì thiếp ngủ đi mất. Đúng lúc đó, chiếc xe tông phải một vật. Ji-min cho rằng họ đã tông phải một cô gái, nhưng Woo-jin trấn an cô rằng đó chỉ là một chú nai thôi. Sau đêm hôm đó, Ji-min bị ảo giác rằng gái đã chết đó luôn đi theo mình. Ji-min quyết định tìm đến cảnh sát để tìm hiểu xem đêm đó có thật sự xảy ra tai nạn hay không. Woo-jin nói với Ji-min rằng cô mắc chứng khủng hoảng lo âu và đề nghị đưa cô đến bác sĩ tâm lý. Dù vậy, ảo giác của Ji-min ngày càng trở nên tồi tệ hơn và những người xung quanh cô đột nhiên biến mất từng người một...','Đang cập nhật','Kt47eAXXcTk',0,'https://img.youtube.com/vi/Kt47eAXXcTk/maxresdefault.jpg',10000,0,'ẢO GIÁC THỰC TẠI',0,1,'2024-02-09 16:11:32','2024-03-17 10:47:43'),(17,'Đang cập nhật','Đấu vật là một môn thể thao phổ biến ở thành Cao Lăng, và Mông Lực là một cao thủ đấu vật nổi tiếng tại nơi này, nhưng rồi anh bị huynh đệ của mình phản bội trong một trận đấu và gặp phải nhiều khó khăn vì bị thương. Rơi vào tuyệt vọng Mông Lực quyết định nỗ lực để lấy lại danh dự và trở lại với môn đấu vật.','Đang cập nhật','PgIrmbJkWYE',1,'https://img.youtube.com/vi/PgIrmbJkWYE/maxresdefault.jpg',10000,0,'VÕ SĨ GIÁC ĐẤU',0,1,'2024-02-09 16:13:14','2024-02-09 16:13:14'),(18,'Luke Wilson, Chad Michael Murray, Eastwood, Teri Polo','Câu chuyện về một băng cướp do Henry đứng đầu hiện đang lẩn trốn tại một gia đình nhỏ ngoài thị trấn sau khi thực hiện phi vụ cướp tiền tại nhà băng lớn. Henry vì cần chỗ nghỉ ngơi và trị thương cho đồng đội của mình nên đã xông vào và uy hiếp gia đình người nông dân kia, tại đây anh gặp được Florence Tildon cô con gái xinh đẹp của chủ nhà với khát vọng tự do và sống một cuộc sống mà mình mong muốn, Florence Tildon quyết định gia nhập băng nhóm của Henry và thực hiện hàng loạt vụ cướp khác.','Đang cập nhật','Q0uUKA0Hvz8',1,'https://img.youtube.com/vi/Q0uUKA0Hvz8/maxresdefault.jpg',20000,0,'KẺ CƯỚP VÀ THIÊN THẦ',0,1,'2024-02-09 16:14:30','2024-02-09 16:14:30'),(19,'Lạc Đạt Hoa, Kiều Tạ, Khải Dữ, Dương Chính','Vào cuối thời Minh, cẩm y vệ trấn phủ Lưu Kỳ Trung gặp hoạ diệt gia vì không chịu khuất phục Đông Xưởng. Hai mươi năm sau, hậu duệ còn sót lại của gia tộc họ Lưu là Duẫn Thiên và Duẫn Mạch tìm cách trả thù cho gia tộc và bắt đầu nhậm chức Cẩm y vệ.','Đang cập nhật','PoOhmGD3csg',1,'https://img.youtube.com/vi/PoOhmGD3csg/maxresdefault.jpg',0,0,'KẾ HOẠCH BÁO THÙ',0,3,'2024-02-09 16:16:34','2024-02-09 16:16:34'),(20,'Đang cập nhật','Vault là câu chuyện lấy bối cảnh năm 1975, khi đó có một nhóm tội phạm âm mưu thực hiện vụ trộm lớn nhất trong lịch sử Hoa Kỳ: đánh cắp hơn 30 triệu đô la từ băng đảng Mafia ở bang nhỏ nhất của Liên bang miền Bắc Hoa Kỳ - Rhode Island. ','Đang cập nhật','ZidQ-hJ_Xao',1,'https://img.youtube.com/vi/ZidQ-hJ_Xao/maxresdefault.jpg',10000,0,'CĂN HẦM TỬ THẦN',0,1,'2024-02-09 16:18:23','2024-02-09 16:18:23'),(21,'Đang cập nhật','Vì nợ nần với một tên côn đồ (Jason Momoa - Aquaman - DC), Miles đành phải thuyết phục bạn gái Lauren và em trai Liam giúp anh làm giả một vụ mất tích ở vùng hoang dã Alaska. Khi mọi người cố gắng tìm Miles, cảnh sát trưởng địa phương (Cary Elwes) bắt đầu nghi ngờ họ chỉ đang giả vờ. Khi ông dần tiếp cận sự thật, Liam cố gắng để che giấu trò lừa bịp của mình và anh đã vô tình tiết lộ một bí mật khiến anh và Lauren trở thành hai kẻ bị truy đuổi. Bây giờ cả hai đang vật lộn để đi trước một bước của một tên côn đồ và gã cảnh sát trước khi Miles biến mất vĩnh viễn. Là một bộ phim với sự góp mặt của nhiều siêu sao Hollywood, ngoài ra còn có huyền thoại Cary Elwes, người đã đóng vô vàn các tác phẩm kinh điển như The Princess Bride (1987), Robin Hood in Robin Hood: Men in Tights (1993), và gần đây nhất chính là siêu phẩm Stranger Things của Netflix.','Đang cập nhật','uIKYmJkq57s',1,'https://img.youtube.com/vi/uIKYmJkq57s/maxresdefault.jpg',20000,0,'LẠC LỐI Ở NÚI TUYẾT',0,1,'2024-02-09 16:23:06','2024-03-17 10:48:10'),(22,'Đang cập nhật','Bị giáng chức trở về quê nhà. Một nhân viên ngân hàng trẻ ở Phố Wall - Martin bị lôi kéo vào việc điều tra một mạng lưới rối rắm về tham nhũng và lừa đảo ở New York. Bộ phim hành động gay cấn về rửa tiền giữa FBI và các băng đảng.','Đang cập nhật','GGeM9LJiYR8',1,'https://img.youtube.com/vi/GGeM9LJiYR8/maxresdefault.jpg',10000,0,'TIỀN ẢO - THUYẾT MINH',0,1,'2024-02-09 16:26:41','2024-02-09 16:26:41'),(23,'Đang cập nhật','Kẻ trộm mộ Khương Ma Tử đã để lại một bản đồ kho báu trước khi chết, theo truyền thuyết, bản đồ kho báu này ẩn chứa một bí mật gây sốc, ai tìm được bí mật này sẽ có được kho báu vô tận. Lão Tất (do An Trạch Hào thủ vai), một kẻ trộm mộ từ phe phía bắc, Trác Kiện Lương (do Mạc Thiếu Thông thủ vai), một kẻ trộm mộ từ phe phía nam, Thâu Hào (do Thất Đoạn Văn thủ vai) và Ngũ Khôi (do Nhiếp Viễn thủ vai) là những tên trộm vừa mới ra tù. Các manh mối được cung cấp trên bản đồ là đến Đại sa mạc Tây Bắc. Trên đường đi, cả nhóm gặp phải vô số nguy hiểm và thất bại, và âm mưu của chính họ cũng tạo thêm những nguy hiểm khác nhau cho hành trình trộm mộ này. Cuối cùng, họ bước vào căn phòng chôn cất kho báu, chỉ thấy rằng nó đã trống rỗng, và âm thanh của chiếc đàn làm cho họ biết rằng họ đã ở trong một cái bẫy khác. Được đánh giá là một bộ phim hành động phiêu lưu vô cùng hấp dẫn và kịch tính, với những tình tiết li kỳ, đảm bảo các bạn sẽ bị lôi cuốn theo từng nhịp đập của phim.','Đang cập nhật','OOTAa9qjOwk',1,'https://img.youtube.com/vi/OOTAa9qjOwk/maxresdefault.jpg',10000,0,'KẺ TRỘM MỘ - THUYẾT MINH',17,1,'2024-02-09 16:28:24','2024-02-09 16:28:24'),(24,'Đang cập nhật','Jian, một võ sĩ có khả năng thấu thị, điều tra cái chết của anh trai mình với sự giúp đỡ của Thám tử LA Abby. Họ cùng nhau tìm kiếm công lý trong khi chiến đấu chống lại một tên tội phạm công nghệ cao. Một bộ phim với nhiều cảnh hành động đã mắt, những màn võ thuật đỉnh cao, đảm bảo bạn sẽ có một thời gian xem phim tuyệt vời và thỏa mãn.','Đang cập nhật','O8918Oiv_lI',1,'https://img.youtube.com/vi/O8918Oiv_lI/maxresdefault.jpg',0,0,'NĂNG LỰC THẤU THỊ',9,1,'2024-02-09 16:29:31','2024-02-09 16:29:31'),(25,'Đang cập nhật','Một bộ phim hành động viễn Tây kể về người nông dân cứu một người đàn ông bị thương đang giữ một túi tiền mặt. Khi một toán lính đến đòi tiền, anh ta phải quyết định xem nên tin tưởng ai. Trong khi bị bao vây, anh ta đã bộc lộ tài bắn súng khiến danh tính thật sự của anh ta bị nghi ngờ. Được đánh giá là một trong những bộ phim với chủ đề cao bồi hay nhất hiện nay! Kính mời các bạn đón xem ','Đang cập nhật','aZt_Z2wwCSM',1,'https://img.youtube.com/vi/aZt_Z2wwCSM/maxresdefault.jpg',10000,0,'GIÀ GÂN MIỀN VIỄN TÂY',5,1,'2024-02-09 16:31:32','2024-02-09 16:31:32'),(26,'Đang cập nhật','Một câu chuyện hấp dẫn và ly kì về một nhà vật lý hạt đau buồn vì mất chồng trong một vụ tai nạn ô tô đã đi đến một thế giới song song để tìm lại anh ta,nhưng cô không ngờ rằng, việc này sẽ gây ra hậu quả thảm khốc cho gia đình cô theo cách mà cô không lường trước được. Bộ phim này đã chiến thắng vô cùng nhiều giải thưởng và để lại cho người coi vô vàn câu hỏi về các song trùng. Kính mời các bạn đón xem','Đang cập nhật','k8UTc0JIKVs',1,'https://img.youtube.com/vi/k8UTc0JIKVs/maxresdefault.jpg',0,0,'THẾ GIỚI SONG SONG',7,2,'2024-02-09 16:37:43','2024-02-09 16:37:43'),(27,'Đang cập nhật','Sau một cuộc tấn công giữa các thiên hà tàn khốc trên Trái đất, những con người sống sót cuối cùng phải hợp sức lại với nhau để sinh tồn. Khi chiến tranh bùng nổ và cuộc đấu tranh để sống sót trở nên tồi tệ hơn, họ nhận ra cách duy nhất để cứu loài người là đi trước kẻ tấn công một bước và tấn công lại chúng với niềm hi vọng mọi thứ sẽ trở lại được như xưa.','Đang cập nhật','DWm0G2E2hdw',1,'https://img.youtube.com/vi/DWm0G2E2hdw/maxresdefault.jpg',10000,0,'GIẢI CỨU ĐỊA CẦU',7,2,'2024-02-09 16:42:04','2024-02-09 16:42:04'),(28,'Đang cập nhật','Ở Đông Nam Á, với phong cảnh tuyệt đẹp, một chiếc tàu tuần dương chở nhiều khách du lịch trên đó đi vào vùng nước huyền bí, trong đó có một dị nhân khổng lồ. Người ta chết một cách bí ẩn. Kẻ giết người trong bóng tối và người bí ẩn trong số khách du lịch biến chiếc tàu tuần dương trở thành cỗ máy hành quyết . Những người sống sót chạy trốn đến một hòn đảo không có người ở kỳ lạ gặp một người dị nhân hung dữ hơn và bắt đầu một hành trình sinh tồn....','Đang cập nhật','9exPYven00U',1,'https://img.youtube.com/vi/9exPYven00U/maxresdefault.jpg',10000,0,'NƯỚC MẮT QUỶ DỮ',3,1,'2024-03-17 10:49:17','2024-03-17 10:49:17'),(29,'Ryan Kwanten, Maggie Grace, Mike Epps, Russell Peters, Clancy Brown và John Malkovich','Supercon là một bộ phim hài hành động của Mỹ năm 2018 do Zak Knutson đạo diễn, người viết kịch bản cùng Andy Sipes và Dana Snyder. Phim có sự tham gia của dàn diễn viên bao gồm Ryan Kwanten, Maggie Grace, Mike Epps, Russell Peters, Clancy Brown và John Malkovich','Zak Knutson','0a4_UhItXU0',1,'https://img.youtube.com/vi/0a4_UhItXU0/maxresdefault.jpg',0,0,'Tội Phạm Thành Phố - SuperCon',4,1,'2024-03-17 10:50:34','2024-03-17 10:50:34'),(30,'Axel Harney, Mike Kopera,  Juan Monsalvez, Jeneta St. Clair, Tevis R. Marcum,  Brooke Heatley, Jackson Thompson...','Bộ phim mới \"Boyne Falls\" sẽ được chiếu trên màn ảnh rộng vào ngày 18 tháng 4 tại Nhà hát Nghệ thuật Landmark Main ở Royal Oak cho buổi chiếu đầu tiên của bộ phim Michigan. Nội dung xoay quanh hai người bạn hay tranh cãi đi vào rừng để nghỉ làm, tình cờ gặp một phòng thí nghiệm mai tóe bị cô lập và phải chiến đấu để giành lấy mạng sống của mình.','Đang cập nhật','3FctZ58dJbA',1,'https://img.youtube.com/vi/3FctZ58dJbA/maxresdefault.jpg',15000,0,'BÍ ẨN RỪNG SÂU',8,1,'2024-03-17 10:51:45','2024-03-17 10:51:45'),(31,'Hannah Barefoot, Lindsay Hartley, Jane Widdop, Paris Smith, Allison McAtee, Jason Olive','NGÃ RẼ SINH TỬ là một bộ phim giật gân của Mỹ  năm 2020 do Lindsay Hartley viết kịch bản và đạo diễn bởi Ben Meyerson. với sự tham gia của các diễn viên: Hannah Barefoot, Lindsay Hartley, Jane Widdop, Paris Smith, Allison McAtee, Jason Olive.\r\nSau khi bị nhiễm một loại ký sinh trùng thí nghiệm bí ẩn, hai người cô đơn, lạc lối bắt đầu nghe thấy cùng một giọng nói bí ẩn trong đầu họ, một giọng nói có thể đang hoặc không thể thao túng họ vì mục đích nham hiểm của chính nó.','Ben Meyerson','eXC13AOcBwI',1,'https://img.youtube.com/vi/eXC13AOcBwI/maxresdefault.jpg',15000,0,'NGÃ RẼ SINH TỬ - Deadliest Switch',12,1,'2024-03-17 10:52:44','2024-03-17 10:52:44'),(32,'Yumna Marwan, Asaad Abdul Majeed, Redhab Ahmad, Ali Karkhi, Rudhab Ahmed','Kẻ Cầm Quyền khiến bạn ước nó chưa từng tồn tại và dàn diễn viên đẩy bạn vào hoàn cảnh khó khăn. Dàn diễn viên bao gồm Asaad Abdul Majeed, Iman Abdulhasan và Redhab Ahmad. Phim đã nhận được nhiều giải thưởng và đề cử tại Liên hoan phim quốc tế Busan (2019) và Liên hoan phim quốc tế Cairo cùng nhiều giải thưởng khác.\r\nĐạo diễn Mohanad Hayal đã tập hợp được một dàn diễn viên xuất sắc cho bộ phim của mình. Người bắn tỉa đưa chúng ta xuyên suốt bộ phim với sự hiện diện lặng lẽ nhưng mãnh liệt và mạnh mẽ, gây ấn tượng rất mạnh.','Mohanad Hayal','My2-LVwRuWY',1,'https://img.youtube.com/vi/My2-LVwRuWY/maxresdefault.jpg',12000,0,'KẺ CẦM QUYỀN',8,1,'2024-03-17 10:55:18','2024-03-17 10:55:18'),(33,'Gina Holden, Corin Nemec, Victoria Pratt, Troy Evans, Robert Newman..','Không có cảnh báo trước, Mt. Baker không hoạt động từ lâu của Bang Washington đã thổi bay đỉnh núi lửa của nó. Trong số những mảnh vỡ và sự tàn phá được giải phóng là những sinh vật bay kỳ lạ với sự thèm ăn phàm ăn đối với thịt người. Quân đội Hoa Kỳ giao chiến với các sinh vật trong một trận chiến tuyệt vọng trên bầu trời. Trong khi cuộc chiến phía trên diễn ra, hai nhà khoa học phát hiện ra sự thật chết người rằng nhân loại đang phải đối mặt với cuộc xâm lăng của loài rồng từ sâu trong lòng hành tinh.','Đang cập nhật','4Sb2020a8AQ',1,'https://img.youtube.com/vi/4Sb2020a8AQ/maxresdefault.jpg',20000,0,'Sự Trổi Dậy Của Rồng DRACANO',7,2,'2024-03-17 10:56:27','2024-03-17 10:56:27'),(34,'Laurie Fortier, Annika Foster, Megan Elizabeth Barker, Ashlynn Yennie, Crystal Allen','Rachel Collins sắp kỷ niệm sinh nhật thứ mười sáu ngọt ngào của mình. Cô có mọi thứ mà một cô gái mong muốn, nhưng khi một vụ giết người gây sốc tại bữa tiệc của cô làm sáng tỏ mạng lưới dối trá đen tối trong gia đình cô, Rachel đặt câu hỏi về tất cả những gì cô từng biết.','Đang cập nhật','f81csIqehPY',1,'https://img.youtube.com/vi/f81csIqehPY/maxresdefault.jpg',0,0,'BÍ ẨN HOÀN HẢO',5,4,'2024-03-17 10:57:39','2024-03-17 10:57:39'),(35,'Đang cập nhật','Woddy Grant(Bruce Dern) được tìm thấy đang đi bộ gần đường cao tốc tại nơi ông sống - Billings, Montana. Ông được con trai David(Forte) đưa về nhà và anh biết bố mình đang cố đi bộ đến tận Nebraska để lĩnh giải thưởng $1 triệu được in trên tờ rơi quảng cáo. Sau đó, trong lúc làm việc David nhận được điện thoại từ mẹ - Kate(June Squibb) và anh lại phải đi đón ông khi ông tiếp tục đi ý định đi bộ đến Nebraska. Cuối cùng, vì muốn đi khỏi Billings một thời gian và để đưa Woddy đến Lincoln, Nebraska cho ông biết rõ đây chỉ là trò quảng cáo chứ không phải trúng thưởng thực sự. Bộ phim chủ yếu kể về những chuyện xảy ra khi David và Woddy từ Montana đến Nebraska.','Đang cập nhật','KEX4VV6fJM8',1,'https://img.youtube.com/vi/KEX4VV6fJM8/maxresdefault.jpg',20000,0,'Giấc Mơ Tỷ Phú',6,1,'2024-03-17 10:59:25','2024-03-17 10:59:25'),(36,'Nicky Whelan, Anna Hutchison, Giullian Yao Gioiello, Trevor Stines, Ricky Garcia, Sarah Cleveland, Claudia Coffey','Katie say khướt sau bữa tiệc và muốn được bạn trai Rick và bạn trai Jared đưa về nhà. Tuy nhiên, Rick cũng say rượu và gây ra một vụ tai nạn xe hơi chết người. Vụ tai nạn đã cướp mất chồng và các con của Megan. Rick lo sợ mình sẽ gặp rắc rối và lái xe đi tiếp mà không gọi cảnh sát. Cả ba đồng ý không bao giờ nói về vụ tai nạn nữa, nhưng lúc đó không biết rằng Megan đang ra tay để trả thù.','Đang cập nhật','k2zFKNVWsWY',1,'https://img.youtube.com/vi/k2zFKNVWsWY/maxresdefault.jpg',0,0,'BÍ ẨN DƯỚI ĐÁY HỒ',8,4,'2024-03-17 11:00:25','2024-03-17 11:00:25');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-18  1:44:37
