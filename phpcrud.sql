-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: phpcrud
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Ventas'),(2,'Recursos Humanos'),(3,'Tecnología'),(4,'Soporte'),(5,'Investigacion'),(6,'Magia'),(7,'Chocolatada');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depId` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `depId` (`depId`),
  CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`depId`) REFERENCES `departamento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,1,'Lucas Vargas','root','root'),(2,1,'Juan Perez','juanito123','$2y$10$P8x6BqkvoVlE3h.j6itqdu2A.iJ0elTfZM9nGCSffKu'),(3,1,'Julio Eduardo','julioprofe','$2y$10$.3Wodnz9K7H5pKPMlXq.XOP42cvFv/4tDMrFq7QsQEc'),(4,4,'Mario Bross','mabrio','$2y$10$FskyUuYRE5t1lX5pvtp6meo/Mfmg5K.HM43Diqf3C86'),(5,6,'Harry Potter','harrycitomalito','$2y$10$l.pDhS3CCNtlN4bvDyZkF.l0ZQNCK9J1lAGKQhKA5mj'),(6,2,'Paolo Guerrero','paolin','$2y$10$y7iJIaf73nzO2WsRnU1IeOh1iFfR6e74ls25J/8/rtj'),(7,1,'Juan Mamani','beba','$2y$10$9OxZxa3jNxW4hpu.O08/q.gktr/ebI8WVYP1LBt8NUh'),(9,5,'Mercedes Lujan','mercede123','$2y$10$7xnb2TTyrEV6.JSyJ1bgTOjlpVxHNq3GVGFN8DQfuAb'),(10,3,'Amador Maquera','otrousuario','$2y$10$5ksFHr9rfwDr079TTuNtqu3r/rmuCAo4rz8NqAgruSy'),(13,6,'Lucas Moura','madrid','$2y$10$JtH63vhNTjCMygHV40GPteOrPuumGCiDjei4e/3gWza'),(16,1,'Iruma Condori','noseee','$2y$10$9Y7NSBb5e.ZoBnvoxodYtu39i9eB4jCYE1RqRCN0VXS'),(20,3,'Itadori Condemaita','itaconde123','$2y$10$JoVNrv.4QWZ75b.VryERg.Li9xFZGOEokj69JzgYkMV');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados_backup`
--

DROP TABLE IF EXISTS `empleados_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados_backup` (
  `id` int(11) NOT NULL DEFAULT 0,
  `depId` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados_backup`
--

LOCK TABLES `empleados_backup` WRITE;
/*!40000 ALTER TABLE `empleados_backup` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleados_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `empleados_cantidad_departamento`
--

DROP TABLE IF EXISTS `empleados_cantidad_departamento`;
/*!50001 DROP VIEW IF EXISTS `empleados_cantidad_departamento`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `empleados_cantidad_departamento` AS SELECT
 1 AS `id_departamento`,
  1 AS `dep`,
  1 AS `cantidad_empleados` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `nombres_usuarios_por_departamento`
--

DROP TABLE IF EXISTS `nombres_usuarios_por_departamento`;
/*!50001 DROP VIEW IF EXISTS `nombres_usuarios_por_departamento`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `nombres_usuarios_por_departamento` AS SELECT
 1 AS `nombre`,
  1 AS `usuario`,
  1 AS `dep` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vista_empleados_departamentos`
--

DROP TABLE IF EXISTS `vista_empleados_departamentos`;
/*!50001 DROP VIEW IF EXISTS `vista_empleados_departamentos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vista_empleados_departamentos` AS SELECT
 1 AS `id_empleado`,
  1 AS `nombre_empleado`,
  1 AS `nombre_departamento` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `empleados_cantidad_departamento`
--

/*!50001 DROP VIEW IF EXISTS `empleados_cantidad_departamento`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp850 */;
/*!50001 SET character_set_results     = cp850 */;
/*!50001 SET collation_connection      = cp850_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empleados_cantidad_departamento` AS select `d`.`id` AS `id_departamento`,`d`.`dep` AS `dep`,count(`e`.`id`) AS `cantidad_empleados` from (`departamento` `d` left join `empleados` `e` on(`d`.`id` = `e`.`depId`)) group by `d`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `nombres_usuarios_por_departamento`
--

/*!50001 DROP VIEW IF EXISTS `nombres_usuarios_por_departamento`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp850 */;
/*!50001 SET character_set_results     = cp850 */;
/*!50001 SET collation_connection      = cp850_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `nombres_usuarios_por_departamento` AS select `e`.`nombre` AS `nombre`,`e`.`usuario` AS `usuario`,`d`.`dep` AS `dep` from (`empleados` `e` join `departamento` `d` on(`e`.`depId` = `d`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_empleados_departamentos`
--

/*!50001 DROP VIEW IF EXISTS `vista_empleados_departamentos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp850 */;
/*!50001 SET character_set_results     = cp850 */;
/*!50001 SET collation_connection      = cp850_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_empleados_departamentos` AS select `e`.`id` AS `id_empleado`,`e`.`nombre` AS `nombre_empleado`,`d`.`dep` AS `nombre_departamento` from (`empleados` `e` join `departamento` `d` on(`e`.`depId` = `d`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-08  6:22:53
