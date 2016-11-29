<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<i style="font-size: 20pt;margin-left: 15px" class="fa fa-home"></i>',
        'brandUrl' => Yii::$app->homeUrl,

        'options' => [
            'class' => 'navbar-default navbar-fixed-top ',
        ],

    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [

            ['label' => '<i class="fa fa-home"></i>    Home', 'url' => ['/site/index']],


            ['label' => '<i class="fa fa-info"></i>  Skills', 'url' => ['/site/skills']],
            ['label' => '<i class="fa fa-bookmark"></i>   Works', 'url' => ['/site/works']],
           // ['label' => '<i class="fa fa-font"></i>   Reviews', 'url' => ['/site/reviews']],
            ['label' => '<i class="fa fa-comment"></i>  Feedback', 'url' => ['/site/feedback']],
            ['label' => '<i class="fa fa-github-alt"></i>   Github', 'url' => 'https://github.com/Rickcy'],
            Yii::$app->user->isGuest ? (
                ''
            ) :
            ['label' => '<i class="fa fa-sign-out" style="font-size: 15pt"></i> ', 'url' => ['/site/logout'], 'post']

        ],
    ]);
    NavBar::end();
    ?>



        <?= $content ?>
    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">

                    <ul class="social-links">
                        <li class="social-linksli wow slideInLeft"><a  target="_blank" href="https://www.facebook.com/kuden.and.ko" class="social-linkslia"><i class="fa fa-facebook "></i></a></li>
                        <li class="social-linksli wow slideInRight"><a target="_blank" href="http://vk.com/nextevgen" class="social-linkslia" data-wow-delay=".1s"><i class="fa fa-vk "></i></a></li>


                    </ul>


                    <p class="copyright wow slideInLeft">
                        © 2016 Евгений Куденко
                    </p>

                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </footer>
    </div>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
