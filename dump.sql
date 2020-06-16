-- MySQL dump 10.13  Distrib 5.7.26, for osx10.10 (x86_64)
--
-- Host: localhost    Database: lyonpalme
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Current Database: `lyonpalme`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `lyonpalme` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `lyonpalme`;

--
-- Table structure for table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adherent` (
  `id_adh` char(7) NOT NULL,
  `actif_adh` tinyint(1) DEFAULT NULL,
  `nom_adh` varchar(50) DEFAULT NULL,
  `prenom_adh` varchar(50) DEFAULT NULL,
  `datenaissance_adh` date DEFAULT NULL,
  `dateinscription_adh` date DEFAULT NULL,
  `datefincertifmed_adh` date DEFAULT NULL,
  `fonctionbureau_adh` varchar(50) DEFAULT NULL,
  `estresponsablemateriel_adh` tinyint(1) DEFAULT NULL,
  `estresponsableplanning_adh` tinyint(1) DEFAULT NULL,
  `login_adh` varchar(50) DEFAULT NULL,
  `mdp_adh` varchar(255) DEFAULT NULL,
  `adresse_adh` varchar(80) DEFAULT NULL,
  `num_telephone_adh` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_adh`),
  UNIQUE KEY `fonctionbureau_adh` (`fonctionbureau_adh`),
  UNIQUE KEY `login_adh` (`login_adh`),
  UNIQUE KEY `mdp_adh` (`mdp_adh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adherent`
--

LOCK TABLES `adherent` WRITE;
/*!40000 ALTER TABLE `adherent` DISABLE KEYS */;
INSERT INTO `adherent` VALUES ('TEST1',1,'santoni','thomas','2020-06-09','2020-06-09','2020-06-09','secretaire',1,1,'test1','$2y$10$9d6Use/iIgu3cphJmxHD/eO7fHJhgLmEW7cnimIrX7otN9zPGbD0C','rue du perron, Oullins','0649170514'),('unid',0,'unNom','unPrenom',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `adherent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animer`
--

DROP TABLE IF EXISTS `animer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animer` (
  `id_seance` char(7) NOT NULL,
  `id_adh` char(7) NOT NULL,
  `commentaireindispo_animer` varchar(50) DEFAULT NULL,
  `propositionechange_animer` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_seance`,`id_adh`),
  KEY `id_adh` (`id_adh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animer`
--

LOCK TABLES `animer` WRITE;
/*!40000 ALTER TABLE `animer` DISABLE KEYS */;
INSERT INTO `animer` VALUES ('SEA0001','ADH0001',NULL,NULL),('SEA0001','ADH0004',NULL,NULL),('SEA0002','ADH0006',NULL,NULL),('SEA0002','ADH0001',NULL,NULL),('SEA0003','ADH0005','Indisponible','Echange avec Hans Solo possible ?');
/*!40000 ALTER TABLE `animer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coach`
--

DROP TABLE IF EXISTS `coach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coach` (
  `id_adh` char(7) NOT NULL,
  PRIMARY KEY (`id_adh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coach`
--

LOCK TABLES `coach` WRITE;
/*!40000 ALTER TABLE `coach` DISABLE KEYS */;
/*!40000 ALTER TABLE `coach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competition`
--

DROP TABLE IF EXISTS `competition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competition` (
  `id_compet` char(7) NOT NULL,
  `libelle_compet` varchar(50) DEFAULT NULL,
  `dateclotureinscription_compet` date DEFAULT NULL,
  PRIMARY KEY (`id_compet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competition`
--

LOCK TABLES `competition` WRITE;
/*!40000 ALTER TABLE `competition` DISABLE KEYS */;
INSERT INTO `competition` VALUES ('COM0001','Demi-finale Rhône 2020','2020-06-30'),('COM0002','Amicale inter-région 2020','2020-09-30');
/*!40000 ALTER TABLE `competition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distance`
--

DROP TABLE IF EXISTS `distance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distance` (
  `id_distance` char(7) NOT NULL,
  `metres_distance` varchar(10) NOT NULL,
  PRIMARY KEY (`id_distance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distance`
--

LOCK TABLES `distance` WRITE;
/*!40000 ALTER TABLE `distance` DISABLE KEYS */;
INSERT INTO `distance` VALUES ('DIS0001','1000 m'),('DIS0002','3000 m'),('DIS0003','5000 m'),('DIS0004','10 000 m');
/*!40000 ALTER TABLE `distance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrainement` (
  `id_entrainement` char(7) NOT NULL,
  `date_entrainement` date DEFAULT NULL,
  `id_adh` char(7) NOT NULL,
  PRIMARY KEY (`id_entrainement`),
  KEY `id_adh` (`id_adh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrainement`
--

LOCK TABLES `entrainement` WRITE;
/*!40000 ALTER TABLE `entrainement` DISABLE KEYS */;
INSERT INTO `entrainement` VALUES ('ENT0001','2020-06-08','ADH0001'),('ENT0002','2020-06-10','ADH0001'),('ENT0003','2020-06-11','ADH0006');
/*!40000 ALTER TABLE `entrainement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entraineur`
--

DROP TABLE IF EXISTS `entraineur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entraineur` (
  `id_adh` char(7) NOT NULL,
  PRIMARY KEY (`id_adh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entraineur`
--

LOCK TABLES `entraineur` WRITE;
/*!40000 ALTER TABLE `entraineur` DISABLE KEYS */;
/*!40000 ALTER TABLE `entraineur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materiel` (
  `code_mat` char(7) NOT NULL,
  `libelle_mat` varchar(50) DEFAULT NULL,
  `tailleoupointure_mat` varchar(50) DEFAULT NULL,
  `marque_mat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code_mat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiel`
--

LOCK TABLES `materiel` WRITE;
/*!40000 ALTER TABLE `materiel` DISABLE KEYS */;
INSERT INTO `materiel` VALUES ('MAT1001','Monopalme souple','43','Will DePalm'),('MAT1002','Monopalme','44','Will DePalm'),('MAT1003','Monopalme','42','Flipper2000'),('MAT1004','Bipalme souple','42','Flipper2000'),('MAT1005','Bipalme','43','Flipper2000'),('MAT2001','Tuba frontal','Taille unique','Spido'),('MAT2002','Tuba frontal','Taille unique','Spido'),('MAT3001','Lunettes','Petite taille','Spido'),('MAT3002','Lunettes','Moyenne taille','Spido'),('MAT3003','Lunettes','Moyenne taille','Spido'),('MAT3004','Lunettes','Moyenne taille','Rébanne'),('MAT3005','Lunettes','Moyenne taille','Rébanne'),('MAT3006','Lunettes','Grande taille','Rébanne'),('MAT3007','Lunettes','Très grande taille','Rébanne'),('MAT4001','Combinaison','S','Spido'),('MAT4002','Combinaison','S','Flipper2000'),('MAT4003','Combinaison','S','Will DePalm'),('MAT4004','Combinaison','M','Spido'),('MAT4005','Combinaison','M','Spido'),('MAT4006','Combinaison','M','Flipper2000'),('MAT4007','Combinaison','M','Will DePalm'),('MAT4008','Combinaison','L','Spido'),('MAT4009','Combinaison','L','Spido'),('MAT4010','Combinaison','XL','Spido');
/*!40000 ALTER TABLE `materiel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalite`
--

DROP TABLE IF EXISTS `modalite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalite` (
  `id_modalite` char(7) NOT NULL,
  `libelle_modalite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_modalite`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalite`
--

LOCK TABLES `modalite` WRITE;
/*!40000 ALTER TABLE `modalite` DISABLE KEYS */;
INSERT INTO `modalite` VALUES ('MOD0001','relais'),('MOD0002','mono-palme'),('MOD0003','bi-palme'),('MOD0004','en support');
/*!40000 ALTER TABLE `modalite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participersortie`
--

DROP TABLE IF EXISTS `participersortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participersortie` (
  `id_adh` char(7) NOT NULL,
  `id_sortie` char(7) NOT NULL,
  PRIMARY KEY (`id_adh`,`id_sortie`),
  KEY `id_sortie` (`id_sortie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participersortie`
--

LOCK TABLES `participersortie` WRITE;
/*!40000 ALTER TABLE `participersortie` DISABLE KEYS */;
INSERT INTO `participersortie` VALUES ('ADH0003','SOR0001'),('ADH0009','SOR0001');
/*!40000 ALTER TABLE `participersortie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pret`
--

DROP TABLE IF EXISTS `pret`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pret` (
  `code_mat` char(7) NOT NULL,
  `date_pret` date NOT NULL,
  `daterendu_pret` varchar(50) DEFAULT NULL,
  `estrendu_pret` tinyint(1) DEFAULT NULL,
  `commentaire_pret` varchar(50) DEFAULT NULL,
  `id_adh` char(7) NOT NULL,
  PRIMARY KEY (`code_mat`,`date_pret`),
  KEY `id_adh` (`id_adh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pret`
--

LOCK TABLES `pret` WRITE;
/*!40000 ALTER TABLE `pret` DISABLE KEYS */;
INSERT INTO `pret` VALUES ('MAT1001','2020-03-02',NULL,0,NULL,'ADH0003'),('MAT1002','2020-06-01','2020/06/04',1,'Abîmé','ADH0009');
/*!40000 ALTER TABLE `pret` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposer_dist`
--

DROP TABLE IF EXISTS `proposer_dist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proposer_dist` (
  `id_compet` char(7) NOT NULL,
  `id_distance` char(7) NOT NULL,
  PRIMARY KEY (`id_compet`,`id_distance`),
  KEY `id_distance` (`id_distance`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposer_dist`
--

LOCK TABLES `proposer_dist` WRITE;
/*!40000 ALTER TABLE `proposer_dist` DISABLE KEYS */;
INSERT INTO `proposer_dist` VALUES ('COM0001','DIS0002'),('COM0001','DIS0003'),('COM0001','DIS0004'),('COM0002','DIS0001'),('COM0002','DIS0002');
/*!40000 ALTER TABLE `proposer_dist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposer_mod`
--

DROP TABLE IF EXISTS `proposer_mod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proposer_mod` (
  `id_compet` char(7) NOT NULL,
  `id_modalite` char(7) NOT NULL,
  PRIMARY KEY (`id_compet`,`id_modalite`),
  KEY `id_modalite` (`id_modalite`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposer_mod`
--

LOCK TABLES `proposer_mod` WRITE;
/*!40000 ALTER TABLE `proposer_mod` DISABLE KEYS */;
INSERT INTO `proposer_mod` VALUES ('COM0001','MOD0001'),('COM0001','MOD0002'),('COM0001','MOD0003'),('COM0001','MOD0004'),('COM0002','MOD0002'),('COM0002','MOD0003'),('COM0002','MOD0004');
/*!40000 ALTER TABLE `proposer_mod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seance`
--

DROP TABLE IF EXISTS `seance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seance` (
  `id_seance` char(7) NOT NULL,
  `date_seance` date DEFAULT NULL,
  `id_entrainement` char(7) NOT NULL,
  PRIMARY KEY (`id_seance`),
  KEY `id_entrainement` (`id_entrainement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seance`
--

LOCK TABLES `seance` WRITE;
/*!40000 ALTER TABLE `seance` DISABLE KEYS */;
INSERT INTO `seance` VALUES ('SEA0001','2020-06-08','ENT0001'),('SEA0002','2020-06-10','ENT0002'),('SEA0003','2020-06-11','ENT0003');
/*!40000 ALTER TABLE `seance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sinscrirecompet`
--

DROP TABLE IF EXISTS `sinscrirecompet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sinscrirecompet` (
  `id_adh` char(7) NOT NULL,
  `id_compet` char(7) NOT NULL,
  `modalitechoisie_inscr` char(7) DEFAULT NULL,
  `distancechoisie_inscr` char(7) DEFAULT NULL,
  `besoincovoiturage_inscr` tinyint(1) DEFAULT NULL,
  `proposecovoiturage_inscr` tinyint(1) DEFAULT NULL,
  `nombreplacesvoiture_inscr` tinyint(4) DEFAULT NULL,
  `besoinherbergement_inscr` tinyint(1) DEFAULT NULL,
  `nbpersonneaccompagne_inscr` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_adh`,`id_compet`),
  KEY `id_compet` (`id_compet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinscrirecompet`
--

LOCK TABLES `sinscrirecompet` WRITE;
/*!40000 ALTER TABLE `sinscrirecompet` DISABLE KEYS */;
INSERT INTO `sinscrirecompet` VALUES ('ADH0003','COM0001','MOD0003','DIS0002',0,1,4,0,0),('ADH0003','COM0002','MOD0002','DIS0001',0,1,4,1,0),('ADH0009','COM0001','MOD0002','DIS0003',1,0,0,1,2),('ADH0004','COM0001','MOD0004','DIS0002',1,0,0,1,0),('ADH0004','COM0002','MOD0004','DIS0002',1,0,0,1,0);
/*!40000 ALTER TABLE `sinscrirecompet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sortie` (
  `id_sortie` char(7) NOT NULL,
  `jour_sortie` date DEFAULT NULL,
  `heuremisealeau_sortie` time DEFAULT NULL,
  `lieurdv_sortie` varchar(50) DEFAULT NULL,
  `plage_sortie` varchar(50) DEFAULT NULL,
  `niveaupublic_sortie` varchar(50) DEFAULT NULL,
  `mentionobligatoire_sortie` varchar(200) DEFAULT NULL,
  `mentionhiver_sortie` varchar(200) DEFAULT NULL,
  `id_adh` char(7) NOT NULL,
  PRIMARY KEY (`id_sortie`),
  KEY `id_adh` (`id_adh`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sortie`
--

LOCK TABLES `sortie` WRITE;
/*!40000 ALTER TABLE `sortie` DISABLE KEYS */;
INSERT INTO `sortie` VALUES ('SOR0001','2020-07-28','10:00:00','Lac de Miribel','Plage ouest','Confirmé','Bonnet de couleur et bouée de signalisation obligatoire.',NULL,'ADH0001');
/*!40000 ALTER TABLE `sortie` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-16 16:42:20
