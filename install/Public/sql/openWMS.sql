DROP TABLE IF EXISTS `jk_fullsigninlog`;

CREATE TABLE `jk_fullsigninlog` (
   `id` INT(10) unsigned NOT NULL AUTO_INCREMENT,
   `user_id` INT(11) NOT NULL,
   `username` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL,
   `third_id` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL,
   `auth_type` VARCHAR(50) COLLATE utf8_unicode_ci NOT NULL,
   `dateline` DATETIME NOT NULL,
   `online_time` INT(11) DEFAULT NULL COMMENT '在线时长',
   `router_mac` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL,
   `incoming` INT(11) DEFAULT '0',
   `outgoing` INT(11) DEFAULT '0',
   `browser_type` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '浏览器类型',
   `src_url` VARCHAR(100) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '来路地址',
   `client_ip` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT '',
   PRIMARY KEY (`id`)
 ) ENGINE=MYISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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


DROP TABLE IF EXISTS `jk_client_type_signinlog`;

CREATE TABLE `jk_client_type_signinlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Phone` int(11) DEFAULT '0',
  `computer` int(11) DEFAULT '0',
  `Tablet` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



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


DROP TABLE IF EXISTS `jk_merchants_micro_station_about`;

CREATE TABLE `jk_merchants_micro_station_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


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

DROP TABLE IF EXISTS `jk_merchants_micro_station_contact`;

CREATE TABLE `jk_merchants_micro_station_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


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


DROP TABLE IF EXISTS `jk_merchants_micro_station_new`;

CREATE TABLE `jk_merchants_micro_station_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `summary` varchar(255) DEFAULT '',
  `content` text,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


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


DROP TABLE IF EXISTS `jk_signin_user_log`;

CREATE TABLE `jk_signin_user_log` (
  `mac_hash` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `login_total` int(11) DEFAULT '1',
  KEY `mid_date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `jk_signinlog`;

CREATE TABLE `jk_signinlog` (
  `date` date NOT NULL,
  `login_total` int(11) NOT NULL DEFAULT '1',
  KEY `mid_date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


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

DROP TABLE IF EXISTS `jk_user_signinlog`;

CREATE TABLE `jk_user_signinlog` (
  `date` date NOT NULL,
  `user_total` int(11) NOT NULL DEFAULT '1',
  KEY `mid_date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
