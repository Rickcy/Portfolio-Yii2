<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;

use app\assets\CabinetAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


$id = Yii::$app->user->id;
$user = \app\models\User::findIdentity($id);
CabinetAsset::register($this);
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


        'options' => [
            'class' => 'navbar-default navbar-fixed-top ',
        ],

    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [

            ['label' => '<i class="fa fa-home"></i>   Home', 'url' => ['/site/index']],


            ['label' => '<i class="fa fa-info"></i> Manage Skills', 'url' => ['/cabinet/skills']],
            ['label' => '<i class="fa fa-bookmark"></i>  Manage Works', 'url' => ['/cabinet/works']],
            // ['label' => '<i class="fa fa-font"></i>   Reviews', 'url' => ['/site/reviews']],
            ['label' => '<i class="fa fa-github-alt"></i>   Github', 'url' => 'https://github.com/Rickcy'],
            Yii::$app->user->isGuest ? (
            ''
            ) :
                ['label' => '<i class="fa fa-sign-out" style="font-size: 15pt"></i> ', 'url' => ['/site/logout'], 'post']

        ],
    ]);
    NavBar::end();
    ?>


    <div class="container">
    <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
