-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: proyect_lok
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
-- Table structure for table `actividades_dimensiones`
--

DROP TABLE IF EXISTS `actividades_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividades_dimensiones` (
  `idactividades` int(11) NOT NULL,
  `documentacion` varchar(45) NOT NULL,
  `tareas` varchar(45) NOT NULL,
  `talleres` varchar(45) NOT NULL,
  `evaluaciones` varchar(45) NOT NULL,
  `foro` varchar(45) NOT NULL,
  `semana_dimension_id` int(11) NOT NULL,
  `usuarios_modulos_id` int(11) NOT NULL,
  PRIMARY KEY (`idactividades`,`semana_dimension_id`),
  KEY `fk_actividades_dimensiones_Capitulo_dimensiones1_idx` (`semana_dimension_id`),
  KEY `fk_actividades_dimensiones_usuarios_modulos1_idx` (`usuarios_modulos_id`),
  CONSTRAINT `fk_actividades_dimensiones_Capitulo_dimensiones1` FOREIGN KEY (`semana_dimension_id`) REFERENCES `semana_dimensiones` (`id_actividades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_actividades_dimensiones_usuarios_modulos1` FOREIGN KEY (`usuarios_modulos_id`) REFERENCES `usuarioxmodulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades_dimensiones`
--

LOCK TABLES `actividades_dimensiones` WRITE;
/*!40000 ALTER TABLE `actividades_dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interfaz`
--

DROP TABLE IF EXISTS `interfaz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interfaz` (
  `id_interfaz` int(11) NOT NULL,
  `home` varchar(45) NOT NULL,
  `dashboard` varchar(45) NOT NULL,
  `activities` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `deteccion_gesto_camara` int(11) NOT NULL,
  `LOK_hecho_idPage` int(11) NOT NULL,
  `usuario_dimensiones_CC` int(11) NOT NULL,
  PRIMARY KEY (`id_interfaz`,`LOK_hecho_idPage`),
  KEY `fk_Interfaz.dimensiones_LOK_hecho1_idx` (`LOK_hecho_idPage`),
  KEY `fk_Interfaz_dimensiones_CuentaUsuario_dimensiones1_idx` (`usuario_dimensiones_CC`),
  CONSTRAINT `fk_Interfaz.dimensiones_LOK_hecho1` FOREIGN KEY (`LOK_hecho_idPage`) REFERENCES `proyect_LOK_hecho` (`idPage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Interfaz_dimensiones_CuentaUsuario_dimensiones1` FOREIGN KEY (`usuario_dimensiones_CC`) REFERENCES `usuario_dimensiones` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interfaz`
--

LOCK TABLES `interfaz` WRITE;
/*!40000 ALTER TABLE `interfaz` DISABLE KEYS */;
/*!40000 ALTER TABLE `interfaz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo_aprendizaje_dimensiones`
--

DROP TABLE IF EXISTS `modulo_aprendizaje_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo_aprendizaje_dimensiones` (
  `id` int(11) NOT NULL,
  `cloud_save` varchar(45) NOT NULL,
  `tipo_modulo` char(1) NOT NULL COMMENT 'E=modulo estandar\nP=modulo personalizado',
  `sistema_puntaje` varchar(45) NOT NULL,
  `nota_final` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo_aprendizaje_dimensiones`
--

LOCK TABLES `modulo_aprendizaje_dimensiones` WRITE;
/*!40000 ALTER TABLE `modulo_aprendizaje_dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulo_aprendizaje_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia_dimensiones`
--

DROP TABLE IF EXISTS `multimedia_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia_dimensiones` (
  `codigo` varchar(45) NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `tamano` decimal(10,0) NOT NULL,
  `formato` varchar(4) NOT NULL,
  `duracion` decimal(10,0) NOT NULL,
  `Capitulo_dimensiones_id` int(11) NOT NULL,
  `usuarioxmodulos_id` int(11) NOT NULL,
  PRIMARY KEY (`codigo`,`Capitulo_dimensiones_id`),
  KEY `fk_multimedia_dimensiones_usuarioxmodulos1_idx` (`usuarioxmodulos_id`),
  KEY `fk_multimedia_dimensiones_actividades_dimensiones1` (`Capitulo_dimensiones_id`),
  CONSTRAINT `fk_multimedia_dimensiones_actividades_dimensiones1` FOREIGN KEY (`Capitulo_dimensiones_id`) REFERENCES `actividades_dimensiones` (`semana_dimension_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_multimedia_dimensiones_usuarioxmodulos1` FOREIGN KEY (`usuarioxmodulos_id`) REFERENCES `usuarioxmodulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia_dimensiones`
--

LOCK TABLES `multimedia_dimensiones` WRITE;
/*!40000 ALTER TABLE `multimedia_dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimedia_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyect_LOK_hecho`
--

DROP TABLE IF EXISTS `proyect_LOK_hecho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyect_LOK_hecho` (
  `idPage` int(11) NOT NULL,
  `tittle` varchar(45) NOT NULL,
  `dominio` varchar(45) NOT NULL,
  `version` varchar(45) NOT NULL,
  `informacion` varchar(45) NOT NULL,
  `version_date` date NOT NULL,
  PRIMARY KEY (`idPage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyect_LOK_hecho`
--

LOCK TABLES `proyect_LOK_hecho` WRITE;
/*!40000 ALTER TABLE `proyect_LOK_hecho` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyect_LOK_hecho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semana_dimensiones`
--

DROP TABLE IF EXISTS `semana_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semana_dimensiones` (
  `id_actividades` int(11) NOT NULL,
  `tematica` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `ModuloAprendizaje_dimensiones_id` int(11) NOT NULL,
  PRIMARY KEY (`id_actividades`,`ModuloAprendizaje_dimensiones_id`),
  KEY `fk_Capitulo_dimensiones_ModuloAprendizaje_dimensiones1_idx` (`ModuloAprendizaje_dimensiones_id`),
  CONSTRAINT `fk_Capitulo_dimensiones_ModuloAprendizaje_dimensiones1` FOREIGN KEY (`ModuloAprendizaje_dimensiones_id`) REFERENCES `modulo_aprendizaje_dimensiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semana_dimensiones`
--

LOCK TABLES `semana_dimensiones` WRITE;
/*!40000 ALTER TABLE `semana_dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `semana_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_dimensiones`
--

DROP TABLE IF EXISTS `usuario_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_dimensiones` (
  `cc` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `institucion` varchar(45) NOT NULL,
  `estado` char(1) NOT NULL,
  `roll` char(1) NOT NULL DEFAULT 'e',
  PRIMARY KEY (`cc`),
  UNIQUE KEY `correo_UNIQUE` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_dimensiones`
--

LOCK TABLES `usuario_dimensiones` WRITE;
/*!40000 ALTER TABLE `usuario_dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarioxmodulos`
--

DROP TABLE IF EXISTS `usuarioxmodulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarioxmodulos` (
  `id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `estado` char(1) NOT NULL COMMENT 'A=Activo\nI=Inactivco\nC=Completado',
  `certificación` varchar(45) NOT NULL,
  `fecha_finalización` date NOT NULL,
  `ModuloAprendizaje_id` int(11) NOT NULL,
  `usuario_dimensiones_cc` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarioxmodulos_ModuloAprendizaje_dimensiones1_idx` (`ModuloAprendizaje_id`),
  KEY `fk_usuarioxmodulos_usuario_dimensiones1_idx` (`usuario_dimensiones_cc`),
  CONSTRAINT `fk_usuarioxmodulos_ModuloAprendizaje_dimensiones1` FOREIGN KEY (`ModuloAprendizaje_id`) REFERENCES `modulo_aprendizaje_dimensiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarioxmodulos_usuario_dimensiones1` FOREIGN KEY (`usuario_dimensiones_cc`) REFERENCES `usuario_dimensiones` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarioxmodulos`
--

LOCK TABLES `usuarioxmodulos` WRITE;
/*!40000 ALTER TABLE `usuarioxmodulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarioxmodulos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-24 12:31:09
