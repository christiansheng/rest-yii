<?php

use yii\db\Schema;
use yii\db\Migration;

class m150924_174810_book_init extends Migration
{
    public function up()
    {
        $sql = require(__DIR__ . '/book_sql_scripts/book_table_init.php');
        $this->execute($sql);
    }

    public function down()
    {
        $sql = "use rest_yii; DROP TABLE `rest_yii`.`book`;";
        $this->execute($sql);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
