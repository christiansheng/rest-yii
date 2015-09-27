<?php

$sql = "use rest_yii;
        INSERT INTO `rest_yii`.`book` (`name`, `press`, `authors`, `isbn`, `version`, `date`, `language`) VALUES ( '算法导论', '机械工业出版社', 'Thomas H.Cormen, 殷建平', '9787111407010', '3', '2012-12-01 00:00:00', '中文');
        INSERT INTO `rest_yii`.`book` (`name`, `press`, `authors`, `isbn`, `version`, `date`, `language`) VALUES ('疯狂Android讲义', '电子工业出版社', '李刚', '9787121259586', '3', '2015-06-01 00:00:00', '中文');
        INSERT INTO `rest_yii`.`book` (`name`, `press`, `authors`, `isbn`, `version`, `date`, `language`) VALUES ('Java从入门到精通', '清华大学出版社', '明日科技', '9787302287568', '3', '2012-08-01 00:00:00', '中文');
        INSERT INTO `rest_yii`.`book` (`name`, `press`, `authors`, `isbn`, `version`, `date`, `language`) VALUES ('Java编程思想', '机械工业出版社', 'Bruce  Eckel, 陈昊鹏', '9787111213826', '4', '2007-06-01 00:00:00', '中文');
        INSERT INTO `rest_yii`.`book` (`name`, `press`, `authors`, `isbn`, `version`, `date`, `language`) VALUES ('JavaScript权威指南', '机械工业出版社', 'David Flanagan, 淘宝前端团队', '9787111376613', '6', '2012-04-01 00:00:00', '中文');
        INSERT INTO `rest_yii`.`book` (`name`, `press`, `authors`, `isbn`, `version`, `date`, `language`) VALUES ('C++ Primer', '电子工业出版社', 'Stanley B. Lippman, 王刚', '9787121155352', '5', '2013-09-01 00:00:00', '中文');
        INSERT INTO `rest_yii`.`book` (`name`, `press`, `authors`, `isbn`, `version`, `date`, `language`) VALUES ('JavaScript高级程序设计', '人民邮电出版社', 'Nicholas C.Zakas, 李松峰', '9787115275790', '3', '2012-03-01 00:00:00', '中文');";

return $sql;