<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Works */

$this->title = $model->work_name;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="works-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'work_name',
            'work_description',
            'work_url:url',
            'work_tech',
            [
                'attribute'=>'work_image','format' => 'raw',
                'value'=>('<img src =/' .$model->work_image . ' height="100" width="100"' .   '>')
            ],
            'showMain',
        ],
    ]) ?>
    <?$images_files =$model->viewsImage($model->work_name);
    ?>
    <?if ($images_files):?>
        <?
        foreach ($images_files as $img):?>
            <span id="image<?=rtrim(basename($img),'.png')?>" > <img class="img-thumbnail" width=200px src="/uploads/<?=$name =str_replace(' ','',$model->work_name);?>/images/<?=basename($img)?>" >
        <a href="javascript:void(0)" onclick='deleteImages(<?=$model->id?>,"<?=rtrim(basename($img),'.png')?>")' >x</a>
       </span>
           
        <?endforeach;?>
    <?endif;?>
</div>

