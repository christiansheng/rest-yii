<?php

$sql = "use rest_yii;
        CREATE TABLE `book` (
          `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
          `name` varchar(100) NOT NULL DEFAULT '',
          `press` varchar(50) NOT NULL DEFAULT '',
          `authors` varchar(100) NOT NULL DEFAULT '',
          `isbn` varchar(20) NOT NULL,
          `version` int(11) NOT NULL DEFAULT '1',
          `language` varchar(20) NOT NULL DEFAULT '中文',
          `publish_at` datetime NOT NULL,
          `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
          `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (`id`),
          UNIQUE KEY `id_UNIQUE` (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

return $sql;