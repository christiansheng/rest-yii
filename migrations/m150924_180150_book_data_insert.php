<?php

use yii\db\Schema;
use yii\db\Migration;

class m150924_180150_book_data_insert extends Migration
{
    public function up()
    {
        $sql = require(__DIR__ . '/book_sql_scripts/book_data_insert.php');
        // insert 7*20 books, thus we can test pagination
        for($i=0; $i<20; $i++)
            $this->execute($sql);
    }

    public function down()
    {
        $sql = "use rest_yii; TRUNCATE `rest_yii`.`book`;";
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
