-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: online_shop
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `accesstoken`
--

DROP TABLE IF EXISTS `accesstoken`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accesstoken` (
  `id` varchar(255) NOT NULL,
  `ttl` int DEFAULT NULL,
  `scopes` text,
  `created` datetime DEFAULT NULL,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesstoken`
--

LOCK TABLES `accesstoken` WRITE;
/*!40000 ALTER TABLE `accesstoken` DISABLE KEYS */;
/*!40000 ALTER TABLE `accesstoken` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl`
--

DROP TABLE IF EXISTS `acl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model` varchar(512) DEFAULT NULL,
  `property` varchar(512) DEFAULT NULL,
  `accessType` varchar(512) DEFAULT NULL,
  `permission` varchar(512) DEFAULT NULL,
  `principalType` varchar(512) DEFAULT NULL,
  `principalId` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl`
--

LOCK TABLES `acl` WRITE;
/*!40000 ALTER TABLE `acl` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_benefit`
--

DROP TABLE IF EXISTS `t_benefit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_benefit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` text,
  `title` varchar(45) DEFAULT NULL,
  `desc` text,
  `desc_eng` text,
  `adddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_benefit`
--

LOCK TABLES `t_benefit` WRITE;
/*!40000 ALTER TABLE `t_benefit` DISABLE KEYS */;
INSERT INTO `t_benefit` VALUES (1,'icon_box-01.png','LOW MINIMUM ORDER 2 ','Order as Low as 25 Pcs.  ','English version   ','2020-04-10 21:36:07'),(2,'icon_box-04.png','MOST COST EFFICIENTS','Our corrugated packaging solution offers the most strength at the most minimum cost.','English version ',NULL),(3,'icon_box-03.png','FREE SAMPLE','Experience our premium material hands-on free charge!.','English version ',NULL),(4,'icon_box-02.png','ECO FRIENDLY','Our Products are recyclable. reusable and biodegradable Let\'s give more love to our home.','English version ',NULL);
/*!40000 ALTER TABLE `t_benefit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_contact_info`
--

DROP TABLE IF EXISTS `t_contact_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_contact_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `title_desc` text,
  `desc` text,
  `title_desc_eng` text,
  `desc_eng` text,
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_contact_info`
--

LOCK TABLES `t_contact_info` WRITE;
/*!40000 ALTER TABLE `t_contact_info` DISABLE KEYS */;
INSERT INTO `t_contact_info` VALUES (1,'Eco Pack edit','High quality  boxes','in packs of 25 Pcs.','english version','english version','https://api.whatsapp.com/send?phone=6281298634040&text=Hi%20%20Custombox%20Indonesia%2c%20I%20need%20High-Quality%20Boxes%21&source=&data='),(2,'Custom Packaging','Create your very own packaging','with customized logo and Models.','english version','english version','https://api.whatsapp.com/send?phone=6281293798353&text=Hi%20%20Custombox%20Indonesia%2c%20I%20need%20packaging%20for%20my%20brand%21&source=&data='),(3,'Chat with us','Got a question to ask?','We will be happy to assist you','english version','english version','https://api.whatsapp.com/send?phone=6281293798353&text=Hi%20%20Custombox%20Indonesia%2c%20I%20need%20some%20packaging%21&source=&data=');
/*!40000 ALTER TABLE `t_contact_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_gallery`
--

DROP TABLE IF EXISTS `t_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` text,
  `title` varchar(45) DEFAULT NULL,
  `desc` text,
  `desc_eng` text,
  `adddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_gallery`
--

LOCK TABLES `t_gallery` WRITE;
/*!40000 ALTER TABLE `t_gallery` DISABLE KEYS */;
INSERT INTO `t_gallery` VALUES (9,'9_1shampo.jpg','1',NULL,NULL,'2020-05-27 10:03:07'),(10,'10_2biokusuma.jpg','2',NULL,NULL,'2020-05-27 10:03:14'),(11,'11_bio lation.jpg','3',NULL,NULL,'2020-05-27 10:03:23'),(12,'12_two way cake.png','4',NULL,NULL,'2020-05-27 10:03:31'),(13,'13_02fa2a2cf7ddd96de4d054eea1d7d9fd.png','5',NULL,NULL,'2020-05-27 10:03:46'),(14,'14_13e3eb958269049162bdd0a93e611482.png','6',NULL,NULL,'2020-05-27 10:03:55'),(15,'15_a7f028daad193499c11d7aa9ea82be60.jpeg','7',NULL,NULL,'2020-05-27 10:04:04'),(16,'16_cebe67c7293d66ac0aaaa2f2afb05d6c.jpg','8',NULL,NULL,'2020-05-27 10:04:13');
/*!40000 ALTER TABLE `t_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_icon`
--

DROP TABLE IF EXISTS `t_icon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_icon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_icon`
--

LOCK TABLES `t_icon` WRITE;
/*!40000 ALTER TABLE `t_icon` DISABLE KEYS */;
INSERT INTO `t_icon` VALUES (1,'fa fa-book'),(2,'fa fa-users'),(3,'fa fa-eye'),(4,'fa fa-gears '),(5,'fa fa-picture-o'),(6,'fa fa-calendar-check-o'),(7,'fa fa-question-circle'),(8,'fa fa-dropbox'),(9,'fa fa-home'),(10,'fa fa-shopping-bag');
/*!40000 ALTER TABLE `t_icon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_member`
--

DROP TABLE IF EXISTS `t_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` text,
  `last_name` text,
  `email` text,
  `phone_number` text,
  `password` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `provinsi_id` varchar(45) DEFAULT NULL,
  `kota_id` varchar(45) DEFAULT NULL,
  `kecamatan_id` varchar(45) DEFAULT NULL,
  `provinsi_name` varchar(45) DEFAULT NULL,
  `kota_name` varchar(45) DEFAULT NULL,
  `kecamatan_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_member`
--

LOCK TABLES `t_member` WRITE;
/*!40000 ALTER TABLE `t_member` DISABLE KEYS */;
INSERT INTO `t_member` VALUES (6,'handri 3','putra','handrisaeputra@gmail.com','081808784785','123','2020-05-28 09:18:51','2020-05-28 09:18:51','3','455',NULL,NULL,NULL,NULL,'Kedaung baru');
/*!40000 ALTER TABLE `t_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_menu`
--

DROP TABLE IF EXISTS `t_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_menu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort` int NOT NULL,
  `addby` int DEFAULT NULL,
  `adddate` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_menu`
--

LOCK TABLES `t_menu` WRITE;
/*!40000 ALTER TABLE `t_menu` DISABLE KEYS */;
INSERT INTO `t_menu` VALUES (1,'Configuration','fa fa-gears',10,NULL,NULL),(22,'Piso','fa fa-dropbox',1,1,'2020-03-09 23:39:05'),(23,'Home Page','fa fa-home',1,1,'2020-04-02 00:27:40'),(24,'Transaksi','fa fa-shopping-bag',3,1,'2020-04-02 00:35:38'),(25,'Member','fa fa-users',4,1,'2020-04-10 22:09:55'),(26,'Sample Request','fa fa-picture-o',5,1,'2020-04-10 22:10:51');
/*!40000 ALTER TABLE `t_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_past_project`
--

DROP TABLE IF EXISTS `t_past_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_past_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` text,
  `title` varchar(45) DEFAULT NULL,
  `desc` text,
  `desc_eng` text,
  `adddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_past_project`
--

LOCK TABLES `t_past_project` WRITE;
/*!40000 ALTER TABLE `t_past_project` DISABLE KEYS */;
INSERT INTO `t_past_project` VALUES (1,'01.jpg','Indomilk : e Mailers Box','Sebar 5.000 kebaikan projetcs','English version ',NULL),(2,'02.jpg','Total Buah : Top Bottom Box','Full color Fruit Box with Waterproof Laminating','English version ',NULL),(3,'03.jpg','Gaudi : e Mailers Box','Apparels Mailer Box.','English version ',NULL),(4,'04.jpg','Yuna & Co. : Slide Box ','Monthly Subscription Box','English version ',NULL);
/*!40000 ALTER TABLE `t_past_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_post_project`
--

DROP TABLE IF EXISTS `t_post_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_post_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(45) DEFAULT NULL,
  `title` text,
  `desc` text,
  `created_at` datetime DEFAULT NULL,
  `desc_eng` text,
  `location` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_post_project`
--

LOCK TABLES `t_post_project` WRITE;
/*!40000 ALTER TABLE `t_post_project` DISABLE KEYS */;
INSERT INTO `t_post_project` VALUES (21,'product-1590476602.png','Bio-Kusuma SB HB 30gr','Deskripsi Bio-Kusuma SB HB 30gr\nKegunaan :\nMengandung UV fiilteryang membantu kulit wajah daripengaruh buruk sinar matahari dan melembabkannya.\n\nCara Pakai :\nGunakan secukupnya sebelum terpapar sinar matahari dan ulangi pemakaian sesering mungkin terutama berenang, mengeringkan badan dan berkeringat.','2020-05-26 15:42:51','Deskripsi Bio-Kusuma SB HB 30gr\nKegunaan :\nMengandung UV fiilteryang membantu kulit wajah daripengaruh buruk sinar matahari dan melembabkannya.\n\nCara Pakai :\nGunakan secukupnya sebelum terpapar sinar matahari dan ulangi pemakaian sesering mungkin terutama berenang, mengeringkan badan dan berkeringat.','http://localhost/online_shop/public/images/product/product-1590476602.png'),(23,'product-1590476683.png','Aci-K Shampoo 100ml','Deskripsi Aci-K Shampoo 100ml\nKegunaan :\nMelembabkan rambut serta dapat merawat rambut yang kering dan pecah pecah.\n\nCara Pakai :\nTuangkan sedikit shampoo pada rambut yang talah dibasahi, gunakan ujung jari untuk memijat kulit kepala dan membuat shampoo berbusa, kemudian bilas dengan air hingga bersih.','2020-05-26 14:05:07','Deskripsi Aci-K Shampoo 100ml\nKegunaan :\nMelembabkan rambut serta dapat merawat rambut yang kering dan pecah pecah.\n\nCara Pakai :\nTuangkan sedikit shampoo pada rambut yang talah dibasahi, gunakan ujung jari untuk memijat kulit kepala dan membuat shampoo berbusa, kemudian bilas dengan air hingga bersih.','http://localhost/online_shop/public/images/product/product-1590476683.png'),(24,'product-1590476755.png','Bio-Kusuma Two Way Cake GL-1 Pink 10gr','Deskripsi Bio-Kusuma Two Way Cake GL-1 Pink 10gr\nKegunaan :\nMerias wajah dengan rata sehingga dapat meningkatkan penampilan.\n\nCara Pakai :\nUsapkan secara merata pada seluruh wajah dan leher.','2020-05-26 14:06:26','Deskripsi Bio-Kusuma Two Way Cake GL-1 Pink 10gr\nKegunaan :\nMerias wajah dengan rata sehingga dapat meningkatkan penampilan.\n\nCara Pakai :\nUsapkan secara merata pada seluruh wajah dan leher.','http://localhost/online_shop/public/images/product/product-1590476755.png'),(25,'product-1590476828.png','BIO CLEANSER LOTION FOR OILY SKIN (Acne Krim)','Deskripsi BIO CLEANSER LOTION FOR OILY SKIN (Acne Krim)\nTEKSTUR LOTION HALUS DAN AROMA SOFT, BERFUNGSI SEBAGAI SEBAGAI DEEP CLEANSER DAN ANTIBAKTERIAL SERTA TIDAK MENGIRITASI KULIT DAN MUDAH DIBERSIHKAN\n\nCARA PAKAI :\n\"Tuangkan secukupnya pada telapak tangan dan\ngunakan ujung jari untuk meratakan pada wajah.\nPijat secara ringan dan perlahan.\nBersihkan dengan kapas atau tissue kecantikan.\nTidak perlu dibilas dengan air.\"','2020-05-26 14:07:33','Deskripsi BIO CLEANSER LOTION FOR OILY SKIN (Acne Krim)\nTEKSTUR LOTION HALUS DAN AROMA SOFT, BERFUNGSI SEBAGAI SEBAGAI DEEP CLEANSER DAN ANTIBAKTERIAL SERTA TIDAK MENGIRITASI KULIT DAN MUDAH DIBERSIHKAN\n\nCARA PAKAI :\n\"Tuangkan secukupnya pada telapak tangan dan\ngunakan ujung jari untuk meratakan pada wajah.\nPijat secara ringan dan perlahan.\nBersihkan dengan kapas atau tissue kecantikan.\nTidak perlu dibilas dengan air.\"','http://localhost/online_shop/public/images/product/product-1590476828.png');
/*!40000 ALTER TABLE `t_post_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_privileges`
--

DROP TABLE IF EXISTS `t_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_privileges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int DEFAULT NULL,
  `menu_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_privileges`
--

LOCK TABLES `t_privileges` WRITE;
/*!40000 ALTER TABLE `t_privileges` DISABLE KEYS */;
INSERT INTO `t_privileges` VALUES (193,9,22,NULL),(207,1,22,NULL),(208,1,23,NULL),(209,1,24,NULL),(210,1,25,NULL),(211,1,26,NULL),(212,1,1,NULL),(213,10,23,NULL),(214,10,24,NULL),(215,10,25,NULL),(216,10,1,NULL);
/*!40000 ALTER TABLE `t_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_privileges_sub`
--

DROP TABLE IF EXISTS `t_privileges_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_privileges_sub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int DEFAULT NULL,
  `menu_id` int DEFAULT NULL,
  `sub_menu_id` int DEFAULT NULL,
  `add` int DEFAULT NULL,
  `edit` int DEFAULT NULL,
  `deleted` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=572 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_privileges_sub`
--

LOCK TABLES `t_privileges_sub` WRITE;
/*!40000 ALTER TABLE `t_privileges_sub` DISABLE KEYS */;
INSERT INTO `t_privileges_sub` VALUES (515,9,22,68,1,1,1),(547,1,22,68,1,1,1),(548,1,23,69,1,1,1),(549,1,23,70,1,1,1),(550,1,23,71,1,1,1),(551,1,23,72,1,1,1),(552,1,23,73,1,1,1),(553,1,23,74,1,1,1),(554,1,23,75,1,1,1),(555,1,24,76,1,1,1),(556,1,25,77,1,1,1),(557,1,26,78,1,1,1),(558,1,1,1,1,1,1),(559,1,1,2,1,1,1),(560,1,1,10,1,1,1),(561,1,1,41,1,1,1),(562,10,22,69,1,1,1),(563,10,23,70,1,1,1),(564,10,23,74,1,1,1),(565,10,23,75,1,1,1),(566,10,23,76,1,1,1),(567,10,23,77,1,1,1),(568,10,23,1,1,1,1),(569,10,23,2,1,1,1),(570,10,24,10,1,1,1),(571,10,25,41,1,1,1);
/*!40000 ALTER TABLE `t_privileges_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_product_gallery`
--

DROP TABLE IF EXISTS `t_product_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_product_gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_product` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `location` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_product_gallery`
--

LOCK TABLES `t_product_gallery` WRITE;
/*!40000 ALTER TABLE `t_product_gallery` DISABLE KEYS */;
INSERT INTO `t_product_gallery` VALUES (3,'20','product-1586106248.png','tt','http://localhost/custom_box_clean/public/images/gallery_product/product-1586106248.png'),(6,'1','1.jpg','k','http://localhost/custom_box_clean/public/images/gallery_product/1.jpg'),(8,'21','product-1590482507.png','img2','http://localhost/online_shop/public/images/gallery_product/product-1590482507.png'),(9,'21','product-1590482564.png','img3','http://localhost/online_shop/public/images/gallery_product/product-1590482564.png');
/*!40000 ALTER TABLE `t_product_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_product_harga`
--

DROP TABLE IF EXISTS `t_product_harga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_product_harga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `berat` decimal(8,2) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `qty_grosir` int DEFAULT NULL,
  `harga_grosir` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_product_harga`
--

LOCK TABLES `t_product_harga` WRITE;
/*!40000 ALTER TABLE `t_product_harga` DISABLE KEYS */;
INSERT INTO `t_product_harga` VALUES (3,2,0.20,3000,50,2500),(4,3,0.20,2000,50,1500),(5,20,7.20,500,5000,5000),(7,1,0.20,5000,50,4000),(8,22,30.00,100000,100,100000),(9,23,100.00,75000,100,75000),(10,24,10.00,110000,100,110000),(11,25,200.00,80000,100,80000),(14,21,30.00,110000,100,110000);
/*!40000 ALTER TABLE `t_product_harga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_request`
--

DROP TABLE IF EXISTS `t_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_member` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `id_size` int DEFAULT NULL,
  `address` text,
  `province` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_request`
--

LOCK TABLES `t_request` WRITE;
/*!40000 ALTER TABLE `t_request` DISABLE KEYS */;
INSERT INTO `t_request` VALUES (1,1,1,7,'gg','Bali','Badung','tse'),(2,1,1,7,'gg','Bali','Badung','tse'),(3,1,4,7,'gh','Bengkulu','Bengkulu','gf');
/*!40000 ALTER TABLE `t_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_role_user`
--

DROP TABLE IF EXISTS `t_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_role_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_role` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_role_user`
--

LOCK TABLES `t_role_user` WRITE;
/*!40000 ALTER TABLE `t_role_user` DISABLE KEYS */;
INSERT INTO `t_role_user` VALUES (1,'Admin','All Privileges Menu','2020-04-10 22:13:33'),(9,'Piso','Khusus Admin Piso','2020-03-10 03:02:19'),(10,'Admin kusuma','Khusus Admin Kusuma','2020-05-29 13:19:34');
/*!40000 ALTER TABLE `t_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_slideshow`
--

DROP TABLE IF EXISTS `t_slideshow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_slideshow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `adddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_slideshow`
--

LOCK TABLES `t_slideshow` WRITE;
/*!40000 ALTER TABLE `t_slideshow` DISABLE KEYS */;
INSERT INTO `t_slideshow` VALUES (14,'img2','14_cebe67c7293d66ac0aaaa2f2afb05d6c.jpg','2020-05-26 13:45:14'),(15,'img3','15_02fa2a2cf7ddd96de4d054eea1d7d9fd.png','2020-05-26 13:45:25'),(16,'img4','16_13e3eb958269049162bdd0a93e611482.png','2020-05-26 13:45:47');
/*!40000 ALTER TABLE `t_slideshow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_sub_menu`
--

DROP TABLE IF EXISTS `t_sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_sub_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_menu` varchar(45) DEFAULT NULL,
  `sub_menu_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `addby` int DEFAULT NULL,
  `adddate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_sub_menu`
--

LOCK TABLES `t_sub_menu` WRITE;
/*!40000 ALTER TABLE `t_sub_menu` DISABLE KEYS */;
INSERT INTO `t_sub_menu` VALUES (1,'1','Group Menu','menu_table',NULL,NULL),(2,'1','Sub Menu','sub_menu_table',NULL,NULL),(10,'1','User','user_table',1,'2019-04-10 07:33:26'),(41,'1','Role User','role_table',1,'2019-11-08 15:18:49'),(68,'22','List piso ','list_piso',1,'2020-03-10 00:18:20'),(69,'23','Slide Show','slideshow',1,'2020-04-02 00:29:07'),(70,'23','Product','product',1,'2020-04-02 00:32:12'),(71,'23','Why Us','why_us',1,'2020-04-02 00:32:31'),(72,'23','Binefit','binefit',1,'2020-04-02 00:33:02'),(73,'23','Project','project',1,'2020-04-02 00:33:18'),(74,'23','Gallery','gallery',1,'2020-04-02 00:33:36'),(75,'23','Contact Info','contact_info',1,'2020-04-02 00:33:51'),(76,'24','New Order','new_order',1,'2020-04-02 00:37:00'),(77,'25','List Member','member',1,'2020-04-10 22:12:08'),(78,'26','Request List','sample',1,'2020-04-10 22:12:30');
/*!40000 ALTER TABLE `t_sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_transaction_detail`
--

DROP TABLE IF EXISTS `t_transaction_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_transaction_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_transaction` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `berat` int DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `sub_total` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_transaction_detail`
--

LOCK TABLES `t_transaction_detail` WRITE;
/*!40000 ALTER TABLE `t_transaction_detail` DISABLE KEYS */;
INSERT INTO `t_transaction_detail` VALUES (2,2,1,100,75000,75000,23),(3,3,1,30,110000,110000,21);
/*!40000 ALTER TABLE `t_transaction_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_transaction_header`
--

DROP TABLE IF EXISTS `t_transaction_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_transaction_header` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `address` text,
  `note` text,
  `email` varchar(45) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `amount_shipping` varchar(45) DEFAULT NULL,
  `courier` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'pending',
  `snap_token` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `no_resi_pengiriman` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_transaction_header`
--

LOCK TABLES `t_transaction_header` WRITE;
/*!40000 ALTER TABLE `t_transaction_header` DISABLE KEYS */;
INSERT INTO `t_transaction_header` VALUES (2,'handri 3','putra',83000,'Kedaung baru','handri 3','handrisaeputra@gmail.com',1,'081808784785','8000','jne','pending','c2ff4591-6d2b-4fc2-b5ef-5721739c0e40','2020-05-29 16:31:56','2020-05-29 16:31:56',NULL),(3,'handri 3','putra',118000,'Kedaung baru','handri 3','handrisaeputra@gmail.com',1,'081808784785','8000','jne','pending','45290d62-e853-4e70-814c-7e256e53a01d','2020-05-29 17:02:19','2020-05-29 17:02:19',NULL);
/*!40000 ALTER TABLE `t_transaction_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_why_us`
--

DROP TABLE IF EXISTS `t_why_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_why_us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text,
  `title_number` varchar(45) DEFAULT NULL,
  `title_desc` text,
  `desc` text,
  `desc_eng` text,
  `bg` varchar(45) DEFAULT NULL,
  `img` text,
  `adddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_why_us`
--

LOCK TABLES `t_why_us` WRITE;
/*!40000 ALTER TABLE `t_why_us` DISABLE KEYS */;
INSERT INTO `t_why_us` VALUES (1,'Why Kusuma Clinic Beuty   ','01     ','EXPERIENCES    ','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s     ','English version      ','bg','1_our_journey.png','2020-05-27 09:42:45');
/*!40000 ALTER TABLE `t_why_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_piso`
--

DROP TABLE IF EXISTS `tbl_piso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_piso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `catagory` text,
  `p` decimal(8,2) DEFAULT NULL,
  `l` decimal(8,2) DEFAULT NULL,
  `t` decimal(8,2) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_piso`
--

LOCK TABLES `tbl_piso` WRITE;
/*!40000 ALTER TABLE `tbl_piso` DISABLE KEYS */;
INSERT INTO `tbl_piso` VALUES (1,'1-E','E-MAILER',23.50,19.50,4.50,'',NULL,NULL),(2,'2-E','E-MAILER',33.50,24.50,7.50,'',NULL,NULL),(3,'3-E','E-MAILER',28.50,19.50,9.50,'',NULL,NULL),(4,'4-E','E-MAILER',25.00,25.00,10.00,'',NULL,NULL),(5,'5-E','E-MAILER',18.50,19.50,4.50,'',NULL,NULL),(6,'6-E*','E-MAILER',20.50,21.50,7.50,'Buka depan',NULL,NULL),(7,'7-E*','E-MAILER',20.00,20.00,10.00,'Buka depan (bisa copot)',NULL,NULL),(8,'8-E','E-MAILER',26.00,15.50,6.00,'',NULL,NULL),(9,'9-E*','E-MAILER',17.50,18.50,9.50,'Mika 2 jendela',NULL,NULL),(10,'10-E','E-MAILER',28.50,24.50,4.50,'',NULL,NULL),(11,'11-E','E-MAILER',15.50,22.50,7.50,'',NULL,NULL),(12,'12-E','E-MAILER',20.00,20.00,5.00,'',NULL,NULL),(13,'13-E*','E-MAILER',19.50,20.50,6.50,'Full mika + buka depan',NULL,NULL),(14,'14-E','E-MAILER',22.00,22.00,6.00,'',NULL,NULL),(15,'15-E','E-MAILER',20.50,14.50,4.50,'',NULL,NULL),(16,'16-E','E-MAILER',10.00,10.00,5.00,'',NULL,NULL),(17,'17-E','E-MAILER',15.00,15.00,5.00,'',NULL,NULL),(18,'18-E','E-MAILER',18.00,18.00,5.00,'',NULL,NULL),(19,'19-E','E-MAILER',20.00,15.00,10.00,'',NULL,NULL),(20,'20-E','E-MAILER',23.50,19.50,9.50,'',NULL,NULL),(21,'21-E','E-MAILER',25.00,20.00,5.00,'',NULL,NULL),(22,'22-E','E-MAILER',41.00,29.00,6.00,'',NULL,NULL),(23,'23-E','E-MAILER',15.00,9.50,4.50,'',NULL,NULL),(24,'24-E*','E-MAILER',18.50,13.50,7.00,'Potongan kembang atas',NULL,NULL),(25,'25-E','E-MAILER',20.00,20.00,7.00,'',NULL,NULL),(26,'26-E','E-MAILER',45.00,35.00,5.00,'',NULL,NULL),(27,'27-E*','E-MAILER',18.00,24.50,7.00,'',NULL,NULL),(28,'28-E','E-MAILER',23.50,24.50,9.50,'',NULL,NULL),(29,'34-E','E-MAILER',3.50,9.50,4.50,'',NULL,NULL),(30,'43-E*','E-MAILER',21.50,21.50,7.00,'Mika 16 x 16 + Bukaan depan',NULL,NULL),(31,'44-E','E-MAILER',23.00,11.00,5.50,'',NULL,NULL),(32,'45-E','E-MAILER',38.00,25.00,4.00,'',NULL,NULL),(33,'46-E','E-MAILER',23.00,23.00,5.50,'',NULL,NULL),(34,'47-E','E-MAILER',23.50,19.50,7.00,'',NULL,NULL),(35,'48-E','E-MAILER',30.00,26.00,10.00,'',NULL,NULL),(36,'49-E','E-MAILER',15.00,9.50,5.50,'',NULL,NULL),(37,'50-E','E-MAILER',11.00,23.00,5.00,'',NULL,NULL),(38,'52-E','E-MAILER',22.50,22.50,7.50,'',NULL,NULL),(39,'53-E*','E-MAILER',24.00,24.00,5.00,'Mika 18.5 x 18.5',NULL,NULL),(40,'54-E','E-MAILER',20.00,10.00,5.00,'',NULL,NULL),(41,'55-E','E-MAILER',25.50,17.00,3.00,'',NULL,NULL),(42,'56-E','E-MAILER',29.00,22.00,6.00,'',NULL,NULL),(43,'57-E','E-MAILER',25.00,25.00,4.00,'',NULL,NULL),(44,'58-E','E-MAILER',32.00,18.00,5.00,'',NULL,NULL),(45,'59-E','E-MAILER',26.00,19.00,5.00,'',NULL,NULL),(46,'60-E*','E-MAILER',23.00,15.00,8.00,'Mika 20 x 11.5',NULL,NULL),(47,'61-E','E-MAILER',26.00,26.00,10.00,'',NULL,NULL),(48,'62-E','E-MAILER',20.00,15.00,5.00,'',NULL,NULL),(49,'63-E','E-MAILER',30.00,20.00,7.00,'',NULL,NULL),(50,'64-E','E-MAILER',24.50,16.70,8.00,'',NULL,NULL),(51,'65-E*','E-MAILER',16.00,16.00,9.00,'Buka Depan (bisa copot)',NULL,NULL),(52,'66-E','E-MAILER',32.50,21.50,11.50,'',NULL,NULL),(53,'67-E','E-MAILER',33.50,27.00,6.00,'',NULL,NULL),(54,'68-E','E-MAILER',30.00,30.00,5.00,'',NULL,NULL),(55,'69-E','E-MAILER',33.50,21.50,11.50,'',NULL,NULL),(56,'76-E','E-MAILER',49.00,35.00,5.00,'',NULL,NULL),(57,'29-TB/A','TOP/ BOTTOM',41.00,25.00,10.00,'Total buah',NULL,NULL),(58,'29-TB/B','TOP/ BOTTOM',41.00,25.00,10.00,'Total buah',NULL,NULL),(59,'30-TB/A','TOP/ BOTTOM',20.00,20.00,5.00,'',NULL,NULL),(60,'30-TB/B','TOP/ BOTTOM',19.50,19.50,19.80,'',NULL,NULL),(61,'31-TB/A','TOP/ BOTTOM',35.00,35.00,4.50,'',NULL,NULL),(62,'31-TB/B','TOP/ BOTTOM',35.00,35.00,10.00,'',NULL,NULL),(63,'32-SL/A+B*','TOP/ BOTTOM',21.00,10.50,9.50,'1 Piso dengan selongsong(sloped) alfons',NULL,NULL),(64,'33-SL/A','TOP/ BOTTOM',35.00,30.00,10.00,'',NULL,NULL),(65,'33-SL/B','TOP/ BOTTOM',35.00,30.00,10.00,'',NULL,NULL),(66,'35-SL/A+B','TOP/ BOTTOM',24.00,12.00,10.00,'',NULL,NULL),(67,'36-SL/A','TOP/ BOTTOM',26.50,17.50,12.50,'',NULL,NULL),(68,'36-SL/B','TOP/ BOTTOM',26.50,17.50,12.50,'',NULL,NULL),(69,'77-SL/A','TOP/ BOTTOM',29.00,29.10,6.00,'',NULL,NULL),(70,'77-SL/B','TOP/ BOTTOM',28.00,28.00,5.00,'',NULL,NULL),(71,'37*-REG','REGULER',13.00,12.00,13.00,'Wonderful',NULL,NULL),(72,'38*-REG','REGULER',13.00,10.00,14.50,'Piso + sekat',NULL,NULL),(73,'39-C','REGULER',26.50,26.50,15.00,'',NULL,NULL),(74,'40-C','REGULER',27.80,27.80,17.00,'',NULL,NULL),(75,'41-C','REGULER',24.50,24.50,13.00,'',NULL,NULL),(76,'42-TT','TUCK TOP',28.50,19.00,9.70,'',NULL,NULL),(77,'70-HB','HANDLE BOX',14.00,11.00,20.00,'Tinggi Handle 4.5',NULL,NULL),(78,'71-HB','HANDLE BOX',13.00,13.00,25.00,'Tinggi Handle 5.5 & Mika 12 x 10',NULL,NULL),(79,'72-HB','HANDLE BOX',23.00,12.00,11.00,'Tinggi Handle 5.5',NULL,NULL),(80,'73-HB','HANDLE BOX',16.00,16.00,17.50,'Tinggi Handle 5.5',NULL,NULL);
/*!40000 ALTER TABLE `tbl_piso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `realm` varchar(512) DEFAULT NULL,
  `username` varchar(512) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(512) NOT NULL,
  `company_id` varchar(45) DEFAULT NULL,
  `area_id` varchar(45) DEFAULT NULL,
  `email` varchar(512) DEFAULT NULL,
  `gender` varchar(512) DEFAULT NULL,
  `user_group_id` int DEFAULT NULL,
  `user_group_name` varchar(512) DEFAULT NULL,
  `phone` varchar(512) DEFAULT NULL,
  `mobile` varchar(512) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_crated` datetime DEFAULT NULL,
  `emailVerified` tinyint(1) DEFAULT NULL,
  `real_password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `verificationToken` varchar(512) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `token_api` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'server','admin','admin','$2y$10$sGcFROD2ze.JkXz5av7u/OIULmf/ds5lJ6hR6y858l6U3GgOV0FI.',NULL,NULL,'admin@admin.com',NULL,1,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin','1',NULL,'OZMkqm2jXMyzkNXslZ2t7QJOxf8BWr6ZWVW8st5e2Qoa2eqdkoEgA2ZnX858','1',NULL,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QvdmlydHVzLXdlYi9hcGkvYXV0aC9zaWduaW4iLCJpYXQiOjE1NzUxOTM4NjEsImV4cCI6MTU3NTc5ODY2MSwibmJmIjoxNTc1MTkzODYxLCJqdGkiOiJjaG5VVEw3ODRmdnA0WEJ4In0.vcF5BeQhSh3kaH6_L6qtHbfsdEJFza8x4PRGzWtDbdQ'),(10,NULL,NULL,'Admin Kusuma','$2y$10$g1UkNYOtEAcCpObMOVkQ1ug9tY4y4ui33O6oEJdrlCqmx9SrVEMQW',NULL,NULL,'admin@ksm.com','Male',NULL,NULL,'1','1','1',NULL,'1',NULL,NULL,NULL,NULL,NULL,'123456','1',NULL,'yjbfzU6DBmnDZ3rwKIpRRP8q47FXsmDO1eg4ErmMmvxp8SxqLZ7eRr02jwSn','10',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-02 16:23:06
