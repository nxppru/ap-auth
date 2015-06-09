/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.24-log : Database - openWMs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`openWMs` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `openWMs`;

/*Table structure for table `jk_admins` */

DROP TABLE IF EXISTS `jk_admins`;

CREATE TABLE `jk_admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `parent_uid` int(11) NOT NULL,
  `group_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jk_admins` */

insert  into `jk_admins`(`id`,`username`,`password`,`activated`,`last_login`,`parent_uid`,`group_id`,`created_at`,`updated_at`) values (1,'admin','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,'jkdefault','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',54,3,'2015-02-05 21:24:42','0000-00-00 00:00:00'),(54,'jktest','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,2,'2015-02-05 21:21:42','0000-00-00 00:00:00'),(56,'hongzx1','cf8e68b8808056ec68463db9dac848fd',1,'0000-00-00 00:00:00',0,3,'2015-03-02 15:45:14','0000-00-00 00:00:00'),(57,'56015538','2b5716cb7c12e40304106b57f5f3e39c',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:30:00','0000-00-00 00:00:00'),(58,'playmud','e1f2af46d098e48fa428198f6b004c82',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:49:40','0000-00-00 00:00:00'),(59,'jclwyyxgs','14878528b7fbdf03c556a7b66ebf1825',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:50:38','0000-00-00 00:00:00'),(60,'jrtjrt','de91fcbc1361afc717d41396197b137e',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:52:22','0000-00-00 00:00:00'),(61,'csclkj','745e6d6b5a5e4adeab26eb48c56195c7',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:53:01','0000-00-00 00:00:00'),(62,'18071397010','f0d70af0584627dc9bc965abe20da08e',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:54:04','0000-00-00 00:00:00'),(63,'网络看我的','127e0c3f7ccbc6dc51fc4cd1caaf3eee',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:55:49','0000-00-00 00:00:00'),(64,'ewen','a9987a293acca54bc15ed5f534d4135f',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:56:02','0000-00-00 00:00:00'),(65,'ccmv','c3a70f6561d84737b12b45959a98c53d',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:58:22','0000-00-00 00:00:00'),(66,'thxsr','ce6bda6390b9091bc7b16572ff536f16',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:58:52','0000-00-00 00:00:00'),(67,'13330732406','be6c6712018a0b86ab05e250332a57ff',1,'0000-00-00 00:00:00',0,3,'2015-03-03 15:59:34','0000-00-00 00:00:00'),(68,'mickeywaley','ef3cd2e08e16e2bc089b9d066ebfe45a',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:04:31','0000-00-00 00:00:00'),(69,'qqab','3f6000e6e897dfb62d7e70531cdfb85c',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:15:15','0000-00-00 00:00:00'),(70,'shop105','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:16:14','0000-00-00 00:00:00'),(71,'codycoding','eb24173df0f85c47af00187f0296ac07',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:17:12','0000-00-00 00:00:00'),(72,'S1069937','6bf69acaede0e69c1c629574bcb8911a',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:21:42','0000-00-00 00:00:00'),(73,'wangyuyu','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:42:57','0000-00-00 00:00:00'),(74,'hp5460','1a6420752f81465adb585d52b24b98d2',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:46:31','0000-00-00 00:00:00'),(75,'Pepsigold','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:48:12','0000-00-00 00:00:00'),(76,'Bruce','fe6bb90ab5ba3a4e2e323db3f3aaa517',1,'0000-00-00 00:00:00',0,3,'2015-03-03 16:55:43','0000-00-00 00:00:00'),(77,'9983845','df5bb8067b7b1d641275af93581dea28',1,'0000-00-00 00:00:00',0,3,'2015-03-03 17:07:02','0000-00-00 00:00:00'),(78,'xiaocalling','0415707e718d94bd148ace6441853945',1,'0000-00-00 00:00:00',0,3,'2015-03-03 17:11:51','0000-00-00 00:00:00'),(79,'zowei','88d8ec83fd790b51cf408b8952126ad4',1,'0000-00-00 00:00:00',0,3,'2015-03-03 17:37:18','0000-00-00 00:00:00'),(80,'18931113626','a811a9a1e78be1bb86861519e39deb6d',1,'0000-00-00 00:00:00',0,3,'2015-03-03 17:40:08','0000-00-00 00:00:00'),(81,'ajtrdfai','07f3eada079c1ece4257df4c0a69e7b0',1,'0000-00-00 00:00:00',0,3,'2015-03-03 17:43:10','0000-00-00 00:00:00'),(82,'aram','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-03 17:52:44','0000-00-00 00:00:00'),(83,'jdwx','99e7eb1a0550574ef1e85fa5ac9fda62',1,'0000-00-00 00:00:00',0,3,'2015-03-03 17:54:01','0000-00-00 00:00:00'),(84,'Tstone','b8e572cd98209b98259cf1cb6a3fcdaa',1,'0000-00-00 00:00:00',0,3,'2015-03-03 18:16:12','0000-00-00 00:00:00'),(85,'yaowa','ef75eefd0c726d9bde21f640fc80d98d',1,'0000-00-00 00:00:00',0,3,'2015-03-03 20:42:18','0000-00-00 00:00:00'),(86,'sbi','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',1,3,'2015-03-04 08:57:26','0000-00-00 00:00:00'),(87,'kenrun','76c4fd1883c58dd01ebbc1d0733feba0',1,'0000-00-00 00:00:00',0,3,'2015-03-04 17:43:32','0000-00-00 00:00:00'),(88,'155749','df5bb8067b7b1d641275af93581dea28',1,'0000-00-00 00:00:00',0,3,'2015-03-04 17:49:28','0000-00-00 00:00:00'),(89,'fengying','e463a4d971c22e557e0be5a26f8d145d',1,'0000-00-00 00:00:00',0,3,'2015-03-04 18:04:25','0000-00-00 00:00:00'),(90,'sgwyj','37c060263698544cc155043cac51d945',1,'0000-00-00 00:00:00',1,3,'2015-03-04 18:11:09','0000-00-00 00:00:00'),(91,'663865486','ea3742f178fff5483f5e92b809d290a7',1,'0000-00-00 00:00:00',0,3,'2015-03-04 21:20:39','0000-00-00 00:00:00'),(92,'olylee','a64a1476544db9bd76a6d1f024a3a8c6',1,'0000-00-00 00:00:00',0,3,'2015-03-05 09:46:15','0000-00-00 00:00:00'),(93,'dom_sy','c52547a559f681ac5c413f999eca05b2',1,'0000-00-00 00:00:00',0,3,'2015-03-05 12:56:47','0000-00-00 00:00:00'),(94,'laosan','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-05 14:52:21','0000-00-00 00:00:00'),(95,'agony','2ed246c4b03f1bfcb1752ec319dca538',1,'0000-00-00 00:00:00',0,3,'2015-03-05 15:50:21','0000-00-00 00:00:00'),(96,'邹浩','a92c838659bd0fd4a2a893d8ac5decf0',1,'0000-00-00 00:00:00',0,3,'2015-03-05 15:50:51','0000-00-00 00:00:00'),(97,'tingfeng','a27ab243e0502b629ac51152fe3c34cf',1,'0000-00-00 00:00:00',0,3,'2015-03-05 22:02:46','0000-00-00 00:00:00'),(98,'ahshenkong','8ed694c3bf0f806089711a785ead5351',1,'0000-00-00 00:00:00',0,3,'2015-03-05 22:08:03','0000-00-00 00:00:00'),(99,'test','2028ab76b761289dac1682db2a4e0cbf',1,'0000-00-00 00:00:00',0,3,'2015-03-06 08:48:59','0000-00-00 00:00:00'),(100,'mybaby','02846d7ed85126a954013d4c34edda8a',1,'0000-00-00 00:00:00',0,3,'2015-03-06 09:05:36','0000-00-00 00:00:00'),(101,'taognang','88179f276f0a312aab8823b041dbbffd',1,'0000-00-00 00:00:00',0,3,'2015-03-06 09:21:29','0000-00-00 00:00:00'),(102,'yqx024','c5521fbd38ce38738ac195c272c9b401',1,'0000-00-00 00:00:00',0,3,'2015-03-06 09:25:08','0000-00-00 00:00:00'),(103,'zhihuike','c1857a9a60796e9525f64ee594826718',1,'0000-00-00 00:00:00',0,3,'2015-03-06 10:49:05','0000-00-00 00:00:00'),(104,'xinhuak','60e0fcaf4535dfedfc946b9987c02f9b',1,'0000-00-00 00:00:00',0,3,'2015-03-07 22:38:09','0000-00-00 00:00:00'),(105,'孙斌','5e9d1d2bb85eafc222b9056dbc18d0ed',1,'0000-00-00 00:00:00',0,3,'2015-03-08 14:51:49','0000-00-00 00:00:00'),(106,'liberal','f4e4c9e1ac87de3ab6323cbb4cf73197',1,'0000-00-00 00:00:00',0,3,'2015-03-09 12:34:17','0000-00-00 00:00:00'),(107,'ahbz1234','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-10 10:45:09','0000-00-00 00:00:00'),(108,'124522417','20650d0e0f72e592691c86895246cfc7',1,'0000-00-00 00:00:00',0,3,'2015-03-10 11:44:50','0000-00-00 00:00:00'),(109,'changyuantech','1bf68d8e0af325f1a319d59a0ad913d2',1,'0000-00-00 00:00:00',0,3,'2015-03-10 11:58:17','0000-00-00 00:00:00'),(110,'wjsandy','402b557b7f364abc0ac961e1dda262cd',1,'0000-00-00 00:00:00',0,3,'2015-03-10 14:23:17','0000-00-00 00:00:00'),(111,'310090486','edf422b79552c0a4555f45c66b9e3422',1,'0000-00-00 00:00:00',0,3,'2015-03-10 14:50:36','0000-00-00 00:00:00'),(112,'jactty','e123ff10fb46b741fa39b1b202f35ae2',1,'0000-00-00 00:00:00',0,3,'2015-03-10 14:53:43','0000-00-00 00:00:00'),(113,'zhangfeng','caf3b4ccf369052f53bd0b1b9a0b602d',1,'0000-00-00 00:00:00',0,3,'2015-03-10 14:59:13','0000-00-00 00:00:00'),(114,'1992kiss','f71476b5355cc560f250ea2546c13aba',1,'0000-00-00 00:00:00',0,3,'2015-03-10 15:00:38','0000-00-00 00:00:00'),(115,'wifiyb','fc953c4336595cfaf982fbac8c83731a',1,'0000-00-00 00:00:00',0,3,'2015-03-10 15:47:34','0000-00-00 00:00:00'),(116,'ws960038','e1fb59d2e1c04e95a8c128a9356c64af',1,'0000-00-00 00:00:00',0,3,'2015-03-10 16:57:43','0000-00-00 00:00:00'),(117,'zsy','189235dacf37e85a9cdfbcfecfad156a',1,'0000-00-00 00:00:00',1,3,'2015-03-10 17:27:12','0000-00-00 00:00:00'),(118,'rab7bit','0012a3512fd2a6ccd46c2a8a49393e78',1,'0000-00-00 00:00:00',0,3,'2015-03-11 12:38:27','0000-00-00 00:00:00'),(119,'sdzbwtqq','07289c825a515373d356724b82f96f7e',1,'0000-00-00 00:00:00',0,3,'2015-03-11 16:26:24','0000-00-00 00:00:00'),(120,'zcb78546330','54a4a7fbb2b41e99623cd024e3b8d0fc',1,'0000-00-00 00:00:00',0,3,'2015-03-11 22:33:18','0000-00-00 00:00:00'),(121,'ForgotFun','1d1f780df3092583c28e6cd5a934a96b',1,'0000-00-00 00:00:00',0,3,'2015-03-11 23:20:08','0000-00-00 00:00:00'),(122,'kinyon','acebe68d8a7bf4d40a109f329550e722',1,'0000-00-00 00:00:00',0,3,'2015-03-11 23:32:26','0000-00-00 00:00:00'),(123,'Dndd@163.com','9b69699ed4a1d25a4f6e6c62fc0b26fe',1,'0000-00-00 00:00:00',0,3,'2015-03-12 06:56:51','0000-00-00 00:00:00'),(124,'80462999','f03a99896f0df3d3b42e6b07920b0c02',1,'0000-00-00 00:00:00',0,3,'2015-03-12 10:30:29','0000-00-00 00:00:00'),(125,'0831wxy','18b56cded3b3905ae2b151d1c7fe54ce',1,'0000-00-00 00:00:00',0,3,'2015-03-12 12:16:27','0000-00-00 00:00:00'),(126,'iuyes','ae3d8b1bbaeb01831099580301a9a4c1',1,'0000-00-00 00:00:00',0,3,'2015-03-12 12:18:44','0000-00-00 00:00:00'),(127,'15515546576','20bcd184ceedb3fcab596b5d253f8818',1,'0000-00-00 00:00:00',0,3,'2015-03-13 10:43:40','0000-00-00 00:00:00'),(128,'ytwxwlkj','9230ea6fadd44272ee694bb2e2cccb07',1,'0000-00-00 00:00:00',0,3,'2015-03-13 13:25:13','0000-00-00 00:00:00'),(129,'tianyao104','922818d49e008a852533a7388ac0e4b2',1,'0000-00-00 00:00:00',0,3,'2015-03-13 13:29:22','0000-00-00 00:00:00'),(130,'meetrice','8c34ccfcfeedbd4fea4cb74e2574ac1f',1,'0000-00-00 00:00:00',0,3,'2015-03-13 13:30:14','0000-00-00 00:00:00'),(131,'water881','a8eb2443885573f470acceabdd6a9497',1,'0000-00-00 00:00:00',0,3,'2015-03-13 15:50:42','0000-00-00 00:00:00'),(132,'jiang','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',1,3,'2015-03-13 15:50:57','0000-00-00 00:00:00'),(133,'wzyajm520','694e7901e48bfb7f9ff5249cf9c39a8e',1,'0000-00-00 00:00:00',0,3,'2015-03-13 17:19:57','0000-00-00 00:00:00'),(134,'sky','2fad99cd0cc77382a6b488c0501a0788',1,'0000-00-00 00:00:00',0,3,'2015-03-14 10:58:00','0000-00-00 00:00:00'),(135,'gywangluo','5f958ce9864de9a6f85f5c4e8155e10a',1,'0000-00-00 00:00:00',0,3,'2015-03-14 12:16:51','0000-00-00 00:00:00'),(136,'leciwifi','e68cf516863622e0e9aa64d5a6c23a69',1,'0000-00-00 00:00:00',0,3,'2015-03-14 12:20:24','0000-00-00 00:00:00'),(137,'zms915738038','12e5f7483557b2ce97c2e16ab7db4fef',1,'0000-00-00 00:00:00',0,3,'2015-03-15 00:59:24','0000-00-00 00:00:00'),(138,'wudwux','20b1b08c68b3b23c027f87af82bcc3d0',1,'0000-00-00 00:00:00',0,3,'2015-03-15 12:37:55','0000-00-00 00:00:00'),(139,'mingrenpc','056eb52a3c169e9d6526b4ea8bd3e72b',1,'0000-00-00 00:00:00',0,3,'2015-03-15 22:04:40','0000-00-00 00:00:00'),(140,'zhousai20','49e6df71f8fac8a2e53ac0476c686dfb',1,'0000-00-00 00:00:00',0,3,'2015-03-16 13:50:16','0000-00-00 00:00:00'),(141,'644681708','e2943590389d2c971706a18de40c9ea2',1,'0000-00-00 00:00:00',0,3,'2015-03-17 18:11:46','0000-00-00 00:00:00'),(142,'alt2003','7818c2d0a8dff2a993fdcc230e8344d4',1,'0000-00-00 00:00:00',0,3,'2015-03-17 21:53:18','0000-00-00 00:00:00'),(143,'xdkj','6d6ffe67ff44e15ca80db11ef58ccb1a',1,'0000-00-00 00:00:00',0,3,'2015-03-18 19:12:24','0000-00-00 00:00:00'),(144,'ary','b7e5a45a9618af822e3950d45fd76ab6',1,'0000-00-00 00:00:00',0,3,'2015-03-18 22:31:09','0000-00-00 00:00:00'),(145,'ansel','553d83661590de09c341f81473e8e06c',1,'0000-00-00 00:00:00',0,3,'2015-03-19 10:50:55','0000-00-00 00:00:00'),(146,'潍坊妈妈网','372d217aab69f4096db00905015e51e2',1,'0000-00-00 00:00:00',0,3,'2015-03-19 16:15:06','0000-00-00 00:00:00'),(147,'wifi0790redian','928d8da16a80adcdc7cc6c7adc341a00',1,'0000-00-00 00:00:00',0,3,'2015-03-19 16:41:57','0000-00-00 00:00:00'),(148,'57716686','ab9054479a9b9042c4e0977d6ccfb2e5',1,'0000-00-00 00:00:00',0,3,'2015-03-20 10:36:53','0000-00-00 00:00:00'),(149,'343052579','8914b3d2ad8c86f6b7cde4e8b2dcb578',1,'0000-00-00 00:00:00',0,3,'2015-03-20 12:09:53','0000-00-00 00:00:00'),(150,'lonexun','6b1b246b148e013f16f8d1f004195b88',1,'0000-00-00 00:00:00',0,3,'2015-03-21 13:26:26','0000-00-00 00:00:00'),(151,'200','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-23 17:31:57','0000-00-00 00:00:00'),(152,'zhuomai','cf25bc351d9bfbb9483d4ea432636cc4',1,'0000-00-00 00:00:00',0,3,'2015-03-24 17:25:23','0000-00-00 00:00:00'),(153,'foodxj','fd2c6e5b5dee0ee8b14c88cefe079a13',1,'0000-00-00 00:00:00',0,3,'2015-03-24 17:40:40','0000-00-00 00:00:00'),(154,'houziqwert1','4d35ee98ed3e493ddac397b8d977da41',1,'0000-00-00 00:00:00',0,3,'2015-03-24 17:51:12','0000-00-00 00:00:00'),(155,'shanan838','f2162f0713c4aa4c3c9a843febf03e56',1,'0000-00-00 00:00:00',0,3,'2015-03-24 17:55:35','0000-00-00 00:00:00'),(156,'heweile','6a108f036bf33f2e9f8ecc9a53f16cee',1,'0000-00-00 00:00:00',0,3,'2015-03-24 17:56:32','0000-00-00 00:00:00'),(157,'longquanwo','4ad8b4752dd2048960a0760a6f8d609f',1,'0000-00-00 00:00:00',0,3,'2015-03-24 17:58:46','0000-00-00 00:00:00'),(158,'海蜘蛛测试','4fc06e4b4a961feaeb5191cfac2b2ead',1,'0000-00-00 00:00:00',0,3,'2015-03-24 17:58:52','0000-00-00 00:00:00'),(159,'xirenhou','1501cb876e6a4f5a9ac81b8d96fab9cd',1,'0000-00-00 00:00:00',0,3,'2015-03-24 22:14:02','0000-00-00 00:00:00'),(160,'suqi','87ee510f94f36067f6bdc9b71a9e3f69',1,'0000-00-00 00:00:00',0,3,'2015-03-25 03:38:53','0000-00-00 00:00:00'),(161,'qinyuanfa','458f9d00684f491660333092a851e2b1',1,'0000-00-00 00:00:00',0,3,'2015-03-25 08:27:35','0000-00-00 00:00:00'),(162,'saturin','c59a9102eb3669000198383f953b5934',1,'0000-00-00 00:00:00',0,3,'2015-03-25 09:25:11','0000-00-00 00:00:00'),(163,'codeman','df5bb8067b7b1d641275af93581dea28',1,'0000-00-00 00:00:00',0,3,'2015-03-25 10:03:46','0000-00-00 00:00:00'),(164,'qwbht','e231a950ed2aa037c80bdfceb334ec1d',1,'0000-00-00 00:00:00',0,3,'2015-03-25 14:36:44','0000-00-00 00:00:00'),(165,'xinxiu000','c59758f0faf4881c1951d5694217752b',1,'0000-00-00 00:00:00',0,3,'2015-03-25 15:45:18','0000-00-00 00:00:00'),(166,'sishi3000','a909d6e0b9dfbcf49d44e16213745445',1,'0000-00-00 00:00:00',0,3,'2015-03-25 18:55:08','0000-00-00 00:00:00'),(167,'chent998','7f9ccdf74601ebbf4bb0629881fcefc9',1,'0000-00-00 00:00:00',0,3,'2015-03-25 21:41:36','0000-00-00 00:00:00'),(168,'feng229','243f603fc8d317e0894fce0a9851d2b4',1,'0000-00-00 00:00:00',0,3,'2015-03-25 22:08:56','0000-00-00 00:00:00'),(169,'huaz','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-26 15:31:56','0000-00-00 00:00:00'),(170,'admin0','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-26 16:04:29','0000-00-00 00:00:00'),(171,'jacky0515','5a5471adcd13aaa4d13699cf7332f497',1,'0000-00-00 00:00:00',0,3,'2015-03-26 17:22:03','0000-00-00 00:00:00'),(172,'emediaer','69c4f5b0c185dab6bc27c3628cf02009',1,'0000-00-00 00:00:00',0,3,'2015-03-26 17:39:16','0000-00-00 00:00:00'),(173,'zhou7838','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-27 01:33:07','0000-00-00 00:00:00'),(174,'mwdworks','f0e5aaaba43d464c61ea0b7361731dcc',1,'0000-00-00 00:00:00',0,3,'2015-03-27 10:05:13','0000-00-00 00:00:00'),(175,'hongzx','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-27 10:28:23','0000-00-00 00:00:00'),(176,'hongzx12','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-27 10:30:58','0000-00-00 00:00:00'),(177,'xingdwg','d2407542ae81d6b593c46b3adf110fbb',1,'0000-00-00 00:00:00',0,3,'2015-03-28 13:53:35','0000-00-00 00:00:00'),(178,'kevin1049','61d7ab63d29cbfb9ee51cbe51efeafa0',1,'0000-00-00 00:00:00',0,3,'2015-03-28 21:36:17','0000-00-00 00:00:00'),(179,'baihu4210','27d4379f16b9aff0747a23cd947635a3',1,'0000-00-00 00:00:00',0,3,'2015-03-29 07:20:27','0000-00-00 00:00:00'),(180,'nmxyj','65e81e9361265949b1afa0beec20deb1',1,'0000-00-00 00:00:00',0,3,'2015-03-29 11:18:39','0000-00-00 00:00:00'),(181,'lcyrx','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-03-29 15:46:22','0000-00-00 00:00:00'),(182,'635466568','2f00ab98b6f61aee501fbcf6fd9e3153',1,'0000-00-00 00:00:00',0,3,'2015-03-29 16:22:00','0000-00-00 00:00:00'),(183,'zhou7707','370018924a5b067ccd5026a838cdfc06',1,'0000-00-00 00:00:00',0,3,'2015-03-29 19:26:22','0000-00-00 00:00:00'),(184,'i7cycle','800057aec1fcb0d79c80d6867f51f2dc',1,'0000-00-00 00:00:00',0,3,'2015-03-30 07:50:04','0000-00-00 00:00:00'),(185,'ilyf0707','aaf8b58cdc29db1e71c09c4fff5cc3ac',1,'0000-00-00 00:00:00',0,3,'2015-03-30 08:32:45','0000-00-00 00:00:00'),(186,'limeng','89f3e47f2dd107edc6f34621ab1a149c',1,'0000-00-00 00:00:00',0,3,'2015-03-30 13:37:33','0000-00-00 00:00:00'),(187,'5413860','20650d0e0f72e592691c86895246cfc7',1,'0000-00-00 00:00:00',0,3,'2015-03-30 18:12:28','0000-00-00 00:00:00'),(188,'z526995666','eba144982e6958abbadf4d210196b18f',1,'0000-00-00 00:00:00',0,3,'2015-04-01 10:22:03','0000-00-00 00:00:00'),(189,'zhegei','2c36f8fc758a79b45ccf3c6a60bdac59',1,'0000-00-00 00:00:00',0,3,'2015-04-01 15:34:59','0000-00-00 00:00:00'),(190,'123QWE','ee580009c97e7ab0b6906a93409f7b2c',1,'0000-00-00 00:00:00',0,3,'2015-04-01 17:04:41','0000-00-00 00:00:00'),(191,'ceshi123','942d4040730a148eeb48cd75fd618c62',1,'0000-00-00 00:00:00',0,3,'2015-04-01 17:15:56','0000-00-00 00:00:00'),(192,'gaoertech','eb24173df0f85c47af00187f0296ac07',1,'0000-00-00 00:00:00',0,3,'2015-04-01 17:45:02','0000-00-00 00:00:00');

/*Table structure for table `jk_auth_type_signinlog` */

DROP TABLE IF EXISTS `jk_auth_type_signinlog`;

CREATE TABLE `jk_auth_type_signinlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `akey_verify` int(11) DEFAULT '0',
  `mobile` int(11) DEFAULT '0',
  `virtualmobile` int(11) DEFAULT '0',
  `qq` int(11) DEFAULT '0',
  `weixin_verify` int(11) DEFAULT '0',
  `weibo` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `jk_auth_type_signinlog` */

