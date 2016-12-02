<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Works | Personal Page Portfolio';

?>

<div class="site-page">

    <section id="portfolio" class="pfblock">
        <div class="container">
            <?if ($all_works):?>
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">
                    <div class="pfblock-header wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <h2 class="pfblock-title">My works</h2>
                        <div class="pfblock-line"></div>

                    </div>

                </div>

            </div>
            
            <!-- .row -->


            <div class="row">

                <?
                foreach ($all_works as $work):
                ?>
                    <a href="<?=Url::to('/site/view-work?id='.$work['id'])?>">
                <div class="col-xs-12 col-sm-4 col-md-4">

                    <div class="grid wow zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
                        <figure class="effect-bubba">
                            <img src="/<?=$work['work_image']?>" alt="img01">
                            <figcaption>
                                <h2><span><?=$work['work_name']?></span></h2>

                            </figcaption>
                        </figure>
                    </div>

                </div>
                    </a>
                <?endforeach;?>
                <?endif;?>
                <?if ($all_works):?>
                    <div class="row">

                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="pfblock-header wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                <h2 class="pfblock-title">Sorry Works is Empty</h2>
                                <div class="pfblock-line"></div>

                            </div>

                        </div>

                    </div>
                <?endif;?>
<!--

            </div>


        </div><!-- .contaier -->

    </section>
</div>
