<?php

$sql = "use rest_yii;
        CREATE TABLE `book` (
          `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
          `name` varchar(100) NOT NULL DEFAULT '',
          `press` varchar(50) NOT NULL DEFAULT '',
          `authors` varchar(100) NOT NULL DEFAULT '',
          `isbn` varchar(20) NOT NULL,
          `version` int(11) NOT NULL DEFAULT '1',
          `date` datetime NOT NULL,
          `language` varchar(20) NOT NULL DEFAULT '中文',
          PRIMARY KEY (`id`),
          UNIQUE KEY `id_UNIQUE` (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

return $sql;