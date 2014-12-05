/*
SQLyog Ultimate v8.61 
MySQL - 5.5.16 : Database - banco_pregunta
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`banco_pregunta` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `banco_pregunta`;

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `preguntas` */

insert  into `preguntas`(`idPregunta`,`pregunta`) values (1,'¿De que color es el cielo?'),(2,'¿Cual es el banco de México?'),(3,'¿Programa base de una computadora?'),(4,'¿Cuanto es 4 + 6?'),(5,'Pais donde se encuentra la torre de pisa?'),(6,'¿Cuantos años tiene un lustro?'),(7,'¿Como le llaman a los textos de autores desconocidos?'),(8,'¿Cual es el color que representa la esperanza?'),(9,'Órgano del cuerpo que produce la bilis'),(10,'¿Horas que, en promedio, duerme al día un gato?'),(11,'Ciudad italiana conocida como \"La Novia del Mar\"'),(12,'Reptil cuya piel cambia de color'),(13,'Última letra del alfabeto griego'),(14,'¿Qué contiene más energía?'),(15,'¿Cuál de las siguientes afirmaciones sobre los virus es incorrecta? '),(16,'¿Qué circula por un conductor?'),(17,'¿Qué le sucede a la energía?'),(18,'¿Como se llama el hijo de rick en la serie \'The Walking dead\''),(19,'¿Quién fue el rey del pop?'),(20,'¿Como se llama el presidente de México 2014?');

/*Table structure for table `respuesta` */

DROP TABLE IF EXISTS `respuesta`;

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(50) DEFAULT NULL,
  `idPregunta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRespuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `respuesta` */

insert  into `respuesta`(`idRespuesta`,`respuesta`,`idPregunta`) values (1,'Azul',1),(2,'Rosa',1),(3,'Verde',1),(4,'Banamex',2),(5,'Bancomer',2),(6,'Santander',2),(7,'Sistema Operativo',3),(8,'Office',3),(9,'Antivirus',3),(10,'15',4),(11,'10',4),(12,'36',4),(13,'Italia',5),(14,'Brasil',5),(15,'Argentina',5),(16,'15',6),(17,'5',6),(18,'10',6),(19,'No se',7),(20,'Anonimo',7),(21,'Autor',7),(22,'Verde',8),(23,'Blanco',8),(24,'Rojo',8),(25,'Páncreas',9),(26,'Hígado',9),(27,'Riñón',9),(28,'10',10),(29,'12',10),(30,'14',10),(31,'Roma',11),(32,'Florencia',11),(33,'Venecia',11),(34,'Camaleón',12),(35,'Iguana',12),(36,'Cobra',12),(37,'Zeta',13),(38,'Omega',13),(39,'Alpha',13),(40,'No tiene metabolismo',14),(41,'Se multiplican',14),(42,'Están vivos',14),(43,'100 gramos de nueces',15),(44,'100 gramos de espinacas',15),(45,'100 gramos de carne',15),(46,'Radicales libres',16),(47,'Fotones libres',16),(48,'Electrones libres',16),(49,'Se consume',17),(50,'Se transforma',17),(51,'Se destruye',17),(52,'Gleen',18),(53,'Daryl',18),(54,'Carl',18),(55,'Vicente Feranadez',19),(56,'Michael Jason',19),(57,'Ricky Martin',19),(58,'Lopez Obrador',20),(59,'Enrique Peña Nieto',20),(60,'Josefina Lopez',20);

/*Table structure for table `respuesta_bien` */

DROP TABLE IF EXISTS `respuesta_bien`;

CREATE TABLE `respuesta_bien` (
  `idBien` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` int(11) DEFAULT NULL,
  `respuesta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBien`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `respuesta_bien` */

insert  into `respuesta_bien`(`idBien`,`pregunta`,`respuesta`) values (1,1,1),(2,2,4),(3,3,7),(4,4,11),(5,5,13),(6,6,17),(7,7,20),(8,8,22),(9,9,26),(10,10,30),(11,11,33),(12,12,34),(13,13,38),(14,14,40),(15,15,43),(16,16,48),(17,17,50),(18,18,54),(19,19,56),(20,20,59);

/*Table structure for table `usuario_preguntas` */

DROP TABLE IF EXISTS `usuario_preguntas`;

CREATE TABLE `usuario_preguntas` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `apellido_paterno_usuario` varchar(50) DEFAULT NULL,
  `apellido_materno_usuario` varchar(50) DEFAULT NULL,
  `usuario_usuario` varchar(50) DEFAULT NULL,
  `contrasena_usuario` varchar(50) DEFAULT NULL,
  `estatus_usuario` varchar(3) DEFAULT NULL,
  `cal_usuario` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `usuario_preguntas` */

insert  into `usuario_preguntas`(`id_usuario`,`nombre_usuario`,`apellido_paterno_usuario`,`apellido_materno_usuario`,`usuario_usuario`,`contrasena_usuario`,`estatus_usuario`,`cal_usuario`) values (1,'Margarita','Martinez','Beltran','maggie','1234','si','5');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
