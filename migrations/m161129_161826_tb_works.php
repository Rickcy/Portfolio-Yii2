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
  `work_url` varchar(100) DEFAULT NULL,
  `work_tech` varchar(100) DEFAULT NULL,
  `work_image` varchar(200) DEFAULT NULL,
  `showMain` tinyint(1) DEFAULT \'0\'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
  INSERT INTO `skills` (`id`, `skill_name`, `skill_percent`) VALUES
(1, "Java | Grails", 60),
(2, "PHP | Yii2", 40),
(3, "HTML | CSS", 80),
(4, "JS | AngularJs", 65),
(6, "Photoshop", 50),
(7, "SQL", 50);
INSERT INTO `works` (`id`, `work_name`, `work_description`, `work_url`, `work_tech`, `work_image`, `showMain`) VALUES
(5, "Deloved", "This portal for online companies interact with suppliers, manufacturers, distributors and other counterparties. It provides personalized access to information and contracting services of the customer. B2B portals allow you to effectively communicate with customers and partners, regardless of their location in real time, conduct research contractors, and quickly make deals, to control the purchase and delivery.", "deloved.ru", "Java | Grails | JS | Angular | HTML | SASS", "uploads/Deloved/general_image.jpg", 1);

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
