-- MySQL dump 10.13  Distrib 8.0.23, for macos10.15 (x86_64)
--
-- Host: localhost    Database: empManager
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employees_manager`
--

DROP TABLE IF EXISTS `employees_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees_manager` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `city` varchar(40) DEFAULT NULL,
  `street_address` varchar(80) DEFAULT NULL,
  `state` varchar(5) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees_manager`
--

LOCK TABLES `employees_manager` WRITE;
/*!40000 ALTER TABLE `employees_manager` DISABLE KEYS */;
INSERT INTO `employees_manager` VALUES (1,'Rack','Lei','jackon@network.com','male','San Jone','126','CA','394221','7383627627',24),(9,'John','Doe','jhondoe@foo.com','male','New York','89','WA','09889','1283645645',34),(10,'Leila','Mills','mills@leila.com','female','San Diego','55','CA','098765','9983632461',29),(11,'Richard','Desmond','dismond@foo.com','male','Salt Lake City','90','UT','457320','90876987654',30),(12,'Susan','Smith','susanmith@baz.com','female','Louisville','43','KNT','445321','224355488976',28),(13,'Brad','Simpson','brad@foo.com','male','Atlanta','128','GEO','394221','6854634522',40),(14,'Neil','Walker','walkerneil@baz.com','male','Nashville','1','TN','90143','45372788192',42),(15,'Robert','Thomson','jack@net.com','male','New Orleans','126','LU','63281','91232876454',24);
/*!40000 ALTER TABLE `employees_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@assemblerschool.com','123456','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_emp`
--

DROP TABLE IF EXISTS `users_emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_emp` (
  `emp_id` int NOT NULL,
  `user_id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  KEY `emp_id` (`emp_id`),
  KEY `user_id` (`user_id`),
  KEY `email` (`email`),
  CONSTRAINT `users_emp_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees_manager` (`emp_id`),
  CONSTRAINT `users_emp_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `users_emp_ibfk_3` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_emp`
--

LOCK TABLES `users_emp` WRITE;
/*!40000 ALTER TABLE `users_emp` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'empManager'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-01 13:33:07
