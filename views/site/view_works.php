<?php
/* @var $this yii\web\View */
/* @var $model app\models\Works */

$this->title = $model->work_name;
?>
<div class="site-page">

    <section id="portfolio" class="pfblock">
        <div class="container">
<div class="row">

    <div class="col-sm-8 col-sm-offset-2">

        <div class="pfblock-header wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
            <a href="/site/works/"><div style="font-size: 13pt;font-weight: 500" class="back">Back in works</div></a>

            <h2 class="pfblock-title"><a style="color:black" target="_blank" href="http://<?=$model['work_url']?>/">Go to the <?=$model['work_name']?></a></h2>
            <div class="pfblock-line"></div>
            <div style="font-size: 12pt;margin-bottom: 40px"><?=$model['work_description']?></div>
            <p style="font-weight: 600"><?=$model['work_tech']?></p>

            <div>
                <?$images_files =$model->viewsImage($model->work_name);
                ?>
                <?if ($images_files):?>
                    <?
                    foreach ($images_files as $img):?>
                        <span id="image<?=rtrim(basename($img),'.png')?>" > <img class="img-thumbnail" width=200px src="/uploads/<?=$model->work_name;?>/images/<?=basename($img)?>" >
       </span>
                    <?endforeach;?>
                <?endif;?>

            </div>
        </div>

    </div>

</div>
</div>
        </section>
</div>