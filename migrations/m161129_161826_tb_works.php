<?php

use yii\db\Migration;

class m161129_161826_tb_works extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL PRIMARY KEY ,
  `work_name` varchar(200) NOT NULL,
  `work_description` varchar(1000) DEFAULT NULL,
  `work_url` varchar(100) DEFAULT NULL,
  `work_tech` varchar(100) DEFAULT NULL,
  `work_image` varchar(200) DEFAULT NULL,
  `showMain` tinyint(1) DEFAULT 0,
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
(18, "Deloved", "Совершайте сделки, оставляйте отзывы, оценивайте ваших поставщиков и покупателей Для безопасного ведения любых сделок и переговоров всегда можно воспользоваться квалифицированной помощью юриста, доступной в личном кабинете. Помощь юриста в один клик, на любом этапе переговоров, подписании договора, при подаче иска. Ваш персональный юрист в режиме Онлайн окажет комплексное сопровождение сделки, от формирования необходимого пакета документов до представления Ваших интересов. Сервис портала позволит воспользоваться готовыми, актуальными формами документов и образцами договоров, необходимыми для совершения успешной сделки. Ваш персональный юрист окажет помощь при составлении договора, каким бы уникальным он не был.\r\n\r\nВ случае возникновения спорной ситуации по сделке используйте процедуру медиации - инструмент внесудебного урегулирования спора. Сервис онлайн медиации «Деловед» позволит максимально просто обратиться к медиатору, получить консультацию, оформить необходимые документы. Удобное сохранение деловой переписки и контроль переговоров. Медиаторы «Деловед» - это сертифицированные специалисты в области урегулирования споров, обладающие необходимым опытом. Своевременное обращение к медиатору позволит сторонам выработать оптимальное и взаимовыгодное решение для разрешения спора без обращения в суд. Экономия времени и средств – очевидна. ", "deloved.ru", "Java | Grails | JS | Angular | HTML | SASS", "uploads/Deloved/general_image.jpg", 1),
(19, "DelovedSud", "Третейский суд «Деловед» - это постоянно действующий юрисдикционный орган по рассмотрению гражданско-правовых споров между юридическими лицами, гражданами, в том числе предпринимателями.\r\n\r\nПрактика обращения в третейские суды все прочнее входит в сферу урегулирования взаимоотношений между хозяйствующими субъектами.\r\n\r\nЦелью данного сайта является содействие развитию третейского разбирательства, а так же стремление максимально упростить процедуру получения информации, необходимой для обращения в третейский суд «Деловед».", "delovedsud.ru","PHP | 1C-Bitrix", "uploads/DelovedSud/general_image.png", 1),
(20, "Responseve Maket", "", "deloved.ru/Maket/", "HTML | SASS", "uploads/ResponseveMaket/general_image.png", 1),
(21, "SlimBody", "", "deloved.ru/SlimBody/", "HTML | SASS", "uploads/SlimBody/general_image.jpg", 1);

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
