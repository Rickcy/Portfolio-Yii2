<?php

use yii\db\Migration;

class m161129_161826_tb_works extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL PRIMARY KEY ,
  `work_name` varchar(200) NOT NULL,
  `work_description` varchar(200) DEFAULT NULL,
  `worl_url` varchar(100) DEFAULT NULL,
  `work_tech` varchar(100) DEFAULT NULL,
  `work_image` varchar(200) DEFAULT NULL,
  `work_name_image` varchar(100) DEFAULT NULL,
  `showMain` tinyint(1) DEFAULT \'0\'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
');
    }

    public function down()
    {
        $this->dropTable('works');
        echo "m161129_161826_tb_works cannot be reverted.\n";

        return false;
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
