# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 5.7.32)
# Database: db_kmutnb_smart_service
# Generation Time: 2023-04-19 13:07:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_gender` int(11) NOT NULL COMMENT 'เพศ',
  `admin_fname` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `admin_lname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `admin_username` varchar(45) NOT NULL,
  `admin_password` varchar(45) NOT NULL,
  `admin_level` int(1) DEFAULT NULL COMMENT 'ระดับ',
  `admin_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_updated_at` timestamp NULL DEFAULT NULL,
  `admin_last_login` timestamp NULL DEFAULT NULL COMMENT 'ล็อกอินล่าสุด',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;

INSERT INTO `tb_admin` (`admin_id`, `admin_gender`, `admin_fname`, `admin_lname`, `admin_username`, `admin_password`, `admin_level`, `admin_created_at`, `admin_updated_at`, `admin_last_login`)
VALUES
	(1,0,'วงศธร','บุญเพ็ง','superadmin','superadmin',0,'2023-04-17 16:25:33',NULL,'2023-04-17 16:15:35'),
	(3,0,'wwwww2','wwww2','w','w',2,'2023-04-17 21:36:25',NULL,'2023-04-17 16:14:40');

/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_booking_room_tutor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_booking_room_tutor`;

CREATE TABLE `tb_booking_room_tutor` (
  `booking_rtt_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `std_id` int(11) DEFAULT NULL COMMENT 'ID นักศึกษา',
  `rtt_id` int(11) DEFAULT NULL COMMENT 'ID ห้อง',
  `booking_date` date DEFAULT NULL COMMENT 'วันที่จอง',
  `booking_start_time` time DEFAULT NULL COMMENT 'เวลาเข้า',
  `booking_end_time` time DEFAULT NULL COMMENT 'เวลาออก',
  `booking_status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = รอ checkin, 1 = check out, 2 = สำเร็จ',
  PRIMARY KEY (`booking_rtt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_booking_room_tutor` WRITE;
/*!40000 ALTER TABLE `tb_booking_room_tutor` DISABLE KEYS */;

INSERT INTO `tb_booking_room_tutor` (`booking_rtt_id`, `std_id`, `rtt_id`, `booking_date`, `booking_start_time`, `booking_end_time`, `booking_status`)
VALUES
	(19,2,1,'2023-04-18','13:30:00','18:30:00',2),
	(20,2,1,'2023-04-18','13:30:00','16:30:00',2);

/*!40000 ALTER TABLE `tb_booking_room_tutor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_borrow_equipment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_borrow_equipment`;

CREATE TABLE `tb_borrow_equipment` (
  `eq_br_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eq_br_status` int(1) NOT NULL DEFAULT '0',
  `eq_br_created_at` timestamp NULL DEFAULT NULL,
  `eq_br_give_back_at` timestamp NULL DEFAULT NULL,
  `std_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`eq_br_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_borrow_equipment` WRITE;
/*!40000 ALTER TABLE `tb_borrow_equipment` DISABLE KEYS */;

INSERT INTO `tb_borrow_equipment` (`eq_br_id`, `eq_br_status`, `eq_br_created_at`, `eq_br_give_back_at`, `std_id`)
VALUES
	(1,0,'2023-04-19 02:06:22',NULL,2);

/*!40000 ALTER TABLE `tb_borrow_equipment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_borrow_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_borrow_list`;

CREATE TABLE `tb_borrow_list` (
  `borrow_list_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eq_br_id` int(11) NOT NULL,
  `eq_id` int(11) NOT NULL,
  `borrow_list_amount` int(11) NOT NULL,
  PRIMARY KEY (`borrow_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_borrow_list` WRITE;
/*!40000 ALTER TABLE `tb_borrow_list` DISABLE KEYS */;

INSERT INTO `tb_borrow_list` (`borrow_list_id`, `eq_br_id`, `eq_id`, `borrow_list_amount`)
VALUES
	(1,1,1,3),
	(2,1,2,2);

/*!40000 ALTER TABLE `tb_borrow_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_car
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_car`;

CREATE TABLE `tb_car` (
  `car_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `car_license_plate` varchar(15) DEFAULT NULL,
  `car_brand` varchar(15) DEFAULT NULL,
  `car_created_at` timestamp NULL DEFAULT NULL,
  `car_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_car` WRITE;
/*!40000 ALTER TABLE `tb_car` DISABLE KEYS */;

INSERT INTO `tb_car` (`car_id`, `car_license_plate`, `car_brand`, `car_created_at`, `car_updated_at`)
VALUES
	(1,'123คฟ','VOLVO','2023-03-19 23:11:58',NULL);

/*!40000 ALTER TABLE `tb_car` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_checkpoint_drive
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_checkpoint_drive`;

CREATE TABLE `tb_checkpoint_drive` (
  `cpd_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cpd_name` varchar(50) DEFAULT NULL,
  `cpd_lat` double DEFAULT NULL,
  `cpd_long` double DEFAULT NULL,
  `cpd_created_at` timestamp NULL DEFAULT NULL,
  `cpd_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cpd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_checkpoint_drive` WRITE;
/*!40000 ALTER TABLE `tb_checkpoint_drive` DISABLE KEYS */;

INSERT INTO `tb_checkpoint_drive` (`cpd_id`, `cpd_name`, `cpd_lat`, `cpd_long`, `cpd_created_at`, `cpd_updated_at`)
VALUES
	(1,'คณะเทคโนโลยีและการจัดการอุตสาหกรรม',14.159249305725098,101.34564208984375,'2023-03-12 21:38:16',NULL),
	(2,'หน้าประตู มจพ.',14.163719453758143,101.3651555191761,'2023-03-12 21:39:24',NULL),
	(3,'คณะบริหารธุรกิจและอุตสาหกรรม',14.16176247800782,101.36137628591756,'2023-03-12 21:40:03',NULL);

/*!40000 ALTER TABLE `tb_checkpoint_drive` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_checkpoint_room
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_checkpoint_room`;

CREATE TABLE `tb_checkpoint_room` (
  `cpr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cpr_name` varchar(50) DEFAULT NULL,
  `cpr_lat` double DEFAULT NULL,
  `cpr_long` double DEFAULT NULL,
  `cpr_created_at` timestamp NULL DEFAULT NULL,
  `cpr_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cpr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_checkpoint_room` WRITE;
/*!40000 ALTER TABLE `tb_checkpoint_room` DISABLE KEYS */;

INSERT INTO `tb_checkpoint_room` (`cpr_id`, `cpr_name`, `cpr_lat`, `cpr_long`, `cpr_created_at`, `cpr_updated_at`)
VALUES
	(1,'คณะเทคโนโลยีและการจัดการอุตสาหกรรม',14.158639482849125,101.34547505706499,'2023-03-13 00:05:57',NULL);

/*!40000 ALTER TABLE `tb_checkpoint_room` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_department
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_department`;

CREATE TABLE `tb_department` (
  `dpm_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dpm_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อสาขาวิชา',
  `dpm_created_at` timestamp NULL DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `dpm_updated_at` timestamp NULL DEFAULT NULL COMMENT 'อัพเดทเมื่อ',
  `dpm_del_status` int(1) DEFAULT NULL COMMENT 'สถานะการลบ',
  `dpm_del_at` timestamp NULL DEFAULT NULL COMMENT 'ลบเมื่อ',
  PRIMARY KEY (`dpm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_driver
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_driver`;

CREATE TABLE `tb_driver` (
  `driver_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `driver_socket_id` varchar(50) DEFAULT NULL,
  `driver_lat` double DEFAULT NULL,
  `driver_long` double DEFAULT NULL,
  `driver_gender` int(1) DEFAULT NULL COMMENT 'คำนำหน้า',
  `driver_fname` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `driver_lname` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `driver_tel` varchar(15) DEFAULT NULL COMMENT 'เบอร์',
  `driver_username` varchar(50) DEFAULT NULL COMMENT 'username',
  `driver_password` varchar(50) DEFAULT NULL COMMENT 'password',
  `driver_created_at` timestamp NULL DEFAULT NULL COMMENT 'เวลาที่สร้าง',
  `driver_updated_at` timestamp NULL DEFAULT NULL COMMENT 'อัพเดทเมื่อ',
  `driver_del_status` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะการลบ',
  `driver_del_at` timestamp NULL DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL COMMENT 'ID รถ',
  `driver_last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_driver` WRITE;
/*!40000 ALTER TABLE `tb_driver` DISABLE KEYS */;

INSERT INTO `tb_driver` (`driver_id`, `driver_socket_id`, `driver_lat`, `driver_long`, `driver_gender`, `driver_fname`, `driver_lname`, `driver_tel`, `driver_username`, `driver_password`, `driver_created_at`, `driver_updated_at`, `driver_del_status`, `driver_del_at`, `car_id`, `driver_last_login`)
VALUES
	(1,NULL,14.1530325,101.3637316,1,'วงศธร','บุญเพ็ง',NULL,'f','f','2023-03-17 00:17:12',NULL,0,NULL,1,'2023-04-03 21:16:47'),
	(2,NULL,14.1530038,101.3637681,1,'คมสัน','ไไไไ',NULL,'t','t','2023-03-19 13:39:22',NULL,0,NULL,NULL,'2023-03-19 13:41:10');

/*!40000 ALTER TABLE `tb_driver` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_event`;

CREATE TABLE `tb_event` (
  `event_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_img` text,
  `event_name` varchar(50) DEFAULT NULL,
  `event_detail` text,
  `event_join_status` int(1) NOT NULL DEFAULT '0',
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_del_status` int(1) DEFAULT NULL,
  `event_del_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_event` WRITE;
/*!40000 ALTER TABLE `tb_event` DISABLE KEYS */;

INSERT INTO `tb_event` (`event_id`, `event_img`, `event_name`, `event_detail`, `event_join_status`, `event_start_date`, `event_end_date`, `event_del_status`, `event_del_at`)
VALUES
	(1,'run.jpeg','KMUTNB Bike Walk Run','run 100 km : Cycling 600 km',0,'2023-04-19','2023-04-28',NULL,NULL);

/*!40000 ALTER TABLE `tb_event` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_event_join
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_event_join`;

CREATE TABLE `tb_event_join` (
  `ev_join_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `std_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ev_join_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_event_join` WRITE;
/*!40000 ALTER TABLE `tb_event_join` DISABLE KEYS */;

INSERT INTO `tb_event_join` (`ev_join_id`, `std_id`, `event_id`)
VALUES
	(1,2,1);

/*!40000 ALTER TABLE `tb_event_join` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_faculty
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_faculty`;

CREATE TABLE `tb_faculty` (
  `fct_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fct_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อคณะ',
  `fct_created_at` timestamp NULL DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `fct_updated_at` timestamp NULL DEFAULT NULL COMMENT 'อัพเดทเมื่อ',
  `fct_del_status` timestamp NULL DEFAULT NULL COMMENT 'สถานะการลบ',
  `fct_del_at` timestamp NULL DEFAULT NULL COMMENT 'ลบเมื่อ',
  PRIMARY KEY (`fct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_get_car
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_get_car`;

CREATE TABLE `tb_get_car` (
  `get_car_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `std_id` int(11) DEFAULT NULL COMMENT 'id นักศึกษา',
  `departure` int(11) DEFAULT NULL COMMENT 'ต้นทาง',
  `destination` int(11) DEFAULT NULL COMMENT 'ปลายทาง',
  `driver_id` int(11) DEFAULT NULL COMMENT 'id คนขับ',
  `get_car_status` int(1) NOT NULL DEFAULT '1' COMMENT '0 = เกิดข้อผิดพลาด, 1 = รอ, 2 = อยู่บนรถ 3 = สำเร็จ',
  `get_car_emgcy_detail` text COMMENT 'รายละเอียดของ ',
  `get_car_created_at` timestamp NULL DEFAULT NULL,
  `get_car_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`get_car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_get_car` WRITE;
/*!40000 ALTER TABLE `tb_get_car` DISABLE KEYS */;

INSERT INTO `tb_get_car` (`get_car_id`, `std_id`, `departure`, `destination`, `driver_id`, `get_car_status`, `get_car_emgcy_detail`, `get_car_created_at`, `get_car_updated_at`)
VALUES
	(1,2,2,1,1,3,NULL,'2023-04-10 02:54:37',NULL),
	(2,2,3,2,1,3,NULL,'2023-04-10 02:54:37',NULL),
	(3,2,3,1,1,3,NULL,'2023-04-10 02:54:37',NULL),
	(4,2,3,1,1,3,NULL,'2023-04-12 12:03:19',NULL),
	(5,2,1,2,1,3,NULL,'2023-04-12 12:03:19',NULL);

/*!40000 ALTER TABLE `tb_get_car` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_img_room_tutor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_img_room_tutor`;

CREATE TABLE `tb_img_room_tutor` (
  `rtt_img_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rtt_id` int(11) DEFAULT NULL,
  `rtt_img_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rtt_img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_img_room_tutor` WRITE;
/*!40000 ALTER TABLE `tb_img_room_tutor` DISABLE KEYS */;

INSERT INTO `tb_img_room_tutor` (`rtt_img_id`, `rtt_id`, `rtt_img_name`)
VALUES
	(1,1,'room1.png'),
	(2,1,'room2.png'),
	(3,1,'room3.png'),
	(4,1,'room4.png');

/*!40000 ALTER TABLE `tb_img_room_tutor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_report_event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_report_event`;

CREATE TABLE `tb_report_event` (
  `rp_event_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ev_join_id` int(11) DEFAULT NULL,
  `rp_event_img` text,
  `rp_event_detail` text,
  `rp_event_status` int(1) NOT NULL DEFAULT '0',
  `rp_event_created_at` timestamp NULL DEFAULT NULL,
  `rp_event_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rp_event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_room_tutor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_room_tutor`;

CREATE TABLE `tb_room_tutor` (
  `rtt_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cpr_id` int(11) DEFAULT NULL,
  `rtt_name` varchar(50) DEFAULT NULL,
  `rtt_join_amount` int(11) DEFAULT NULL,
  `rtt_status` int(1) DEFAULT '0',
  `rtt_created_at` timestamp NULL DEFAULT NULL,
  `rtt_updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rtt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_room_tutor` WRITE;
/*!40000 ALTER TABLE `tb_room_tutor` DISABLE KEYS */;

INSERT INTO `tb_room_tutor` (`rtt_id`, `cpr_id`, `rtt_name`, `rtt_join_amount`, `rtt_status`, `rtt_created_at`, `rtt_updated_at`)
VALUES
	(1,1,'Spark 1',10,0,'2023-04-13 01:49:43',NULL),
	(2,1,'Spark 2',6,0,'2023-04-13 03:11:46',NULL);

/*!40000 ALTER TABLE `tb_room_tutor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_sports_equipment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_sports_equipment`;

CREATE TABLE `tb_sports_equipment` (
  `eq_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eq_sport_name` varchar(50) NOT NULL,
  `eq_sport_amount` int(11) NOT NULL,
  `eq_sport_created_at` timestamp NULL DEFAULT NULL,
  `eq_sport_updated_at` timestamp NULL DEFAULT NULL,
  `eq_sport_del_status` int(1) NOT NULL DEFAULT '0',
  `eq_sport_del_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`eq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_sports_equipment` WRITE;
/*!40000 ALTER TABLE `tb_sports_equipment` DISABLE KEYS */;

INSERT INTO `tb_sports_equipment` (`eq_id`, `eq_sport_name`, `eq_sport_amount`, `eq_sport_created_at`, `eq_sport_updated_at`, `eq_sport_del_status`, `eq_sport_del_at`)
VALUES
	(1,'ไม้แบต',17,'2023-04-18 23:49:58',NULL,0,NULL),
	(2,'ไม้ปิงปอง',94,'2023-04-18 23:50:52',NULL,0,NULL);

/*!40000 ALTER TABLE `tb_sports_equipment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_student
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_student`;

CREATE TABLE `tb_student` (
  `std_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `std_socket_id` varchar(50) DEFAULT NULL,
  `std_number_id` varchar(13) DEFAULT NULL COMMENT 'รหัสนักศึกษา',
  `std_gender` int(1) DEFAULT NULL COMMENT 'คำนำหน้า',
  `std_fname` varchar(60) DEFAULT NULL COMMENT 'ชื่อ',
  `std_lname` varchar(60) DEFAULT NULL COMMENT 'นามสกุล',
  `std_email` varchar(50) DEFAULT NULL COMMENT 'อีเมลล์',
  `std_username` varchar(50) DEFAULT NULL COMMENT 'Username',
  `std_password` varchar(50) DEFAULT NULL COMMENT 'Password',
  `std_created_at` timestamp NULL DEFAULT NULL,
  `std_updated_at` timestamp NULL DEFAULT NULL,
  `std_del_status` int(1) DEFAULT NULL COMMENT 'สถานะการลบ 0 = ยังไม่ลบ, 1 = ลบแล้ว',
  `std_del_at` timestamp NULL DEFAULT NULL COMMENT 'ลบเมื่อ',
  `dpm_id` int(11) DEFAULT NULL COMMENT 'สาขาวิชา',
  `fct_id` int(11) DEFAULT NULL COMMENT 'คณะ',
  `std_last_login` timestamp NULL DEFAULT NULL COMMENT 'ล็อกอินล่าสุด',
  PRIMARY KEY (`std_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `tb_student` WRITE;
/*!40000 ALTER TABLE `tb_student` DISABLE KEYS */;

INSERT INTO `tb_student` (`std_id`, `std_socket_id`, `std_number_id`, `std_gender`, `std_fname`, `std_lname`, `std_email`, `std_username`, `std_password`, `std_created_at`, `std_updated_at`, `std_del_status`, `std_del_at`, `dpm_id`, `fct_id`, `std_last_login`)
VALUES
	(1,NULL,'6406021420085',1,'วงศธร','บุญเพ็ง',NULL,'6406021420085','1234',NULL,NULL,0,NULL,NULL,NULL,'2023-02-26 15:53:18'),
	(2,NULL,'6406021420086',1,'สมศรี','เหินไป',NULL,'2','2',NULL,NULL,0,NULL,NULL,NULL,'2023-04-19 00:37:17');

/*!40000 ALTER TABLE `tb_student` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
