<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $message;
$this->context->layout ='/cabinet'
?>
<div class="site-error">



    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>


</div>
