-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: deliveryp
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `prestador`
--

DROP TABLE IF EXISTS `prestador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `cel` varchar(12) DEFAULT NULL,
  `servico` varchar(100) DEFAULT NULL,
  `localizacao` varchar(500) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `pedido` varchar(10) DEFAULT NULL,
  `permissao` varchar(12) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `timeopen` varchar(12) DEFAULT NULL,
  `timeclose` varchar(12) DEFAULT NULL,
  `promocao` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestador`
--

LOCK TABLES `prestador` WRITE;
/*!40000 ALTER TABLE `prestador` DISABLE KEYS */;
INSERT INTO `prestador` VALUES (48,'dsfdsfds','43543543','Loja de bike','-15.834577604353226, -47.930986719604505','s54o505','on','on','dasda','06:30','19:30',NULL,'43543543'),(47,'fdssfddsfsd','342432','Mercado','-15.833834439558677, -47.932488756652845','d24e845','on','on','sadsad','06:30','18:30',NULL,'342432'),(46,'dsfsfds','443543543543','Padaria','-15.822480193108973, -47.927510576721204','s35a204','on','on','dasdas','06:30','18:30',NULL,NULL),(44,'asdsad','24324','Padaria','','s32a(','on','on','sdsadas','06:30','18:30',NULL,NULL),(45,'sdfdsfds','43543','Loja de bike','','d54o(','on','on','asdasdsa','06:30','10:30',NULL,NULL),(43,'sadsadsad','324234','Salao','-15.803029769803137, -47.90261069189819','a42a819','','','sadsadasda','06:30','18:30',NULL,NULL),(42,'sdfdsfds','345345','Padaria','','d53a(','on','on','sdfdsfsd','06:30','06:30',NULL,NULL),(41,'sadsad','3243423','Mercado','-15.831893940817935, -47.93077214288331','a43e331','on','on','fdasdsa','06:30','07:30',NULL,NULL),(39,'','','','','','','','','','',NULL,NULL),(40,'sadsad','3243423','Mercado','','a43e(','on','on','fdasdsa','06:30','07:30',NULL,NULL),(38,'mercado cheiro verde alteerado','3243242','Mercado','','e43e(','on','on','23432423','06:30','10:30',NULL,NULL),(37,'mecanica do ze da montanha','23423423','Mecanica','-15.809604314983876, -47.96145794862986','e42e986','on','on','','06:30','11:30',NULL,NULL),(34,'','','','','','','','','','',NULL,NULL),(35,'','','','','','','','','','',NULL,NULL),(36,'','','','','','','','','','',NULL,NULL),(31,'','','','','','','','','','',NULL,NULL),(32,'','','','','','','','','','',NULL,NULL),(33,'','','','','','','','','','',NULL,NULL),(30,'vddgf','4554','Padaria','-15.833710578493799, -47.93313248681642','d54a642','on','on','fsdfs','07:30','12:30',NULL,NULL),(27,'','','','','','','','','','',NULL,NULL),(28,'','','','','','','','','','',NULL,NULL),(29,'','','','','','','','','','',NULL,NULL),(24,'','','','','','','','','','',NULL,NULL),(25,'','','','','','','','','','',NULL,NULL),(26,'mercadin ','34343','Mercado','-15.832348101768236, -47.93038590478517','e34e517','on','on','dsadasdsa','06:35','10:30',NULL,NULL),(23,'padoca do jao','35857022','Loja de bike','-15.829790362293387, -47.94283018687196','a85o196','','on','sdsadsada','06:30','19:31',NULL,NULL);
/*!40000 ALTER TABLE `prestador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (25,'Mecanica'),(24,'Salao'),(23,'Mercado'),(22,'Padaria'),(21,'Loja de bike');
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'deliveryp'
--

--
-- Dumping routines for database 'deliveryp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-20 13:48:56