insert  into `jk_auth_type_signinlog`(`id`,`akey_verify`,`mobile`,`virtualmobile`,`qq`,`weixin_verify`,`weibo`,`date`) values (1,1,0,0,0,0,0,'2015-06-04'),(2,1,0,0,0,0,0,'2015-06-09');

/*Table structure for table `jk_client` */

DROP TABLE IF EXISTS `jk_client`;

CREATE TABLE `jk_client` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mac_hash` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mac` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `third_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `auth_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `enable` tinyint(4) NOT NULL DEFAULT '1',
  `times` int(11) NOT NULL DEFAULT '1',
  `create_time` datetime NOT NULL,
  `lastvisit_time` datetime NOT NULL,
  `incoming` int(11) DEFAULT '0',
  `outgoing` int(11) DEFAULT '0',
  `device_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '设备类型',
  `devices_cj` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '设备厂家',
  PRIMARY KEY (`id`),
  KEY `mid_mac` (`mac_hash`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jk_client` */

insert  into `jk_client`(`id`,`mac_hash`,`mac`,`user_id`,`username`,`third_id`,`auth_type`,`enable`,`times`,`create_time`,`lastvisit_time`,`incoming`,`outgoing`,`device_type`,`devices_cj`) values (1,'61a1c4ba25076b786c2d27574171d322','38:bc:1a:b5:3d:6a',1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify',1,7,'2015-06-04 12:02:19','2015-06-09 11:32:42',0,0,'Phone','unkown');

/*Table structure for table `jk_client_type_signinlog` */

DROP TABLE IF EXISTS `jk_client_type_signinlog`;

CREATE TABLE `jk_client_type_signinlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Phone` int(11) DEFAULT '0',
  `computer` int(11) DEFAULT '0',
  `Tablet` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `jk_client_type_signinlog` */

insert  into `jk_client_type_signinlog`(`id`,`Phone`,`computer`,`Tablet`,`date`) values (1,1,0,0,'2015-06-04'),(2,1,0,0,'2015-06-09');

/*Table structure for table `jk_fullsigninlog` */

DROP TABLE IF EXISTS `jk_fullsigninlog`;

CREATE TABLE `jk_fullsigninlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `third_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `auth_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateline` datetime NOT NULL,
  `online_time` int(11) DEFAULT NULL COMMENT '在线时长',
  `incoming` int(11) DEFAULT '0',
  `outgoing` int(11) DEFAULT '0',
  `browser_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '浏览器类型',
  `src_url` varchar(100) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '来路地址',
  `client_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `client_token` varchar(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '唯一码，用于反查',
  PRIMARY KEY (`id`,`dateline`),
  KEY `dateline` (`dateline`),
  KEY `online_time` (`online_time`),
  KEY `auth_type` (`auth_type`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
/*!50100 PARTITION BY RANGE (to_days(dateline))
(PARTITION p1012 VALUES LESS THAN (735964) ENGINE = MyISAM,
 PARTITION p1101 VALUES LESS THAN (735995) ENGINE = MyISAM,
 PARTITION p1102 VALUES LESS THAN (736023) ENGINE = MyISAM,
 PARTITION p1103 VALUES LESS THAN (736054) ENGINE = MyISAM,
 PARTITION p1104 VALUES LESS THAN (736084) ENGINE = MyISAM,
 PARTITION p1105 VALUES LESS THAN (736115) ENGINE = MyISAM,
 PARTITION p1106 VALUES LESS THAN (736145) ENGINE = MyISAM,
 PARTITION p1107 VALUES LESS THAN (736176) ENGINE = MyISAM,
 PARTITION p1108 VALUES LESS THAN (736207) ENGINE = MyISAM,
 PARTITION p1109 VALUES LESS THAN (736237) ENGINE = MyISAM,
 PARTITION p11010 VALUES LESS THAN (736268) ENGINE = MyISAM,
 PARTITION p11011 VALUES LESS THAN (736298) ENGINE = MyISAM,
 PARTITION p11012 VALUES LESS THAN (736329) ENGINE = MyISAM,
 PARTITION p11013 VALUES LESS THAN MAXVALUE ENGINE = MyISAM) */;

/*Data for the table `jk_fullsigninlog` */

insert  into `jk_fullsigninlog`(`id`,`user_id`,`username`,`third_id`,`auth_type`,`dateline`,`online_time`,`incoming`,`outgoing`,`browser_type`,`src_url`,`client_ip`,`client_token`) values (1,1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','2015-06-04 12:02:19',0,392,221,'Chrome','baidu.com','192.168.8.153','b3107efd3417f96622a07f33b9e3b74d'),(2,1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','2015-06-09 10:29:51',398,2615,1125,'Chrome','www.163.com','192.168.8.153','cbd0e58056c853b0364b9cc2bc142c7b'),(3,1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','2015-06-09 10:36:47',640,660,710,'Chrome','3g.163.com','192.168.8.153','83cf95b8b80e1c44d1a170063d5342d6'),(4,1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','2015-06-09 10:47:41',574,949,945,'Chrome','www.163.com','192.168.8.153','61b980eef7d9a10d41cc531103338d9b'),(5,1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','2015-06-09 10:59:30',1147,26265,1243,'Chrome','www.163.com','192.168.8.153','0f272911cf22c9e5c6a6c57c4cc69bec'),(6,1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','2015-06-09 11:21:58',532,1216,860,'Chrome','www.163.com','192.168.8.153','b9db5c5ae88ed4c4781c74403d60f4dc'),(7,1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','2015-06-09 11:32:42',4706,22197,7864,'Chrome','www.163.com','192.168.8.153','5bea58aac9d611708f6ce79e0783ef03');

/*Table structure for table `jk_members` */

DROP TABLE IF EXISTS `jk_members`;

CREATE TABLE `jk_members` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `third_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `auth_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mac_hash` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `incoming` int(11) DEFAULT '0' COMMENT '下行流量',
  `outgoing` int(11) DEFAULT '0' COMMENT '上行流量',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `jk_members` */

insert  into `jk_members`(`user_id`,`username`,`third_id`,`auth_type`,`avatar`,`mac_hash`,`create_time`,`incoming`,`outgoing`) values (1,'61a1c4ba25076b786c2d27574171d322','61a1c4ba25076b786c2d27574171d322','akey_verify','','61a1c4ba25076b786c2d27574171d322','2015-06-04 12:02:18',0,0);

/*Table structure for table `jk_merchants_micro_station_about` */

DROP TABLE IF EXISTS `jk_merchants_micro_station_about`;

CREATE TABLE `jk_merchants_micro_station_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `jk_merchants_micro_station_about` */

insert  into `jk_merchants_micro_station_about`(`id`,`content`,`create_datetime`) values (1,'<p>111111111111</p>','2015-06-09 11:02:31');

/*Table structure for table `jk_merchants_micro_station_activity` */

DROP TABLE IF EXISTS `jk_merchants_micro_station_activity`;

CREATE TABLE `jk_merchants_micro_station_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `start_datetime` int(11) DEFAULT NULL,
  `end_datetime` int(11) DEFAULT NULL,
  `thumb` varchar(100) DEFAULT '',
  `summary` varchar(255) DEFAULT '',
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `jk_merchants_micro_station_activity` */

/*Table structure for table `jk_merchants_micro_station_contact` */

DROP TABLE IF EXISTS `jk_merchants_micro_station_contact`;

CREATE TABLE `jk_merchants_micro_station_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `jk_merchants_micro_station_contact` */

insert  into `jk_merchants_micro_station_contact`(`id`,`content`,`create_datetime`) values (1,'<p>45645645</p>','2015-06-09 11:13:33');

/*Table structure for table `jk_merchants_micro_station_nav` */

DROP TABLE IF EXISTS `jk_merchants_micro_station_nav`;

CREATE TABLE `jk_merchants_micro_station_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) DEFAULT NULL,
  `type` char(1) DEFAULT '1' COMMENT '1为系统导航，0为自定义导航',
  `nav_name` varchar(50) DEFAULT '',
  `nav_href` varchar(50) DEFAULT '',
  `nav_image` varchar(50) DEFAULT '',
  `sort` int(11) DEFAULT '100',
  `create_datetime` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `jk_merchants_micro_station_nav` */

insert  into `jk_merchants_micro_station_nav`(`id`,`nav_id`,`type`,`nav_name`,`nav_href`,`nav_image`,`sort`,`create_datetime`,`status`) values (1,1,'1','关于我们','Merchant/about_us','icon-info',4,'2015-06-09 10:55:15','1'),(2,NULL,'0','111','www.baidu.com','icon-qq',1,'2015-06-09 10:55:32','1');

/*Table structure for table `jk_merchants_micro_station_new` */

DROP TABLE IF EXISTS `jk_merchants_micro_station_new`;

CREATE TABLE `jk_merchants_micro_station_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `summary` varchar(255) DEFAULT '',
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `jk_merchants_micro_station_new` */

insert  into `jk_merchants_micro_station_new`(`id`,`title`,`summary`,`content`,`create_datetime`) values (3,'1111111111','111111111111111111114534534534534534534','<p>111111111111111111114534534534534534534</p>','2015-06-09 11:04:51');

/*Table structure for table `jk_merchants_micro_station_product` */

DROP TABLE IF EXISTS `jk_merchants_micro_station_product`;

CREATE TABLE `jk_merchants_micro_station_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `summary` varchar(255) DEFAULT '',
  `thumb` varchar(100) DEFAULT '',
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `jk_merchants_micro_station_product` */

/*Table structure for table `jk_merchants_micro_station_slide` */

DROP TABLE IF EXISTS `jk_merchants_micro_station_slide`;

CREATE TABLE `jk_merchants_micro_station_slide` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jk_merchants_micro_station_slide` */

/*Table structure for table `jk_router_task` */

DROP TABLE IF EXISTS `jk_router_task`;

CREATE TABLE `jk_router_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `router_mac` varchar(50) DEFAULT '',
  `type` varchar(50) DEFAULT '' COMMENT '任务类型',
  `ret` char(2) DEFAULT '2' COMMENT '结果 0为失败,1为成功,2为等待执行,3为超时',
  `content` text COMMENT '执行数据',
  `create_date` datetime DEFAULT NULL,
  `error` varchar(255) DEFAULT '' COMMENT '错误信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `jk_router_task` */

insert  into `jk_router_task`(`id`,`router_mac`,`type`,`ret`,`content`,`create_date`,`error`) values (1,'','wifidog','0','检查周期=60域名白名单=qq.com,weixin.qq.com,baidu.com','2015-06-08 16:46:53',''),(2,'','wifidog','0','关闭认证','2015-06-08 16:50:28',''),(3,'','wifidog','0','关闭认证','2015-06-08 16:52:14',''),(4,'','wifidog','0','开启认证','2015-06-08 17:03:21',''),(5,'04:8d:38:3a:32:f3','wifidog','0','域名白名单=qq.com,weixin.qq.com,baidu.com,cc.com','2015-06-09 15:03:29','');

/*Table structure for table `jk_signin_user_log` */

DROP TABLE IF EXISTS `jk_signin_user_log`;

CREATE TABLE `jk_signin_user_log` (
  `mac_hash` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `login_total` int(11) DEFAULT '1',
  KEY `mid_date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jk_signin_user_log` */

insert  into `jk_signin_user_log`(`mac_hash`,`date`,`login_total`) values ('61a1c4ba25076b786c2d27574171d322','2015-06-04',1),('61a1c4ba25076b786c2d27574171d322','2015-06-09',6);

/*Table structure for table `jk_signinlog` */

DROP TABLE IF EXISTS `jk_signinlog`;

CREATE TABLE `jk_signinlog` (
  `date` date NOT NULL,
  `login_total` int(11) NOT NULL DEFAULT '1',
  KEY `mid_date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jk_signinlog` */

insert  into `jk_signinlog`(`date`,`login_total`) values ('2015-06-04',1),('2015-06-09',6);

/*Table structure for table `jk_sms_log` */

DROP TABLE IF EXISTS `jk_sms_log`;

CREATE TABLE `jk_sms_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phonenumber` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verifycode` varchar(10) COLLATE utf8_unicode_ci DEFAULT '',
  `suc` tinyint(4) DEFAULT NULL,
  `last_send` datetime DEFAULT NULL,
  `type` int(11) DEFAULT '1' COMMENT '短信发送类型，1为真实短信，2为虚拟短信平台生成',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jk_sms_log` */

/*Table structure for table `jk_user_signinlog` */

DROP TABLE IF EXISTS `jk_user_signinlog`;

CREATE TABLE `jk_user_signinlog` (
  `date` date NOT NULL,
  `user_total` int(11) NOT NULL DEFAULT '1',
  KEY `mid_date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jk_user_signinlog` */

insert  into `jk_user_signinlog`(`date`,`user_total`) values ('2015-06-04',1),('2015-06-09',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
