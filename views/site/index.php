<?php


use yii\bootstrap\Alert;

$this->title = 'Home | Personal Page Portfolio';
?>
<? if(Yii::$app->session->hasFlash('success')):?>
    <? $success = Yii::$app->session->getFlash('success') ?>
    <?=Alert::widget([
        'options' =>[
            'class'=>'alert-success'],
        'body'=>$success
    ])?>
<?endif?>
<section id="home" class="pfblock-image screen-height">
    <div class="home-overlay"></div>
    <div class="intro">

        <div class="photo wow slideInLeft" ><img src="/images/photo.jpg" alt="Photo" width="10%" /></div>
        <div class="start wow slideInRight" data-wow-delay=".3s">Hello, my name is Evgeniy Kudenko and I am</div>
        <h1 class="wow slideInLeft" data-wow-delay=".5s">Web Developer</h1>
        <div class="start wow slideInRight" data-wow-delay=".8s">creating modern and responsive Web Application</div>
    </div>



</section>

