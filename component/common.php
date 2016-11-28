<?php


namespace component;


use Yii;
use yii\base\Component;


class Common extends Component
{

    public function sendMail($subject,$text,$emailFrom='kuden.and.ko@gmail.com',$nameFrom='MyPortfolio'){
        Yii::$app->mail->compose()
            ->setFrom(['Rickcy@yandex.ru'=>'MyPortfolio'])
            ->setTo([$emailFrom=> $nameFrom])
            ->setSubject($subject)
            ->setTextBody($text)
            ->send();

    }

}